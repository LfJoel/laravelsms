@foreach($getChat as $value)
@if($value->sender_id == Auth::user()->id)
<li class="clearfix">
    <div class="float-right">
        <div class="message-data text-end">
            <span class="message-data-time">{{ Carbon\Carbon::parse($value->created_at)->diffForHumans()}}</span>
            <img style="width: 30px; height:30px;" src="{{ $value->getSender->getProfileDirect() }}" alt="avatar">
        </div>
        <div class="message other-message float-right" style="text-align: left;"> {!! nl2br($value->message) !!}
            @if(!empty($value->getFile()))
            <div>
                <a href="{{$value->getFile()}}" download="" target="_blank"><i class="fa fa-download" aria-hidden="true"></i>
                    Attachment</a>
            </div>
            @endif
        </div>

    </div>

</li>
@else
<li class="clearfix">
    <div class="message-data">
        <img style="width: 30px; height:30px;" src="{{ $value->getSender->getProfileDirect() }}" alt="avatar">
        <span class="message-data-time">{{ Carbon\Carbon::parse($value->created_at)->diffForHumans()}}</span>
    </div>
    <div class="message my-message">{!! nl2br($value->message) !!}
        @if(!empty($value->getFile()))
        <div>
            <a href="{{$value->getFile()}}" download="" target="_blank"><i class="fa fa-download" aria-hidden="true"></i>
                Attachment</a>
        </div>
        @endif
    </div>
</li>
@endif
@endforeach