<div class="useravatar">
    <div class="avatar"> 
        @if ($playlist->user)
            @if ($playlist->user->avatar)
                <div class="size-8 rounded-full">
                    <img src="{{$playlist->user->avatar}}" style="background-color:LavenderBlush">
                    <div class="avatar-letter">{{$playlist->user->name[0]}}</div>
                </div>
            @else
                <div class="size-8 border-2 border-solid border-gray-300 rounded-full width:40px height:40px">
                    <img src="//:0" style="background-color:LavenderBlush">
                    <div class="avatar-letter">{{$playlist->user->name[0]}}</div>
                </div>
            @endif
        @else
            <div class="avatar placeholder">
                <div class="size-8 rounded-full border border-2 border-solid border-gray-300 border-base-content/20 bg-base-content/10 text-base-content/60">
                    <img style="background-color:red"
                        alt="Anonymous User" class="rounded-full" />
                </div>
            </div>
        @endif
    </div> 
</div>
