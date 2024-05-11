{{-- <div class="who_we_area  px-md-5 px-1 ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="who_we_info">
                    <div class="info_left">
                        <span>{{ __('frontendmanage.Who We Are') }}</span>
                        <p>{{ $who_we_are }}</p>
                    </div>
                    <div class="info_right">
                        <p>{{ $banner_title }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="mb-5 mt-4 px-1 px-md-5 row mx-0">
    <div
        class=" col-md-6 d-flex flex-column justify-content-center responsive_card"style="
    height: 350px; border: 1px solid #e9e7f7;
   ">
        <span>{{ __('frontendmanage.Who We Are') }}</span>
        <h4
            style="
        font-family: Source Sans Pro, sans-serif;
        font-size: 24px;
        line-height: 35px;
        font-weight: 700;
        color: var(--system_secendory_color);
    ">
            {{ $who_we_are }}</h4>
    </div>
    <div class="align-items-center col-md-6 d-flex justify-content-center responsive_card"
        style="background-color: #ff6700;  height: 350px;">
        <h4
            style="font-family: Jost, sans-serif;
        font-size: 27px;
        font-weight: 700;
        line-height: 38px;
        color: #fff;">
            {{ $banner_title }}</h4>
    </div>
</div>
