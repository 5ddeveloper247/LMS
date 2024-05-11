<div>
    <div class="blog_sidebar_wrap mb_30">
        <input type="hidden" class="blog_route" name="blog_route" value="{{route('blogs')}}">
        <form action="{{route('blogs')}}" method="GET">

            <div class="input-group  theme_search_field4 w-100 mb_20 style2">
                <div class="input-group-prepend">
                    <button class="btn" type="button"><i class="ti-search"></i></button>
                </div>
                <input type="text" name="query" value="{{request('query')}}" class="form-control search"
                       placeholder="{{__('common.Search')}}…">
            </div>
        </form>

        <div class="blog_sidebar_box mb_30">
            <h2 class=" f_w_700 mb_10">
                {{__('frontend.Blog categories')}}
            </h2>
            <div class="home6_border w-100 mb_20"></div>
            <ul class="Check_sidebar mb-0">
                @foreach($categories as $cat)
                    <li>
                        <label class="primary_checkbox d-flex">
                            <input type="checkbox" value="{{$cat->id}}"
                                   class="category" {{in_array($cat->id,explode(',',$category))?'checked':''}}>
                            <span class="checkmark mr_15"></span>
                            <p class="label_name">{{$cat->title}}</p>
                        </label>
                    </li>
                @endforeach

            </ul>
        </div>
        <div class="blog_sidebar_box mb_60">
            <h2 class="f_w_700 mb_10">
                {{__('frontend.Recent Posts')}}
            </h2>
            <div class="home6_border w-100 mb_20"></div>
            <div class="news_lists">
                @foreach($latestPosts as $post)
                    <div class="single_newslist">
                        <a href="{{route('blogDetails',[$post->slug])}}">
                            <h3>{{$post->title}}</h3>
                        </a>
                        <span>{{ showDate(@$post->authored_date ) }} / {{$post->category->title}}</span>
                    </div>
                @endforeach

            </div>
        </div>
        @if(count($tags)!=0)
            <div class="blog_sidebar_box mb_30 p-0 border-0">
                <h2 class="f_w_700 mb_10">
                    {{__('frontend.Keywords')}}
                </h2>
                <div class="home6_border w-100 mb_20"></div>
                <div class="keyword_lists d-flex align-items-center flex-wrap gap_10">
                    @foreach($tags as $tag)
                        <a href="#">{{$tag}}</a>
                    @endforeach

                </div>
            </div>
        @endif
    </div>
</div>
