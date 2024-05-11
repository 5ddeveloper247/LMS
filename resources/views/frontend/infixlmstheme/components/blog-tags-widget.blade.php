<div class="popular-tags pt-4">

    <div class="d-flex align-items-center gap-2">

        <svg class="mb-2" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"

            viewBox="0 0 16 16">

            <path fill="red" d="M0 7h16v1H0z" />

        </svg>

        <h5 class="pb-2 font-weight-bold">

            Popular Tags

        </h5>

    </div>

    <div class="popular-tag-links d-flex flex-wrap gap-2 p-4 mr-lg-5">

      @foreach ($tagsArray as $tag)

        <a href="{{ url('articles?tag='.trim($tag)) }}">{{ $tag }}</a>

      @endforeach

    </div>

</div>

