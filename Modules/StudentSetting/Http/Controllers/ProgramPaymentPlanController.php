<?php


namespace Modules\StudentSetting\Http\Controllers;


use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\CourseSetting\Entities\CourseEnrolled;
use Modules\Payment\Entities\PaymentPlanDetails;
use Modules\Payment\Entities\PaymentPlans;
use Modules\StudentSetting\Entities\Program;
use Yajra\DataTables\Facades\DataTables;

class ProgramPaymentPlanController extends Controller
{
    public function index(Request $request)
    {

        try {
            $programs = Program::all();
            $program_id = isset($request->program_id) ? isset($request->program_id) : null;
            return view('studentsetting::Program_plan', compact('programs', 'program_id'));
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));
            return redirect()->back();
        }
    }

    public function save(Request $request)
    {
        $start_date = Carbon::parse($request->sdate)->format('Y-m-d');
        $end_date = Carbon::parse($request->edate)->format('Y-m-d');
        $class_date = Carbon::parse($request->cdate)->format('Y-m-d');

        $paymentplans = PaymentPlans::where('parent_id', $request->parent_id)->where('type', 'program')->orderBy('created_at', 'DESC')->first();
        $order = $paymentplans ? (int)$paymentplans->plan_order + 1 : 1;

        if ($request->no_of_students < CourseEnrolled::where('plan_id',$request->id)->count()) {
            return response()->json(['msg' => 'No of students must be greater than enrolled students'], 200);
        }
        if (empty($request->amount)) {
            return response()->json(['msg' => 'Amount is required'], 200);
        }
        if ((double)$request->amount <= 0) {
            return response()->json(['msg' => 'Amount must be greater than 0'], 200);
        } 
        if (empty($request->sdate)) {
            return response()->json(['msg' => 'Start Date is required'], 200);
        } 
        if (empty($request->edate)) {
            return response()->json(['msg' => 'End Date is required'], 200);
        } 
        if ($start_date > $end_date) {
            return response()->json(['msg' => 'Start Date Should be Less than End Date'], 200);
        }
        if ($start_date < Carbon::now()->format('Y-m-d')
                ||
                $end_date < Carbon::now()->format('Y-m-d')
            ) {
            return response()->json(['msg' => 'Start Date & End Date Must Be Greater Or Equal to Today\'s Date'], 200);
        } 
        if ($start_date == $end_date) {
            return response()->json(['msg' => 'Start Date & End Date Should Not Equal'], 200);
        } 
        if ($text = $this->isVaildDateForPlan($request->id, $start_date, $end_date)) {
            return response()->json(['msg' => $text], 200);
        } elseif (empty($request->cdate)) {
            return response()->json(['msg' => 'Class Start Date is required'], 200);
        } 
        if ($class_date < $start_date || $class_date > $end_date) {
            return response()->json(['msg' => 'Class Start Date Must be Between Start Date & End Date'], 200);
        }

        $pay = new PaymentPlans;

        if (count($pay->getMatchingTenureForProgramPlan($request->parent_id, $request->id, $start_date, $end_date,'program')) == 0) {
            $plan = PaymentPlans::find($request->id);
            if (empty($plan)) {
                $plan = new PaymentPlans();
                $plan->plan_order = $order;
            }
            $plan->parent_id = $request->parent_id;
            $plan->amount = $request->amount;
            $plan->type = 'program';
            $plan->sdate = $start_date;
            $plan->edate = $end_date;
            $plan->cdate = $class_date;
            $plan->no_of_students = $request->no_of_students;
            $plan->save();

            return response()->json($plan, 200);
        }
        return response()->json(['msg' => 'Date matching with previous selected dates.'], 200);
    }

    public function getPlan($id)
    {
        $plan = PaymentPlans::where('id', $id)->where('type', 'program')->first();
        return response()->json($plan, 200);
    }

    public function getColectPaymentPlan($querys)
    {
        $data = [];
        foreach ($querys as $query) {
            $data[$query->id]["id"] = $query->id;
            $data[$query->id]["parent_id"] = $query->parent_id;
            $data[$query->id]["programtitle"] = Program::find($query->parent_id)->programtitle;
            $data[$query->id]["amount"] = $query->amount;
            $data[$query->id]["planed_amount"] = $query->planed_amount;
            $data[$query->id]["sdate"] = $query->sdate;
            $data[$query->id]["edate"] = $query->edate;
            $data[$query->id]["status"] = $query->status;
        }
        return $data;
    }

    public function getAllPlans(Request $request)
    {
        $querys = PaymentPlans::query();
        $querys->where('type', 'program');
        if (!empty($request->program_id)) {
            $querys = $querys->where('parent_id', $request->program_id);
        }
        $querys = $querys->get();

        $query = $this->getColectPaymentPlan($querys);

        return Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('amount', function ($query) {
                return $query['amount'];
            })
            // ->editColumn('planed_amount', function ($query) {
            //     return $query['planed_amount'];
            // })
            ->editColumn('program', function ($query) {
                return $query['programtitle'];
            })->editColumn('sdate', function ($query) {
                return $query['sdate'];
            })
            ->addColumn('edate', function ($query) {
                return $query['edate'];
            })
            ->addColumn('status', function ($query) {
                $data = (object)[];
                $data->id = $query['id'];
                $data->status = $query['status'];
                $query = $data;
                $route = 'student.change_status';
                return view('backend.partials._td_status', compact('query', 'route'));
            })
            ->addColumn('action', function ($query) {
                return view('studentsetting::partials._td_action_program_plan', compact('query'));
            })->rawColumns(['amount', 'planed_amount', 'program', 'sdate', 'edate', 'action', 'status'])
            ->make(true);
    }

    public function getPlanDetails(Request $request)
    {
        $query = PaymentPlanDetails::where('payment_plan_id', $request->plan_id)->orderBy('type', 'asc')->get();

        return Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('type', function ($query) {
                if ($query->type == 0) {
                    return 'Initial';
                } else {
                    return 'Installment ' . $query->type;
                }
            })->editColumn('amount', function ($query) {
                return $query->amount;
            })->editColumn('sdate', function ($query) {
                return $query->sdate;
            })
            ->addColumn('edate', function ($query) {
                return $query->edate;
            })->addColumn('action', function ($query) {
                return view('studentsetting::partials._td_action_plan_installment', compact('query'));
            })->rawColumns(['amount', 'planed_amount', 'status', 'action'])
            ->make(true);
    }

    public function getPlanDetail($id)
    {
        $plan_detail = PaymentPlanDetails::where('id', (int)$id)->first();
        return response()->json($plan_detail, 200);
    }

    public function savePlanDetail(Request $request)
    {

        $paymentplandetails = PaymentPlanDetails::where('payment_plan_id', $request->plan_id)->orderBy('created_at', 'DESC')->first();
        $type = $paymentplandetails ? (int)$paymentplandetails->type + 1 : 0;
        //        $check = PaymentPlanDetails::where('payment_plan_id',$request->plan_id)->count();
        //        if($check > 10){
        //            return  response()->json(['msg'=>'You can add only Add 10 installments'],200);
        //        }

        $start_date = Carbon::parse($request->sdate)->format('Y-m-d');
        $end_date = Carbon::parse($request->edate)->format('Y-m-d');

        //        if(empty($request->id) && ($start_date < Carbon::now() || $end_date < Carbon::now())){
        //            return  response()->json(['msg'=>'Start date and end date must be greater than and equal to now.'],200);
        //        }
        $planed_amount = PaymentPlanDetails::where('payment_plan_id', $request->plan_id)
            ->where('id','!=', $request->id)
            ->sum('amount');
        $plan = PaymentPlans::find($request->plan_id);

        if (($planed_amount + $request->amount) > $plan->amount) {
            return response()->json(['msg' => 'Please put amount that is equivalent to remaining in planned amount'], 200);
        } elseif (empty($request->sdate)) {
            return response()->json(['msg' => 'Start Date is required'], 200);
        } elseif (empty($request->edate)) {
            return response()->json(['msg' => 'End Date is required'], 200);
        } elseif (
            $request->id == 0
            &&
            (
                $start_date < Carbon::now()->format('Y-m-d')
                ||
                $end_date < Carbon::now()->format('Y-m-d')
            )
        ) {
            return response()->json(['msg' => 'Start Date & End Date Must Be Greater Or Equal to Today\'s Date'], 200);
        } elseif ($start_date == $end_date) {
            return response()->json(['msg' => 'Start Date & End Date Should Not Be Equal'], 200);
        } elseif ($start_date > $end_date) {
            return response()->json(['msg' => 'Start Date Should be Less than End Date'], 200);
        }

        if (!$this->isVaildDateForPlanDetail($request->plan_id, $start_date, $end_date)) {
            return response()->json(['msg' => 'Date must be between plan start and end date.'], 200);
        }

//        $pay = new PaymentPlanDetails;

//        if (count($pay->getMatchingTenureForPlanDetial($request->id, $request->plan_id, $start_date, $end_date)) == 0) {
        DB::transaction(function () use ($request, $type, $start_date, $end_date) {

            $plan_detail = PaymentPlanDetails::find($request->id);
            if (empty($plan_detail)) {

                $plan_detail = new PaymentPlanDetails();
                $plan_detail->type = $type;
            }

            $plan_detail->amount = $request->amount;
            $plan_detail->sdate = $start_date;
            $plan_detail->edate = $end_date;
            $plan_detail->payment_plan_id = $request->plan_id;
            $plan_detail->save();

            $planed_amount = PaymentPlanDetails::where('payment_plan_id', $request->plan_id)->sum('amount');
            $plan = PaymentPlans::find($request->plan_id);
            $plan->planed_amount = $planed_amount;
            $plan->save();
        });
        $planed_amount = PaymentPlanDetails::where('payment_plan_id', $request->plan_id)->sum('amount');
        return response()->json(['planed_amount' => $planed_amount], 200);
//        }
//        return response()->json(['msg' => 'Date matching with previous selected dates.'], 200);
    }

    public function delete_plan($id)
    {
        $program_plan = PaymentPlans::find($id);
        $related_payment_plan = $program_plan->programPalnDetail()->count();

        if ($related_payment_plan > 0) {
            Toastr::error('This Plan has ' . $this->checkRelatedInstallments($related_payment_plan) . ', Please Delete ' . $this->checkRelatedInstallments($related_payment_plan) . ' First then Delete Plan', 'Error');
            return redirect()->back();
        }

        if ($program_plan) {
            $result = $program_plan->delete();
            if ($result) {
                Toastr::success('Program Plan Successfully Deleted', 'Success');
                return redirect()->back();
            } else {
                Toastr::error('Something went wrong', trans('common.Failed'));
                return redirect()->back();
            }
        }
    }

    public function checkRelatedInstallments($related_payment_plan = '')
    {
        return (!empty($related_payment_plan) ? 'Installment' : '');
    }

    public function delete_payment_plan_detail($id)
    {
        $payment_plan_detail = PaymentPlanDetails::find($id);
        if ($payment_plan_detail) {
            $plan_id = $payment_plan_detail->payment_plan_id;
            $amount = $payment_plan_detail->amount;
            $program_plan_amount = PaymentPlans::where('id', $plan_id)->first();
            $program_plan_amount->planed_amount = intval($program_plan_amount->planed_amount) - intval($amount);
            $program_plan_amount->save();
            $result = $payment_plan_detail->delete();
            $payment_plan_id = PaymentPlanDetails::where('payment_plan_id', $plan_id)->orderBy('type')->pluck('id');
            foreach ($payment_plan_id as $key => $value) {
                $payment_plan_detail = PaymentPlanDetails::find($value);
                $payment_plan_detail->type = $key;
                $payment_plan_detail->save();
            }

            if ($result) {
                Toastr::success('Installment Successfully Deleted', 'Success');
                return redirect()->back();
            } else {
                Toastr::error('Something went wrong', trans('common.Failed'));
                return redirect()->back();
            }
        }
    }

    public function isVaildDateForPlan($payment_plan_id, $start_date, $end_date)
    {
        if (!empty($payment_plan_id) && PaymentPlanDetails::where('payment_plan_id', $payment_plan_id)->count()) {
            $first_installment_start_date = PaymentPlanDetails::where('payment_plan_id', $payment_plan_id)
                ->where('type', 0)
                ->first(['sdate'])->sdate;
            $last_installment_end_date = PaymentPlanDetails::where('payment_plan_id', $payment_plan_id)
                ->orderBy('type', 'desc')
                ->first(['edate'])->edate;
            if (
                !empty($first_installment_start_date) &&
                Carbon::parse($start_date) > Carbon::parse($first_installment_start_date)->format('Y-m-d')

            ) {
                return 'Plan start date must be less then initial start date';
            }
            if (
                !empty($last_installment_end_date) &&
                Carbon::parse($end_date) <= Carbon::parse($last_installment_end_date)->format('Y-m-d')
            ) {
                return 'Plan end date must be greater then last installment end date';
            }
        }
    }

    public function isVaildDateForPlanDetail($payment_plan_id, $start_date, $end_date)
    {
        $response = false;
        $payment_plan = PaymentPlans::where('id', $payment_plan_id)->first();
        $plan_start_date = Carbon::parse($payment_plan->sdate);
        $plan_end_date = Carbon::parse($payment_plan->edate);
        if (
            Carbon::parse($start_date)->between($plan_start_date, $plan_end_date) &&
            Carbon::parse($end_date)->between($plan_start_date, $plan_end_date)
        ) {
            $response = true;
        }
        return $response;
    }
}
