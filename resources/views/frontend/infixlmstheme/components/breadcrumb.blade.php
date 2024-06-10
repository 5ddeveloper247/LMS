<div>
    @php
     $banner = ($slider_info && $slider_info->image!='') ? $slider->image : $banner;
     $title = ($slider_info && $slider_info->title!='') ? $slider->title : $title;
     $sub_title = ($slider_info && $slider_info->sub_title!='') ? $slider->sub_title : $sub_title;
    @endphp
    <div class="breadcrumb_area bradcam_bg_2" @if($banner != null) style="background-image: url('{{ asset(@$banner) }}')" @endif>

        <div class="col-lg-10 offset-1">
            <div class="breadcam_wrap">
                <p class="text-light">
                    {{ @$title }}
                </p>
                <h1 class="custom-heading" style="white-space: nowrap;">
                    {{ @$sub_title }}
                </h1>

            </div>
        </div>
    </div>
