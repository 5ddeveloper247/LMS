<div class="row pt-5 pb-3 g-0 mt-2">
            <div class="col-12 col-md-8 pr-0">
              @if (count($blogs)>0)
                  @foreach ($blogs as $blog)
                    <div class="card rounded-3 ml-lg-5 mb-4" style="border-radius: 15px;">
                        <img src="{{ getBlogImage($blog->thumbnail) }}"
                            class="img-fluid custom-img" alt="" style="height:78vh !important" >

                        <div class="d-flex align-items-center pt-3 gap-2 px-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                <path fill="#373737"
                                    d="M19.5 4h-3V2.5a.5.5 0 0 0-1 0V4h-7V2.5a.5.5 0 0 0-1 0V4h-3A2.503 2.503 0 0 0 2 6.5v13A2.503 2.503 0 0 0 4.5 22h15a2.502 2.502 0 0 0 2.5-2.5v-13A2.502 2.502 0 0 0 19.5 4M21 19.5a1.5 1.5 0 0 1-1.5 1.5h-15A1.5 1.5 0 0 1 3 19.5V11h18zm0-9.5H3V6.5C3 5.672 3.67 5 4.5 5h3v1.5a.5.5 0 0 0 1 0V5h7v1.5a.5.5 0 0 0 1 0V5h3A1.5 1.5 0 0 1 21 6.5z" />
                            </svg>

                            <span>{{ showDate(@$blog->authored_date) }}</span>

                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="-2 -2.5 24 24">
                                <path fill="#373737"
                                    d="M9.378 12H17a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1a1 1 0 0 1 1 1v3.013zM3 0h14a3 3 0 0 1 3 3v8a3 3 0 0 1-3 3h-6.958l-6.444 4.808A1 1 0 0 1 2 18.006V14a2 2 0 0 1-2-2V3a3 3 0 0 1 3-3" />
                            </svg>

                            <span>0</span>
                        </div>
                        <div class="card-text px-3 pb-3 pt-2">
                            <h2>
                                {{ $blog->title }}
                            </h2>
                            <p>
                                {{ substr(strip_tags($blog->description),0,500) }}
                                @if(strlen(strip_tags($blog->description)) > 500) ... @endif
                            </p>
                            <a href="{{ route('blogDetails', [$blog->slug]) }}">
                                Explore More
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em" viewBox="0 0 24 24">
                                    <g fill="none">
                                        <path
                                            d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                        <path fill="#373737"
                                            d="m15.06 5.283l5.657 5.657a1.5 1.5 0 0 1 0 2.12l-5.656 5.658a1.5 1.5 0 0 1-2.122-2.122l3.096-3.096H4.5a1.5 1.5 0 0 1 0-3h11.535L12.94 7.404a1.5 1.5 0 0 1 2.122-2.121Z" />
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                  @endforeach
                @else
                  <div class="text-center">
                    <p>No Blogs found</p>
                  </div>
                @endif
            </div>
            <div class="col-12 col-md-4 pr-4">
                <div class="search mr-lg-5">
                    <div class="d-flex align-items-center gap-2">
                        <svg class="mb-2" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                            viewBox="0 0 16 16">
                            <path fill="var(--system_primery_color)" d="M0 7h16v1H0z" />
                        </svg>
                        <h5 class="pb-2 font-weight-bold">
                            Search Now
                        </h5>
                    </div>
                    <form class="search-input-field rounded-3" action="{{ route('blogs') }}" style="margin:auto;">
                        <input type="text" placeholder="Search.." name="query">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>

                <x-recent-blogs-section />
                <x-blog-tags-widget />
                <x-blog-category-widget />
            </div>
        </div>
     