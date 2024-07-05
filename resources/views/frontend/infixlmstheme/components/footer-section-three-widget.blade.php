

    <h5 class="text-white font-weight-bold">

        {{function_exists('footerSettings')?footerSettings('footer_section_three_title'):''}}

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

    {{-- <p><a href="{{ url('/prep-courses') }}" style="color:inherit;">All Courses</a></p>

    <p><a href="{{ url('/prep-courses?order=most_popular') }}" style="color:inherit;">Popular Courses</a></p>

    <p>FLBON Remedial</p>

    <p>Compact License - Refresher</p>

    <p>Return To Profession - Refresher</p>

    <p>The CNA - Prep</p>

    <p>NCLEX RN & PN Prep</p>

    <p>Clinical Requirements</p> --}}

