

    <h5 class="text-white font-weight-bold">

        {{function_exists('footerSettings')?footerSettings('footer_section_one_title'):''}}

    </h5>

    @foreach($sectionWidget as $page)

        @if(isset($page->frontpage->slug))

            @php

                $route = $page->is_static == 0 ? route('frontPage',$page->frontpage->slug) : url($page->frontpage->slug)

            @endphp

            <p><a href="{{ $route }}" style="color:inherit;">{{$page->name}} </a></p>

        @else

            <p><a href="javascript:void(0)" style="color:inherit;">{{$page->name}} </a></p>

        @endif

    @endforeach

