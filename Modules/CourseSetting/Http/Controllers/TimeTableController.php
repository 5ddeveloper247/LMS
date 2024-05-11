<?php

namespace Modules\CourseSetting\Http\Controllers;

use App\User;
use App\Traits\ImageStore;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Modules\CourseSetting\Entities\TimeTable;
use Modules\CourseSetting\Entities\TimeTableList;

class TimeTableController extends Controller
{

	use ImageStore;
	
    public function index()
    {
        return view('coursesetting::timetable.timetables');
    }

    public function store(Request $request)
    {
        $week_start_date = Carbon::parse($request->start_date)->format('Y-m-d');
        $selected_date = Carbon::parse($request->start_date)->format('Y-m-d');
        Session::flash('Addtime', 1);
        $request->validate([
            'name' => 'required',
        	'type' => 'required',
            'start_date' => 'required',
        ]);

        try {
            $time_table = new TimeTable();
            $time_table->name = $request->name;
            $time_table->type = $request->type;
            $time_table->start_date = $selected_date;
            $time_table->save();
            $count = 0;
            for ($weeks = 1; $weeks <= 6; $weeks++) {
                for ($days = 1; $days <= 7; $days++) {
                    //                        echo $weeks .' '. $days .'<br>';
                    $time_table_list = new TimeTableList();
                    $time_table_list->week = $weeks;
                    $time_table_list->day = $days;
                    $time_table_list->date =  date('Y-m-d', strtotime($week_start_date . "+" . $count . " day"));
                    $time_table_list->time_table_id = $time_table->id;
                    $time_table_list->save();
                    $count++;
                }
            }
            Toastr::success(trans('Time Table Successfully Created'), trans('common.Success'));
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::error(trans('Operation failed'), trans('Error'));
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $week_start_date = Carbon::parse($request->start_date)->startOfWeek()->format('Y-m-d');
        $selected_date = Carbon::parse($request->start_date)->format('Y-m-d');
        Session::flash('Addtime', 1);
        $request->validate([
            'name' => 'required',
        	'type' => 'required',
            'start_date' => 'required',
        ]);

        try {
            $time_table =  TimeTable::find($request->id);
            $time_table->name = $request->name;
            $time_table->type = $request->type;
            $time_table->start_date = $selected_date;
            $time_table->save();

            $time_table_lists = TimeTableList::where('time_table_id', $request->id)->get();
            $count = 0;

            foreach ($time_table_lists as $time_table_list) {
                $time_table_list->date =  date('Y-m-d', strtotime($week_start_date . "+" . $count . " day"));
                $time_table_list->update();
                $count++;
            }
            Toastr::success(trans('Time Table Successfully Updated'), trans('common.Success'));
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::error(trans('Operation failed'), trans('Error'));
            return redirect()->back();
        }
    }


    public function getAllTimeTable()
    {
        $query = TimeTable::all();
        return Datatables::of($query)
            ->addIndexColumn()
            ->editColumn('name', function ($query) {
                return $query->name;
            })->addColumn('status', function ($query) {
                $route = 'student.change_status';
                return view('backend.partials._td_status', compact('query', 'route'));
            })->addColumn('action', function ($query) {
                return view('coursesetting::components._td_timetable_action', compact('query'));
            })->rawColumns(['status', 'action'])->make(true);
    }

    public function delete($id)
    {

        try {

            $delete = TimeTable::find($id);

            TimeTableList::where('time_table_id', $id)->delete();

            $delete->delete();

            Toastr::success(trans('Time Table successfully deleted'), trans('common.Success'));
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::error(trans('Operation failed'), trans('Error'));
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $time_table = TimeTable::find($id);
        $time_tables = TimeTableList::where('time_table_id', $id)->groupBy('week')->orderBy('week')->get();
        $instructors = User::where('role_id', 2)->where('status', '1')->get(['id', 'name']);

        if(isset($time_table->type) && $time_table->type == 'Individual'){
        	return view('coursesetting::timetable.time_table_individual_list', compact('time_tables', 'instructors', 'time_table'));
        }else{
        	return view('coursesetting::timetable.time_table_list', compact('time_tables', 'instructors', 'time_table'));
        }
        
    }
    public function saveList(Request $request)
    {
        // dd($request->all());
        //        Session::flash('Addtime', 1);
        //        $request->validate([
        //            'date' => 'required',
        //            'Instructor_id' => 'required',
        //            'comment' => 'required',
        //        ]);

        try {

            $time_table_list = TimeTableList::find($request->id);
            $time_table_list->Instructor_id = (int)$request->Instructor_id;
            $time_table_list->content = $request->content;
            $time_table_list->comment = $request->comment;
            $time_table_list->save();

            Toastr::success(trans('Time Table Slot Successfully Created'), trans('common.Success'));
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::error(trans('Operation failed'), trans('Error'));
            return redirect()->back();
        }
    }
    
    public function saveListIndividual(Request $request)
    {
    	
   		Session::flash('Addtime', 1);
   		
   		if($request->file('image')){
   			$request->validate([
   					'image' => 'mimes:png,jpg,jpeg,PNG,JPG,JPEG',
   					'comment' => 'required',
   			]);
   		}else{
   			$request->validate([
   					'comment' => 'required',
   			]);
   		}
    	

    
    	try {
    		
    		$time_table_list = TimeTableList::find($request->id);
    		
    		$time_table_list->comment = $request->comment;
    		
    		if ($request->file('image')) {
    			
    			$file = $request->file('image');
    			
    			if($time_table_list->image){
    				
    				$this->deleteImage($time_table_list->image);
    			}
    			$time_table_list->image  = $this->saveImage($file);
    		}
    		
    		$time_table_list->save();
    
    		Toastr::success(trans('Time Table Slot Successfully Created'), trans('common.Success'));
    		return redirect()->back();
    	} catch (\Exception $e) {
    		Toastr::error(trans('Operation failed'), trans('Error'));
    		return redirect()->back();
    	}
    }
}
