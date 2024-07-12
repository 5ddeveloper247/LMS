<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Country;
use App\Models\CloverPayment;
use App\Traits\ImageStore;
use App\Models\UserSetting;
use App\StudentCustomField;
use Illuminate\Http\Request;
use App\Jobs\SendGeneralEmail;
use App\Models\UserApplication;
use App\Models\UserDeclaration;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\CloverController;
use App\Models\UserAuthorzIationAgreement;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Modules\FrontendManage\Entities\LoginPage;
use Modules\AuthorizeNetPayment\Http\Controllers\DoAuthorizeNetPaymentController;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    use ImageStore;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //    protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/register2';
    protected $userRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
        // $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        // if (!Session::has('first_reg_form')) {
        //     // Add the unique rule if the session is not set
        //     $rules['email'][] = Rule::unique('users');
        // }
        if (saasEnv('nocaptcha_for_reg')) {
            $rules = [
                'name' => ['required', 'string', 'max:255'],
                'phone' => 'nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|unique:users',
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['string', 'min:8', 'confirmed'],
                'g-recaptcha-response' => 'required|captcha'
            ];
        } else {
            $rules = [
                'name' => ['required', 'string', 'max:255'],
                'phone' => 'nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:14',
                'email' => 'required|string|email|max:255',
                'password' => ['string', 'min:8', 'confirmed'],
                'f_name' => 'required',
                'l_name' => 'required',
                'dob' => 'required',
                'SS' => 'required',
                'city' => 'required',
                'state' => 'required',
                'zip' => 'required',
                'mailing_address' => 'required',
                // 'student_signature' => 'required',
                // 'student_signature_date' => 'required',

            ];
            // if (!Session::has('first_reg_form')) {
            //     $rules['email'] = Rule::unique('users');
            //     $rules['phone'] = Rule::unique('users');
            // }
        }

        if (isset($data['is_lms_signup'])) {
            $rules = [
                'name' => ['required', 'string', 'max:255'],
                'phone' => 'nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:14',
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'institute_name' => ['required', 'string', 'max:255'],
                'domain' => ['required', 'string', 'max:20', 'unique:lms_institutes'],
            ];
        }
        if (isset($data['type']) && ($data['type'] == "Instructor" || $data['type'] == "Tutor")) {
            $rules = [
                'instructor_position_id' => 'required',
                'instructor_hear_id' => 'required',
                'role_id' => 'required',
                'first_name' => 'required',
                //                'middle_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'dob' => 'required',
                'phone' => 'nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:14',
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'cell' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|string|min:11|max:14',
                //                'work' => 'required',
                'address' => 'required',
                'high_school' => 'required',
                'school_years_attended' => 'required',
                'school_year_graduate' => 'required',
                'school_degree' => 'required',
                'college' => 'required',
                'college_email' => 'required',
                'college_graduate' => 'required',
                // 'trade_school' => 'required',
                'trade_degree' => 'required',
                'trade_years_attended' => 'required',
                'trade_year_graduate' => 'required',
                'current_position' => 'required',
                'Teach_phone' => 'required',
                'employee_name' => 'required',
                'date_employer_start' => 'required|date',
                'date_employer_end' => 'nullable|required_if:currently_employed,false|date',
                'currently_employed' => 'nullable|boolean',
                'supervisor_name' => 'required',
                'upload_resume' => 'required',
                'cover_letter' => 'required',
                'employer_address' => 'required',

            ];
        }
        if (currentTheme() == 'tvt') {
            $rules['level'] = ['required'];
        }
        return Validator::make(
            $data,
            $rules,
            validationMessage($rules)
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $status = 1;
        $id = $data['id'] ?? null;

        if (isset($data['type']) && ($data['type'] == "Instructor" || $data['type'] == "Tutor")) {
            $status = 0;
            $role = $data['role_id'];
        } else {
            $role = 3;
        }
        if (isset($data['is_lms_signup'])) {
            $role = 1;
        }

        if (empty($data['phone'])) {
            $data['phone'] = null;
        }
        $password = null;
        if (isset($data['password'])) {
            $password = Hash::make($data['password']);
        }
        $data = [
            'name' => $data['name'] ?? null,
            'phone' => $data['phone'] ?? null,
            'email' => $data['email'] ?? null,
            'zip' => $data['zip'] ?? null,
            'role_id' => $role ?? null,
            'dob' => Carbon::parse($data['dob'])->format('m/d/Y') ?? null,
            'gender' => $data['gender'] ?? null,
            'student_type' => $data['student_type'] ?? null,
            'job_title' => $data['job_title'] ?? null,
            'identification_number' => $data['identification_number'] ?? null,
            'company' => $data['company'] ?? null,
            'password' => $password,
            'language_id' => Settings('language_id') ?? '19',
            'language_name' => Settings('language_name') ?? 'English',
            'language_code' => Settings('language_code') ?? 'en',
            'language_rtl' => Settings('language_rtl') ?? '0',
            'country' => $data['country'] ?? Settings('country_id'),
            'username' => null,
            'address' => $data['mailing_address'] ?? null,
            'status' => $status,
            'register_source' => null,
            'enrolled' => null,
            'is_lms_signup' => $data['is_lms_signup'] ?? null,
            'institute_name' => $data['institute_name'] ?? null,
            'domain' => str_replace(' ', '', $data['domain'] ?? null),
            'level' => $data['level'] ?? '',
        ];

        //email check
        if (!empty($id)) {
            if (User::where('id', '!=', $id)->where('email', $data['email'])->exists()) {
                return (object)['error' => 'Email Allready Exists'];
            }

            $user = User::where('id', (int)$id)->first();

            $user->name = $data['name'];
            $user->phone = $data['phone'];
            $user->email = $data['email'];
            $user->zip = $data['zip'];
            $user->dob = $data['dob'] ?? null;
            $user->gender = $data['gender'] ?? null;
            $user->enrolled = 'Yes';
            $user->country = $data['country'] ?? Settings('country_id');
            $user->save();
            return $user;
        } else if (User::where('email', $data['email'])->exists()) {
            return (object)['error' => 'Email Allready Exists'];
        } else {
            $data['referral'] = generateUniqueId();

            return $this->userRepository->create($data);
        }
    }

    public function seveUserSetting(Request $request)
    {
        // if ($request->session()->exists('first_form_data')) {
        //     $request->session()->forget('first_form_data');
        // } else {
        //     $request->session()->regenerate();
        // }
        // $request->session()->put('first_form_data', $request->all());
        // Session::put('first_form_data', $request->all());

         if($request->hasFile('signature-img')){
          $file = $request->file('signature-img');
          $filename = $request->fname.'_'.$request->l_name.'_'.$request->user_id.'.'.$file->clientExtension();
          $file_path = 'public/register1-signatures/' . $filename;
          $file->move(public_path('register1-signatures'), $filename);
         }
        // $program_review = json_encode($request->program_review);
        $program_review = json_encode([]);
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
        $userSetting->student_signature = $file_path;
        // $userSetting->student_signature = $request->student_signature;
        $userSetting->student_signature_date = $request->student_signature_date;
        $userSetting->city = $request->city;
        $userSetting->state = $request->state;
        $userSetting->user_id = $request->user_id;
        $userSetting->save();
        return $userSetting;
    }

    public function RegisterForm()
    {
        abort_if(!Settings('student_reg'), 404);
        abort_if(saasPlanCheck('student'), 404);
        $page = LoginPage::getData();
        $custom_field = StudentCustomField::getData();
        $user = session()->has('user') ? session()->get('user') : Auth::user();
        $userSetting = session()->has('userSetting') ? session()->get('userSetting') : '';
        $user_setting_exists = UserSetting::where('user_id', Auth::user()->id)->exists();
        $user_application_exists = UserApplication::where('user_id', Auth::user()->id)->exists();
        $user_agreement_exists = UserAuthorzIationAgreement::where('user_id', Auth::user()->id)->exists();
        $user_payment_exists = CloverPayment::where('user_id', Auth::user()->id)->exists();
        $countries = Country::orderBy('name','asc')->get();
        return view(theme('authnew.register1'), get_defined_vars());
    }

    public function RegisterForm2()
    {
        abort_if(!Settings('student_reg'), 404);
        abort_if(saasPlanCheck('student'), 404);
        if (!session()->has('user')) {
            return redirect()->to(route('register'));
        }
        // if ($id != null && $id == 'back2') {

        //     $user = session()->get('user');
        //     $userSetting = session()->get('userSetting');
        //     $page = LoginPage::getData();
        //     $payment_details = session()->get('payment_details');

        //     return view(theme('auth.register2'), get_defined_vars());
        // }
        $user = session()->get('user');
        $userSetting = session()->get('userSetting');
        $payment_details = session()->has('payment_details') ? session()->get('payment_details') : '';
        $page = LoginPage::getData();

        $user_setting_exists = UserSetting::where('user_id', Auth::user()->id)->exists();
        $user_application_exists = UserApplication::where('user_id', Auth::user()->id)->exists();
        $user_agreement_exists = UserAuthorzIationAgreement::where('user_id', Auth::user()->id)->exists();
        $user_payment_exists = CloverPayment::where('user_id', Auth::user()->id)->exists();

        return view(theme('authnew.register2'), get_defined_vars());
        // return view(theme('authnew.register2'), compact('page', 'user', 'userSetting', 'payment_details'));
    }

    public function RegisterForm3()
    {
        abort_if(!Settings('student_reg'), 404);
        abort_if(saasPlanCheck('student'), 404);

        if (!session()->has('user')) {
            return redirect()->back();
        }
        $user = session()->get('user');
        $userSetting = session()->get('userSetting');
        $payment_details = session()->get('payment_details');
        $page = LoginPage::getData();

        $user_setting_exists = UserSetting::where('user_id', Auth::user()->id)->exists();
        $user_declaration_exists = UserDeclaration::where('user_id', Auth::user()->id)->exists();

        if (!$user_setting_exists) {
                  Toastr::error('Please complete your Registration', 'Error');
                  return redirect()->to(route('register'));
              }

            if (!$user_declaration_exists) {
                  Toastr::error('Please complete your Registration !', 'Error');
                  return redirect()->to(route('register.declaration'));
              }

        return view(theme('authnew.register4'), get_defined_vars());
        // return view(theme('authnew.register4'), compact('page', 'user', 'userSetting', 'payment_details'));
    }

    public function RegisterDeclaration(){
      abort_if(!Settings('student_reg'), 404);
      abort_if(saasPlanCheck('student'), 404);
    //   if (!session()->has('user')) {
    //       return redirect()->to(route('register'));
    //   }
      $user = Auth::user();
      $userDeclaration = UserDeclaration::where('user_id',Auth::user()->id)->first();
      $page = LoginPage::getData();
      $user_setting_exists = UserSetting::where('user_id', Auth::user()->id)->exists();
      
      if (!$user_setting_exists) {
          Toastr::error('Please complete your Registration', 'Error');
          return redirect()->to(route('register'));
        }
        $userSetting = UserSetting::where('user_id', Auth::user()->id)->first();

      return view(theme('authnew.register3'), get_defined_vars());
      // return view(theme('authnew.register3'), compact('user','page','userSetting','userDeclaration'));
    }

    public function RegisterFormPay()
    {
        // dd("fkasdjfkj");
        abort_if(!Settings('student_reg'), 404);
        abort_if(saasPlanCheck('student'), 404);
        // if (!session()->has('user')) {
        //     return redirect()->to(route('register'));
        // }
        // dd("1");

        try {

            $user = session()->get('user') ?? Auth::user();
            $page = LoginPage::getData();
            // dd(get_defined_vars());
            return view(theme('authnew.register5'), get_defined_vars());
        } catch (\Exception $e) {
          //  dd("c");
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function LmsRegisterForm()
    {

        abort_if(!isModuleActive('LmsSaas') && !isModuleActive('LmsSaasMD'), 404);
        abort_if(SaasDomain() != 'main', 404);
        $page = LoginPage::getData();
        $custom_field = StudentCustomField::getData();
        return view(theme('auth.lms_register'), compact('page', 'custom_field'));
    }

    public function showRegistrationForm()
    {
        $page = LoginPage::getData();
        return view(theme('auth.register'), compact('page'));
    }

    public function RegisterForm2Create(Request $request)
    {
        // dd($request);

        $rules = [
            'term_one_text' => 'required',
            //            'invoice_date_one' => 'required',
            'declaration_date' => 'required|date|after_or_equal:today',
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
            'dollar_amount' => 'required|numeric|min:100',

            // 'stgnature' => 'required',
            // 'paid_bill_date' => 'required|date',
            // 'paid_bill' => 'required',
            // 'student_signature' => 'required',
            'student_signature_date' => 'required|date',
            'user_id' => 'required'
        ];

        $this->validate($request, $rules, validationMessage($rules));
        $userApplication = UserApplication::where('user_id', $request->user_id);
        $file_path = '';
        if($request->hasFile('signature-img')){
         $file = $request->file('signature-img');
         $filename = $request->name.'_'.$request->user_id.'.'.$file->clientExtension();
         $file_path = 'public/register2-signatures/' . $filename;
         $file->move(public_path('register2-signatures'), $filename);
        }

        if (!$userApplication->count()) {
            $userApplication = new UserApplication;
        } else {
            $userApplication = $userApplication->first();
        }

        $userApplication->term_one_text = $request->term_one_text;
        $userApplication->term1_father_name = $request->term1_father_name;
        //        $userApplication->invoice_date_one = $request->invoice_date_one;
        $userApplication->declaration_date = $request->declaration_date;
        $userApplication->term_two_text = $request->term_two_text;
        $userApplication->term2_father_name = $request->term2_father_name;
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
        $userApplication->stgnature = $request->stgnature;
        $userApplication->paid_bill_date = $request->paid_bill_date;
        $userApplication->paid_bill = $request->paid_bill;
        $userApplication->student_signature = $file_path;
        $userApplication->student_signature_date = $request->student_signature_date;
        $userApplication->user_id = $request->user_id;
        $userApplication->save();
        session()->put('payment_details', $userApplication);
        return redirect()->to(route('register.declaration'));
    }

    public function RegisterDeclarationCreate(Request $request){
        // dd($request);
      $rules = [
        'declare_date' => 'required|date|after_or_equal:today',
        'student_name' => 'required',
        // 'student_signature' => 'required'
      ];
      $this->validate($request, $rules, validationMessage($rules));

        $user_setting_exists = UserSetting::where('user_id', Auth::user()->id)->exists();
        if (!$user_setting_exists) {
            Toastr::error('Please fill this form first.', 'Error');
            return redirect()->to(route('register'));
        }

      if($request->hasFile('signature-img')){
       $file = $request->file('signature-img');
       $filename = $request->student_name.'_'.$request->user_id.'.'.$file->clientExtension();
       $file_path = 'public/register3-signatures/' . $filename;
       $file->move(public_path('register3-signatures'), $filename);
      }
      $userDeclaration = UserDeclaration::where('user_id', $request->user_id);

      if (!$userDeclaration->count()) {
          $userDeclaration = new UserDeclaration;
      } else {
          $userDeclaration = $userDeclaration->first();
      }
      $userDeclaration->declare_date = $request->input('declare_date');
      $userDeclaration->student_name = $request->input('student_name');
      $userDeclaration->student_signature = $file_path;
      $userDeclaration->user_id = $request->user_id;
      $userDeclaration->save();
      session()->put('enrollment_declaration', $request->input());
      Toastr::success('Pre Registration Successfull. Now you can proceed with buying courses', 'Success');
      return redirect()->intended(route('studentDashboard'));
    }

    public function RegisterForm3Create(Request $request)
    {

        // dd($request);
        // $rules = [
        //     'applican_name' => 'required',
        //     'authorized_representative' => 'required',
        //     'address' => 'required',
        //     'applicant_signature' => 'required',
        //     'date' => 'required',
        //     'state' => 'required',
        //     'country' => 'required',
        //     'day' => 'required',
        //     'age' => 'required',
        //     'name' => 'required',
        //     'by' => 'required',
        //     'whose_identity' => 'required',
        //     'notary_signature' => 'required',
        //     'printed_name' => 'required',
        //     'user_id' => 'required'
        // ];
        // $this->validate($request, $rules, validationMessage($rules));

        $user_setting_exists = UserSetting::where('user_id', Auth::user()->id)->exists();
        $user_declaration_exists = UserDeclaration::where('user_id', Auth::user()->id)->exists();
        if (!$user_setting_exists) {
                  Toastr::error('Please fill this form first.', 'Error');
                  return redirect()->to(route('register'));
              }
        if (!$user_declaration_exists) {
                  Toastr::error('Please fill this form first.', 'Error');
                  return redirect()->to(route('register'));
              }

        $AuthorzIationAgreement = UserAuthorzIationAgreement::where('user_id', $request->user_id);
        if (!$AuthorzIationAgreement->count()) {
            $AuthorzIationAgreement = new UserAuthorzIationAgreement;
        } else {
            $AuthorzIationAgreement = $AuthorzIationAgreement->first();
        }

        // $AuthorzIationAgreement->applican_name = $request->applican_name;
        // $AuthorzIationAgreement->authorized_representative = $request->authorized_representative;
        // $AuthorzIationAgreement->address = $request->address;
        // $AuthorzIationAgreement->applicant_signature = $request->applicant_signature;
        // $AuthorzIationAgreement->date = $request->date;
        // $AuthorzIationAgreement->state = $request->state;
        // $AuthorzIationAgreement->country = $request->country;
        // $AuthorzIationAgreement->day = $request->day;
        // $AuthorzIationAgreement->age = $request->age;
        // $AuthorzIationAgreement->name = $request->name;
        // $AuthorzIationAgreement->by = $request->by;
        // $AuthorzIationAgreement->whose_identity = $request->whose_identity;
        // $AuthorzIationAgreement->notary_signature = $request->notary_signature;
        // $AuthorzIationAgreement->printed_name = $request->printed_name;
        $AuthorzIationAgreement->user_id = (int)$request->user_id;
        // $AuthorzIationAgreement->user_form = null;

        $AuthorzIationAgreement->save();

        return redirect()->to(route('register.pay'));

    }

    public function RegisterFormPayCreate(Request $request)
    {
// dd($request);
        $rules = [
            'cardHolder' => 'required',
            'cardNumber' => 'required',
            'expiryDate' => 'required',
            'cvv' => 'required|numeric',
            'user_id' => 'required',
            'amount' => 'required',
            // 'accept' => 'accepted'
        ];
        $this->validate($request, $rules, validationMessage($rules));

        if(!$request->has('accept')){
            Toastr::error('Terms & Condition must be accepted.', 'Error');
                  return redirect()->back();
        }

        $user_setting_exists = UserSetting::where('user_id', Auth::user()->id)->exists();
        $user_declaration_exists = UserDeclaration::where('user_id', Auth::user()->id)->exists();
        $user_agreement_exists = UserAuthorzIationAgreement::where('user_id', Auth::user()->id)->exists();

        if (!$user_setting_exists) {
                  Toastr::error('Please fill this form first.', 'Error');
                  return redirect()->to(route('register'));
              }
        if (!$user_declaration_exists) {
                  Toastr::error('Please fill this form first.', 'Error');
                  return redirect()->to(route('register'));
              }
        if (!$user_agreement_exists) {
                  Toastr::error('Please fill this form first.', 'Error');
                  // Toastr::error('Please Complete Your Registration Process !', 'Error');
                  return redirect()->to(route('register.3'));
              }
        

        try {
            $authorize = new DoAuthorizeNetPaymentController();
            $paymentResponse = $authorize->makePayment($request, 'student_register', true, null, true); //previous code has the last parameter true



             // dd($paymentResponse->paid);
            // dd($paymentResponse->paid, $clover->makePayment($request, 'student_register', true, null, true));
            if ($paymentResponse["paid"]) {
                $user = User::find($request->user_id);
                $user->enrolled_date = date('Y-m-d');
                $user->save();
                // SendGeneralEmail::dispatch(User::find($request->user_id),  'New_Student_Reg', [
                //     'time' => Carbon::now()->format('d-M-Y, g:i A'),
                // ]);
                $update = User::where('id',$request->user_id)->update(['enrolled' => 'Yes']);
                SendGeneralEmail::dispatch(User::find($request->user_id), 'New_Student_Reg', [
                    'time' => Carbon::now()->format('d-M-Y, g:i A'),
                    'name' => $request->first_name . ' ' . $request->last_name,
                    'type' => 'student',
                ]);
                // dd("s");
                session()->forget('user');
                Toastr::success('Thanks for your enrollment, now you can proceed with buying progams and courses', 'Success');
                // Toastr::success('Payment Successfully Done', 'Success');
                return redirect()->to(route('login'));
            }
            else {

                Toastr::error('Payment Not Done, Please Try Again Later !', 'Error');
                return redirect()->back();
            }
        }
        catch (\Exception $e) {
        //    dd($e);
           // Toastr::error($e);
            Toastr::error('Something Went Wrong', 'Error');
            return redirect()->back();
        }
    }




    //    save instructors info
    public function saveInstructorsInfo(Request $request, $resume_file, $coverletter_file)
    {

        $exception = DB::transaction(function () use ($request, $resume_file, $coverletter_file) {
            //            become_instructors_form_data
            DB::table('become_instructors_form_data')->insert([
                'user_id' => $request->user_id,
                'instructor_position_id' => $request->instructor_position_id,
                'instructor_hear_id' => $request->instructor_hear_id,
                'start_date' => $request->start_date,
                'created_at' => Carbon::now(),

            ]);

            // instructors_personal_info
            DB::table('instructors_personal_info')->insert([
                'user_id' => $request->user_id,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'gender' => $request->gender,
                'date_of_birth' => $request->dob,
                'email' => $request->email,
                'phone' => $request->phone,
                'cell' => $request->cell,
                'work' => $request->work,
                'address' => $request->address,
                'created_at' => Carbon::now(),
            ]);

            //            instructors_school_info
            DB::table('instructors_school_info')->insert([
                'user_id' => $request->user_id,
                'high_school' => $request->high_school,
                'school_years_attended' => $request->school_years_attended,
                'school_year_graduate' => $request->school_year_graduate,
                'school_degree' => $request->school_degree,
                'college' => $request->college,
                'email' => $request->college_email,
                'college_graduate' => $request->college_graduate,
                'trade_school' => $request->trade_school,
                'trade_degree' => $request->trade_degree,
                'trade_years_attended' => $request->trade_years_attended,
                'trade_year_graduate' => $request->trade_year_graduate,
                'created_at' => Carbon::now(),
            ]);

            //            instructors_teaching_experience
            DB::table('instructors_teaching_experience')->insert([
                'user_id' => $request->user_id,
                'current_position' => $request->current_position,
                'phone' => $request->Teach_phone,
                'employee_name' => $request->employee_name,
                'date_employer_start' =>  $request->date_employer_start,
                'date_employer_end' =>  $request->date_employer_end,
                'supervisor_name' => $request->supervisor_name,
                'upload_resume' => $resume_file,
                'cover' => $coverletter_file,
                'address' => $request->employer_address,
                'created_at' => Carbon::now(),
            ]);
        });
        if (is_null($exception)) {
            SendGeneralEmail::dispatch(User::find($request->user_id), 'New_Student_Reg', [
                'time' => Carbon::now()->format('d-M-Y, g:i A'),
                'name' => $request->first_name . ' ' . $request->last_name,
                'type' => 'instructor',
            ]);
            return true;
        } else {
            return false;
        }

        // return is_null($exception) ? true : false;
    }

    public function student_enroll(){
    //   $user_setting_exists = UserSetting::where('user_id', Auth::user()->id)->exists();
    //   $user_application_exists = UserApplication::where('user_id', Auth::user()->id)->exists();
      $user_agreement_exists = UserAuthorzIationAgreement::where('user_id', Auth::user()->id)->exists();
      $user_payment_exists = CloverPayment::where('user_id', Auth::user()->id)->exists();
      session()->put('user', Auth::user());
      session()->put('userSetting', UserSetting::where('user_id', Auth::user()->id)->first());

    //   if (!$user_setting_exists) {
    //       Toastr::error('Please Complete Your Registration Process !', 'Error');
    //       return redirect()->to(route('register'));
    //   }

      session()->put('payment_details', UserApplication::where('user_id', Auth::user()->id)->first());

    //   if (!$user_application_exists) {
    //       Toastr::error('Please Complete Your Registration Process !', 'Error');
    //       return redirect()->to(route('register.2'));
    //   }

      if (!$user_agreement_exists) {
          Toastr::error('Please Download Authorization Agreement !', 'Error');
          return redirect()->to(route('register.3'));
      }

      if (!$user_payment_exists) {
          Toastr::error('Please Make Your Payment First !', 'Error');
          return redirect()->to(route('register.pay'));
      }
      Toastr::success('Your enrollment has been completed !', 'Success');
      return redirect()->back();
    }

    public function register(Request $request)
    {
        // dd($request);
        if (isModuleActive('LmsSaasMD')) {
            ini_set('max_execution_time', 10000);
        }
        //for student
        if (isset($request->f_name) && isset($request->l_name)) {
            $name = $request->f_name . ' ' . $request->l_name;
            $request->request->add(['name' => $name]);
        }

        //for instructors and tutor
        if (isset($request->type) && ($request->type == "Instructor" || $request->type == "Tutor")) {
            if (isset($request->first_name) && isset($request->last_name)) {
                $name = $request->first_name . ' ' . $request->last_name;
                $request->request->add(['name' => $name]);
            }
            if ($request->has('currently_employed')) {
                $request->request->add(['currently_employed' => true]);
                $request->request->add(['date_employer_end' => null]);
            } else {
                $request->request->add(['currently_employed' => false]);
            }
        }

        //for validate and create user
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());
        if (isset($user->error)) {
            Toastr::error($user->error, 'Error');
            return redirect()->back();
        }
        // for student
        $request->request->add(['user_id' => $user->id]);
        if (isset($request->is_user_setting)) {

            $userSetting = $this->seveUserSetting($request);

            session()->put(['userSetting' => $userSetting]);
        }

        //for instructors
        if (isset($request->type) && ($request->type == "Instructor" || $request->type == "Tutor")) {
            //            save instructors info
            $resume_file = $this->saveFile($request->file('upload_resume'));
            $coverletter_file = $this->saveFile($request->file('cover_letter'));
            if ($this->saveInstructorsInfo($request, $resume_file, $coverletter_file)) {
                if ($request->type == "Tutor") {
                    Cookie::queue(Cookie::make('user_id', $user->id, 60));
                    if (!empty($request->package_id)) {
                        return redirect()->to(route('packageBuy', ['id' => $request->package_id]));
                    } else {
                        return redirect()->to(route('individualTutorPackages'));
                    }
                }
                Toastr::success('Data Successfully submitted. You will be able to login after admin sets up your password.', 'Success');
                return redirect()->back();
            }

            unlink(asset($resume_file));
            unlink(asset($coverletter_file));
            Toastr::error('Some Sever Error', 'Error');
            return redirect()->back();
        }

        session()->put(['user' => $user]);
        return redirect()->to(route('register.declaration'));
    }
}
