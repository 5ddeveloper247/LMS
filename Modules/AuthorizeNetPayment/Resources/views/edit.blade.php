@extends('backend.master')
@push('styles')
    <style>
        .image-editor-preview-img-1 {
            width: 180px;
            height: 90px;
            object-fit: contain;
        }
    </style>
@endpush
@section('mainContent')

    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid">


            <div class="white_box mb_30">
                <div class="white_box_tittle list_header">
                    <h4>Edit AuthorizeNet Credentials</h4>
                </div>
                <div class="col-lg-12">
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table">
                            <!-- table-responsive -->
                            <div class="student-details header-menu">
                              <form action="{{ route('authorizenetpayment.update') }}" method="POST">
                                  @csrf
                                  <input type="hidden" name="id" value="{{ $row->id }}">
                                <div class="row">
                                  <div class="col-xl-6">
                                      <div class="primary_input mb-25">
                                          <label class="primary_input_label" for="client_id">
                                              Client ID
                                              <strong class="text-danger">*</strong>
                                          </label>
                                          <input
                                              class="primary_input_field"
                                              name="client_id" placeholder="-"
                                              type="text" id="client_id" value="{{ $row->client_id }}">
                                      </div>
                                  </div>
                                  <div class="col-xl-6">
                                      <div class="primary_input mb-25">
                                          <label class="primary_input_label" for="client_secret">
                                              Client Secret
                                              <strong class="text-danger">*</strong>
                                          </label>
                                          <input
                                              class="primary_input_field"
                                              name="client_secret" placeholder="-"
                                              type="text" id="client_secret" value="{{ $row->client_secret }}">
                                      </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-xl-6">
                                      <div class="primary_input mb-25">
                                        <label class="primary_input_label" for="env"> Environment
                                            <strong class="text-danger">*</strong>
                                        </label>
                                        <select class="primary_select" name="env" id="env">
                                            <option
                                                value="Sandbox" @if($row->env == 'Sandbox') checked @endif>Sandbox
                                            </option>
                                            <option
                                                value="Live" @if($row->env == 'Live') checked @endif>Live
                                            </option>
                                        </select>
                                      </div>
                                  </div>
                                  <div class="col-xl-6">
                                      <div class="primary_input mb-25">
                                          <label class="primary_input_label" for="api_url">
                                              API Url
                                              <strong class="text-danger">*</strong>
                                          </label>
                                          <input
                                              class="primary_input_field"
                                              name="api_url" id="api_url" placeholder="http://"
                                              type="text" value="{{ $row->api_url }}">
                                      </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12 pt_15 text-center">
                                      <div class="d-flex justify-content-center">
                                          <button type="button" class="primary-btn tr-bg mx-2" onclick="window.location.href = '{{ route('paymentmethodsetting.payment_method_setting') }}'" class="primary-bg tr-bg">
                                            <i class="ti-arrow-left"></i> Back
                                          </button>
                                          <button class="primary-btn semi_large2 fix-gr-bg mx-2" id="save_button_parent"
                                              type="submit"><i class="ti-check"></i> {{ __('common.Update') }}
                                          </button>
                                      </div>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                    </div>
                        </div>
                    </div>
          </section>
  @endsection
