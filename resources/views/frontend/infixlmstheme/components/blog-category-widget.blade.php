<div class="categories pt-4 mr-lg-5">
    <div class="d-flex align-items-center gap-2">
        <svg class="mb-2" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
            viewBox="0 0 16 16">
            <path fill="var(--system_primery_color)" d="M0 7h16v1H0z" />
        </svg>
        <h5 class="pb-2 font-weight-bold">
            Categories
        </h5>
    </div>
    <div class="categories-card d-flex flex-column blog-gap p-4">
        @foreach($categories as $cat)
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ url('articles?category='.$cat->id) }}">{{ $cat->title }}</a>
            <small>{{ $cat->blogs->count() }}</small>
        </div>
        @endforeach
    </div>
</div>