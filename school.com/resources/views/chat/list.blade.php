@extends('layouts.app')
@section('style')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="{{ url('public/emoji/emojionearea.min.css')}}" rel="stylesheet" />

<style type="text/css">
    .card {
        background: #fff;
        transition: .5s;
        border: 0;

        border-radius: .55rem;
        position: relative;
        width: 100%;
        box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
    }

    .emojionearea-editor {
        height: 90px !important;
        min-height: 90px !important;
    }

    .chat-app .people-list {
        width: 280px;
        position: absolute;
        left: 0;
        top: 0;
        padding: 20px;
        z-index: 7;

        background: #fff;
    }

    .chat-list {
        overflow: auto;
        height: 672px;
    }

    .chat-app .chat {
        margin-left: 280px;
        border-left: 1px solid #eaeaea
    }

    .people-list {
        -moz-transition: .5s;
        -o-transition: .5s;
        -webkit-transition: .5s;
        transition: .5s
    }

    .people-list .chat-list li {
        padding: 10px 15px;
        list-style: none;
        border-radius: 3px
    }

    .people-list .chat-list li:hover {
        background: #efefef;
        cursor: pointer
    }

    .people-list .chat-list li.active {
        background: #efefef
    }

    .people-list .chat-list li .name {
        font-size: 15px
    }

    .people-list .chat-list img {
        width: 45px;
        border-radius: 50%
    }

    .people-list img {
        float: left;
        border-radius: 50%
    }

    .people-list .about {
        float: left;
        padding-left: 8px
    }

    .people-list .status {
        color: #999;
        font-size: 13px
    }

    .chat .chat-header {
        padding: 15px 20px;
        border-bottom: 2px solid #f4f7f6
    }

    .chat .chat-header img {
        float: left;
        border-radius: 40px;
        width: 40px
    }

    .chat .chat-header .chat-about {
        float: left;
        padding-left: 10px
    }

    .chat .chat-history {
        padding: 20px;
        border-bottom: 2px solid #fff;
        overflow: auto;
        height: 600px;
    }

    .chat .chat-history ul {
        padding: 0
    }

    .chat .chat-history ul li {
        list-style: none;
        margin-bottom: 30px
    }

    .chat .chat-history ul li:last-child {
        margin-bottom: 0px
    }

    .chat .chat-history .message-data {
        margin-bottom: 15px
    }

    .chat .chat-history .message-data img {
        border-radius: 40px;
        width: 40px
    }

    .chat .chat-history .message-data-time {
        color: #434651;
        padding-left: 6px
    }

    .chat .chat-history .message {
        color: #444;
        padding: 18px 20px;
        line-height: 26px;
        font-size: 16px;
        border-radius: 7px;
        display: inline-block;
        position: relative
    }

    .chat .chat-history .message:after {
        bottom: 100%;
        left: 7%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
        border-bottom-color: #fff;
        border-width: 10px;
        margin-left: -10px
    }

    .chat .chat-history .my-message {
        background: #efefef
    }

    .chat .chat-history .my-message:after {
        bottom: 100%;
        left: 30px;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
        border-bottom-color: #efefef;
        border-width: 10px;
        margin-left: -10px
    }

    .chat .chat-history .other-message {
        background: #e8f1f3;
        text-align: right
    }

    .chat .chat-history .other-message:after {
        border-bottom-color: #e8f1f3;
        left: 30px;
    }

    .chat .chat-message {
        padding: 20px
    }

    .online,
    .offline,
    .me {
        margin-right: 2px;
        font-size: 8px;
        vertical-align: middle
    }

    .online {
        color: #86c541
    }

    .offline {
        color: #e47297
    }

    .me {
        color: #1d8ecd
    }

    .float-right {
        float: right
    }

    .clearfix:after {
        visibility: hidden;
        display: block;
        font-size: 0;
        content: " ";
        clear: both;
        height: 0
    }

    @media only screen and (max-width: 767px) {

        .chat-list {
            height: 400px;
        }

        .chat-app .people-list {
            /* height: 465px; */
            width: 100%;
            overflow-x: auto;
            background: #fff;
            /* left: -400px; */
            position: relative;
            border-bottom: 20px solid #e47297;
            /* display: none */
        }

        .chat-app .people-list.open {
            left: 0
        }

        .chat-app .chat {
            margin: 0
        }

        .chat-app .chat .chat-header {
            border-radius: 0.55rem 0.55rem 0 0
        }

        .chat-app .chat-history {
            height: 500px;
            overflow-x: auto
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 992px) {
        .chat-app .chat-list {
            height: 650px;
            overflow-x: auto
        }

        .chat-app .chat-history {
            height: 600px;
            overflow-x: auto
        }
    }

    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
        .chat-app .chat-list {
            height: 480px;
            overflow-x: auto
        }

        .chat-app .chat-history {
            height: calc(100vh - 350px);
            overflow-x: auto
        }
    }
</style>
@endsection
@section('content')
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-3">Message</h3>
                </div>
            </div>

            <!--end::Row-->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card chat-app">
                        <div id="plist" class="people-list">
                            <div class="input-group">
                                <span class="input-group-text" id="getSearchUser"><i class="fa fa-search"></i></span>
                                <input type="text" id="getSearch" class="form-control" placeholder="Search...">
                                <input type="hidden" id="getReceiverIDDynamic" value="{{ $receiver_id }}">

                            </div>
                            <ul class="list-unstyled chat-list mt-2 mb-0" id="getUserSearchDynamic">
                                <!-- user -->
                                @include('chat._user')
                            </ul>
                        </div>
                        <div class="chat" id="getChatMessageAll">
                            @if(!empty($getReceiver))
                            @include('chat._message')
                            @else

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->

    </div>

</main>

@endsection

@section('script')
<script src="{{ url('public/emoji/emojionearea.min.js')}}"></script>
<script type="text/javascript">
    $('.emoji').emojioneArea();

    $('body').delegate('.getChatWindow', 'click', function(e) {
        e.preventDefault();
        $('.getChatWindow').removeClass('active');
        $(this).addClass('active');
        var receiver_id = $(this).attr('id');
        $('#getReceiverIDDynamic').val(receiver_id);


        $.ajax({
            type: 'POST',
            url: "{{url('get_chat_window')}}",
            data: {
                'receiver_id': receiver_id,
                '_token': "{{ csrf_token() }}"
            },
            dataType: 'json',
            success: function(data) {
                $('#clearMessage' + receiver_id).hide();
                $('#getChatMessageAll').html(data.success);
                window.history.pushState("", "", "{{ url('chat?receiver_id=') }}" + data.receiver_id);
                $('.emoji').emojioneArea();
                scrolldown();

            },
            error: function(data) {

            },
        });
    });

    $('body').delegate('#getSearchUser', 'click', function(e) {

        var search = $('#getSearch').val();
        var receiver_id = $('#getReceiverIDDynamic').val();


        $.ajax({
            type: 'POST',
            url: "{{url('get_chat_search_user')}}",
            data: {
                'search': search,
                'receiver_id': receiver_id,
                '_token': "{{ csrf_token() }}"
            },
            dataType: 'json',
            success: function(data) {
                $(('#getUserSearchDynamic')).html(data.success);
            },
            error: function(data) {

            },
        });
    });


    $('body').delegate('#SubmitMessage', 'submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "{{url('submit_message')}}",
            data: new FormData(this),
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(data) {
                $('#AppendMessage').append(data.success);
                $('#ClearMessage').val('');
                $('#file_name').val('');
                $('#getFileName').html('');
                $('.emojionearea-editor').html('');

                scrolldown();
            },
            error: function(data) {

            },
        });
    });

    function scrolldown() {
        $('.chat-history').animate({
            scrollTop: $('.chat-history').prop("scrollHeight") + 30000
        }, 500);
    }
    scrolldown();

    $('body').delegate('#open_file', 'click', function(e) {
        $('#file_name').trigger('click');
    });
    $('body').delegate('#file_name', 'change', function(e) {
        var filename = this.files[0].name;
        $('#getFileName').html(filename);



    });
</script>
@endsection