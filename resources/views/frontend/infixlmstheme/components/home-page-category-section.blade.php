<div class="card custom_border_radius border-0 p-5 shadow">
    @if (isset($homeContent))
        @if ($homeContent->show_key_feature == 1)
            <div class="row justify-content-center py-4">
                <div class="col-lg-4 col-md-4 my-1">
                    <div class="d-flex gap_10">
                        <div class="my-auto">
                            @if (!empty($homeContent->key_feature_logo1))
                                <img src="{{ asset($homeContent->key_feature_logo1) }}" alt="">
                            @endif
                        </div>
                        <div>
                            <h4 class="font-weight-bold">
                                @if (!empty($homeContent->feature_link1))
                                    <a href="{{ $homeContent->feature_link1 }}">
                                @endif
                                {{ $homeContent->key_feature_title1 }}
                                @if (!empty($homeContent->feature_link1))
                                    </a>
                                @endif
                            </h4>
                            <p>{{ $homeContent->key_feature_subtitle1 }} </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 my-1">
                    <div class="d-flex gap_10">
                        <div class="my-auto">
                            @if (!empty($homeContent->key_feature_logo2))
                                <img src="{{ asset($homeContent->key_feature_logo2) }}" alt="">
                            @endif
                        </div>
                        <div>
                            <h4 class="font-weight-bold">
                                @if (!empty($homeContent->feature_link2))
                                    <a href="{{ $homeContent->feature_link2 }}">
                                @endif
                                {{ $homeContent->key_feature_title2 }}
                                @if (!empty($homeContent->feature_link2))
                                    </a>
                                @endif
                            </h4>
                            <p>{{ $homeContent->key_feature_subtitle2 }} </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 my-1">
                    <div class="d-flex gap_10">
                        <div class="my-auto">
                            @if (!empty($homeContent->key_feature_logo3))
                                <img src="{{ asset($homeContent->key_feature_logo3) }}" alt="">
                            @endif
                        </div>
                        <div>
                            <h4 class="font-weight-bold">
                                @if (!empty($homeContent->feature_link3))
                                    <a href="{{ $homeContent->feature_link3 }}">
                                @endif
                                {{ $homeContent->key_feature_title3 }}
                                @if (!empty($homeContent->feature_link3))
                                    </a>
                                @endif
                            </h4>
                            <p>{{ $homeContent->key_feature_subtitle3 }} </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
</div>
