@extends('backend.master')
@section('mainContent')
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row mt-40 mb-25">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0">{{@$user->name}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->
            <div class="QA_section QA_section_heading_custom check_box_table mt-30">
                <div class="QA_table ">
                    <table id="lms_table" class="table Crm_table_active3 table-responsive">
                        <thead>
                        <tr>
                            <th width="10%">{{__('payment.F-ID')}}</th>
                            <th width="15%">{{__('payment.Amount')}}</th>
                            <th width="15%">{{__('common.Type')}}</th>
                            <th width="15%">{{__('common.Date')}}</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($payments as $value)
                            <tr>
                                <td>{{@$value->id}}</td>
                                <td> {{$value->amount==0?0:getPriceFormat($value->amount)}}    </td>
                                <td> {{@$value->type}} {{__('payment.Fund')}}  </td>
                                <td>{{date('jS M, Y', strtotime(@$value->updated_at))}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>

@endsection
