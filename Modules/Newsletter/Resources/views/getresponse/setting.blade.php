@extends('backend.master')
@section('mainContent')
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-10 col-xs-6 col-md-6 col-6 no-gutters ">
                            <div class="main-title sm_mb_20 sm2_mb_20 md_mb_20 mb-30 ">
                                <h3 class="mb-0">   {{__('newsletter.GetResponse API Setting')}} </h3>
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{route('newsletter.getresponse.settingStore')}}"
                                  method="POST" enctype="multipart/form-data">
                                @csrf
                                <table class="display school-table school-table-style" cellspacing="0" width="100%">


                                    <tbody>
                                    <tr>
                                        <td>{{__('newsletter.Status')}}</td>
                                        <td>@if($connected)
                                                {{__('newsletter.Connected')}}
                                            @else
                                                {{__('newsletter.Not Connected')}}
                                            @endif </td>
                                    </tr>

                                    <tr>
                                        <td>{{__('newsletter.API Key')}}</td>
                                        <td>

                                            <div class="primary_input">
                                                <div class="primary_file_uploader">
                                                    <input
                                                        class="primary-input filePlaceholder placeholder_txt" type="text" id=""
                                                        name="getresponse_api" value="{{saasEnv('GET_RESPONSE_API')}}"
                                                        placeholder="{{__('newsletter.Your GetResponse API key')}}">

                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>{{__('newsletter.The API key for connecting with your GetResponse account')}}
                                            .
                                            <a
                                                href="https://app.getresponse.com/api" target="_blank">
                                                {{__('newsletter.Get your API key here')}}.</a></td>
                                    </tr>
                                    <tr>

                                        <td colspan="2" class="text-center">
                                            <button class="primary-btn semi_large2  fix-gr-bg"
                                                    id="save_button_parent" type="submit"><i
                                                    class="ti-check"></i> {{__('common.Save')}}
                                            </button>
                                        </td>


                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                    @if($connected)
                        <div class="row pt-3">
                            <div class="col-lg-12">
                                <div class="main-title sm_mb_20 sm2_mb_20 md_mb_20 mb-30 mt_30">
                                    <h3 class="mb-0">   {{__('newsletter.Your GetResponse Account')}} </h3>
                                </div>

                                <table class="display school-table school-table-style w-100">
                                    <thead>
                                    <tr>
                                        <th>{{__('newsletter.SL')}}</th>
                                        <th>{{__('newsletter.List Name')}}</th>
                                        <th>{{__('newsletter.ID')}}</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if(count($lists)==0)
                                        <tr>
                                            <td class="text-center" colspan="4">{{__('newsletter.No List Found')}}</td>

                                        </tr>
                                    @endif

                                    @foreach($lists as $key=>$list)

                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$list->name}}</td>
                                            <td>{{$list->campaignId}}</td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
@push('scripts')

@endpush
