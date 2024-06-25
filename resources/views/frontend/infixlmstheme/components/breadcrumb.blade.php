<div>
    @php
     $banner = ($slider_info && $slider_info->image!='') ? $slider_info->image : $banner;
     $title = ($slider_info && $slider_info->title!='') ? $slider_info->title : $title;
     $sub_title = ($slider_info && $slider_info->sub_title!='') ? $slider_info->sub_title : $sub_title;
     $btntitle = ($slider_info && $slider_info->btn_title1!='') ? $slider_info->btn_title1 : $btntitle;
     $btnlink = ($slider_info && $slider_info->btn_link1!='') ? $slider_info->btn_link1 : $btnlink;
     $btnclass = $btnclass ?? '';
    @endphp
    <div class="breadcrumb_area bradcam_bg_2" @if($banner != null) style="background-image: url('{{ asset(@$banner) }}')" @endif>

        <div class="col-lg-10 offset-1">
            <div class="breadcam_wrap">
                <h1 class="custom-heading" style="white-space: nowrap;">
                    {{ @$title }}
                </h1>
                <p class="text-light">
                    {{ @$sub_title }}
                </p>
                
                @if($btntitle!='')
                    <button class="font-weight-bold hit ml-1 bg-transparent px-2 px-md-3 py-2 text-white {{ $btnclass }}"> {{$btntitle}} </button>
                @endif
            </div>
        </div>
    </div>
