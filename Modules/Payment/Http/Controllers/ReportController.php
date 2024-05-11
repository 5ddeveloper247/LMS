<?php

namespace Modules\Payment\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Routing\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Modules\Payment\Entities\Checkout;
use Modules\Payment\Entities\Withdraw;
use Modules\CourseSetting\Entities\Course;
use Modules\PaymentMethodSetting\Entities\PaymentMethod;


class ReportController extends Controller
{
    public function instructorReveune()
    {

        try {
            $enrolls = Course::withCount('enrolls')->where('user_id', Auth::id())->with('enrolls', 'category', 'subcategory')->orderBy('enrolls_count', 'desc')->paginate(10);
            $user = User::with('currency')->where('id', Auth::user()->id)->first();
            return view('payment::instructor_revenue', compact('enrolls', 'user'));
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }


    public function withdraws()
    {

        try {
            $logs = Withdraw::with('user')->orderBy('status', 'asc')->latest()->get();
            return view('payment::fund.instructor_payout', compact('logs'));
        } catch (\Exception $e) {

            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }


    public function onlineLog()
    {
        try {
            $searchLog = Checkout::where('payment_method', '!=', 'Offline Payment')
                ->groupBy('type')
                ->get();

            $onlineLogs = Checkout::where('payment_method', '!=', 'Offline Payment')
                ->sum('price');

            $admin_revenue = User::where('role_id', Auth::id())
                ->sum('balance');

            // dd($onlineLogs);
            return view('payment::fund.online_log', get_defined_vars());
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function onlineLogData(Request $request)
    {
        // dd($request->all());
        $query = Checkout::where('payment_method', '!=', 'Offline Payment')
            ->with('user');
        if ((isset($request->end_date)) && (isset($request->start_date))) {
            $start = date('Y-m-d', strtotime($request->start_date));
            $end = date('Y-m-d', strtotime($request->end_date));
            $query
                ->whereBetween('created_at', [$start, $end])
                ->where('type', $request->method);
        }
        $query->select('checkouts.*');

        return Datatables::of($query)
            ->addIndexColumn()
            ->editColumn('tracking', function ($query) {
                return $query->tracking;
            })
            ->editColumn('user', function ($query) {
                if ($query->user->role_id == 2) {
                    return $query->user->name . ' (Instructor)';
                } elseif ($query->user->role_id == 3) {
                    return $query->user->name . ' (Student)';
                } elseif ($query->user->role_id == 9) {
                    return $query->user->name . ' (Individual Tutor)';
                } else {
                    return $query->user->name;
                }
            })
            ->editColumn('request_date', function ($query) {
                return Carbon::parse($query->created_at)->format('d M y');
            })
            ->editColumn('total_amount', function ($query) {
                if ($query->purchase_price != '0.00') {
                    return $query->purchase_price;
                } else {
                    return $query->price;
                }
            })
            ->editColumn('checkout_type', function ($query) {
                if ($query->checkout_type == 'In' || $query->checkout_type == 'in') {
                    return $query->checkout_type;
                } else {
                    return $query->checkout_type;
                }
            })
            ->editColumn('payment_method', function ($query) {
                return $query->payment_method;
            })
            ->editColumn('type', function ($query) {
                return ucwords(str_replace('_', ' ', $query->type));
            })
            ->addColumn('action', function ($query) {
                if (isAdmin()) {
                    return '<a href="' . route('invoice', $query->id) . '"
                                            class="primary-btn fix-gr-bg radius_30px text-white">
                                            View
                                        </a>';
                }
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function filterSearch(Request $request)
    {
        try {
            $onlineLogs = Checkout::where('payment_method', '!=', 'Offline Payment')->sum('price');
            $admin_revenue = User::where('role_id', Auth::id())->sum('balance');

            $searchLog = Checkout::where('payment_method', '!=', 'Offline Payment')
                ->groupBy('type')
                ->get();

            $searchLogQuery = Checkout::where('payment_method', '!=', 'Offline Payment')
                ->with('user')
                ->latest();

            if ($request->has('start_date') && $request->has('end_date')) {
                $start = date('Y-m-d', strtotime($request->start_date));
                $end = date('Y-m-d', strtotime($request->end_date));
                $searchLogQuery
                    ->whereDate('created_at', '>=', $start)
                    ->whereDate('created_at', '<=', $end);
            }

            $method = $request->methods;
            if ($method !== "all") {
                $searchLogQuery
                    ->where('type', $method);
            }

            $searchLogList = $searchLogQuery
                ->get();

            return view('payment::fund.online_log', compact('searchLogList', 'searchLog', 'admin_revenue', 'onlineLogs'));
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }


    // public function filterSearch(Request $request)
    // {

    //     try {
    //         $searchLog = Checkout::where('payment_method', '!=', 'Offline Payment')
    //             ->groupBy('type')
    //             ->get();

    //         $start = date('Y-m-d', strtotime($request->start_date));
    //         $end = date('Y-m-d', strtotime($request->end_date));
    //         $method = $request->methods;
    //         // dd($method);
    //         if ((isset($request->end_date)) && (isset($request->start_date))) {

    //             if ($method == "all") {
    //                 $searchLog = Checkout::whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end)->where('payment_method', '!=', 'Offline Payment')->latest()->with('user')->get();
    //             } else {
    //                 $searchLog = Checkout::whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end)->where('type', $method)->latest()->with('user')->get();
    //                 // dd($searchLog);
    //             }
    //         } elseif (is_null($request->start_date) && is_null($request->end_date)) {

    //             if ($method == "all") {
    //                 $searchLog = Checkout::where('payment_method', '!=', 'Offline Payment')->with('user')->get();
    //             } else {
    //                 $searchLog = Checkout::where('type', $method)->latest()->with('user')->get();
    //             }
    //         } elseif (isset($request->start_date) && is_null($request->end_date)) {


    //             if ($method == "all") {
    //                 $searchLog = Checkout::whereDate('created_at', '>=', $start)->where('payment_method', '!=', 'Offline Payment')->latest()->with('user')->get();
    //             } else {
    //                 $searchLog = Checkout::whereDate('created_at', '>=', $start)->where('type', $method)->latest()->with('user')->get();
    //             }
    //         } elseif (isset($request->end_date) && is_null($start)) {

    //             if ($method == "all") {
    //                 $searchLog = Checkout::whereDate('created_at', '<=', $end)->where('payment_method', '!=', 'Offline Payment')->latest()->with('user')->get();
    //             } else {
    //                 $searchLog = Checkout::whereDate('created_at', '<=', $end)->where('type', $method)->latest()->with('user')->get();
    //             }
    //         }
    //         // dd(get_defined_vars());
    //         return view('payment::fund.online_log', get_defined_vars());
    //     } catch (\Exception $e) {
    //         GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
    //     }
    // }
}
