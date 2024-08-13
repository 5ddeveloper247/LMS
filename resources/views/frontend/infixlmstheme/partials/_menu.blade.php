<div class="aoraeditor-skip aoraeditor-header">

    <style>
        .contact_wrap {
            border-radius: 5px;
            border: 1.4px solid var(--system_primery_color);

        }

        .contact_wrap:hover {
            border-radius: 5px;
            border: 1.4px solid var(--system_primery_color);
            color: var(--system_primery_color);
        }

        .login_btn a {
            font-size: 12.5px;
            font-weight: 600;
            color: #eee;
            background-color: var(--system_primery_color);
        }

        .login_btn a:hover {
            color: var(--system_primery_color) !important;
            background-color: #fff !important;
        }

        .fa-lg {
            font-size: 5px;
        }

        .menu-hamburger {
            height: 20px;
            width: 20px;
        }

        .theme_btn.small_btn2 {
            white-space: nowrap;
            /* border-radius: 16px !important; */
        }

        .on_cursor:hover {
            background-color: #eee !important;
            cursor: pointer !important;
        }

        .mobile-menu {
            margin-left: 6rem;
        }

        /* small screen searchbar */
        .search-bar {
            position: absolute;
            /* top: 50%; */
            /* left: 50%; */
            right: 0;
            transform: translate(-50%, -50%);
            background: #8a8787;
            border: #e84118;
            height: 40px;
            border-radius: 40px;
            padding: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .search-bar:hover>.search-txt {
            width: 100%;
            padding: 0 6px;
        }

        .search-btn {
            color: #e84118;
            float: right;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            /* background: #2f3640; */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .search-txt {
            border: none;
            background: none;
            outline: none;
            float: left;
            padding: 0;
            color: black;
            font-size: 16px;
            transition: 0.4s;
            line-height: 40px;
            width: 0px;

        }

        .register-btn-svg svg {
            height: 17px;
        }

        .fa-user {
            font-size: 15px;
        }

        @media only screen and (max-width: 768px) {
            .login_btn {
                display: flex;
                font-family: Jost, sans-serif;
                margin: 0px 0px 0px 18px;
                font-weight: 500;
                width: fit-content;
                border-radius: 16px !important;
            }
            .login_btn a{
                padding: 7px !important
            }
            .login_btn a:hover{
                color: var(--system_primery_color) !important;
                background-color: #fff !important;
                border: 2px solid var(--system_primery_color) !important;
            }

            .search-column {
                display: flex;
                justify-content: right;
                align-items: end
            }

            .search-form .form-group {
                float: right !important;
                transition: all 0.35s, border-radius 0s;
                width: 32px;
                height: 32px;
                background-color: #fff;
                box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
                border-radius: 25px;
                border: 1px solid #ccc;
            }

            .search-form .form-group input.form-control {
                border: 0 none;
                background: transparent;
                box-shadow: none;
                display: block;
                padding-top: 13px;
            }

            .search-form .form-group input.form-control::-webkit-input-placeholder {
                display: none;
            }

            .search-form .form-group input.form-control:-moz-placeholder {

                display: none;
            }

            .search-form .form-group input.form-control::-moz-placeholder {

                display: none;
            }

            .search-form .form-group input.form-control:-ms-input-placeholder {
                display: none;
            }

            .search-form .form-group:hover,
            .search-form .form-group.hover {
                width: 100%;
                /* border-radius: 4px 25px 25px 4px; */
            }

            .search-form .form-group i.form-control-feedback {
                position: absolute;
                top: 50%;
                /* right: 25px; */
                z-index: 2;
                display: block;
                width: 34px;
                height: 34px;
                /* line-height: 34px; */
                text-align: center;
                color: var(--system_primery_color);
                left: initial;
                font-size: 14px;
                transform: translateY(10px);
            }
        }

        @media only screen and (min-width: 769px) and (max-width:992px) {
         
            .login_btn a:hover{
                color: var(--system_primery_color) !important;
                background-color: #fff !important;
                border: 2px solid var(--system_primery_color) !important;
            }
            .login_btn {
                display: flex;
                font-family: Jost, sans-serif;
                margin: 0px 0px 0px 18px;
                font-weight: 500;
                width: fit-content;
            }
            .login_btn a{
                padding: 7px !important
            }
        }

        @media only screen and (min-width: 769px) and (max-width: 1100px) {
            .login_btn a {
                font-size: 11px !important;
               
            }

            .fa-user {
                font-size: 12px;
            }

            .register-btn-svg svg {
                height: 16px;
            }
        }

        @media only screen and (min-width: 1200px) and (max-width:1279px) {
            .login_btn a {
                font-size: 13px;
                color: #eee;
            }
        }

        @media only screen and (min-width: 1800px) {
            .login_btn a {
                font-size: 18px !important;
            }
        }

        @media only screen and (min-width: 2000px) {
            .login_btn a {
                font-size: 20px !important;
            }
        }
    </style>
    <!-- HEADER::START -->

    <header class="main-header">
        <div id="sticky-header" class="header_area py-0 px-0">
            <div class="container-fluid px-0 py-0">
                <div class="row">
                    <!-- <div class="col-12"> -->
                    <div class="col-md-3 col-4 px-0">
                        <!-- header__left__start  -->
                        <div class="d-flex align-items-center pl-4">
                            <div class="logo_img ">
                                <a href="{{ url('/') }}">
                                    <img class="image_size p-1" src="{{ getLogoImage(Settings('logo')) }}"
                                        alt="{{ Settings('site_name') }}">
                                </a>
                            </div>
                            <div class="translator-switch">

                                @if (Settings('frontend_language_translation') == 1)
                                    @php
                                        if (auth()->check()) {
                                            $currentLang = auth()->user()->language_code;
                                        } else {
                                            $currentLang = app()->getLocale();
                                        }
                                    @endphp
                                    <select name="code" id="language_code" class="nice_Select"
                                        onchange="location = this.value;">
                                        @foreach (getLanguageList() as $key => $language)
                                            <option value="{{ route('changeLanguage', $language->code) }}"
                                                @if ($currentLang == $language->code) selected @endif>
                                                {{ $language->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                @endif
                            </div>

                            <div class="category_search category_box_iner ml-sm-5 d-none d-sm-block">
                                {{-- @if (Settings('category_show'))
                                        <div class="input-group-prepend2">
                                            <a href="#" class="categories_menu">
                                                <i class="fas fa-th"></i>
                                                <span>{{__('courses.Category')}}</span>
                                            </a>
                                            <div class="menu_dropdown">
                                                <ul>
                                                    @if (isset($categories))
                                                        @foreach ($categories as $category)

                                                            @include(theme('partials._category'),['category'=>$category,'level'=>1])

                                                        @endforeach
                                                    @endif
                                                </ul>

                                            </div>
                                        </div>
                                    @endif --}}
                                @if (@$homeContent->show_menu_search_box == 1)
                                    <form action="{{ route('search') }}" class="mb-0" id="search_form">
                                        <div class="align-items-center d-none d-sm-flex input-group theme_search_field">
                                            <div class="input-group-prepend">
                                                <button class="btn" type="button" id="button-addon1"><i
                                                        class="ti-search"></i>
                                                </button>
                                            </div>

                                            <input type="text" class="form-control search_courses" name="query"
                                                placeholder="{{ __('Search') }}"
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = '{{ __('Search') }}'">
                                        </div>
                                    </form>
                                @endif
                                <div class="search_courses_list position-absolute"></div>
                            </div>
                        </div>
                    </div>
                    {{-- small screen search --}}

                    {{-- for serch --}}
                    <div class="category_search d-sm-none category_box_iner ml-md-5 mr-2 mr-sm-0">
                        @if (@$homeContent->show_menu_search_box == 1)
                            <form action="{{ route('search') }}" class="mb-0" id="search_form">
                                <div class="align-items-center d-flex d-sm-none input-group theme_search_field" style="position: relative;">
                                    <div class="input-group-prepend" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <button class="btn" type="button" id="button-addon1"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                    
                    <div class="collapse d-md-none" id="collapseExample" style="position: absolute; top:100%; left:10%; width: 80%;">
                        <input type="text" class="form-control search_courses" name="query" id="search_input" placeholder="{{ __('Search') }}"
                               onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ __('Search') }}'" style="position:relative; top: 100%">
                            <div class="search_courses_list position-absolute"></div>
                    </div>
                    

                    {{-- cart --}}
                    @if (Settings('show_cart') == 1 && !Route::is('CheckOut'))
                        <a href="#" class="float notification_wrapper">
                            <div class="notify_icon cart_store">
                                <img style="max-width: 30px; padding-left: 8px; min-width: 36px;"
                                    src="{{ asset('/public/frontend/infixlmstheme/') }}/img/svg/cart_white.svg"
                                    alt="" class="d-none d-sm-block">
                                <i class="fa-solid fa-cart-shopping d-sm-none"
                                    style="font-size: 20px; color: var(--system-primery-color)"></i>
                            </div>
                            <span class="notify_count">{{ @cartItem() }}</span>
                        </a>
                    @endif

                    <!-- header__left__start  -->
                    {{-- <div class="col-md-2 d-none d-xl-block px-0 py-0">
                        <!-- Center (empty) -->
                    </div> --}}

                    <!-- main_menu_start  -->
                    <div
                        class="col-md-9 col-sm-1 d-sm-flex justify-content-end main_menu d-none category_box_iner px-0 pl-lg-0 pr-lg-3 py-0">
                        <nav class="navbar navbar-expand-md pl-0 mb-0">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

                                <!-- <div class="menu_dropdown">
                                        <ul >
                                            @if (isset($categories))
                                                @foreach ($categories as $category)
<li class="mega_menu_dropdown active_menu_item">
                                                        <a
                                                            href="{{ route('courses') }}?category={{ $category->id }}">{{ $category->name }}</a>
                                                        @if (isset($category->activeSubcategories))
@if (count($category->activeSubcategories) != 0)
<ul>
                                                                    <li>
                                                                        <div class="menu_dropdown_iner d-flex">
                                                                            <div class="single_menu_dropdown">
                                                                                <h4>{{ __('courses.Sub Category') }}
                                                                                </h4>
                                                                                <ul>
                                                                                    @if (isset($category->activeSubcategories))
@foreach ($category->activeSubcategories as $subcategory)
<li>
                                                                                                <a
                                                                                                    href="{{ route('courses') }}?category={{ $category->id }}">{{ $subcategory->name }}</a>
                                                                                            </li>
@endforeach
@endif
                                                                                </ul>
                                                                            </div>

                                                                        </div>
                                                                    </li>
                                                                </ul>
@endif
@endif
                                                    </li>
@endforeach
                                            @endif
                                        </ul>
                                    </div> -->


                                <ul id="mobile-menu" class="d-lg-flex d-none align-items-center">
                                    {{-- <div class="category_search d-flex category_box_iner ml-xl-5 ml-3">

                                        @if (@$homeContent->show_menu_search_box == 1)
                                            <form action="{{ route('search') }}" class="mb-0" id="search_form">
                                                <div
                                                    class="align-items-center d-flex d-sm-none input-group theme_search_field">
                                                    <div class="input-group-prepend">
                                                        <button class="btn" type="button" id="button-addon1"><i
                                                                class="ti-search"></i>
                                                        </button>
                                                    </div>

                                                    <input type="text" class="form-control" name="query"
                                                        id="search"
                                                        placeholder="{{ __('Search') }}"
                                                        onfocus="this.placeholder = ''"
                                                        onblur="this.placeholder = '{{ __('Search') }}'">
                                                </div>
                                            </form>
                                        @endif
                                        <div id="courses_list" class="position-absolute"></div>
                                    </div> --}}

                                    @if (isset($menus))
                                        @foreach ($menus->where('parent_id', null) as $menu)

                                            @php

                                                $permissions = json_decode($menu->permissions);

                                                if ($menu->title == 'Forum' && !isModuleActive('Forum')) {
                                                    continue;
                                                }
                                                if ($menu->link == '/saas-signup') {
                                                    if (Auth::check()) {
                                                        continue;
                                                    } elseif (SaasDomain() != 'main') {
                                                        continue;
                                                    }
                                                }

                                            @endphp
                                            @if (
                                                (auth()->check() && in_array(auth()->user()->role_id, array_values($permissions))) ||
                                                    (!auth()->check() && in_array('notauth', array_values($permissions))))
                                                <li
                                                    class="@if ($menu->mega_menu == 1) position-static @else @if ($menu->show == 1) right_control_submenu @endif @endif">
                                                    @if ($menu->element_id == null || $menu->element_id != 0)
                                                        <a @if ($menu->is_newtab == 1) target="_blank" @endif
                                                            href="{{ getMenuLink($menu) }}">
                                                            {{ $menu->title }}</a>

                                                    @endif

                                                    @if (isset($menu->childs))
                                                        @if (count($menu->childs) != 0)
                                                            @if (isset($menu->childs))
                                                                @if ($menu->mega_menu == 1)
                                                                    <ul class="mega_menu submenu">
                                                                        <li class="container mx-auto">
                                                                            <div class="row">
                                                                                @foreach ($menu->childs as $sub)
                                                                                    <div
                                                                                        class="col-lg-{{ $menu->mega_menu_column }}">
                                                                                        <h4>
                                                                                            {{ $sub->title }}
                                                                                        </h4>
                                                                                        @if (isset($sub->childs))
                                                                                            @if (count($sub->childs) != 0)
                                                                                                <ul
                                                                                                    class="mega_menu_list">
                                                                                                    @foreach ($sub->childs as $s)
                                                                                                        <li
                                                                                                            class="@if ($sub->show == 1)  @endif">
                                                                                                            <a @if ($s->is_newtab == 1) target="_blank" @endif
                                                                                                                href="{{ getMenuLink($s) }}">{{ $s->title }}</a>
                                                                                                        </li>
                                                                                                    @endforeach
                                                                                                </ul>
                                                                                            @endif
                                                                                        @endif

                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                @else
                                                                    <ul class="submenu list">
                                                                        @foreach ($menu->childs as $sub)
                                                                            <li class=""><a
                                                                                    @if ($sub->is_newtab == 1) target="_blank" @endif
                                                                                    href="{{ getMenuLink($sub) }}">{{ $sub->title }}
                                                                                    @if (isset($sub->childs) && count($sub->childs) != 0)
                                                                                        <i class="ti-angle-right"></i>
                                                                                    @endif
                                                                                </a>
                                                                                @if (isset($sub->childs))
                                                                                    @if (count($sub->childs) != 0)
                                                                                        <ul
                                                                                            class="@if ($sub->show == 1) leftcontrol_submenu @endif">
                                                                                            @foreach ($sub->childs as $s)
                                                                                                <li
                                                                                                    class="@if ($sub->show == 1)  @endif">
                                                                                                    <a @if ($s->is_newtab == 1) target="_blank" @endif
                                                                                                        href="{{ getMenuLink($s) }}">{{ $s->title }}</a>
                                                                                                </li>
                                                                                            @endforeach
                                                                                        </ul>
                                                                                    @endif
                                                                                @endif
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            @endif
                                                        @endif
                                                    @endif
                                                </li>
                                            @endif
                                        @endforeach
                                    @guest
                                        <div class="login_btn text-center d-lg-none d-flex">
                                            <a href="{{ url('login') }}"
                                                class="text-white">{{ __('LogIn To Portal') }}
                                            </a>
                                            <a href="{{ url('pre-registration') }}"
                                                        class="text-white"
                                                        style="gap: 5px;">{{ __('Apply Now') }}
                                            </a>
                                        </div>
                                    @endguest
                                    @auth
                                    <div class="login_btn text-center d-lg-none d-flex">
                                        @if (Auth::user()->role_id == 3)
                                                    <a
                                                        href="{{ route('studentDashboard') }}">{{ __('dashboard.Dashboard') }}</a>
                                                @else
                                                    <a
                                                        href="{{ route('dashboard') }}">{{ __('dashboard.Dashboard') }}</a>
                                                @endif
                                        <a href="{{ route('logout') }}">{{ __('frontend.Log Out') }}</a>
                                    </div>
                                    @endauth
                                    @else
                                    @endif
                                    <li><a href="#"></a></li>


                                </ul>



                                <!-- main_menu_start  -->

                                <!-- header__right_start  -->
                                @auth()
                                    <div class="header__right login_user">
                                        <div class="profile_info collaps_part">
                                            <div class="profile_img collaps_icon d-flex align-items-center">
                                                <div class="studentProfileThumb"
                                                    style="background-image: url('{{ getProfileImage(Auth::user()->image) }}')">
                                                </div>

                                                <span class="">{{ Auth::user()->name }}
                                                    <br style="display: block">
                                                    <small>
                                                        @if (showEcommerce())
                                                            @if (Auth::user()->role_id == 3)
                                                                @if (Auth::user()->balance == 0)
                                                                    {{ Settings('currency_symbol') ?? '৳' }} 0
                                                                @else
                                                                    {{ getPriceFormat(Auth::user()->balance) }}
                                                                @endif
                                                            @endif
                                                        @endif
                                                    </small>

                                                </span>

                                            </div>
                                            <div class="profile_info_iner collaps_part_content">
                                                @if (Auth::user()->role_id == 3)
                                                    <a
                                                        href="{{ route('studentDashboard') }}">{{ __('dashboard.Dashboard') }}</a>
                                                    <a
                                                        href="{{ route('myProfile') }}">{{ __('frontendmanage.My Profile') }}</a>
                                                    <a
                                                        href="{{ route('myAccount') }}">{{ __('frontend.Account Settings') }}</a>
                                                    @if (isModuleActive('Affiliate') && auth()->user()->affiliate_request != 1)
                                                        <a
                                                            href="{{ routeIsExist('affiliate.users.request') ? route('affiliate.users.request') : '' }}">{{ __('frontend.Join Affiliate Program') }}</a>
                                                    @endif
                                                @else
                                                    <a
                                                        href="{{ route('dashboard') }}">{{ __('dashboard.Dashboard') }}</a>
                                                    <a
                                                        href="{{ route('changePassword') }}">{{ __('frontendmanage.My Profile') }}</a>
                                                @endif
                                                @if (isModuleActive('UserType'))
                                                    @foreach (auth()->user()->userRoles as $role)
                                                        @php
                                                            if ($role->id == auth()->user()->role_id) {
                                                                continue;
                                                            }
                                                        @endphp
                                                        <a href="{{ route('usertype.changePanel', $role->id) }}">
                                                            {{ __('common.Switch to') }} {{ $role->name }}
                                                        </a>
                                                    @endforeach
                                                @endif
                                                <a href="{{ route('logout') }}">{{ __('frontend.Log Out') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endauth
                                @guest()
                                    @if (session()->has('pre-registered-user'))

                                        <div class="dropdown">
                                            <button class="btn theme_btn dropdown-toggle" id="dropdownButton">
                                                {{ session('pre-registered-user.name') }}
                                            </button>
                                            <div class="dropdown-content" id="dropdownContent">

                                                @if (session()->has('pre-registered-user'))
                                                    <a href="{{ route('register') }}">Enroll</a>
                                                    <a href="{{ route('preRegisteredDestroy') }}">Logout</a>
                                                @endif
                                            </div>
                                        </div>
                                    @else
                                        <div class="header__right">
                                            <div class="contact_wrap d-flex align-items-center">
                                                <div class="login_btn d-flex p-0">
                                                    <a href="{{ url('login') }}"
                                                        class="d-flex justify-content-center align-items-center  px-2 py-1"
                                                        style="gap: 5px;"><i
                                                            class="fa-regular fa-user"></i>{{ __('LogIn') }}
                                                    </a>
                                                </div>
                                                <div class="login_btn d-flex p-0">
                                                    <a href="{{ url('pre-registration') }}"
                                                        class="d-flex justify-content-center align-items-center register-btn-svg px-2 py-1"
                                                        style="gap: 5px;"><svg aria-hidden="true" focusable="false"
                                                            data-prefix="fas" data-icon="grid-2" role="img"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                            class="svg-inline--fa fa-grid-2 fa-lg" "><path fill="currentColor" d="
                                                            M224 80c0-26.5-21.5-48-48-48H80C53.5 32 32 53.5 32 80v96c0 26.5
                                                            21.5 48 48 48h96c26.5 0 48-21.5 48-48V80zm0
                                                            256c0-26.5-21.5-48-48-48H80c-26.5 0-48 21.5-48 48v96c0 26.5 21.5
                                                            48 48 48h96c26.5 0 48-21.5 48-48V336zM288 80v96c0 26.5 21.5 48
                                                            48 48h96c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48H336c-26.5
                                                            0-48 21.5-48 48zM480 336c0-26.5-21.5-48-48-48H336c-26.5 0-48
                                                            21.5-48 48v96c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48V336z"
                                                            class=""></path></svg>{{ __('Apply Now') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endguest
                                <!-- header__right_end  -->
                            </div>
                    </div>
                </div>
                </nav>

            </div>

            <div class="col-12">
                <div class="mobile_menu d-block d-lg-none"></div>
            </div>

        </div>
</div>
</div>

</header>

@if (Settings('category_show'))
    <div class="side_cate">
        <div class="side_cate_close"><i class="ti ti-close"></i></div>
        <div class="side_cate_wrap">
            <ul class="side_cate_wrap_menu">

                @if (isset($categories))
                    @foreach ($categories as $category)
                        @include(theme('partials._mobile_category'), [
                            'category' => $category,
                            'level' => 1,
                        ])
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
@endif
@if (Settings('show_cart') == 1)
    <a href="#" class="float notification_wrapper">
        <div class="notify_icon cart_store">
            <img style="max-width: 30px;
    padding-left: 8px;
    min-width: 36px;"
                src="{{ asset('/public/frontend/infixlmstheme/') }}/img/svg/cart_white.svg" alt=""
                class="d-none d-sm-block">
            <i class="fa-solid fa-cart-shopping d-sm-none"
                style="font-size: 20px; color: var(--system-primery-color)"></i>
        </div>
        <span class="notify_count">{{ @cartItem() }}</span>
    </a>
@endif
</div>


<style>
    /* Dropdown container */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown button */
    #dropdownButton {
        background-color: #fd7e14;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }

    /* Dropdown content (hidden by default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: black;
        padding: 5px 16px;
        text-decoration: none;
        display: block;
        font-size: small;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    /* Show the dropdown content when the dropdown button is clicked */
    .dropdown.active .dropdown-content {
        display: block;
    }
</style>



<script>
    // Toggle dropdown content on button click
    if (document.getElementById('dropdownButton')) {
        document.getElementById('dropdownButton').addEventListener('click', function() {
            document.querySelector('.dropdown').classList.toggle('active');
        });

        // Close the dropdown if the user clicks outside of it
        window.addEventListener('click', function(event) {
            if (!event.target.matches('#dropdownButton')) {
                var dropdowns = document.getElementsByClassName('dropdown');
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('active')) {
                        openDropdown.classList.remove('active');
                    }
                }
            }
        });
    }
</script>

