<div>
    <section class="admin-visitor-area up_st_admin_visitor mt-5 pt-5">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-11 col-xl-9">
                    <div class="box_header common_table_header">
                        <div class="main-title d-flex">
                            <h3 class="mr-30 text-uppercase mb-0">C-{{ $enroll->id + 1000 }}</h3>
                        </div>
                        <div class="table_btn_wrap">
                            <ul>
                                <li>
                                    <button class="primary_btn printBtn">{{ __('student.Print') }}</button>
                                </li>
                                <li>
                                    <button class="primary_btn downloadBtn">{{ __('student.Download') }}</button>
                                    {{-- @dd($enroll) --}}
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- invoice print part here -->
                    <div class="invoice_print pb-5">
                        @include(theme('partials.enroll_invoice'))
                    </div>
                    <!-- invoice print part end -->
                </div>
            </div>
        </div>
    </section>
    <div id="editor"></div>
</div>
