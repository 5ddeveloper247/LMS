{{-- @extends('frontend.infixlmstheme.auth.layouts.app') --}}
@include(theme('partials._header'))
@include(theme('partials._menu'))
@extends(theme('auth.layouts.app'))
@section('content')


    <div class="login_wrapper">
        <div class="login_wrapper_left">
            {{-- <div class="logo">
                <a href="{{ url('/') }}">
                    <img style="width: 190px" src="{{asset(Settings('logo') )}} " alt="">
                </a>
            </div> --}}
            <div class="login_wrapper_content">
                <h4>{{ __('common.Set New Password') }}</h4>

                @if (session('status'))
                    <span class="text-success d-block p-3 text-center" role="alert">
                        <strong> {{ session('status') }}</strong>
                    </span>
                @endif
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <span class="invalid-feedback d-block p-3 text-center" role="alert">
                            <strong>{{ $error }}</strong>
                        </span>
                    @endforeach
                @endif
                <form action="{{ route('password.update') }}" method="POST" id="resetPasswordForm">
                    <input type="hidden" name="token" value="{{ $token }}">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group custom_group_field mb_37">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">
                                        <!-- svg -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13.328" height="10.662"
                                            viewBox="0 0 13.328 10.662">
                                            <path id="Path_44" data-name="Path 44"
                                                d="M13.995,4H3.333A1.331,1.331,0,0,0,2.007,5.333l-.007,8a1.337,1.337,0,0,0,1.333,1.333H13.995a1.337,1.337,0,0,0,1.333-1.333v-8A1.337,1.337,0,0,0,13.995,4Zm0,9.329H3.333V6.666L8.664,10l5.331-3.332ZM8.664,8.665,3.333,5.333H13.995Z"
                                                transform="translate(-2 -4)" fill="#687083" />
                                        </svg>
                                        <!-- svg -->
                                    </span>
                                </div>
                                <input type="email" value="{{ old('email') }}"
                                    class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" required
                                    placeholder="{{ __('common.Enter Email') }}" name="email" aria-label="Username"
                                    aria-describedby="basic-addon3">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group custom_group_field mb_37">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">
                                        <span class="addon_icon">
                                            <i class="ti-key"></i>
                                        </span>
                                    </span>
                                </div>
                                <input type="password" placeholder="Enter  Password" name="password" class="form-control"
                                    value="" aria-label="Username" aria-describedby="basic-addon3" minlength="8">

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="input-group custom_group_field mb_37">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">
                                        <span class="addon_icon">
                                            <i class="ti-key"></i>
                                        </span>
                                    </span>
                                </div>
                                <input type="password" placeholder="Enter Confirm Password" name="password_confirmation"
                                    class="form-control" value="" aria-label="Username" minlength="8"
                                    aria-describedby="basic-addon3">

                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="theme_btn w-100 text-center">
                            {{ __('common.Set Password') }}
                        </button>
                    </div>
                </form>
            </div>
            <h5 class="shitch_text">
                <a href="{{ route('register') }}">{{ __('common.Need an account?') }}</a>
            </h5>
        </div>
        @include('frontend.infixlmstheme.auth.login_wrapper_right')
    </div>

    <script>
        $('#resetPasswordForm').on('submit',function(e){
            e.preventDefault();
            form = $(this)[0];
            var password = $(this).find('input[name="password"]').val();
           var password_confirm = $(this).find('input[name="password_confirmation"]').val();

            if(!form.checkValidity()){
                form.reportValidity();
                return false;
            }

           if(password != password_confirm){
            toastr.error('Password confirmation does not match');
            return false;
           }

           form.submit();

        });
    </script>
    @include(theme('partials._custom_footer'))

@endsection
