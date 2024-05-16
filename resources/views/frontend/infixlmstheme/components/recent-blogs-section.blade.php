<div class="recent-post pt-4">

    <div class="d-flex align-items-center gap-2">

        <svg class="mb-2" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"

            viewBox="0 0 16 16">

            <path fill="var(--system_primery_color)" d="M0 7h16v1H0z" />

        </svg>

        <h5 class="pb-2 font-weight-bold">

            Recent Posts

        </h5>

    </div>

    <div class="recent-post-card p-4 mr-xl-5 mr-lg-4 mr-3">

      @if(count($blogs) > 0)

        @foreach ($blogs as $blog)

        <div class="d-flex blog-gap">

            <img src="{{ getBlogImage($blog->image) }}"

                width="80" class="rounded-3" alt="" style="height: 80px; border-radius:10px; max-width: 80px;">

            <div class="text-start px-2">

                <small>{{ showDate(@$blog->authored_date) }}</small> <br>

                <a href="{{ route('blogDetails', [$blog->slug]) }}" class="fw-bold text-dark">

                    {{ $blog->title }}

                </a>

            </div>

        </div>

        @if(!$loop->last)<hr style="color: #00000064;">@endif

        @endforeach

      @else

        <p>No Blogs Found</p>

      @endif

    </div>

</div>

