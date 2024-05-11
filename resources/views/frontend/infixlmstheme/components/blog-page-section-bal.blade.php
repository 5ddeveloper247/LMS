<div>

    <div class="row px-1 px-md-5">
        <div class="col-md-12 py-2">
            {{-- <h2 class="font-weight-bold ">Blogs</h2> --}}
        </div>
        <div class="col-xl-8 col-lg-8">
            <div class="blog_page_wrapper pt-0">
                {{-- <div class="container"> --}}
                <div class="row">
                    @if (isset($blogs))
                        @foreach ($blogs as $blog)
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 my-2">
                                <div class="card rounded-card shadow">
                                    <div class="card-header rounded-card-header blog p-0">
                                        <a href="{{ route('blogDetails', [$blog->slug]) }}">
                                            <img src="{{ getBlogImage($blog->thumbnail) }}"
                                                class="img-fluid rounded-card-img w-100">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="font-weight-bold">
                                            <a href="{{ route('blogDetails', [$blog->slug]) }}">
                                                {{ $blog->title }} </a>
                                        </h5>
                                        <p class="mt-2">
                                         <strong>Author:</strong> {{ $blog->user->name }}
                                        </p>
                                        <p>
                                            {{ showDate(@$blog->authored_date) }},
                                            {{ @$blog->authored_time }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-lg-6">
                                <div class="single_blog">
                                    <a href="{{ route('blogDetails', [$blog->slug]) }}">
                                        <div class="thumb">

                                            <div class="thumb_inner lazy"
                                                data-src="{{ getBlogImage($blog->thumbnail) }}">
                                            </div>
                                        </div>
                                    </a>
                                    <div class="blog_meta">
                                        <p>{{ $blog->user->name }} . {{ showDate(@$blog->authored_date) }},
                                            {{ @$blog->authored_time }}</p>

                                        <a href="{{ route('blogDetails', [$blog->slug]) }}">
                                            <h4>{{ $blog->title }}</h4>
                                        </a>
                                    </div>
                                </div>
                            </div> --}}
                        @endforeach
                    @endif
                    @if (count($blogs) == 0)
                        <div class="col-lg-12">
                            <div class="Nocouse_wizged text-center d-flex align-items-center justify-content-center">
                                <div class="thumb">
                                    <img style="width: 50px"
                                        src="{{ asset('public/frontend/infixlmstheme') }}/img/not-found.png"
                                        alt="">
                                </div>
                                <h1>
                                    {{ __('No Blog Found') }}
                                </h1>
                            </div>
                        </div>
                    @endif

                </div>
                <div class="mt-4">
                    {{ $blogs->appends(Request::all())->links() }}
                </div>
                {{-- </div> --}}
            </div>
        </div>

        <div class="col-xl-4 col-lg-3">

            <x-blog-sidebar-section :tag="''" />


        </div>
    </div>
</div>
@include(theme('partials._custom_footer'))
{{-- </div> --}}
{{-- </div> --}}
