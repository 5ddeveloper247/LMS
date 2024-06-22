@extends(theme('layouts.dashboard_master'))

@section('title'){{Settings('site_title')  ? Settings('site_title')  : 'Infix LMS'}} | {{__('Private Messages')}} @endsection
@section('css')
    <link rel="stylesheet" href="{{asset('public/backend/css/communication.css')}}"/>
@endsection
@section('mainContent')


    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid plr_30">
            <div class="row justify-content-center">
                <div class="col-lg-12 p-0">
                    <div class="col-12">
                        <div class="section__title3 my-4">
                            <h3 class="custom_small_heading">
                                    {{ __('Private Message') }}
                            </h3>
                        </div>
                    </div>
                    <div class="messages_box_area">
                        <div class="messages_list">
                            <div class="white_box ">
                                <div class="white_box_tittle list_header">
                                    <h4>{{__('communication.Message List')}}</h4>
                                </div>
                                <div class="serach_field_2">
                                    <div class="search_inner">
                                        <form active="#">
                                            <div class="search_field search_field_communicate">
                                                <input type="text" id="search_input" onkeyup="searchReceiver()"
                                                       placeholder="{{__('communication.Search content here')}}..." class="search_input">
                                                       <button type="submit" class="communicate_submit"><i class="ti-search"></i></button>
                                            </div>
                                           
                                        </form>
                                    </div>
                                </div>
                                <ul id="receiver_list">
                                    @foreach ($users as $user)
                                        <li class="@if(@$user->sender->seen=='0') unseen @endif">
                                            <a href="#" id="user{{$user->id}}" class="user_list"
                                               onClick="getMessage({{$user->id}})">
                                                <div class="message_pre_left">
                                                    <div class="message_preview_thumb profile_info">
                                                        <div class="profileThumb"
                                                             style="background-image: url('{{getProfileImage($user->image)}}')">

                                                        </div>
                                                        {{--                                                        <img src="{{url($user->image)}}" alt="">--}}
                                                    </div>
                                                    <div class="messges_info">
                                                        <h4 id="receiver_name{{$user->id}}">{{$user->name}}</h4>
                                                        <p id="last_mesg{{$user->id}}">{{@$user->lastMessage()->message}}</p>
                                                    </div>
                                                </div>
                                                <div class="messge_time">
                                                    <span> {{@$user->lastMessage()->messageFormat}} </span>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="messages_chat ">
                            <div class="white_box ">
                                <div class="message_box_heading"><h3
                                        id="receiver_name">{{@$singleMessage->reciever->name}}</h3></div>
                                <div id="all_massages">{!! getConversations($messages ) !!}</div>

                                <div class="message_send_field">
{{--                                    @if (permissionCheck('communication.send'))--}}
                                        <form action="{{route('communication.StorePrivateMessage')}}" name="submitForm"
                                              id="submitForm" method="POST" style="display: contents;">
{{--                                            @endif--}}
                                            @csrf
                                            <input type="hidden" name="url" id="url" value="{{URL::to('/')}}">
                                            <input type="hidden" name="reciever_id" id="reciever_id"
                                                   value="{{@$singleMessage->reciever_id}}">
                                            <input type="text" name="message"
                                                   placeholder="{{__('communication.Write your message')}}" value=""
                                                   id="message">
{{--                                            @php--}}
{{--                                                $tooltip = "";--}}
{{--                                                if(permissionCheck('communication.send')){--}}
{{--                                                      $tooltip = "";--}}
{{--                                                  }else{--}}
{{--                                                      $tooltip = "You have no permission to Send";--}}
{{--                                                  }--}}
{{--                                            @endphp--}}
                                            <button class="btn_1 submitMessageBtn theme_btn" type="submit" id="submitMessage"
                                                    data-toggle="tooltip"
                                                    title="">{{__('common.Send')}}</button>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <input type="hidden" name="store_message" class="store_message"
           value="{{route('communication.StorePrivateMessage')}}">
    <input type="hidden" name="get_messages" class="get_messages"
           value="{{route('communication.getMessage')}}">

@endsection
@section('js')
    <script src="{{asset('public/backend/js/communication.js')}}"></script>
@endsection
