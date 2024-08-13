<?php

namespace Modules\SystemSetting\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use DrewM\MailChimp\MailChimp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Modules\Appointment\Repositories\Interfaces\AppointmentRepositoryInterface;
use Modules\Newsletter\Entities\NewsletterSetting;
use Modules\Newsletter\Http\Controllers\AcelleController;
use Modules\SystemSetting\Entities\PackagePricing;
use Modules\SystemSetting\Entities\PackagePurchasing;
use Modules\SystemSetting\Entities\TutorSlote;
use Yajra\DataTables\Facades\DataTables;
use Modules\Payment\Entities\Checkout;

class PackageController extends Controller
{
    public function index()
    {
        // dd('working');
        $total_packages = PackagePricing::count();
        return view('systemsetting::packages.all_packages', get_defined_vars());
    }

    public function getAllPackagePricing()
    { // dd($request->all());
        $query = PackagePricing::query();

        // if ($request->course_status != "") {
        //     if ($request->course_status == 1) {
        //         $query->where('courses.status', 1);
        //     } elseif ($request->course_status == 0) {
        //         $query->where('courses.status', 0);
        //     }
        // }
        // if ($request->category != "") {
        //     $query->where('category_id', $request->category);
        // }
        // if ($request->type != "") {
        //     $query->where('type', $request->type);
        // }
        // if ($request->instructor != "") {
        //     $query->where('user_id', $request->instructor);
        // }
        // if ($request->search_status != "") {
        //     $query->where('courses.status', $request->search_status);
        // }
        // if ($request->required_type != "") {
        //     $query->where('required_type', $request->required_type);
        // }
        // if ($request->mode_of_delivery != "") {
        //     $query->where('mode_of_delivery', $request->mode_of_delivery);
        // }


        // if (isInstructor()) {
        //     $query->where('user_id', '=', Auth::id());
        //     $query->orWhere('assistant_instructors', 'like', '%"{' . Auth::id() . '}"%');
        // }
        // if (isTutor()) {
        //     $query->where('user_id', '=', Auth::id());
        // }
        if (isModuleActive('OrgInstructorPolicy') && \auth()->user()->role_id != 1) {
            $assigns = Auth::user()->policy->course_assigns;
            $ids = [];
            foreach ($assigns as $assign) {
                $ids[] = $assign->course_id;
            }
            $query->orWhereIn('id', $ids);
        }

        if (isModuleActive('Organization') && Auth::user()->isOrganization()) {
            $query->whereHas('user', function ($q) {
                $q->where('organization_id', Auth::id());
                $q->orWhere('user_id', Auth::id());
            });
        }

        $query->select('package_pricing.*');

        return Datatables::of($query)
            ->addIndexColumn()
            ->editColumn('title', function ($query) {
                return $query->title;
            })
            ->editColumn('price', function ($query) {
                return $query->price;
            })
            ->editColumn('allowed_courses', function ($query) {
                return $query->allowed_courses;
            })
            ->editColumn('options', function ($query) {
                $html = '';
                $html = $html.'<ul>';
                $html = $html.'<li><i class="fa fa-arrow-right"></i>'.$query->option_1.'</li>';
                $html = $html.'<li><i class="fa fa-arrow-right"></i>'.$query->option_2.'</li>';
                $html = $html.'<li><i class="fa fa-arrow-right"></i>'.$query->option_3.'</li>';
                $html = $html.'<li><i class="fa fa-arrow-right"></i>'.$query->option_4.'</li>';
                $html = $html.'<li><i class="fa fa-arrow-right"></i>'.$query->option_5.'</li>';
                $html = $html.'</ul>';
                return $html;
            })
            // ->editColumn('option_2', function ($query) {
            //     return $query->option_2;
            // })
            // ->editColumn('option_3', function ($query) {
            //     return $query->option_3;
            // })
            // ->editColumn('option_4', function ($query) {
            //     return $query->option_4;
            // })
            // ->editColumn('option_5', function ($query) {
            //     return $query->option_5;
            // })
            ->addColumn('status', function ($query) {
                $route = 'PackagePricing.change_status';
                return view('systemsetting::partials._td_status', compact('query', 'route'));
            })
            ->addColumn('action', function ($query) {
                return view('systemsetting::partials._td_action', compact('query'));
            })
            ->rawColumns(['status', 'price', 'action','options'])
            ->make(true);
    }

    public function create()
    {
        return view('systemsetting::packages.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'title' => 'required|max:50',
                'price' => 'required',
                'allowed_courses' => 'required',
                'option_1' => 'required|max:100',
                'option_2' => 'required|max:100',
                'option_3' => 'required|max:100',
                'option_4' => 'required|max:100',
                'option_5' => 'required|max:100',
                'description' => 'required|max:200',
                'package_term' => 'required'
            ],
            [
                'title.required' => 'Please Enter Title !',
                'price.required' => 'Please Enter Price !',
                'allowed_courses.required' => 'Please Enter Allowed Courses !',
                'option_1.required' => 'Please Enter Option 1 Option !',
                'option_2.required' => 'Please Enter Option 2 Option !',
                'option_3.required' => 'Please Enter Option 3 Option !',
                'option_4.required' => 'Please Enter Option 4 Option !',
                'option_5.required' => 'Please Enter Option 5 Option !',
                'description.max' => 'Description Should Not Exceed by 200 Characters !',
                'description.required' => 'Please Enter Course Description !',
            ]
        );

        $package_pricing = new PackagePricing();
        $package_pricing->title = $request->title;
        $package_pricing->price = $request->price;
        $package_pricing->allowed_courses = $request->allowed_courses;
        $package_pricing->option_1 = $request->option_1;
        $package_pricing->option_2 = $request->option_2;
        $package_pricing->option_3 = $request->option_3;
        $package_pricing->option_4 = $request->option_4;
        $package_pricing->option_5 = $request->option_5;
        $package_pricing->description = $request->description;
        $package_pricing->package_term = $request->package_term;
        $package_pricing->status = 0;
        $package_pricing->save();

        Toastr::success(trans('common.Operation successful'), trans('common.Success'));
        return redirect()->to(route('allPackages'));
    }

    public function changeSeq(Request $request){
        $payload = json_decode(file_get_contents('php://input'), true);
        $order = $payload['order'];

        foreach ($order as $item) {
            $id = $item['id'];

            PackagePricing::where('id', $id)->update(['seq_no' => $item['new_position']]);
        }

        return response()->json(200);
    }

    public function edit($id)
    {
        $package = PackagePricing::find($id);
        $packagepurchases = PackagePurchasing::where('package_id',$id)->has('user')->count();
        // dd($package);
        return view('systemsetting::packages.edit', get_defined_vars());
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'title' => 'required|max:50',
                // 'price' => 'required',
                // 'allowed_courses' => 'required',
                'option_1' => 'required|max:100',
                'option_2' => 'required|max:100',
                'option_3' => 'required|max:100',
                'option_4' => 'required|max:100',
                'option_5' => 'required|max:100',
                'description' => 'required|max:200',
                // 'package_term' => 'required'
            ],
            [
                'title.required' => 'Please Enter Title !',
                // 'price.required' => 'Please Enter Price !',
                // 'allowed_courses.required' => 'Please Enter Allowed Courses !',
                'option_1.required' => 'Please Enter Option 1 Option !',
                'option_2.required' => 'Please Enter Option 2 Option !',
                'option_3.required' => 'Please Enter Option 3 Option !',
                'option_4.required' => 'Please Enter Option 4 Option !',
                'option_5.required' => 'Please Enter Option 5 Option !',
                'description.max' => 'Description Should Not Exceed by 200 Characters !',
                // 'description.required' => 'Please Enter Course Description !',
            ]
        );

        $package_pricing = PackagePricing::find($request->package_id);
        $packagepurchases = PackagePurchasing::where('package_id',$request->package_id)->has('user')->count();
        $package_pricing->title = $request->title;
        if($packagepurchases == 0){
            if($request->has('price')){
                $package_pricing->price = $request->price;
            }
            if($request->has('allowed_courses')){
                $package_pricing->allowed_courses = $request->allowed_courses;
            }
            if($request->has('package_term')){
                $package_pricing->package_term = $request->package_term;
        }
        }
        $package_pricing->option_1 = $request->option_1;
        $package_pricing->option_2 = $request->option_2;
        $package_pricing->option_3 = $request->option_3;
        $package_pricing->option_4 = $request->option_4;
        $package_pricing->option_5 = $request->option_5;
        $package_pricing->description = $request->description;
        $package_pricing->save();

        Toastr::success(trans('common.Operation successful'), trans('common.Success'));
        return redirect()->to(route('allPackages'));
    }

    public function destroy($id)
    {
        $package = PackagePricing::find($id);
        $package_purchasing = PackagePurchasing::where('package_id',$id)->get()
        ->filter(function($q) {
            return $q->latestPackageBuy && $q->id == $q->latestPackageBuy->id;
        });
        if(count($package_purchasing)>0){
            Toastr::error('This Package has been bought and is currently in use.', trans('common.Success'));
        return redirect()->back();
        }
        $package->delete();
        Toastr::success(trans('common.Operation successful'), trans('common.Success'));
        return redirect()->back();
    }

    public function soldOutPackages()
    {
        $total_packages = PackagePurchasing::where('user_id', Auth::id())->exists();
        $current_package = PackagePurchasing::where('user_id', Auth::id())->latest()->first();
        $invoice = Checkout::where('user_id',Auth::id())->where('type','package')->latest()->first();
        return view('systemsetting::packages.sold_packages', get_defined_vars());
    }

    public function getAllsoldPackages()
    {
        $query = PackagePurchasing::has('package')->with('package');
        if (isTutor()) {
            $query->where('user_id', Auth::id());
        }
        $query->select('package_purchasing.*');
        
        return Datatables::of($query)
            ->addIndexColumn()
            ->editColumn('tutor_name', function ($query) {
                if (isAdmin()) {
                    if (isset($query->user)) {
                        $tutor_name = $query->user->name;
                    } else {
                        $tutor_name = 'Tutor Not Found';
                    }
                } else {
                    $tutor_name = '';
                }
                return $tutor_name;
            })
            ->editColumn('package_name', function ($query) {
                
                if ($query->latestPackageBuy && $query->latestPackageBuy->id == $query->id) {
                    return ($query->package) ? $query->package->title . " (Current)" : '<span class="text-danger">Package not found</span>' ;
                } else {
                    return ($query->package) ? $query->package->title : '<span class="text-danger">Package not found</span>';
                }
            })
            ->editColumn('price', function ($query) {
                return $query->package->price ?? 0;
            })
            ->editColumn('course_limit', function ($query) {
                return $query->course_limit;
            })
            ->editColumn('buying_date', function ($query) {
                $created_at = Carbon::parse($query->created_at)->format('m-d-Y');
                return $created_at;
            })
            ->editColumn('expiry_date', function ($query) {
                $expiry_date = ($query->expiry_date) ? Carbon::parse($query->expiry_date)->format('m-d-Y') : '';
                return $expiry_date;
            })
            ->addColumn('status', function ($query) {
                
                if (isAdmin()) {
                    
                    return view('systemsetting::partials._td_package_status', compact('query'));
                } else {
                    return '';
                }
            })
            ->addColumn('invoice',function($query){
                $createdAt = Carbon::parse($query->created_at);
                $user = $query->user->id ?? 0;
                $invoice = Checkout::where('user_id',$user)->where('type','package')->whereBetween('created_at',[$createdAt->subMinute(), $createdAt->addMinute()])->first();
                if($invoice){
                return '<div class="main-title d-md-flex">
                                <a class="primary-btn radius_30px fix-gr-bg mr-10 text-white"
                                    href="'.route('invoice',[$invoice->id]).'">Invoice</a>
                            </div>';
                }
                else{
                    return '<b>Invoice doens not exists</spanb>';
                }
            })
            ->rawColumns(['tutor_name', 'package_name', 'price', 'status', 'course_limit','invoice'])
            ->make(true);
    }

    public function destroyPackagePurchasing($id)
    {
        $package = PackagePurchasing::find($id);
        $package->delete();
        Toastr::success(trans('common.Operation successful'), trans('common.Success'));
        return redirect()->back();
    }

    public function myAllPackages()
    {
        $total_packages = PackagePurchasing::where('user_id', Auth::id())->exists();
        return view('systemsetting::packages.my_packages', get_defined_vars());
    }
    public function myAllPackagesData()
    {
        $query = PackagePurchasing::query();

        //     if (isModuleActive('OrgInstructorPolicy') && \auth()->user()->role_id != 1) {
        //         $assigns = Auth::user()->policy->course_assigns;
        //         $ids = [];
        //         foreach ($assigns as $assign) {
        //             $ids[] = $assign->course_id;
        //         }
        //         $query->orWhereIn('id', $ids);
        //     }

        //     if (isModuleActive('Organization') && Auth::user()->isOrganization()) {
        //         $query->whereHas('user', function ($q) {
        //             $q->where('organization_id', Auth::id());
        //             $q->orWhere('user_id', Auth::id());
        //         });
        //     }
        if (isTutor()) {
            $query->where('user_id', Auth::id());
        }
        $query->select('package_purchasing.*');
        $query->orderBy('package_purchasing.seq_no','desc');
        return Datatables::of($query)
            ->addIndexColumn()
            ->editColumn('package_name', function ($query) {
                if (!empty($query->latestPackageBuy) && $query->latestPackageBuy->id == $query->id) {
                    return $query->package->title . " (Current)";
                } else {
                    return $query->package->title;
                }
            })
            ->editColumn('price', function ($query) {
                return $query->package->price;
            })
            ->editColumn('course_limit', function ($query) {
                return $query->course_limit;
            })
            ->editColumn('buying_date', function ($query) {
                $created_at = Carbon::parse($query->created_at)->format('m-d-Y');
                return $created_at;
            })
            ->addColumn('action', function ($query) {
                return view('systemsetting::partials._td_action', compact('query'));
            })
            ->rawColumns(['package_name', 'price', 'buying_date', 'action'])
            ->make(true);
    }

    public function upgradePackage()
    {
        return view('systemsetting::packages.upgrade_package', get_defined_vars());
    }
}
