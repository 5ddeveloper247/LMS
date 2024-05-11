<?php

namespace Modules\CourseSetting\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Modules\CourseSetting\Entities\Course;
use Modules\Payment\Entities\PaymentPlans;

class CoursePlanController extends Controller
{

    public function index()
    {
        return view('coursesetting::course_plan.course-plans');
    }





    public function coursePlansData()
    {
        //dd('km');

        $query=PaymentPlans::where(function($q){
          $q->where('type','prep_course_live')->orWhere('type','full_course');
        })->has('courses')->with('courses')->get();
        return Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('type', function ($query) {
                $type = '';
                if ($query->type == 'full_course') {
                    $type = 'Full Course';
                } elseif ($query->type == 'prep_course_live') {
                    $type = 'Prep-Course (Live)';
                }
                return $type;
            })
            ->addColumn('title', function ($query) {
                return $query->courses->parent->title ?? '';
            })
            ->addColumn('amount', function ($query) {
                return $query->amount;
            })
            ->addColumn('sdate', function ($query) {
                return $query->sdate;
            })
            ->addColumn('edate', function ($query) {
                return $query->edate;
            })
            ->addColumn('cdate', function ($query) {
                return $query->cdate;
            })
            ->addColumn('status', function ($query) {
                return view('coursesetting::components._course_status_td', ['query' => $query]);
            })
            ->addColumn('action', function ($query) {
                return view('coursesetting::components._course_action_td', ['query' => $query]);
            })
            ->rawColumns([ 'type', 'title','amount',  'sdate', 'edate', 'cdate','status', 'action'])
            ->make(true);
    }







    public function create()
    {
        $courses = Course::where('status', 1)
            ->where('type', 1)
            ->whereNull('parent_id')
            ->get();
        return view('coursesetting::course_plan.add_course_plan', get_defined_vars());
    }

    public function getChildCourses(Request $request)
    {

        $child_courses = Course::where('status', 1)
            ->whereIn('type', [4, 6])
            ->whereNotNull('parent_id')
            ->where('parent_id', $request->id)
            ->get();

        if ($child_courses) {
            return response()->json($child_courses);
        } else {
            return response()->json("", 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'course_id' => 'required',
                'full_course' => 'nullable',
                'prep_course_live' => 'nullable',
                'full_course_price' => 'required_with:full_course',
                'prep_course_live_price' => 'required_with:prep_course_live',
                'no_of_students' => 'required',
                'plan_start_date' => 'required',
                'plan_end_date' => 'required',
                'class_start_date' => 'required',
            ],
            [
                'course_id.required' => 'Please Select Course !',
                'full_course_price.required' => 'Please Enter Full Course Price !',
                'prep_course_live_price.required' => 'Please Enter Live Course Price !',
                'no_of_students.required' => 'Please Enter Total Students !',
                'plan_start_date.required' => 'Please Select Start Date !',
                'plan_end_date.required' => 'Please Select End Date !',
                'class_start_date.required' => 'Please Select Class Start Date !',
            ]
        );

        $start_date = Carbon::parse($request->plan_start_date)->format('Y-m-d');
        $end_date = Carbon::parse($request->plan_end_date)->format('Y-m-d');
        $class_date = Carbon::parse($request->class_start_date)->format('Y-m-d');

        if ($start_date < Carbon::now()->format('Y-m-d') || $end_date < Carbon::now()->format('Y-m-d')) {
            Toastr::warning('Start Date & End Date Must Be Greater Or Equal to Today\'s Date', 'Warning');
            return redirect()->back();
        }
        if ($start_date == $end_date) {
            Toastr::warning('Start Date & End Date Should Not Be Equal', 'Warning');
            return redirect()->back();
        }
        if ($start_date > $end_date) {
            Toastr::warning('Start Date Should be Less than End Date', 'Warning');
            return redirect()->back();
        }
        if (empty($class_date)) {
            Toastr::warning('Class Start Date is required', 'Warning');
            return redirect()->back();
        }
        if ($class_date < $start_date || $class_date > $end_date) {
            Toastr::warning('Class Start Date Must be Between Start Date & End Date', 'Warning');
            return redirect()->back();
        }
        if ($request->has('full_course') && !empty($request->full_course)) {

            $plan = new PaymentPlans();
            if(count($plan->getMatchingTenureForProgramPlan($request->full_course, 0, $start_date, $end_date,'full_course'))!=0){
              Toastr::warning('Full Course Date matching with previous selected dates.', 'Warning');
              return redirect()->back();
            }
            $plan->parent_id = $request->full_course;
            $plan->amount = $request->full_course_price;
            $plan->type = 'full_course';
            $plan->sdate = $start_date;
            $plan->edate = $end_date;
            $plan->cdate = $class_date;
            $plan->no_of_students = $request->no_of_students;
            $plan->save();
        }
        if ($request->has('prep_course_live') && !empty($request->prep_course_live)) {
          $plan = new PaymentPlans();
          if(count($plan->getMatchingTenureForProgramPlan($request->prep_course_live, 0, $start_date, $end_date,'prep_course_live'))!=0){
            Toastr::warning('Prep Course Date matching with previous selected dates.', 'Warning');
            return redirect()->back();
          }
            $plan->parent_id = $request->prep_course_live;
            $plan->amount = $request->prep_course_live_price;
            $plan->type = 'prep_course_live';
            $plan->sdate = $start_date;
            $plan->edate = $end_date;
            $plan->cdate = $class_date;
            $plan->no_of_students = $request->no_of_students;
            $plan->save();
        }

        Toastr::success('Course Plan Successfully Added !', 'Success');
        return redirect()->to(route('getAllCoursePlan'));
    }

    public function edit($id)
    {
        $course_plan = PaymentPlans::where('id', $id)->with('courses')->first();
        $courses = Course::where('status', 1)
            ->where('type', 1)
            ->whereNull('parent_id')
            ->get();
        return view('coursesetting::course_plan.edit_course_plan', get_defined_vars());
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'course_id' => 'required',
                'full_course' => 'nullable',
                'prep_course_live' => 'nullable',
                'full_course_price' => 'required_with:full_course',
                'prep_course_live_price' => 'required_with:prep_course_live',
                'no_of_students' => 'required',
                'plan_start_date' => 'required',
                'plan_end_date' => 'required',
                'class_start_date' => 'required',
            ],
            [
                'course_id.required' => 'Please Select Course !',
                'full_course_price.required' => 'Please Enter Full Course Price !',
                'prep_course_live_price.required' => 'Please Enter Live Course Price !',
                'no_of_students.required' => 'Please Enter Total Students !',
                'plan_start_date.required' => 'Please Select Start Date !',
                'plan_end_date.required' => 'Please Select End Date !',
                'class_start_date.required' => 'Please Select Class Start Date !',
            ]
        );

        $start_date = Carbon::parse($request->plan_start_date)->format('Y-m-d');
        $end_date = Carbon::parse($request->plan_end_date)->format('Y-m-d');
        $class_date = Carbon::parse($request->class_start_date)->format('Y-m-d');

        $previous_start_date = PaymentPlans::where('id', $request->payment_plan_id)->value('sdate');

        if ($start_date < $previous_start_date || $end_date < $previous_start_date) {
            Toastr::warning('Start Date & End Date Must Be Greater Or Equal to Previous Dates', 'Warning');
          //  return redirect()->back();
        } elseif ($start_date == $end_date) {
            Toastr::warning('Start Date & End Date Should Not Be Equal', 'Warning');
            return redirect()->back();
        } elseif ($start_date > $end_date) {
            Toastr::warning('Start Date Should be Less than End Date', 'Warning');
            return redirect()->back();
        } elseif (empty($class_date)) {
            Toastr::warning('Class Start Date is required', 'Warning');
            return redirect()->back();
        } elseif ($class_date < $start_date || $class_date > $end_date) {
            Toastr::warning('Class Start Date Must be Between Start Date & End Date', 'Warning');
            return redirect()->back();
        }


        if ($request->has('full_course') && !empty($request->full_course)) {
            $plan = PaymentPlans::findOrFail($request->payment_plan_id);
            $plan->parent_id = $request->full_course;
            $plan->amount = $request->full_course_price;
            $plan->type = 'full_course';
            $plan->sdate = $start_date;
            $plan->edate = $end_date;
            $plan->cdate = $class_date;
            $plan->no_of_students = $request->no_of_students;
            $plan->save();
        }
        if ($request->has('prep_course_live') && !empty($request->prep_course_live)) {
            $plan = PaymentPlans::findOrFail($request->payment_plan_id);
            $plan->parent_id = $request->prep_course_live;
            $plan->amount = $request->prep_course_live_price;
            $plan->type = 'prep_course_live';
            $plan->sdate = $start_date;
            $plan->edate = $end_date;
            $plan->cdate = $class_date;
            $plan->no_of_students = $request->no_of_students;
            $plan->save();
        }

        Toastr::success('Course Plan Successfully Updated !', 'Success');
        return redirect()->to(route('getAllCoursePlan'));
    }

    public function destroy($id)
    {
        $course = PaymentPlans::findOrFail($id);
        $course->delete();

        Toastr::success(trans('common.Operation successful'), trans('common.Success'));
        return redirect()->back();
    }
}
