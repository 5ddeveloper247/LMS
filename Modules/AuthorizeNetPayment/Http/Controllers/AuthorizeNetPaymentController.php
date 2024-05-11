<?php

namespace Modules\AuthorizeNetPayment\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
//use Illuminate\Routing\Controller;
use Modules\PaymentMethodSetting\Entities\PaymentMethod;
use Illuminate\Support\Facades\Response;
use Brian2694\Toastr\Facades\Toastr;
use Modules\AuthorizeNetPayment\Entities\AuthorizeNetSetting;

class AuthorizeNetPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('authorizenetpayment::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('authorizenetpayment::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
      $rules = [
          'client_id' => 'required',
          'client_secret' => 'required',
          'env' => 'required',
          'api_url' => 'required'
      ];

      $this->validate($request, $rules, validationMessage($rules));

      try {
          $setting = new AuthorizeNetSetting();
          $setting->client_id = $request->client_id;
          $setting->client_secret = $request->client_secret;
          $setting->env = $request->env;
          $setting->api_url = $request->api_url;
          $setting->status = 0;
          $setting->save();

          Toastr::success(trans('common.Operation successful'), trans('common.Success'));
          return redirect()->route('paymentmethodsetting.payment_method_setting');
      } catch (\Exception $e) {
          GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());

      }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('authorizenetpayment::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
      $row = AuthorizeNetSetting::find($id);
        return view('authorizenetpayment::edit',compact('row'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
      $rules = [
          'client_id' => 'required',
          'client_secret' => 'required',
          'env' => 'required',
          'api_url' => 'required'
      ];

      $this->validate($request, $rules, validationMessage($rules));

      try {
          $setting = AuthorizeNetSetting::find($request->id);
          $setting->client_id = $request->client_id;
          $setting->client_secret = $request->client_secret;
          $setting->env = $request->env;
          $setting->api_url = $request->api_url;
          //$setting->status = 0;
          $setting->save();

          Toastr::success(trans('common.Operation successful'), trans('common.Success'));
          return redirect()->route('paymentmethodsetting.payment_method_setting');
      } catch (\Exception $e) {
          GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());

      }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
      try {
        $delete = AuthorizeNetSetting::where('id',$id)->delete();
        Toastr::success(trans('Deleted successfully'), trans('common.Success'));
        return redirect()->route('paymentmethodsetting.payment_method_setting');
      } catch (\Exception $e) {
          GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());

      }

    }

    public function updateStatus(Request $request){
      $id = $request->id;
      $reset = AuthorizeNetSetting::where('status',1)->update(['status' => 0]);
      $update = AuthorizeNetSetting::where('id',$id)->update(['status' => 1]);
      return response()->json(['done' => true, 'success' => 'Status Updated']);
    }
}
