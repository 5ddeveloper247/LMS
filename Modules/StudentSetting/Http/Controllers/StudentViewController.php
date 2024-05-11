<?php


namespace Modules\StudentSetting\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\CloverPayment;
use App\Models\UserApplication;
use App\Models\UserDeclaration;
use App\Models\UserAuthorzIationAgreement;
use App\Models\UserSetting;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Modules\Payment\Entities\Checkout;

class StudentViewController extends Controller
{
    public function index($id)
    {

        try {
            $student =   User::find($id);
            if(empty($student)){
               abort(404,'User Not Found.');
            }
            $studentsetting =   UserSetting::where('user_id', $id)->first();
            $studentapplication =   UserApplication::where('user_id', $id)->first();
            $studentdeclaration = UserDeclaration::where('user_id',$id)->first();
            $studentauthorziationagreement =   UserAuthorzIationAgreement::where('user_id', $id)->first();
            $payment_detail =  CloverPayment::where('user_id', $id)->where('type', 'student_register')->first();
            $invoice = Checkout::where('user_id',$id)->where('type','student_register')->first();
            //dd(json_decode($payment_detail->response));
            // dd($payment_detail);
            return view('studentsetting::student_view', get_defined_vars());
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));
            return redirect()->back();
        }
    }
    public function StudentDetail(Request $request)
    {
        $rules = [
            'f_name' => 'required',
            'l_name' => 'required',
            'dob' => 'required|date',
            'SS' => 'required',
            'city' => 'required',
            'state' => 'required',
            'Zip' => 'required',
            'mailing_address' => 'required',
            // 'program_review' => 'required',
            // 'student_signature' => 'required',
            // 'student_signature_date' => 'required|date',

        ];

        $this->validate($request, $rules, validationMessage($rules));
        try {



            $user = \App\Models\User::where('id', $request->user_id)->first();
            $user->dob = Carbon::parse($request->dob)->format('m/d/Y');
            $user->Zip = $request->Zip;
            $user->update();

            $this->seveUserSetting($request);

            Toastr::success('Operation successful', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {


            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }
    public function StudentDeclaration(Request $request)
    {
      $rules = [
        'declare_date' => 'required|date',
        'student_name' => 'required',
        'student_signature' => 'required'
      ];
      $this->validate($request, $rules, validationMessage($rules));
      $userDeclaration = UserDeclaration::where('user_id', (int)$request->user_id);

      if (!$userDeclaration->count()) {
          $userDeclaration = new UserDeclaration();
      } else {
          $userDeclaration = $userDeclaration->first();
      }

      $userDeclaration->student_name = $request->student_name;
      $userDeclaration->student_signature = $request->student_signature;
      $userDeclaration->declare_date = $request->declare_date;
      $userDeclaration->user_id = (int)$request->user_id;
      $userDeclaration->save();
      Toastr::success('Operation successful', 'Success');
      return redirect()->back();
    }
    public function StudentApplication(Request $request)
    {
        session()->flash('type', 2);
        $rules = [
            'term_one_text' => 'required',
//            'invoice_date_one' => 'required',
            'declaration_date' => 'required|date',
            'term_two_text' => 'required',
            'name' => 'required',
            'phone' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:14',
            'address' => 'required',
            'fax' => 'required',
            'city' => 'required',
            'state' => 'required',
            'Zip' => 'required',
            'country' => 'required',
            'payment_type' => 'required',
            'credit_card_no' => 'required',
            'exp_date' => 'required',
            'card_appears_name' => 'required',
            'digit_on_back' => 'required',
            'dollar_amount' => 'required',
            //'stgnature' => 'required',
            // 'paid_bill_date' => 'required|date',
            // 'paid_bill' => 'required',
            // 'student_signature' => 'required',
            // 'student_signature_date' => 'required|date',
            'user_id' => 'required'
        ];

        $this->validate($request, $rules, validationMessage($rules));
        try {


            $userApplication = UserApplication::where('user_id', (int)$request->user_id);

            if (!$userApplication->count()) {
                $userApplication = new UserApplication;
            } else {
                $userApplication = $userApplication->first();
            }

            $userApplication->term_one_text = $request->term_one_text;
//            $userApplication->invoice_date_one = $request->invoice_date_one;
            $userApplication->declaration_date = $request->declaration_date;
            $userApplication->term_two_text = $request->term_two_text;
            $userApplication->name = $request->name;
            $userApplication->phone = $request->phone;
            $userApplication->address = $request->address;
            $userApplication->fax = $request->fax;
            $userApplication->city = $request->city;
            $userApplication->state = $request->state;
            $userApplication->Zip = $request->Zip;
            $userApplication->country = $request->country;
            $userApplication->payment_type = $request->payment_type;
            $userApplication->credit_card_no = $request->credit_card_no;
            $userApplication->exp_date = $request->exp_date;
            $userApplication->card_appears_name = $request->card_appears_name;
            $userApplication->digit_on_back = $request->digit_on_back;
            $userApplication->dollar_amount = $request->dollar_amount;
            //$userApplication->stgnature = $request->stgnature;
            //$userApplication->paid_bill_date = $request->paid_bill_date;
            //$userApplication->paid_bill = $request->paid_bill;
            //$userApplication->student_signature = $request->student_signature;
            //$userApplication->student_signature_date = $request->student_signature_date;
            $userApplication->user_id = (int)$request->user_id;
            $userApplication->save();


            Toastr::success('Operation successful', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function StudentAuthenticationAgreement(Request $request)
    {
        session()->flash('type', 3);
        $rules = [
            'applican_name' => 'required',
            'authorized_representative' => 'required',
            'address' => 'required',
            'applicant_signature' => 'required',
            'date' => 'required|date',
            'state' => 'required',
            'country' => 'required',
            'day' => 'required',
            'age' => 'required',
            'name' => 'required',
            'by' => 'required',
            'whose_identity' => 'required',
            'notary_signature' => 'required',
            'printed_name' => 'required',
            'user_id' => 'required'
        ];

        $this->validate($request, $rules, validationMessage($rules));
        try {

            $AuthorzIationAgreement = UserAuthorzIationAgreement::where('user_id', $request->user_id);
            if (!$AuthorzIationAgreement->count()) {
                $AuthorzIationAgreement = new UserAuthorzIationAgreement;
            } else {
                $AuthorzIationAgreement = $AuthorzIationAgreement->first();
            }

            $AuthorzIationAgreement->applican_name = $request->applican_name;
            $AuthorzIationAgreement->authorized_representative = $request->authorized_representative;
            $AuthorzIationAgreement->address = $request->address;
            $AuthorzIationAgreement->applicant_signature = $request->applicant_signature;
            $AuthorzIationAgreement->date = $request->date;
            $AuthorzIationAgreement->state = $request->state;
            $AuthorzIationAgreement->country = $request->country;
            $AuthorzIationAgreement->day = $request->day;
            $AuthorzIationAgreement->age = $request->age;
            $AuthorzIationAgreement->name = $request->name;
            $AuthorzIationAgreement->by = $request->by;
            $AuthorzIationAgreement->whose_identity = $request->whose_identity;
            $AuthorzIationAgreement->notary_signature = $request->notary_signature;
            $AuthorzIationAgreement->printed_name = $request->printed_name;
            $AuthorzIationAgreement->user_id = (int)$request->user_id;
            $AuthorzIationAgreement->save();


            Toastr::success('Operation successful', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }
    public function seveUserSetting(Request $request)
    {

        $program_review = json_encode([]);
        // $program_review = json_encode($request->program_review);
        $userSetting = UserSetting::where('user_id', $request->user_id);
        if (!$userSetting->count()) {
            $userSetting = new UserSetting;
        } else {
            $userSetting = $userSetting->first();
        }
        $userSetting->f_name = $request->f_name;
        $userSetting->l_name = $request->l_name;
        $userSetting->SS = $request->SS;
        $userSetting->mailing_address = $request->mailing_address;
        $userSetting->program_review = $program_review;
        //$userSetting->student_signature = $request->student_signature;
        //$userSetting->student_signature_date = $request->student_signature_date;
        $userSetting->city = $request->city;
        $userSetting->state = $request->state;
        $userSetting->user_id = $request->user_id;
        $userSetting->save();
        return $userSetting;
    }
}
