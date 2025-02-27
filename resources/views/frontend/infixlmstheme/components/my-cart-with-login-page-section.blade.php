<div>
    <div class="cart_wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="new_cart_wrapper">
                        <h4>{{ __('coupons.My Cart') }}</h4>

                        @if (count($carts) == 0)
                            <div class="col-lg-12">
                                <h3 class="text-secondary text-center"> {{ __('common.No Item found') }} <i
                                        class="fa fa-shopping-cart" aria-hidden="true"></i>
                                </h3>
                            </div>
                        @else
                            @php $totalSum=0; @endphp

                            @if (isset($carts))
                                @foreach ($carts as $key => $cart)
                                    @if (!empty($cart->course_id))
                                        @php
                                            if (isset($cart->course->parent)) {
                                                $course_title = $cart->course->parent->title;
                                            } else {
                                                $course_title = $cart->course->title;
                                            }
                                            if (count($cart->course->children)) {
                                                foreach ($cart->course->children as $child) {
                                                    if ($cart->course_type == $child->type) {
                                                        $thumbnail = $child->thumbnail;
                                                        break;
                                                    } else {
                                                        $thumbnail = $cart->course->thumbnail;
                                                    }
                                                }
                                            } else {
                                                $thumbnail = $cart->course->thumbnail;
                                            }
                                            
                                            $link = courseDetailsUrl($cart->course->id, $cart->course->type, $cart->course->slug);
                                            $title = $course_title;
                                            if ($cart->course->discount_price > 0) {
                                                $price = $cart->course->discount_price;
                                            } else {
                                                $price = $cart->price;
                                            }
                                            
                                            $totalSum = $totalSum + $price;
                                            
                                        @endphp

                                        <div class="single_cart">
                                            <div class="product_name d-flex align-items-center">
                                                <a href="{{ route('removeItem', [$cart->id]) }}">
                                                    <div class="">

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" viewBox="0 0 16 16">
                                                            <path data-name="Path 174" d="M0,0H16V16H0Z"
                                                                fill="none" />
                                                            <path data-name="Path 175"
                                                                d="M14.95,6l-1-1L9.975,8.973,6,5,5,6,8.973,9.975,5,13.948l1,1,3.973-3.973,3.973,3.973,1-1L10.977,9.975Z"
                                                                transform="translate(-1.975 -1.975)"
                                                                fill="var(--system_primery_color)" />
                                                        </svg>
                                                    </div>
                                                </a>
                                                <div class="thumb">
                                                    <img src="{{ asset($thumbnail) }}" alt="">
                                                </div>
                                                <span>
                                                    <a href="{{ $link }}">
                                                        <h5>{{ $title }}</h5>
                                                    </a>
                                                </span>
                                            </div>

                                            <div class="f_w_400">{{ getPriceFormat($price) }}</div>

                                        </div>
                                    @else
                                        @php
                                            
                                            // if (isset($cart->bundle_course_id) && $cart->bundle_course_id!=0){
                                            //$thumbnail=$cart->bundle->thumbnail;
                                            // $price=$cart->bundle->price;
                                            //$link=route('bundle.show').'?id='.$cart->bundle_course_id;
                                            //$title =$cart->bundle->title;
                                            // }else{
                                            $thumbnail = $cart->program->icon;
                                            $link = route('programs.detail', $cart->program->id);
                                            $title = $cart->program->programtitle;
                                            if ($cart->program->discount_price > 0) {
                                                $price = $cart->program->discount_price;
                                            } else {
                                                $price = $cart->price;
                                            }
                                            //}
                                            
                                            $totalSum = $totalSum + $price;
                                            
                                        @endphp

                                        <div class="single_cart">
                                            <div class="product_name d-flex align-items-center">
                                                <a href="{{ route('removeItem', [$cart->id]) }}">
                                                    <div class="">

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" viewBox="0 0 16 16">
                                                            <path data-name="Path 174" d="M0,0H16V16H0Z"
                                                                fill="none" />
                                                            <path data-name="Path 175"
                                                                d="M14.95,6l-1-1L9.975,8.973,6,5,5,6,8.973,9.975,5,13.948l1,1,3.973-3.973,3.973,3.973,1-1L10.977,9.975Z"
                                                                transform="translate(-1.975 -1.975)"
                                                                fill="var(--system_primery_color)" />
                                                        </svg>
                                                    </div>
                                                </a>
                                                <div class="thumb">
                                                    <img src="{{ asset($thumbnail) }}" alt="">
                                                </div>
                                                <span>
                                                    <a href="{{ $link }}">
                                                        <h5>{{ $title }}</h5>
                                                    </a>
                                                </span>
                                            </div>

                                            <div class="f_w_400">{{ getPriceFormat($price) }}</div>

                                        </div>
                                    @endif
                                @endforeach

                            @endif



                        @endif
                    </div>
                    <div class="cart_table_wrapper mb-0">
                        @if (count($carts) != 0)
                            <div class="row mt_30">
                                <div class="col-12 text-right">
                                    <a href="{{ route('CheckOut') }}"
                                        class="theme_btn">{{ __('student.Proceed to checkout') }}</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
