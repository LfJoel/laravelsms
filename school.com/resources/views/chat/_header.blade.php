<div class="row">
    <div class="col-lg-6">
        <img style="width: 50px; height:50px;" src="{{ $getReceiver->getProfileDirect()}}" alt="avatar">
        <div class="chat-about">
            <h6 class="m-b-0">{{ $getReceiver->name}} {{ $getReceiver->last_name}}</h6>
            <small>
                @if(!empty($getReceiver->onlineUser()))
                <span class="text-success">Online</span>
                @else
                Last seen: {{ Carbon\Carbon::parse($getReceiver->updated_at)->diffForHumans()}}</small>
                @endif
        </div>
    </div>

</div>