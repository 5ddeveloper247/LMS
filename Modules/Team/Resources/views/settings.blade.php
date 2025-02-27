@extends('backend.master')
@section('mainContent')
    {{-- <section class="sms-breadcrumb mb-40 up_breadcrumb white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1> {{__('team.Team Setting')}}</h1>
                <div class="bc-pages">
                    <a href="{{route('dashboard')}}">{{__('common.Dashboard')}}</a>
                    <a href="#">{{__('team.Team')}}</a>
                    <a href="#" class="active"> {{__('team.Team Setting')}}</a>
                </div>
            </div>
        </div>  
    </section> --}}
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="white_box mb_30 student-details header-menu">
                        <div class="white_box_tittle list_header">
                            <a href="{{route('auth.team')}}" class="primary-btn fix-gr-bg float-start ml-auto" id="">
                                        
                                            {{'Generate Tokens'}}  </a>

                        </div> 
                        <form action="{{ route('team.settings.update') }}" method="POST">
                            @csrf
                                <div class="row p-0">
                                    <div class="col-lg-12">


                                        {{-- <div class="row mb-40 mt-40">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-5 d-flex">
                                                        <p class="text-uppercase fw-500 mb-10">{{__('team.Class Join Approval')}}</p>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <select
                                                            class="w-100 bb niceSelect form-control {{ @$errors->has('approval_type') ? ' is-invalid' : '' }}"
                                                            name="approval_type">
                                                            <option data-display="{{__('team.Select')}} *"
                                                                    value="">{{__('team.Select')}} *
                                                            </option>
                                                            <option
                                                                value="0" @if(!empty($setting))
                                                                {{ old('approval_type',$setting->approval_type) == 0? 'selected' : ''}}
                                                                @endif>
                                                                {{__('team.Automatically')}}
                                                            </option>
                                                            <option
                                                                value="1"@if(!empty($setting))
                                                                {{ old('approval_type',$setting->approval_type) == 1? 'selected' : ''}}
                                                                @endif>
                                                                {{__('team.Manually Approve')}}
                                                            </option>
                                                            <option
                                                                value="2" @if(!empty($setting))
                                                                {{ old('approval_type',$setting->approval_type) == 2? 'selected' : ''}}
                                                                @endif>
                                                                {{__('team.No Registration Required')}}
                                                            </option>
                                                        </select>
                                                        @if ($errors->has('approval_type'))
                                                            <span class="invalid-feedback invalid-select" role="alert">
                                                                    <strong>{{ @$errors->first('approval_type') }}</strong>
                                                                </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-5 d-flex">
                                                        <p class="text-uppercase fw-500 mb-10">{{__('team.Host Video')}} </p>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="radio-btn-flex ml-20">
                                                            <div class="row">
                                                                <div class="col-lg-6 mb-25">
                                                                    <div class="">
                                                                        <label class="primary_checkbox d-flex mr-12"
                                                                            for="host_video_on">
                                                                            <input type="radio" name="host_video"
                                                                                id="host_video_on" value="1"
                                                                                class="common-radio relationButton"@if(!empty($setting))
                                                                                {{ old('host_video',$setting->host_video) == 1 ? 'checked': ''}}
                                                                                @endif>
                                                                            <span
                                                                                class="checkmark mr-2"></span> {{__('team.Enable')}}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 mb-25">
                                                                    <div class="">
                                                                        <label class="primary_checkbox d-flex mr-12"
                                                                            for="host_video">
                                                                            <input type="radio" name="host_video"
                                                                                id="host_video" value="0"
                                                                                class="common-radio relationButton" @if(!empty($setting))
                                                                                {{ old('host_video',$setting->host_video) == '0' ? 'checked': ''}}
                                                                                @endif>
                                                                            <span
                                                                                class="checkmark mr-2"></span> {{__('team.Disable')}}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div> --}}

                                        {{-- <div class="row mb-40 mt-40">

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-5 d-flex">
                                                        <p class="text-uppercase fw-500 mb-10">{{__('team.Auto Recording')}}
                                                            ({{__('team.For Paid Package')}})</p>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <select
                                                            class="w-100 bb niceSelect form-control {{ @$errors->has('auto_recording') ? ' is-invalid' : '' }}"
                                                            name="auto_recording">
                                                            <option data-display="{{__('team.Select')}} *"
                                                                    value="">{{__('team.Select')}} *
                                                            </option>
                                                            <option
                                                                value="none" @if(!empty($setting))
                                                                {{ old('auto_recording',$setting->auto_recording) == 'none'? 'selected' : ''}}
                                                                @endif >
                                                                {{__('team.None')}}
                                                            </option>
                                                            <option
                                                                value="local"@if(!empty($setting))
                                                                {{ old('auto_recording',$setting->auto_recording) == 'local'? 'selected' : ''}}
                                                                @endif >
                                                                {{__('team.Local')}}
                                                            </option>
                                                            <option
                                                                value="cloud" @if(!empty($setting))
                                                                {{ old('auto_recording',$setting->auto_recording) == 'cloud'? 'selected' : ''}}
                                                                @endif>
                                                                {{__('team.Cloud')}}
                                                            </option>
                                                        </select>
                                                        @if ($errors->has('auto_recording'))
                                                            <span class="invalid-feedback invalid-select" role="alert">
                                                                <strong>{{ @$errors->first('auto_recording') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-5 d-flex">
                                                        <p class="text-uppercase fw-500 mb-10">{{__('team.Participant video')}} </p>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="radio-btn-flex ml-20">
                                                            <div class="row">
                                                                <div class="col-lg-6 mb-25">
                                                                    <div class="">
                                                                        <label class="primary_checkbox d-flex mr-12"
                                                                            for="participant_video_on">
                                                                            <input type="radio" name="participant_video"
                                                                                id="participant_video_on" value="1"
                                                                                class="common-radio relationButton" @if(!empty($setting))
                                                                                {{ old('participant_video',$setting->participant_video) == 1? 'checked': ''}}
                                                                                @endif>
                                                                            <span
                                                                                class="checkmark mr-2"></span> {{__('team.Enable')}}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 mb-25">
                                                                    <div class="">
                                                                        <label class="primary_checkbox d-flex mr-12"
                                                                            for="participant_video">
                                                                            <input type="radio" name="participant_video"
                                                                                id="participant_video" value="0"
                                                                                class="common-radio relationButton"@if(!empty($setting))
                                                                                {{ old('participant_video',$setting->participant_video) == 0? 'checked': ''}}
                                                                                @endif>
                                                                            <span
                                                                                class="checkmark mr-2"></span> {{__('team.Disable')}}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div> --}}
                                        {{-- <div class="row mb-40 mt-40">

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-5 d-flex">
                                                        <p class="text-uppercase fw-500 mb-10">
                                                            {{__('team.Audio Options')}}</p>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <select
                                                            class="w-100 bb niceSelect form-control {{ @$errors->has('audio') ? ' is-invalid' : '' }}"
                                                            name="audio">
                                                            <option data-display="{{__('team.Select')}} *"
                                                                    value="">{{__('team.Select')}}*
                                                            </option>
                                                            <option
                                                                value="both" @if(!empty($setting))
                                                                {{ old('audio',$setting->audio) == 'both' ? 'selected' : ''}}
                                                                @endif >
                                                                {{__('team.Both')}}
                                                            </option>
                                                            <option
                                                                value="telephony" @if(!empty($setting))
                                                                {{ old('audio',$setting->audio) == 'telephony'? 'selected' : ''}}
                                                                @endif>
                                                                {{__('team.Telephony')}}
                                                            </option>
                                                            <option
                                                                value="voip" @if(!empty($setting))
                                                                {{ old('audio',$setting->audio) == 'voip'? 'selected' : ''}}
                                                                @endif >
                                                                {{__('team.Voip')}}
                                                            </option>

                                                        </select>
                                                        @if ($errors->has('audio'))
                                                            <span class="invalid-feedback invalid-select" role="alert">
                                                                <strong>{{ @$errors->first('audio') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-5 d-flex">
                                                        <p class="text-uppercase fw-500 mb-10">{{__('team.Join Before Host')}} </p>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class=" radio-btn-flex ml-20">
                                                            <div class="row">
                                                                <div class="col-lg-6 mb-25">
                                                                    <div class="">
                                                                        <label class="primary_checkbox d-flex mr-12"
                                                                            for="join_before_host_on">
                                                                            <input type="radio" name="join_before_host"
                                                                                id="join_before_host_on" value="0"
                                                                                class="common-radio relationButton" @if(!empty($setting))
                                                                                {{ old('join_before_host',$setting->join_before_host) == 1? 'checked': '' }}
                                                                                @endif>
                                                                            <span
                                                                                class="checkmark mr-2"></span>{{__('team.Enable')}}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 mb-25">
                                                                    <div class="">
                                                                        <label class="primary_checkbox d-flex mr-12"
                                                                            for="join_before_host">
                                                                            <input type="radio" name="join_before_host"
                                                                                id="join_before_host" value="0"
                                                                                class="common-radio relationButton" @if(!empty($setting))
                                                                                {{ old('join_before_host',$setting->join_before_host) == 0? 'checked': '' }}
                                                                                @endif>
                                                                            <span
                                                                                class="checkmark mr-2"></span> {{__('team.Disable')}}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}

                                        {{-- <div class="row mb-40 mt-40">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-5 d-flex">
                                                        <p class="text-uppercase fw-500 mb-10">{{__('team.Package')}}</p>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <select
                                                            class="w-100 bb niceSelect form-control {{ @$errors->has('package_id') ? ' is-invalid' : '' }}"
                                                            name="package_id">
                                                            <option data-display="{{__('team.Select Package')}} *"
                                                                    value="">{{__('team.Select Package')}} *
                                                            </option>
                                                            <option
                                                                value="1" @if(!empty($setting))
                                                                {{ old('package_id',$setting->package_id) == 1 ? 'selected' : ''}}
                                                                @endif >
                                                                {{__('team.Basic (Free)')}}
                                                            </option>
                                                            <option
                                                                value="2" @if(!empty($setting))
                                                                {{ old('package_id',$setting->package_id) == 2 ? 'selected' : ''}}
                                                                @endif >
                                                                {{__('team.Pro')}}
                                                            </option>
                                                            <option
                                                                value="3"@if(!empty($setting))
                                                                {{ old('package_id',$setting->package_id) == 3 ? 'selected' : ''}}
                                                                @endif >
                                                                {{__('team.Business')}}
                                                            </option>
                                                            <option
                                                                value="4" @if(!empty($setting))
                                                                {{ old('package_id',$setting->package_id) == 4 ? 'selected' : ''}}
                                                                @endif >
                                                                {{__('team.Enterprise')}}
                                                            </option>
                                                        </select>
                                                        @if ($errors->has('package_id'))
                                                            <span class="invalid-feedback invalid-select" role="alert">
                                                                <strong>{{ @$errors->first('package_id') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-5 d-flex">
                                                        <p class="text-uppercase fw-500 mb-10">{{__('team.Waiting Room')}}</p>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class=" radio-btn-flex ml-20">
                                                            <div class="row">
                                                                <div class="col-lg-6 mb-25">
                                                                    <div class="">
                                                                        <label class="primary_checkbox d-flex mr-12"
                                                                            for="waiting_room_on">
                                                                            <input type="radio" name="waiting_room"
                                                                                id="waiting_room_on" value="1"
                                                                                class="common-radio relationButton" @if(!empty($setting))
                                                                                {{ old('waiting_room',$setting->waiting_room) == 1? 'checked': '' }}
                                                                                @endif>
                                                                            <span
                                                                                class="checkmark mr-2"></span> {{__('team.Enable')}}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 mb-25">
                                                                    <div class="">
                                                                        <label class="primary_checkbox d-flex mr-12"
                                                                            for="waiting_room">
                                                                            <input type="radio" name="waiting_room"
                                                                                id="waiting_room" value="0"
                                                                                class="common-radio relationButton" @if(!empty($setting))
                                                                                {{ old('waiting_room',$setting->waiting_room) == 0? 'checked': '' }}
                                                                                @endif>
                                                                            <span
                                                                                class="checkmark mr-2"></span> {{__('team.Disable')}}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div> --}}

                                        <div class="row mb-40 mt-40">
                                            <div class="col-lg-6">
                                                <div class="input-effect sm2_mb_20 md_mb_20">
                                                    <input
                                                        class="primary-input form-control{{ $errors->has('client_id') ? ' is-invalid' : '' }}"
                                                        type="text" name="client_id"
                                                        value="@if(!empty($setting)) {{ old('client_id',$setting->client_id) }} @endif">
                                                    <label>{{__('Secret ID')}}<span>*</span> </label>
                                                    <span class="focus-border"></span>
                                                    @if ($errors->has('client_id'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('client_id') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-5 d-flex">
                                                        <p class="text-uppercase fw-500 mb-10">
                                                            {{__('team.Mute Upon Entry')}} </p>
                                                    </div>
                                                    <div class="col-lg-7">

                                                        <div class="radio-btn-flex ml-20">
                                                            <div class="row">
                                                                <div class="col-lg-6 mb-25">
                                                                    <div class="">
                                                                        <label class="primary_checkbox d-flex mr-12 "
                                                                            for="mute_upon_entr_on">
                                                                            <input type="radio" name="mute_upon_entry"
                                                                                id="mute_upon_entr_on" value="1"
                                                                                class="common-radio relationButton" @if(!empty($setting))
                                                                                {{ old('mute_upon_entry',$setting->mute_upon_entry) == 1? 'checked': ''}}
                                                                                @endif>
                                                                            <span
                                                                                class="checkmark mr-2"></span> {{__('team.Enable')}}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 mb-25">
                                                                    <div class="">
                                                                        <label class="primary_checkbox d-flex mr-12 "
                                                                            for="mute_upon_entry">
                                                                            <input type="radio" name="mute_upon_entry"
                                                                                id="mute_upon_entry" value="0"
                                                                                class="common-radio relationButton" @if(!empty($setting))
                                                                                {{ old('mute_upon_entry',$setting->mute_upon_entry) == 0? 'checked': ''}}
                                                                                @endif>
                                                                            <span
                                                                                class="checkmark mr-2"></span> {{__('team.Disable')}}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}


                                        {{-- </div>

                                        <div class="row mb-40 mt-40"> --}}
                                            <div class="col-lg-6">
                                                <div class="input-effect sm2_mb_20 md_mb_20">
                                                    <input
                                                        class="primary-input form-control{{ $errors->has('client_secret') ? ' is-invalid' : '' }}"
                                                        type="text" name="client_secret"
                                                        value=" @if(!empty($setting)) {{ old('client_secret',$setting->client_secret) }} @endif">
                                                    <label>{{__('Secret Value') }}<span>*</span></label>
                                                    <span class="focus-border"></span>
                                                    @if ($errors->has('client_secret'))
                                                        <span class="invalid-feedback invalid-select" role="alert">
                                                            <strong>{{ $errors->first('client_secret') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mt-40">
                                            <div class="col-lg-12 text-center">
                                                <button class="primary-btn fix-gr-bg" id="_submit_btn_admission">
                                                    <span class="ti-check"></span>
                                                    {{__('team.Update')}}
                                                </button>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
