<?php

namespace Modules\SystemSetting\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\SystemSetting\Entities\TutorHiring;
use Modules\SystemSetting\Entities\TutorSlote;
use Modules\VirtualClass\Entities\VirtualClass;
use Modules\Team\Entities\TeamMeeting;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;


class TutorsSettingController extends Controller
{
    public function hiredTutors()
    {
        try {
            $instructors = [];

            return view('systemsetting::hired_tutors', compact('instructors'));
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));
            return redirect()->back();
        }
    }

    public function tutorSlots(Request $request)
    {
        try {
            $slots = [];
            $today = Carbon::now()->format('Y-m-d');
            $today_slots = TutorSlote::where('instructor_id', Auth::id())->where('created_at', 'like', $today . '%')->count();
            //$selecteddate = $request->has('slotDate') ? $request->query('slotDate') : '';
            $selecteddate = session('slotDate','');
            //dd($selecteddate);
            // dd($today_slots);
            return view('systemsetting::tutor_slots', get_defined_vars());
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));
            return redirect()->back();
        }
    }

    public function setSlotTime(Request $request)
    {
        // dd($request->all());
        Session::flash('slot_id', $request->id);
        $rules = [
            'id' => 'required',
            'start_time' => 'required',
        ];

        $this->validate($request, $rules, validationMessage($rules));

        try {

            $start_time = Carbon::parse($request->start_time)->format('h:i a');
            $end_time = Carbon::parse($request->start_time)->addHour(1)->format('h:i a');
            $date = Carbon::parse($request->date)->format('Y-m-d');
            // dd($start_time, $end_time, $date);
            //             if (!$this->checkTimeSlot(Auth::id(), $start_time, $end_time)) {
            $user = TutorSlote::findOrFail($request->id);
            $userid = $user->instructor_id;
            $meetingConflict = TeamMeeting::whereHas('class',function($q) use ($userid){
                $q->where('user_id',$userid);
            })
            ->where(function ($query) use ($start_time, $end_time, $date) {
                $query->where('start_time', '<=', Carbon::parse($date.' '.$end_time)->format('Y-m-d H:i:s'))
                    ->where('end_time', '>=', Carbon::parse($date.' '.$start_time)->format('Y-m-d H:i:s'));
            });
          dd($meetingConflict->count());
        //   dd($meetingConflict->toSql(),$meetingConflict->getBindings());
                    $user->start_time = $start_time;
                    $user->end_time = $end_time;
                    $user->date = $date;
                    $user->save();

                    Toastr::success(trans('common.Operation successful'), trans('common.Success'));
                    return redirect()->back()->with('slotDate', $request->slot_date);

            //             Toastr::error(trans('Choose another time Already set.'), trans('common.Failed'));
            //             return redirect()->back();
        } catch (\Exception $e) {
            Toastr::error($e->getMessage(), trans('common.Failed'));
            //Toastr::error(trans('common.Operation failed'), trans('common.Failed'));
            return redirect()->back();
        }
    }

    public function checkTimeSlot($instructor_id, $start_time, $end_time)
    {
        //     	return TutorSlot::where('instructor_id', $instructor_id)
        // 			    	->where(function ($query) use ($start_time, $end_time) {
        // 			    		$query->where(function ($subquery) use ($start_time, $end_time) {
        // 			    			$subquery->whereTime('end_time', '>', $start_time)
        // 			    			->whereTime('start_time', '<', $end_time);
        // 			    		})
        // 			    		->orWhere(function ($subquery) use ($start_time, $end_time) {
        // 			    			$subquery->whereTime('start_time', '>', $start_time)
        // 			    			->whereTime('start_time', '<', $end_time);
        // 			    		});
        // 			    	})
        // 			    	->exists();
        return TutorSlote::where('instructor_id', $instructor_id)
            ->where(function ($q) use ($start_time, $end_time) {
                $q->where(function ($q) use ($start_time, $end_time) {
                    $q->whereTime('end_time', '>', $start_time)->whereTime('end_time', '<', $end_time);
                })
                    ->orWhere(function ($q) use ($start_time, $end_time) {
                        $q->whereTime('start_time', '>', $start_time)->whereTime('start_time', '<', $end_time);
                    })
                    ->orWhere(function ($q) use ($start_time, $end_time) {
                        $q->whereTime('start_time', '=', $start_time)->whereTime('start_time', '=', $end_time);
                    });
            })
            ->exists();
    }

    public function getAllSlots()
    {

        $query = TutorHiring::orderBy('created_at', 'desc');

        $with = [];
        if (Auth::user()->role_id == 1) {
            $with[] = 'instructor';
        } else {
            $query->where('instructor_id', Auth::id());
        }
        $with[] = 'student';

        $query->with($with);

        return Datatables::of($query)
            ->addIndexColumn()
            ->editColumn('instructor', function ($query) {
                $instructor_id = '';
                if (Auth::user()->role_id == 1) {
                    $instructor_id = isset($query->instructor->name) ? $query->instructor->name : '';
                }
                return $instructor_id;
            })->editColumn('student', function ($query) {
                return $query->student->name;
            })->editColumn('course', function ($query) {
                // return '';
                if($query->course){

                  return $query->course->title;
                }
                else{
                  return '';
                }
            })->editColumn('date', function ($query) {
                return Carbon::parse($query->assign_date)->format('d M Y');
            })->addColumn('start_time', function ($query) {
                return Carbon::parse($query->assign_start_time)->format('H:i a');
            })->addColumn('end_time', function ($query) {
                return Carbon::parse($query->assign_end_time)->format('H:i a');
            })
            ->addColumn('price', function ($query) {
                return getPriceFormat($query->price);
            })->addColumn('action', function ($query) {
                if (Carbon::parse($query->assign_date)->format('d-m-Y') == Carbon::now()->format('d-m-Y')) {
                    if (Carbon::parse($query->assign_start_time)->format('H:i:s') <= Carbon::now()->format('H:i:s') && Carbon::now()->format('H:i:s') <= Carbon::parse($query->assign_end_time)->format('H:i:s')) {
                        $currentstat = 'started';
                    } elseif (Carbon::parse($query->assign_start_time)->format('H:i:s') > Carbon::now()->format('H:i:s')) {
                        $currentstat = 'waiting';
                    } else {
                        $currentstat = 'closed';
                    }
                } else {
                    $currentstat = 'closed';
                }
                if (\Carbon\Carbon::parse($query->assign_date)->format('d-m-Y') > \Carbon\Carbon::now()->format('d-m-Y')) {
                    $currentstat = 'waiting';
                }
                if ($currentstat == 'started') {
                    $html =  '<a class="primary-btn small fix-gr-bg small border-0 text-white"
                                                        href="' .  $query->meeting_join_url . '"
                                                        target="_blank">Start</a>';
                } elseif ($currentstat == 'waiting') {


                    $html =  '<a href="#" class="primary-btn small bg-info border-0 text-white">Waiting</a>
                    <br>
                    <a href="' . url('cancelBookedSlot', ['id' => $query->id]) . '"  class="primary-btn small bg-danger border-0 text-white" > Cancel</a >
                    ';
                } else {
                    $html = '<a href = "#"  class="primary-btn small bg-warning border-0 text-white" > Closed</a >';
                }

                return $html;
           })->rawColumns(['action','cancel'])->make(true);

        // dd($testing);
    }

    // to delete booked slot on student request
    public function cancelBookedSlot(Request $request, $id)
    {
        $record = TutorHiring::with('student')->find($id);
        $user = User::find($record->student->id);
        $user->balance = $user->balance + $record->price;
        $user->save();
        if ($record) {
            $record->delete();
            return redirect()->back()->with('success', 'Slot cancelled successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to cancel slot');
        }
    }

    public function setTutorSlotsWrtDate(Request $request)
    {

        $user = User::where('id', Auth::id())->first();

        $slots = TutorSlote::where('instructor_id', Auth::id())->where('slot_date', $request->slot_date)->count();

        if ($slots <= 0) {
            $total_slots = $user->total_hours;

            for ($i = 1; $i <= $total_slots; $i++) {
                $new_slot = new TutorSlote();
                $new_slot->slot_date = $request->slot_date;
                $new_slot->instructor_id = Auth::id();
                $new_slot->save();
            }
        }

        $slots = TutorSlote::where('instructor_id', Auth::id())->where('slot_date', $request->slot_date)
        ->select('tutor_slotes.*',DB::raw('(CASE WHEN EXISTS (select * from `tutor_hirings` where `tutor_slotes`.`id` = `tutor_hirings`.`tutor_slote_id` and date(`tutor_hirings`.`assign_date`) = `tutor_slotes`.`slot_date`) THEN 1 ELSE 0 END) AS bought'))
        ->get();

        $data['slots'] = $slots;

        return response()->json($data);
    }

    public function validationTutorSlotTime(Request $request)
    {

        $slotId = $request->id;
        $start_time = Carbon::parse($request->start_time)->format('H:i:s');
        $end_time = Carbon::parse($request->start_time)->addHour(1)->format('H:i:s');
        $date = Carbon::parse($request->slot_date)->format('Y-m-d');
        $dayofWeek = Carbon::parse($request->slot_date)->isoFormat('ddd');
        // $arrRes['done'] = false;
        // $arrRes['error'] = $dayofWeek;
        // return response()->json($arrRes);
        // die();
        if ($this->checkTimeSlotWrtDate(Auth::id(), $start_time, $end_time, $date, $slotId)) {
            $arrRes['done'] = false;
            $arrRes['error'] = 'Choose another time Already set.';
        //    $arrRes['error'] = 'Choose another time Already set.';
            return response()->json($arrRes);
            die();
        }
        $checkConflict = VirtualClass::whereHas('course' , function ($q) {
                    $q->where('user_id', Auth::id());
                })
                ->where(function ($q) use ($start_time, $end_time) {
                        $q->whereBetween('time', [$start_time, $end_time])
                            ->orWhereBetween('end_time', [$start_time, $end_time])
                            ->orWhere(function ($q) use ($start_time, $end_time) {
                                $q->where('time', '<', $start_time)->where('end_time', '>', $end_time);
                            })
                            ->orWhere(function ($q) use ($start_time, $end_time) {
                                $q->where('time', '=', $start_time)->where('end_time', '=', $end_time);
                            });
                    })
                ->where(function($q) use($date) {
                    $q->where('start_date', '<=', $date)
                    ->where('end_date', '>=', $date);
                })
                ->where('class_day', date('D', strtotime($date)))->first();
        // $checkConflict = VirtualClass::where('user_id',Auth::id())
        // //->where('course_id','<>',$courseId)
        // //->where('id','<>',$class_id)
        // ->where('class_day', '=', $dayofWeek)
        // ->where(function ($query) use ($start_time, $end_time) {
        //     $query->where('time', '<=', $end_time)
        //         ->where('end_time', '>=', $start_time);
        // })
        // ->where(function ($query) use ($date) {
        //     $query->where('start_date', '<=', $date)
        //         ->where('end_date', '>', $date);
        // })
        // ->first();
        if($checkConflict){
          $arrRes['done'] = false;
          $arrRes['error'] = 'There is already a class for this time. Please choose another time.';
          return response()->json($checkConflict);
          die();
          }
    }

    public function checkTimeSlotWrtDate($instructor_id, $start_time, $end_time, $slot_date, $slotId)
    {

        return TutorSlote::where('instructor_id', $instructor_id)->where('slot_date', $slot_date)->where('id', '!=', $slotId)
            // ->where(function ($q) use ($start_time, $end_time) {
            //     $q->where(function ($q) use ($start_time, $end_time) {
            //         $q->whereTime('end_time', '>', $start_time)->whereTime('end_time', '<', $end_time);
            //     })
            //         ->orWhere(function ($q) use ($start_time, $end_time) {
            //             $q->whereTime('start_time', '>', $start_time)->whereTime('start_time', '<', $end_time);
            //         })
            //         ->orWhere(function ($q) use ($start_time, $end_time) {
            //             $q->whereTime('start_time', '=', $start_time)->whereTime('start_time', '=', $end_time);
            //         });
            // })
            ->where(function ($query) use ($start_time, $end_time) {
                $query->whereRaw("STR_TO_DATE(start_time, '%h:%i %p') <= STR_TO_DATE(?, '%h:%i %p')", [$end_time])
                ->whereRaw("STR_TO_DATE(end_time, '%h:%i %p') > STR_TO_DATE(?, '%h:%i %p')", [$start_time]);
                // ->whereTime('start_time', '<=', $end_time)
                //     ->whereTime('end_time', '>=', $start_time);
            })
            ->exists();
    }
}
