<div class="single_reviews w-100 " style="background: #eee;display:unset" id="{{ $review->id }}_single_reviews">
    <div class="d-flex gap-3">
        <div class="p-3 " style="border-right:1px solid rgb(218, 218, 218); box-shadow: 7px 0px 19px -3px rgba(0,0,0,0.75);
        -webkit-box-shadow: 7px 0px 19px -3px rgba(218, 218, 218,0.75);
        -moz-box-shadow: 7px 0px 19px -3px rgba(218, 218, 218.75);">
            <div class=" text-center">
                <span class="thumb-link">
                    {{ substr($review->userName, 0, 1) }}
                </span>
            </div>
            <div class="review_content text-center">
                <h5 class="f_w_700 review_username">{{ $review->userName }}</h5>
                <div class="rated_customer justify-content-center">
                    <div class="feedmak_stars">
                        @php
                            $main_stars = $review->star;
                            $stars = intval($review->star);
                        @endphp
                        @for ($i = 0; $i < $stars; $i++)
                            <i class="fas fa-star"></i>
                        @endfor
                        @if ($main_stars > $stars)
                            <i class="fas fa-star-half"></i>
                        @endif
        
                    </div>
                   
                </div>
                <span>{{ \Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</span>
            </div>
            <div class="ml-auto">
                @if (reviewCanDelete($review->userId, $review->instructor_id))
                    <a class="text-dark deleteBtn" href="#" data-toggle="modal"
                        onclick="deleteCommnet('{{ route('deleteTutorReview', $review->id) }}','{{ $review->id }}_single_reviews')"
                        data-target="#deleteComment">
                        <i class="fas fa-trash  fa-xs"></i>
                    </a>
                @endif
            </div>
        </div>
        <div class="p-4">
            <p id="review_comment">
                {!! $review->comment !!}
            </p>
        </div>
    </div>
    

   
</div>
