@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Our Pricings') }}
@endsection
{{-- @section('css') --}}
<script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>
<style>
    body {
        font-family: sans-serif;
        font-style: normal;
        font-weight: 400;
    }

    .custom_span_color {
        color: #ff7600;
    }

    .title_des {
        font-size: 22px;
    }

    .paragraph_custom_height {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        overflow: hidden;
    }

    li {
        list-style-type: disclosure-closed !important;
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

    .btn_responsive {
        font-size: 21px !important;
    }

    .btn_responsive:hover {
        background-color: var(--system_primery_color) !important;
        border-color: var(--system_primery_color) !important;
        transition: 0.3s ease !important;
    }

    label p {
        color: red !important;
        display: inline !important;
    }

    .price-card__plan--v2 {
        color: #17171a;
        letter-spacing: -.04em;
        margin-bottom: 0;
        margin-right: 12px;
        font-size: 40px;
        font-weight: 800;
        line-height: 110%;
        display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 1;
    overflow: hidden;
    }
    .pricing-para{
        display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
    overflow: hidden;
    min-height: 10vh;
    }

    .price-card__price--v2 {
        color: #1a0027;
        font-size: 40px;
        font-weight: 600;
        line-height: 40px;
        text-align: center;
    }

    .pricing__text--14 {
        color: #0d1216;
        text-align: center;
        font-size: 14px;
        line-height: 22px;
    }

    .button-tb.button-tb--cta.is--pricing {
        width: 80%;
        height: 50px;
        background-size: 2.1rem 2.1rem;
        display: flex;
    }


    .button-tb.button-tb--cta {
        color: #fff;
        text-transform: none;
        white-space: nowrap;
        background-color: #996699;
        background-image: url("{{ asset('public/frontend/infixlmstheme/img/images/6446624444e808612b7591de_jasper-button-arrow.svg') }}");
        background-position: 7px;
        background-repeat: no-repeat;
        background-size: 1.875rem 1.875rem;
        border-color: #996699;
        padding-left: 47px;
        font-weight: 500;
        overflow: visible;
        box-shadow: 0 7px 29px rgba(0, 0, 0, .2);
        transition: .4s ease-in-out;
    }

    .button-tb {
        width: auto;
        min-height: 43px;
        color: #000;
        text-align: center;
        cursor: pointer;
        background-color: transparent;
        border: 1px solid #996699;
        border-radius: 500px;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        padding: 12.5px 24px;
        font-family: Avantt, sans-serif;
        font-size: 18px;
        font-weight: 500;
        line-height: 1.05;
        transition: all .3s;
        display: block;
    }

    .price-card__small-text {
        color: rgba(13, 18, 22, .86);
        font-size: 14px;
        font-weight: 700;
        line-height: 22px;
    }

    .pricing__text--12 {
        color: #0d1216;
        border-bottom: 1px #d4dce5;
        margin-top: 0;
        margin-bottom: 0;
        padding-bottom: 0;
        font-size: 12px;
        font-weight: 500;
        line-height: 1.5em;
        display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 1;
    overflow: hidden;
    }

    .feature {
        width: 100%;
        height: 40px;
        color: #fff;
        text-align: left;
        align-items: center;
        padding-top: 12px;
        padding-bottom: 12px;
        font-size: 14px;
        display: flex;
        position: relative;
    }

    .feature-icon {
        width: 16px;
        height: 16px;
        margin-top: 4px;
        margin-bottom: 4px;
        margin-right: 16px;
    }

    .custom_card_plan {

        width: 100%;
        max-width: 352px;
        padding: 20px;
        border-radius: 25px !important;

    }

    .button-tb.button-tb--cta:hover {
        background-position: top 50% right 7px;
    }

    .button-tb.button-tb--cta:hover {
    background-position: 97%;
    padding-left: 24px;
    padding-right: 47px;
    background-color: #fff !important;
    color: #000 !important;
    border-color: white !important;
}

    .pricing-per-mo.top-align {
        align-self: flex-start;
    }

    .pricing-per-mo {
        color: #1a0027;
        align-self: flex-end;
        font-weight: 600;
    }

    .pricing-per-mo {
        color: #1a0027;
        align-self: flex-end;
        font-weight: 600;
    }

    .button-tb.button-tb--cta.button-tb--blue {
        background-color: #0079a8;
        border-color: #0079a8;
    }

    .button-tb--orange {
        background-color: var(--system_primery_color) !important;
        border-color: #ff7600 !important;
    }

    .heading_1_color {
        color: #996699 !important;
    }

    .heading_2_color {
        color: #0079a8 !important;
    }

    .heading_3_color {
        color: #ff7600 !important;
    }
    @media only screen and (max-width: 767px){
        .custom_heading_1{
            font-size: 25px !important;
        }
    }
</style>
@section('mainContent')
    {{-- @dd($courses) --}}
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-md-12 px-0">
                <div class="breadcrumb_area position-relative">
                    <div class="w-100 h-100 position-absolute bottom-0 left-0">
                        <img alt="Banner Image" class="w-100 h-100 img-cover"
                            src="{{ asset('public/frontend/infixlmstheme/img/images/courses-4.jpg') }}">
                    </div>
                    <div class="col-lg-9 offset-1">
                        <div class="breadcam_wrap">&nbsp;
                            <h2 class="text-white custom-heading">Our Pricings</h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (isTutor() || !auth()->check())
            <div class="section-margin-y container px-md-5 my-md-5 my-3">
                <div class="row justify-content-center px-md-5">
                    <div class="col-md-12 text-center">
                        <h2 class="font-weight-bold custom_heading_1 mb-md-5 mb-3">Check Out Our Pricings</h2>
                    </div>
                    @foreach ($packages as $package)
                        @php
                            if ($loop->iteration == 1) {
                                $heading = 'heading_1_color';
                                $button = '';
                            } elseif ($loop->iteration == 2) {
                                $heading = 'heading_2_color';
                                $button = 'button-tb--blue';
                            } elseif ($loop->iteration == 3) {
                                $heading = 'heading_3_color';
                                $button = 'button-tb--orange';
                            }
                        @endphp
                        <div class="col-lg-4 col-sm-6 justify-content-center d-flex mb-3">
                            <div class="card custom_card_plan shadow">
                                <div class="card-body">
                                    <h4 class="price-card__plan--v2 {{ $heading }}">
                                        {{ $package->title ?? 'Coming Soon' }}</h4>
                                    <p class="mb-4 pricing-para">{{ $package->description ?? 'Coming Soon' }}</p>

                                    <div class="d-flex gap-4">
                                        <div class="pricing-per-mo top-align">$</div>
                                        <div annual-price="" monthly-price="" class="price-card__price--v2">
                                            {{ $package->price ?? 'Coming Soon' }}</div>
                                        <div class="pricing-per-mo">/mo</div>
                                    </div>

                                    <div class="d-flex justify-content-center my-4">
                                        {{-- <a href="{{ route('packageBuy', ['id' => Crypt::encrypt($package->id), 'type' => Crypt::encrypt('package'), 'price' => Crypt::encrypt($package->price)]) }}"
                                            class="button-tb button-tb--cta is--pricing w-100 {{ $button }}">Buy
                                            Now</a> --}}
                                        <a href="{{ route('packageBuy', ['id' => Crypt::encrypt($package->id)]) }}"
                                            class="button-tb button-tb--cta is--pricing w-100 {{ $button }}">Buy
                                            Now</a>
                                    </div>
                                    <div class="price-card__small-text">This includes:</div>
                                    <div class="d-flex gap_10 feature">
                                        <img src="{{ asset('public/frontend/infixlmstheme/img/images/644747948ed80c4627bec09d_Check.svg') }}"
                                            alt="" class="feature-icon">
                                        <p class="pricing__text--12">
                                            {{ isset($package->allowed_courses) ? 'Can Upload ' . $package->allowed_courses . ' Courses' : 'Coming Soon' }}
                                        </p>
                                    </div>
                                    <div class="d-flex gap_10 feature">
                                        <img src="{{ asset('public/frontend/infixlmstheme/img/images/644747948ed80c4627bec09d_Check.svg') }}"
                                            alt="" class="feature-icon">
                                        <p class="pricing__text--12">{{ $package->option_1 ?? 'Coming Soon' }}</p>
                                    </div>
                                    <div class="d-flex gap_10 feature">
                                        <img src="{{ asset('public/frontend/infixlmstheme/img/images/644747948ed80c4627bec09d_Check.svg') }}"
                                            alt="" class="feature-icon">
                                        <p class="pricing__text--12">{{ $package->option_2 ?? 'Coming Soon' }}</p>
                                    </div>
                                    <div class="d-flex gap_10 feature">
                                        <img src="{{ asset('public/frontend/infixlmstheme/img/images/644747948ed80c4627bec09d_Check.svg') }}"
                                            alt="" class="feature-icon">
                                        <p class="pricing__text--12">{{ $package->option_3 ?? 'Coming Soon' }}</p>
                                    </div>
                                    <div class="d-flex gap_10 feature">
                                        <img src="{{ asset('public/frontend/infixlmstheme/img/images/644747948ed80c4627bec09d_Check.svg') }}"
                                            alt="" class="feature-icon">
                                        <p class="pricing__text--12">{{ $package->option_4 ?? 'Coming Soon' }}</p>
                                    </div>
                                    <div class="d-flex gap_10 feature">
                                        <img src="{{ asset('public/frontend/infixlmstheme/img/images/644747948ed80c4627bec09d_Check.svg') }}"
                                            alt="" class="feature-icon">
                                        <p class="pricing__text--12">{{ $package->option_5 ?? 'Coming Soon' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-12 mt-md-4 mt-3 mb-2 mb-md-0 text-center">
                        <a href="{{ route('skipPricing') }}" class="small_btn3 theme_btn" onclick="showMsg()">Skip,
                            Remind me
                            Later</a>
                    </div>
                </div>
            </div>
        @endif
    </div>

    @include(theme('partials._custom_footer'))
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

        });
        $(".hit").click(function() {
            $('#exampleModal').modal('show');
        });
        $(".close-modal").click(function() {
            $('#exampleModal').modal('hide');
        });
    </script>
    @if (count($errors))
        <script>
            $('#exampleModal').modal('show');
        </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
@endsection
