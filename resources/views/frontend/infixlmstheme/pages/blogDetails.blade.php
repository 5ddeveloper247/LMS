@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ $blog->title ?? '' }}
@endsection
@section('js')
    <script src="{{ asset('public/frontend/infixlmstheme/js/blogs.js') }}"></script>
@endsection
@section('og_image')
    {{ asset($blog->image) }}
@endsection
@section('mainContent')
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body,
        html {
            height: 100%;
            width: 100%;
        }

        .card {
            background-color: #fff;
            box-shadow: 0px 0px 55px 0px #00000026;
            border: none;
        }

        .card span {
            font-size: 16px;
            color: var(--system_primery_color);
        }

        .card a {
            text-decoration: none;
            color: #000000bb;
            font-weight: 700;
            font-size: 18px;
        }

        /* .search h5 {
                font-size: 20px;
            } */

        .search-input-field {
            background-color: #fff;
            box-shadow: 0px 0px 55px 0px #00000026;
            border-radius: 10px;
            margin-bottom: 30px;
            padding: 30px 30px 30px 30px;
        }

        input {
            border: 1px solid #0000001c;
            padding: 1rem 1.5rem;
            width: 100%;
        }

        .aurthor-card {
            background-color: #fff;
            box-shadow: 0px 0px 55px 0px #00000026;
            border-radius: 10px;
        }

        /* .aurthor h5 {
                font-size: 18px;
            } */

        /* .recent-post h5 {
                font-size: 18px;
            } */

        .recent-post-card {
            background-color: #fff;
            box-shadow: 0px 0px 55px 0px #00000026;
            border-radius: 10px;
        }

        .popular-tags h5 {
            /* font-size: 18px; */
        }

        .popular-tag-links {
            background-color: #fff;
            box-shadow: 0px 0px 55px 0px #00000026;
            border-radius: 10px;
        }

        .popular-tag-links a {
            text-decoration: none;
            color: #000;
            border: 1px solid #00000019;
            padding: 0.5rem 1rem;
        }

        /* .categories h5 {
                font-size: 18px;
            } */

        .categories-card {
            background-color: #fff;
            box-shadow: 0px 0px 55px 0px #00000026;
            border-radius: 10px;
        }

        .categories-card a {
            color: #000000b0;
            text-decoration: none;
            font-weight: 700;
        }

        .categories-card small {
            color: #000000b0;
            font-weight: 700;
            font-size: 18px;
        }

        .tags {
            gap: 10px;
            align-items: center;
        }

        .tag {
            border: 1px solid #00000021;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 5px;
        }

        .post {
            background-color: #ffeaee;
        }

        textarea {
            background-color: #eeeeee;
            width: 100%;
            border: 1px solid #00000021;
        }

        .user-name {
            background-color: #eeeeee;
        }

        .user-email {
            background-color: #eeeeee;
        }

        .user-website {
            background-color: #eeeeee;
        }

        .submit-btn {
            background-color: var(--system_primery_color);
            color: #fff;
            padding: 0.3rem 1rem;
            border: none;
        }

        .blog-prev {
            color: var(--system_secendory_color) !important;
            font-size: 16px !important;
            cursor: pointer;
            font-weight: 600;
        }

        .blog-gap {
            gap: 10px;
        }

        .fw-bold {
            font-weight: 700;
        }


        form.search-input-field input[type=text] {
            padding: 10px;
            font-size: 17px;
            border: 1px solid grey;
            float: left;
            width: 80%;
            /* background: #f1f1f1; */
        }

        form.search-input-field button {
            float: left;
            width: 20%;
            padding: 10px;
            background: var(--system_primery_color);
            color: white;
            font-size: 17px;
            border: 1px solid grey;
            border-left: none;
            cursor: pointer;
        }

        form.search-input-field button:hover {
            background: var(--system_primery_color);
        }

        form.search-input-field::after {
            content: "";
            clear: both;
            display: table;
        }

        .custom-paragraph {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 6;
            overflow: hidden;
            min-height: 78px;
        }

        @media only screen and (min-width: 1800px) {
            p {
                font-size: 20px;
            }

            h5 {
                font-size: 25px;
            }


        }
    </style>

    <div class="container">
        <div class="row py-5 g-0">
            <div class="col-12 col-md-8 pr-0">
                <div class="card rounded-3 pt-5 pb-4 px-5 ml-xl-5 mr-lg-4 mr-3" style="border-radius: 15px;">
                    <img src="{{ getBlogImage($blog->image) }}" class="img-fluid rounded-3" alt=""
                        style="height: 78vh !important; border-radius:15px">

                    <div class="d-flex align-items-center py-3 gap-2">
                        <span class="text-dark">{{ $blog->user->name }}</span>

                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                            <path fill="black"
                                d="M19.5 4h-3V2.5a.5.5 0 0 0-1 0V4h-7V2.5a.5.5 0 0 0-1 0V4h-3A2.503 2.503 0 0 0 2 6.5v13A2.503 2.503 0 0 0 4.5 22h15a2.502 2.502 0 0 0 2.5-2.5v-13A2.502 2.502 0 0 0 19.5 4M21 19.5a1.5 1.5 0 0 1-1.5 1.5h-15A1.5 1.5 0 0 1 3 19.5V11h18zm0-9.5H3V6.5C3 5.672 3.67 5 4.5 5h3v1.5a.5.5 0 0 0 1 0V5h7v1.5a.5.5 0 0 0 1 0V5h3A1.5 1.5 0 0 1 21 6.5z" />
                        </svg>
                        <span class="text-dark">{{ showDate(@$blog->authored_date) }}</span>

                    </div>
                    <div class="card-text">


                        <h2 class="fw-bold opacity-75">
                            {{ $blog->title }}
                        </h2>

                        {!! $blog->description !!}
                        @php
                            $tagsArr = explode(',', $blog->tags);
                        @endphp
                        <div class="d-flex justify-content-between align-items-center py-2">

                            <ul class="tags d-flex">
                                Tags.
                                @foreach ($tagsArr as $tag)
                                    <li class="tag">{{ trim($tag) }}</li>
                                @endforeach
                            </ul>
                            {{-- <div class=" p-3">
                                  Tabs
                                </div>
                                <div class="tag p-3 rounded-1">
                                    Design
                                </div>
                                <div class="tag p-3 rounded-1">
                                    Development
                                </div> --}}

                            {{-- <div class="social-links">
                                <small>Share On</small>
                                <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24">
                                    <path fill="black"
                                        d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.7em" height="1.7em"
                                    viewBox="0 0 14 14">
                                    <path fill="black"
                                        d="M7 0c3.87 0 7 3.13 7 7s-3.13 7-7 7s-7-3.13-7-7s3.13-7 7-7M5.72 10.69c3.1 0 4.8-2.57 4.8-4.8v-.22c.33-.24.62-.54.84-.88c-.3.13-.63.22-.97.27c.35-.21.62-.54.74-.93c-.33.19-.69.33-1.07.41c-.31-.33-.75-.53-1.23-.53c-.93 0-1.69.76-1.69 1.69c0 .13.01.26.05.38c-1.4-.07-2.65-.74-3.48-1.76c-.14.25-.23.54-.23.85c0 .58.3 1.1.75 1.4c-.28 0-.54-.08-.76-.21v.02c0 .82.58 1.5 1.35 1.66c-.14.04-.29.06-.44.06c-.11 0-.21-.01-.32-.03c.21.67.84 1.16 1.57 1.17c-.58.45-1.31.72-2.1.72c-.14 0-.27 0-.4-.02c.74.48 1.63.76 2.58.76"
                                        class="cls-1" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24">
                                    <path fill="black"
                                        d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.7em" height="1.7em"
                                    viewBox="0 0 14 14">
                                    <path fill="black"
                                        d="M7 0c3.87 0 7 3.13 7 7s-3.13 7-7 7s-7-3.13-7-7s3.13-7 7-7M5.72 10.69c3.1 0 4.8-2.57 4.8-4.8v-.22c.33-.24.62-.54.84-.88c-.3.13-.63.22-.97.27c.35-.21.62-.54.74-.93c-.33.19-.69.33-1.07.41c-.31-.33-.75-.53-1.23-.53c-.93 0-1.69.76-1.69 1.69c0 .13.01.26.05.38c-1.4-.07-2.65-.74-3.48-1.76c-.14.25-.23.54-.23.85c0 .58.3 1.1.75 1.4c-.28 0-.54-.08-.76-.21v.02c0 .82.58 1.5 1.35 1.66c-.14.04-.29.06-.44.06c-.11 0-.21-.01-.32-.03c.21.67.84 1.16 1.57 1.17c-.58.45-1.31.72-2.1.72c-.14 0-.27 0-.4-.02c.74.48 1.63.76 2.58.76"
                                        class="cls-1" />
                                </svg>
                            </div> --}}
                        </div>
                        {{--
                        <div class="post d-flex p-5">
                            <img src="https://eduquest.itech-theme.com/wp-content/uploads/2023/08/cmt.png" class="img-fluid"
                                width="300" alt="">
                            <div class="d-flex flex-column ml-3">
                                <h5>Cameron Williamson</h5>
                                <h5 class="text-danger">Visitsite: Itech-themes</h5>
                                <p>
                                    Self-reflection requires courage and patience. Teaching students to be self- them a
                                    skill that will help them throughout their lives.
                                </p>
                                <div class="social-links">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em"
                                        viewBox="0 0 24 24">
                                        <path fill="black"
                                            d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.7em" height="1.7em"
                                        viewBox="0 0 14 14">
                                        <path fill="black"
                                            d="M7 0c3.87 0 7 3.13 7 7s-3.13 7-7 7s-7-3.13-7-7s3.13-7 7-7M5.72 10.69c3.1 0 4.8-2.57 4.8-4.8v-.22c.33-.24.62-.54.84-.88c-.3.13-.63.22-.97.27c.35-.21.62-.54.74-.93c-.33.19-.69.33-1.07.41c-.31-.33-.75-.53-1.23-.53c-.93 0-1.69.76-1.69 1.69c0 .13.01.26.05.38c-1.4-.07-2.65-.74-3.48-1.76c-.14.25-.23.54-.23.85c0 .58.3 1.1.75 1.4c-.28 0-.54-.08-.76-.21v.02c0 .82.58 1.5 1.35 1.66c-.14.04-.29.06-.44.06c-.11 0-.21-.01-.32-.03c.21.67.84 1.16 1.57 1.17c-.58.45-1.31.72-2.1.72c-.14 0-.27 0-.4-.02c.74.48 1.63.76 2.58.76"
                                            class="cls-1" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em"
                                        viewBox="0 0 24 24">
                                        <path fill="black"
                                            d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.7em" height="1.7em"
                                        viewBox="0 0 14 14">
                                        <path fill="black"
                                            d="M7 0c3.87 0 7 3.13 7 7s-3.13 7-7 7s-7-3.13-7-7s3.13-7 7-7M5.72 10.69c3.1 0 4.8-2.57 4.8-4.8v-.22c.33-.24.62-.54.84-.88c-.3.13-.63.22-.97.27c.35-.21.62-.54.74-.93c-.33.19-.69.33-1.07.41c-.31-.33-.75-.53-1.23-.53c-.93 0-1.69.76-1.69 1.69c0 .13.01.26.05.38c-1.4-.07-2.65-.74-3.48-1.76c-.14.25-.23.54-.23.85c0 .58.3 1.1.75 1.4c-.28 0-.54-.08-.76-.21v.02c0 .82.58 1.5 1.35 1.66c-.14.04-.29.06-.44.06c-.11 0-.21-.01-.32-.03c.21.67.84 1.16 1.57 1.17c-.58.45-1.31.72-2.1.72c-.14 0-.27 0-.4-.02c.74.48 1.63.76 2.58.76"
                                            class="cls-1" />
                                    </svg>
                                </div>
                            </div>
                        </div> --}}
                        <div class="row">
                            @if ($previous)
                                <div class="col-md-6">
                                    <a class="font-weight-normal" href="{{ route('blogDetails', [$previous->slug]) }}"><i
                                            class='fas fa-angle-left'></i><span class="text-capitalize blog-prev">previous
                                            post</span>
                                    </a>
                                    <div class="d-flex py-4 " href="#" style="cursor: pointer">
                                        <img src="{{ getBlogImage($previous->image) }}" width="70" alt="">
                                        <div class="d-flex flex-column ml-3">
                                            <h5>
                                                {{ $previous->title }}
                                            </h5>
                                            <small>{{ showDate(@$previous->authored_date) }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if ($next)
                                <div class="col-md-6 ml-auto">
                                    <a href="{{ route('blogDetails', [$next->slug]) }}"
                                        class="d-flex justify-content-end align-items-center font-weight-normal"><span
                                            class="text-capitalize blog-prev">next post</span><i
                                            class='fas fa-angle-right'></i>
                                    </a>
                                    <div class="d-flex justify-content-end pt-4" style="cursor: pointer">
                                        <div class="d-flex flex-column mr-3">
                                            <h5 class="font-weight-bold">
                                                {{ $next->title }}
                                            </h5>
                                            <small>{{ showDate(@$next->authored_date) }}</small>
                                        </div>
                                        <img src="{{ getBlogImage($next->image) }}" width="70" alt="">
                                    </div>
                                </div>
                            @endif
                        </div>
                        <hr style="color: #0000004b;">
                        {{-- <h5>
                            No Comment
                        </h5>
                        <textarea name="Comment" placeholder="Comment" id="Comment" cols="30" rows="10"></textarea>
                        <div class="d-flex py-3 blog-gap">
                            <input class="user-name" type="text" name="name" placeholder="Name" id="your name">
                            <input class="user-email" type="email" name="email" placeholder="Email" id="Your-email">
                            <input class="user-website" type="text" name="website" placeholder="Website"
                                id="your-website">
                        </div>
                        <p>
                            Save my name, email, and website in this browser for the next time I comment.
                        </p>
                        <button class="submit-btn" type="button">Submit</button> --}}
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 pr-0 pr-lg-4">
                <div class="search mr-xl-5 mr-lg-4 mr-3">
                    <div class="d-flex align-items-center gap-2">
                        <svg class="mb-2" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                            viewBox="0 0 16 16">
                            <path fill="var(--system_primery_color)" d="M0 7h16v1H0z" />
                        </svg>
                        <h5 class="pb-2 font-weight-bold">
                            Search Now
                        </h5>
                    </div>
                    <form class="search-input-field rounded-3" action="/action_page.php" style="margin:auto;">
                        <input type="text" placeholder="Search.." name="search2">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>

                <div class="aurthor pt-4 mr-xl-5 mr-lg-4 mr-3">
                    <div class="d-flex align-items-center gap-2">
                        <svg class="mb-2" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                            viewBox="0 0 16 16">
                            <path fill="var(--system_primery_color)" d="M0 7h16v1H0z" />
                        </svg>
                        <h5 class="pb-2 font-weight-bold">
                            About Aurthor
                        </h5>
                    </div>

                    <div class="aurthor-card text-center p-4">
                        <img src="{{ asset($blog->user->photo) }}" width="172" height ="172" class="rounded-circle"
                            alt="">
                        <div class="aurthor-info">
                            <h4>{{ $blog->user->name }}</h4>
                            <p class="text-start pt-3 custom-paragraph">
                                {{ $blog->user->about }}
                            </p>
                        </div>
                        <div class="social-links">
                            @if ($blog->user->facebook != null && $blog->user->facebook != '')
                                <a href="{{ $blog->user->facebook }}" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em"
                                        viewBox="0 0 24 24">
                                        <path fill="black"
                                            d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95" />
                                    </svg>
                                </a>
                            @endif
                            @if ($blog->user->twitter != null && $blog->user->twitter != '')
                                <a href="{{ $blog->user->twitter }}" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.7em" height="1.7em"
                                        viewBox="0 0 14 14">
                                        <path fill="black"
                                            d="M7 0c3.87 0 7 3.13 7 7s-3.13 7-7 7s-7-3.13-7-7s3.13-7 7-7M5.72 10.69c3.1 0 4.8-2.57 4.8-4.8v-.22c.33-.24.62-.54.84-.88c-.3.13-.63.22-.97.27c.35-.21.62-.54.74-.93c-.33.19-.69.33-1.07.41c-.31-.33-.75-.53-1.23-.53c-.93 0-1.69.76-1.69 1.69c0 .13.01.26.05.38c-1.4-.07-2.65-.74-3.48-1.76c-.14.25-.23.54-.23.85c0 .58.3 1.1.75 1.4c-.28 0-.54-.08-.76-.21v.02c0 .82.58 1.5 1.35 1.66c-.14.04-.29.06-.44.06c-.11 0-.21-.01-.32-.03c.21.67.84 1.16 1.57 1.17c-.58.45-1.31.72-2.1.72c-.14 0-.27 0-.4-.02c.74.48 1.63.76 2.58.76"
                                            class="cls-1" />
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <x-recent-blogs-section />

                <x-blog-tags-widget />

                <x-blog-category-widget />
            </div>
        </div>
    </div>
    @include(theme('partials._custom_footer'))
@endsection
