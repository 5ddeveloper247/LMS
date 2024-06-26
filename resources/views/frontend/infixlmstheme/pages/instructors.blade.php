@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('frontend.Instructor') }}
@endsection
{{-- @section('css') --}}
{{-- @endsection --}}
@section('js')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css" />
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css" />
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css" />
    <script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .modal.open {
            display: block;
        }


        .model-close {
            position: relative;
            top: -30px;
            right: 8px;
        }

        .is-invalid {
            border-bottom: 2px solid red !important;
        }

        .custom_section_color {
            background-color: #eee !important;

        }

        .border-purple {
            border: 2px solid #996699 !important;
        }

        .text-purple {
            color: #996699;
        }

        .btn_responsive {
            font-size: 12.5px;
            border-radius: 16px !important;
            border: 2px solid #fff;
        }

        .btn_responsive:hover {
            background-color: var(--system_primery_color) !important;
            border-color: var(--system_primery_color) !important;
            transition: 0.3s ease !important;
            color: #fff;
        }

        .rounded-card {
            border-radius: 25px !important;
        }

        .rounded-card-header {
            border-radius: 25px !important;
        }

        .rounded-card-img {
            border-top-left-radius: 25px !important;
            border-top-right-radius: 25px !important;
        }

        .section-margin-y {
            margin: 60px auto !important;
        }

        /* .form_label {
            width: -webkit-fill-available;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
        } */
        
        label span {
            color: red !important;
            display: inline !important;
        }

        .thumb-height {
            object-fit: none;
        }

        .thumb-height:hover {
            transition: 0.3s;
        }

        .quiz_wizged {
            overflow: hidden;
        }

        .custom-heading {
            font-size: 60px;
        }

        .custom-padding {
            padding-right: 60px;
        }

        /* .custom-l-padd {
                    padding: 0 0 0 60px;
                } */

        .custom-padd {
            padding-left: 60px;
        }

        .custom-padd {
            padding: 30px 0;
        }

        .modal.fade.show {
            background: rgba(3, 3, 3, 0.7) !important;
        }

        .custom_height_1 {
            height: 71vh !important;
            width: 100%;
            border-radius: 25px;
        }

        .right-divv {
            max-height: 56vh !important;
            overflow-y: auto;
            scrollbar-width: none;

        }

        .custom_height_2 {
            height: 71vh !important;
            width: 100%;
        }

        @media only screen and (min-width: 501px) and (max-width: 767px) {
            .btn_responsive {
                font-size: 13px;
            }

            .shadow-p {
                height: 21rem;
                overflow: auto;
            }

        }

        @media only screen and (min-width:1450px) {
            .btn_responsive {
                font-size: 15px !important;
                border-radius: 20px !important;
            }
        }

        @media only screen and (min-width: 1800px) {
            .thumb-height {
                height: 400px !important;
                object-fit: cover;
            }

            .btn_responsive {
                font-size: 18px !important;
                border-radius: 20px !important;
            }

            .modal_form {
                max-width: 1500px !important;
            }
        }
    </style>
    {{-- @endsection --}}
@section('mainContent')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 px-0">
                {{-- <div class="breadcrumb_area position-relative">
                    <div class="w-100 h-100 position-absolute bottom-0 left-0">
                        <img alt="Banner Image" class="w-100 h-100 img-cover"
                            src="{{ asset('public/frontend/infixlmstheme/img/images/Teacher Explaining.jpg') }}">
                    </div>
                    <div class="col-lg-9 offset-1">
                        <div class="breadcam_wrap">&nbsp;
                            <h1 class="text-white custom-heading">Instructors</h1>
                            @if (!auth()->check())
                                <button
                                    class="btn_responsive font-weight-bold hit ml-1 bg-transparent px-2 px-md-3 py-2 text-white openModal">
                                    Become
                                    an
                                    Instructor
                                </button>
                            @endif
                        </div>
                    </div>
                </div> --}}
                @php
                    $banner_title = 'Instructors';
                    $banner_image = 'public/frontend/infixlmstheme/img/images/Teacher Explaining.jpg';
                    $btn_title = auth()->check() ? '' : 'Become an Instructor';
                @endphp
                <x-breadcrumb :banner="$banner_image" :title="$banner_title" :btntitle="$btn_title" :btnclass="'btn_responsive openModal'" />
            </div>
        </div>


        <!-- Main heading Section  -->
        <div class="container mt-3">
            <div class="row pt-md-5 pt-2 px-md-4">
                <div class="col-md-6 col-12 px-md-0" data-aos="fade-right">
                    <img src="{{ asset('public/assets/Instructor 1.jpg') }}" class="custom_height_1 mx-lg-5">
                </div>

                <div class=" d-flex align-items-center col-md-6 col-12 px-lg-5 px-3" data-aos="fade-left"
                    data-aos-delay="500">
                    <div class="pl-md-5 pt-3 pt-md-0">
                        <div class="custom_height_2 overflow-auto hide-scrollbar">
                        <h2 class="custom_small_heading mt-2 mt-lg-0 font-weight-bold">
                            Why Join Merkaii Xcellence Prep?
                        </h2>
                        <p class="text-justify shadow-p right-divv">
                            As a faculty member at Merkaii Xcellence Prep, you will have the opportunity to:
                        </p>
                        <p><span class="font-weight-bold">Shape the Future of Healthcare:</span> You will play a vital role in educating the 
                            next generation of medical professionals who will define the future of 
                            healthcare.
                        </p>
                        <p><span class="font-weight-bold">Work with a Collaborative and Passionate Team:</span> Our faculty is 
                            comprised of experienced and dedicated educators who are passionate about 
                            sharing their knowledge and expertise.
                        </p>
                        <p><span class="font-weight-bold">Be at the Forefront of Medical Education:</span> We are constantly innovating 
                            and developing new teaching methods to ensure our students receive the best
                            possible education.
                        </p>
                        <p><span class="font-weight-bold">Enjoy a Supportive and Rewarding Work Environment:</span> We value our 
                            faculty and provide them with the support and resources they need to 
                            succeed.
                        </p>
                        <p><span class="font-weight-bold">Teacher Well-Being:</span> We believe that happy teachers are the foundation of 
                            successful students. By taking exceptional care of our educators, we ensure 
                            they can focus wholeheartedly on their goals, bringing passion and dedication 
                            to every lesson.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
        
        <!-- profile slidder -->


        <div class="container py-md-5 py-3">
            <div class="row mx-2 mx-xl-5">
                <div class="col-md-12">
                    <h2 class="custom_small_heading font-weight-bold pb-md-5 pb-3 text-center">
                        Merakii Tutors use Saunders and Elsevier for Tutoring</h2>
                </div>
                @forelse ($instructors as $instructor)
                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4 d-flex justify-content-center">
                        <div class="quiz_wizged card rounded-card shadow">
                            <div class="card-header rounded-card-header p-0">
                                <a href="{{ route('tutorDetails', [$instructor->id, Str::slug($instructor->name, '-')]) }}">
                                    <img src="{{ getInstructorImage($instructor->image) }}" alt="Avatar"
                                        class="img-fluid w-100 rounded-card-img" style="height: 52vh; object-fit:cover;">
                                </a>
                            </div>
                            <div class="card-body row">
                                <div class="col-8 col-md-10 px-2 pt-3">
                                    <a
                                        href="{{ route('tutorDetails', [$instructor->id, Str::slug($instructor->name, '-')]) }}">
                                        <h5 class="font-weight-bold">{{ $instructor->name }}</h5>
                                    </a>
                                </div>
                                <div class="col-4 col-md-2 px-2">
                                    <h5 class="font-weight-bold float-right pt-3">{{ $instructor->total_tutor_rating }}
                                    </h5>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-5 col-sm-5 col-6 px-2">
                                    <span>{{ __('frontend.Course Rating') }}</span>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-7 col-sm-7 col-6 px-2">
                                    <span class="float-right">
                                        @php
                                            $main_stars = $instructor->total_tutor_rating;
                                            $stars = intval($instructor->total_tutor_rating);
                                        @endphp
                                        @for ($i = 0; $i < $stars; $i++)
                                            <i class="fas fa-star text-warning fa-sm"></i>
                                        @endfor
                                        @if ($main_stars > $stars)
                                            <i class="fas fa-star-half fa-sm"></i>
                                        @endif
                                        @if ($main_stars == 0)
                                            @for ($i = 0; $i < 5; $i++)
                                                <i class="far fa-star fa-sm"></i>
                                            @endfor
                                        @endif
                                    </span>
                                </div>
                                <div class="col-7 px-2">
                                    <span>Total Hours:</span>
                                </div>
                                <div class="col-5 px-2">
                                    <span class="float-right">{{ $instructor->total_hours }} Hrs.</span>
                                </div>
                                <div class="col-7 px-2">
                                    <span>Tutor:</span>
                                </div>
                                <div class="col-5 px-2">
                                    <span class="float-right">
                                        {{ $instructor->tutor_type == 1 ? 'Nursing' : 'Gen-Ed' }}
                                    </span>
                                </div>
                                <div class="col-7 px-2 ">
                                    <span>Price:</span>
                                </div>
                                <div class="col-5 px-2">
                                    <span class="float-right">${{ $instructor->tutor_price }}/hr.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No Tutor Found</p>
                @endforelse
                <div class="col-md-12 {{ count($instructors) ? 'd-block' : 'd-none' }}">
                    {{ $instructors->links() }}
                </div>
            </div>
        </div>

        <!-- becomeInsructor section  -->
        <div class="row custom_section_color mb-md-5 mb-4">
            <div class="col-md-6 px-lg-4 mb-4 px-3 d-flex align-items-center">
                <div class="pt-md-5 pt-3 custom-l-padd pl-sm-5 p-2" data-aos="fade-right">
                    <h2 class="custom_small_heading font-weight-bold">
                        Lorem ipsum dolor sit amet consecter
                        Lorem ipsum dolor sit amet consecter
                    </h2>
                    @if (!auth()->check())
                        <button
                            class="border-purple text-purple font-weight-bold hit btn_responsive mt-3 px-2 px-md-3 py-2 openModal">
                            Become
                            an
                            Instructor
                        </button>
                    @endif
                </div>
            </div>
            <div class="col-md-6 px-0" data-aos="fade-left">
                <div>
                    <img src="{{ asset('public/assets/Instructor2.jpg') }}" class="custom_height_2">
                </div>
            </div>
        </div>
        <div class="modal fade instructor-2" id="becomeAnInstructor" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close-modal theme_btn small_btn4 px-3 py-2 closeModal"
                            aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body p-0">
                        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data"
                            id="Instructor_reqister">
                            @csrf
                            <input name="type" value="Instructor" type="hidden">
                            <input name="role_id" value="2" type="hidden">

                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="custom_small_heading my-3 text-center">
                                            Become an Instructor
                                        </h2>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">What position are you applying?<span>*</span></label>
                                        <select name="instructor_position_id"
                                            class="form-select text_small form-control @if ($errors->first('instructor_position_id')) is-invalid @endif"
                                            aria-label="Default select example" required>
                                            <option value="" selected>--SELECT--</option>
                                            @foreach ($postions as $postion)
                                                <option value="{{ $postion->id }}"
                                                    {{ (string) $postion->id == old('instructor_position_id') ? 'selected' : '' }}>
                                                    {{ $postion->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">How did you hear about us ?<span>*</span></label>
                                        <select name="instructor_hear_id"
                                            class="form-select text_small form-control @if ($errors->first('instructor_hear_id')) is-invalid @endif"
                                            aria-label="Default select example" required>
                                            <option value="" selected>--SELECT--</option>
                                            @foreach ($hears as $hear)
                                                <option value="{{ $hear->id }}"
                                                    {{ (string) $hear->id == old('instructor_hear_id') ? 'selected' : '' }}>
                                                    {{ $hear->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form_content">
                                        <label class="mb-0 mt-2 form_label">Start Date</label>
                                        <input name="start_date" id="start_date"
                                            class="input--style-1 js-datepicker text_small form-control @if ($errors->first('start_date')) is-invalid @endif"
                                            type="date" placeholder="" name="birthday"
                                            value="{{ old('start_date') }}">
                                    </div>

                                    <!-- personal information section  -->
                                    <div class="col-md-12">
                                        <h2 class="custom_small_heading my-3 text-center">
                                            Personal Information
                                        </h2>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">First Name<span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('first_name')) is-invalid @endif"
                                            type="text" placeholder="" name="first_name"
                                            value="{{ old('first_name') }}" required>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Middle Name</label>
                                        <input
                                            class="text_small form-control @if ($errors->first('middle_name')) is-invalid @endif"
                                            type="text" placeholder="" name="middle_name"
                                            value="{{ old('middle_name') }}">
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Last Name<span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('last_name')) is-invalid @endif"
                                            type="text" placeholder="" name="last_name"
                                            value="{{ old('last_name') }}" required>
                                    </div>

                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Gender<span>*</span></label>
                                        <select name="gender"
                                            class="form-select text_small form-control @if ($errors->first('gender')) is-invalid @endif"
                                            aria-label="Default select example" required>
                                            <option value="" selected>--SELECT--</option>
                                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>
                                                Male
                                            </option>
                                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>
                                                Female
                                            </option>
                                            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>
                                                Other
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Date of Birth<span>*</span></label>
                                        <input id="datepicker"
                                            class="text_small form-control @if ($errors->first('dob')) is-invalid @endif"
                                            type="date" placeholder="" name="dob" value="{{ old('dob') }}"
                                            required>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Email<span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('email')) is-invalid @endif"
                                            type="email" placeholder="" name="email" value="{{ old('email') }}"
                                            required>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Phone (Home)</label>
                                        <input
                                            class="text_small form-control @if ($errors->first('phone')) is-invalid @endif"
                                            maxlength="14" type="text" placeholder="" name="phone"
                                            value="{{ old('phone') }}"
                                            onKeyPress="if(this.value.length==14) return false;">
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Cell<span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('cell')) is-invalid @endif"
                                            maxlength="14" type="text" placeholder="" name="cell"
                                            value="{{ old('cell') }}"
                                            onKeyPress="if(this.value.length==14) return false;" required>
                                    </div>
                                    <div class="col-lg-3 col-sm-4 form_content">
                                        <label class="mb-0 mt-2 form_label">Work</label>
                                        <textarea name="work" class="text_small form-control @if ($errors->first('work')) is-invalid @endif"
                                            >{{ old('work') }}</textarea>
                                    </div>
                                    <div class="col-lg-9 col-sm-8 form_content">
                                        <label class="mb-0 mt-2 form_label">Address<span>*</span></label>
                                        <textarea name="address" class="text_small form-control @if ($errors->first('address')) is-invalid @endif"
                                            required >{{ old('address') }}</textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <h2 class="custom_small_heading my-3 text-center">
                                            School Information
                                        </h2>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">High School/GED<span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('high_school')) is-invalid @endif"
                                            type="text" placeholder="" name="high_school"
                                            value="{{ old('high_school') }}" required>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Year Attended<span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('school_years_attended')) is-invalid @endif"
                                            type="date" placeholder="" name="school_years_attended"
                                            value="{{ old('school_years_attended') }}" required>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Graduates<span>*</span></label>
                                        <select name="school_year_graduate"
                                            class="form-select text_small form-control @if ($errors->first('school_year_graduate')) is-invalid @endif"
                                            aria-label="Default select example" required>
                                            <option value="" selected>--SELECT--</option>
                                            <option value="yes"
                                                {{ 'yes' == old('school_year_graduate') ? 'selected' : '' }}>
                                                Yes
                                            </option>
                                            <option value="no"
                                                {{ 'no' == old('school_year_graduate') ? 'selected' : '' }}>
                                                No
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Degree/Major<span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('school_degree')) is-invalid @endif"
                                            type="text" placeholder="" name="school_degree"
                                            value="{{ old('school_degree') }}" required>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">College<span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('college')) is-invalid @endif"
                                            type="text" placeholder="" name="college" value="{{ old('college') }}"
                                            required>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Year Attended<span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('college_email')) is-invalid @endif"
                                            type="date" placeholder="" name="college_email"
                                            value="{{ old('college_email') }}" required>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Graduates<span>*</span></label>
                                        <select name="college_graduate"
                                            class="form-select text_small form-control @if ($errors->first('college_graduate')) is-invalid @endif"
                                            aria-label="Default select example" value="{{ old('f_name') }}" required>
                                            <option value="" selected>--SELECT--</option>
                                            <option value="yes"
                                                {{ 'yes' == old('college_graduate') ? 'selected' : '' }}>
                                                Yes
                                            </option>
                                            <option value="no"
                                                {{ 'no' == old('college_graduate') ? 'selected' : '' }}>No
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Trade or Correspondence School</label>
                                        <input
                                            class="text_small form-control @if ($errors->first('trade_school')) is-invalid @endif"
                                            type="text" placeholder="" name="trade_school"
                                            value="{{ old('trade_school') }}">
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Degree/Major<span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('trade_degree')) is-invalid @endif"
                                            type="text" placeholder="" name="trade_degree"
                                            value="{{ old('trade_degree') }}"required>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Year Attended<span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('trade_years_attended')) is-invalid @endif"
                                            type="date" placeholder="" name="trade_years_attended"
                                            value="{{ old('trade_years_attended') }}"required>
                                    </div>

                                    <div class="col-lg-3 form_content">
                                        <label class="mb-0 mt-2 form_label">Graduates<span>*</span></label>
                                        <select name="trade_year_graduate"
                                            class="form-select text_small form-control @if ($errors->first('trade_year_graduate')) is-invalid @endif"
                                            aria-label="Default select example"required>
                                            <option value="" selected>--SELECT--</option>
                                            <option value="yes"
                                                {{ 'yes' == old('trade_year_graduate') ? 'selected' : '' }}>
                                                Yes
                                            </option>
                                            <option value="no"
                                                {{ 'no' == old('trade_year_graduate') ? 'selected' : '' }}>
                                                No
                                            </option>
                                        </select>
                                    </div>

                                    <!-- Teaching Experience section  -->
                                    <div class="col-md-12">
                                        <h2 class="custom_small_heading my-3 text-center">
                                            Teaching Experience
                                        </h2>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Current Position<span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('current_position')) is-invalid @endif"
                                            type="text" placeholder="" name="current_position"
                                            value="{{ old('current_position') }}"required>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 form_content">
                                        <label class="mb-0 mt-2">Employer's Phone Number <span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('Teach_phone')) is-invalid @endif"
                                            type="text" placeholder="" name="Teach_phone" maxlength="14"
                                            value="{{ old('Teach_phone') }}"
                                            onKeyPress="if(this.value.length==14) return false;"required>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Employer Name <span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('employee_name')) is-invalid @endif"
                                            type="text" placeholder="" name="employee_name"
                                            value="{{ old('employee_name') }}"required>
                                    </div>
                                    <div class="col-lg-5 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Position Start Date<span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('date_employer_start')) is-invalid @endif"
                                            type="date" placeholder="" name="date_employer_start"
                                            value="{{ old('date_employer_start') }}"required>
                                    </div>
                                    <div class="col-lg-5 col-sm-7 form_content">
                                        <div id="end_date_div"
                                            style="{{ old('currently_employed') ? 'display:none;' : '' }}">
                                            <label class="mb-0 mt-2 form_label">Position End Date<span>*</span></label>
                                            <input
                                                class="text_small form-control @if ($errors->first('date_employer_end')) is-invalid @endif"
                                                type="date" placeholder="" name="date_employer_end"
                                                value="{{ old('date_employer_end') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-5 d-flex justify-content-center align-items-center mt-3 gap-2">
                                        <input class="@if ($errors->first('currently_employed')) is-invalid @endif"
                                            type="checkbox" id="postion" name="currently_employed"
                                            {{ old('currently_employed') ? 'checked' : '' }}>
                                        <label class="mb-0" for="postion">Currently Employed?</label><br>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Supervisor Name<span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('supervisor_name')) is-invalid @endif"
                                            type="text" placeholder="" name="supervisor_name"
                                            value="{{ old('supervisor_name') }}" required>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Upload Resume<span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('upload_resume')) is-invalid @endif"
                                            type="file" placeholder="" name="upload_resume" accept=".doc,.docx,.pdf"
                                            required>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Upload Coverletter<span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('cover_letter')) is-invalid @endif"
                                            type="file" placeholder="" name="cover_letter" accept=".doc,.docx,.pdf"
                                            required>
                                    </div>
                                    <div class="col-md-12 form_content">
                                        <label class="mb-0 mt-2 form_label">Address<span>*</span></label>
                                        <textarea name="employer_address"
                                            class="text_small form-control @if ($errors->first('employer_address')) is-invalid @endif"
                                            required>{{ old('employer_address') }}</textarea>
                                    </div>
                                    <div class="col-md-auto ml-auto mt-3">
                                        <button type="button"
                                            class="btn btn-secondary close-modal closeModal">Close</button>
                                        <button type="submit" class="btn small_btn4 theme_btn">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include(theme('partials._custom_footer'))
    {{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

        });
    </script>

    {{--    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script> --}}
    <script src="{{ asset('public/assets/slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>
    <script>
        $('.custom_slick_slider_03').slick({
            "slidesToShow": 4,
            "pauseOnHover": true,
            "autoplay": true,
            "infinite": true,
            "dots": false,
            "arrows": false,
            "responsive": [{
                    "breakpoint": 1400,
                    "settings": {
                        "slidesToShow": 4
                    }
                },
                {
                    "breakpoint": 1200,
                    "settings": {
                        "slidesToShow": 3
                    }
                },
                {
                    "breakpoint": 992,
                    "settings": {
                        "slidesToShow": 2
                    }
                },
                {
                    "breakpoint": 768,
                    "settings": {
                        "slidesToShow": 2
                    }
                },
                {
                    "breakpoint": 576,
                    "settings": {
                        "slidesToShow": 1
                    }
                }
            ]
        });
    </script>

    <script>
        $(document).ready(function() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById("datepicker").setAttribute('max', today);
            document.getElementById("start_date").setAttribute('min', today);

            $('#postion').change(function() {
                if ($(this).is(':checked')) {
                    $('#end_date_div').hide();
                } else {
                    $('#end_date_div').show();
                }
            });

            // $("#datepicker").datepicker({
            //     dateFormat: 'dd/mm/yy',
            //     maxDate:'0'
            // });
            // $("#start_date").datepicker({
            //     dateFormat: 'dd/mm/yy',
            //     minDate:'0'
            // });
        });
        $(".hit").click(function() {
            $('#becomeAnInstructor').modal('show');
            // $('.popup').removeClass('d-none');

        });
        $('.close-modal').click(modalFormControl);

        if (window.location.hash) {
            let hash = window.location.hash;
            $(hash).modal('show');
        }


        function modalFormControl() {
            var form = $('#Instructor_reqister');
            form.find('.is-invalid').removeClass('is-invalid');
            form.find('.is-invalid, .is-focused, .is-filled').removeClass(["is-invalid", "is-focused",
                "is-filled"
            ]);
            form.find('#category_id').val(null).trigger('change');
            form.find('.invalid-feedback').children().text('');
            form.trigger("reset");


            $('.modal-backdrop').removeClass('show');
            $('.modal-backdrop').removeClass('fade');
            $('.modal-backdrop').removeClass('modal-backdrop');
            form.parents('.modal').removeClass('show');
            form.parents('.modal').removeClass('fade');
            form.parents('.modal').attr('style', '');
            form.parents('.modal').modal('hide');

        }
    </script>
    @if (count($errors))
        <script>
            $('#becomeAnInstructor').modal('show');
        </script>
    @endif

    <!-- Optional JavaScript; select of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
        // Add event listener to elements with class 'openModal'
        var openModalButtons = document.getElementsByClassName('openModal');
        for (var i = 0; i < openModalButtons.length; i++) {
            openModalButtons[i].addEventListener('click', function() {
                var instructors = document.getElementsByClassName('instructor-2');
                for (var j = 0; j < instructors.length; j++) {
                    instructors[j].style.display = 'block';
                }
                document.body.classList.add('modal-open');
                document.documentElement.style.overflow = 'hidden';
                document.body.style.overflow = 'hidden';
                document.getElementById('modalContent').addEventListener('scroll', function(event) {
                    event.stopPropagation();
                });
            });
        }

        // Add event listener to elements with class 'closeModal'
        var closeModalButtons = document.getElementsByClassName('closeModal');
        for (var k = 0; k < closeModalButtons.length; k++) {
            closeModalButtons[k].addEventListener('click', function() {
                var instructors = document.getElementsByClassName('instructor-2');
                for (var l = 0; l < instructors.length; l++) {
                    instructors[l].style.display = 'none';
                }
                document.body.classList.remove('modal-open');
                document.documentElement.style.overflow = '';
                document.body.style.overflow = '';
            });
        }
    </script>

    {{-- <script>
        $(".hit").click(function() {
            $('.popup').removeClass('d-none');

        });
        $(".model-close").click(function() {

            $('.popup').addClass('d-none');

        })
    </script> --}}
    <!-- Optional JavaScript; select of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> --}}
@endsection
