@foreach($getChatUser as $user)
<li class="clearfix getChatWindow  @if(!empty($receiver_id))
                                    @if($receiver_id == $user['user_id']) 
                                    active 
                                    @endif
                                    @endif" id="{{$user['user_id']}}">
    <img src="{{ $user['profile_pic'] }}" style="height: 50px;width:50px;" alt="avatar">
    <div class="about">
        <div class="row"><span>
                {{ $user['name'] }}
            </span>
            @if(!empty($user['messagecount']))
            <span id="clearMessage{{$user['user_id']}}" style="background-color: green;border-radius:50px;color:#fff;">{{ $user['messagecount'] }}</span>
            @endif
        </div>
        <div class="status">
        @if(!empty($user['is_online']))
        <i class="fa fa-circle online"></i>
        @else
        <i class="fa fa-circle offline"></i>
        @endif
        {{ Carbon\Carbon::parse($user['created_date'])->diffForHumans()}} 
    </div>

    </div>

</li>
@endforeach