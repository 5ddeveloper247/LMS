<div>


    @if ($modal)
    <style>
        .newsletter_form_wrapper .newsletter_form_inner .newsletter_form_thumb {
            height: 100%;
            background-image: url({{ asset($popup->image) }});
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
        }

        .modal {
            filter: blur(0px);
            background-color: rgb(0 0 0 / 80%);
        }

        @media (max-width: 767.98px) {
            .newsletter_form_wrapper .newsletter_form_inner .newsletter_form_thumb {
                height: 180px;
            }

        }

        .modal-content button.close {
            position: absolute;
            top: 0;
            right: 0;
            padding: 0;
            margin: 0;
            width: 40px;
            height: 40px;
            z-index: 1;
            text-shadow: none;
            background: transparent;
            color: black;
            transition: 0.5s ease-in-out;
        }

        button.close:hover {
            background-color: #996699;
            color: white;
        }

        .modal-header {
            padding: unset !important;
            border: unset !important;
        }

        .pop-up-row {
            max-height: 350px;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        @media screen and (min-width: 1400px) {

            .popup-dialog {
                max-width: 961px !important;
            }

            .pop-up-row {
                max-height: 450px;
            }
        }

        @media screen and (min-width: 1650px) {
            .popup-dialog {
                max-width: 1200px !important;
            }

            .pop-up-row {
                max-height: 600px;
            }
        }
    </style>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg popup-dialog" role="document">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body py-0">
                    <div class="row pop-up-row">
                        <div class="col-12 col-lg-6 col-lx-6 col-md-6 col-sm-6 pop-up-row p-0">
                            <img src="{{ asset($popup->image) }}" class="img-fluid w-100 h-100 object-fit-cover"
                                alt="">
                        </div>
                        <div
                            class="col-12 col-lg-6 col-lx-6 col-md-6 col-sm-6 d-flex flex-column justify-content-center text-center">
                            <h2 class="font-weight-bold my-3">{{ $popup->title }}</h2>
                            <p class="my-3">
                                {!! $popup->message !!}
                            </p>
                            <a href="{{ $popup->link }}" class="theme_btn w-75 mx-auto my-3 text-center p-2">
                                {{ $popup->btn_txt }}</a>
                        </div>
                    </div>
                </div>
                {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div> --}}
            </div>
        </div>
    </div>

    <div class="d-none" id="popupContentDiv">
        <div class="newsletter_form_wrapper newsletter_active" id="popupContentModal">
            <div class="newsletter_form_inner">
                <div class="close_modal" onclick="closePopUpModel()">
                    <i class="fa fa-times"></i>
                </div>
                <div class="newsletter_form_thumb">
                </div>
                <div class="newsletter_form text-center">
                    <h2>Kamran</h2>
                    <h3>{{ $popup->title }}</h3>
                    <p>
                        {!! $popup->message !!}
                    </p>

                    <div class="row">
                        <div class="col-12 mt-10">
                            <a href="{{ $popup->link }}" class="theme_btn w-100 text-center">
                                {{ $popup->btn_txt }}</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script>
        setTimeout(function() {
            // jQuery.noConflict();
            $('#exampleModal').modal('show');
            // $("#popupContentDiv").removeClass('d-none');
        }, 3000);

        function closePopUpModel() {
            $("#popupContentDiv").addClass('d-none');
        }
    </script>
    @endif


</div>
