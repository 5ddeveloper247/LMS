@extends('backend.master')
@section('mainContent')
{!! generateBreadcrumb() !!}
<section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex">
                            <h3 class="mr-30 mb_xs_15px mb_sm_20px mb-0">{{ __('Contact Messages') }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table">
                            <!-- table-responsive -->
                            <div class="">
                                <table id="lms_table" class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col"> {{ __('common.SL') }}</th>
                                            <th scope="col"> {{ __('Name') }}</th>
                                            <th scope="col"> {{ __('Email') }}</th>
                                            <th scope="col">{{ __('Phone') }}</th>
                                            <th scope="col">{{ __('Zip') }}</th>
                                            <th scope="col">{{ __('Course / Program') }}</th>
                                            <th scope="col">{{ __('Year') }}</th>
                                            <th scope="col">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($messages as $key => $item)
                                           <th>{{ $key+1 }}</th>
                                           <th> {{ $item->name }} </th> 
                                           <th> {{ $item->email }} </th> 
                                           <th> {{ $item->phone }} </th> 
                                           <th> {{ $item->zip }} </th> 
                                           <th> {{ $item->program }} </th> 
                                           <th> {{ $item->year }} </th> 
                                           {{-- <th> {{ $item->message }} </th>  --}}
                                           <th> 
                                            <div class="dropdown CRM_dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenu2" data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false">
                                                    {{trans('common.Action')}}
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="dropdownMenu2">
                                                        <a class="dropdown-item"
                                                        href="javascript:void(0)" onclick = "showmessage({{ $item->id }})">{{ __('View Message') }}</a>
                                                   
                                                </div>
                                            </div>
                                            </th> 
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade admin-query" id="viewMessageModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('Message') }} </h4>
                        <button type="button" class="close" data-dismiss="modal"><i class="ti-close"></i></button>
                    </div>
                    <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-stripped">
                                    <tr>
                                        <th style="width:35%">From:</th>
                                        <th style="width:65%" id="msg_from"></th>
                                    </tr>
                                    <tr>
                                        <th style="width:35%">Date / Time:</th>
                                        <th style="width:65%" id="msg_date"></th>
                                    </tr>
                                    <tr>
                                        <th style="width:35%">Message:</th>
                                        <th style="width:65%" id="msg_message"></th>
                                    </tr>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
@push('scripts')
<script>
    function showmessage(id){
        $('#msg_from').html('<i>...</i>');
        $('#msg_date').html('<i>...</i>');
        $('#msg_message').html('<i>...</i>');
        let url = "{{ route('frontend.fetchContactMessage') }}";
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax({
                type: "POST",
                url: url,
                data: {
                    id: id
                },
                success: function(response) {
                    if (response.success) {
                        let dateSplit =response.data.created_at.split('T'); 
                        let timeSplit = dateSplit[1].split('.');
                        let date = dateSplit[0];
                        let time = timeSplit[0];
                        $('#msg_from').html(response.data.name);
                        $('#msg_date').html(date+' <i>'+time+'</i>');
                        $('#msg_message').html(response.data.message);
                    }
                }
        });
        $('#viewMessageModal').modal('show');

    }
</script>
@endpush