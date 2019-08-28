@if($user->icon !=null)
    <div>
        <img class="rounded img-fluid" src= {{ Storage::disk('s3')->url($user->icon) }} alt="">
    </div>
@else
    <div>
        <img class="rounded img-fluid" src= {{ Storage::disk('s3')->url('th_app_icon_account.jpg') }} alt="">
    </div>
@endif

<div>
    <p class="border mt-4">ユーザ名：{{ $user->name }}</p>
    <p class="border mt-4">棋力：{{ $user->strength }}</p>
    <p class="border mt-4">好きな戦法：{{ $user->tactics }}</p>
</div>
@if( Auth::id() == $user->id)
    {!! Form::open(['route' => ['users.edit',$user->id], 'method' => 'get']) !!}
        {!! Form::submit('ユーザ情報編集', ['class' => 'btn btn-secondary my-2']) !!}
    {!! Form::close() !!}
@endif

@if(Auth::check())
    @if(Auth::user()->id != $user->id)
        @if(!Auth::user()->is_following($user->id))
            {!! Form::open(['route' => ['user.follow',$user->id]]) !!}
                {!! Form::submit('フォロー', ['class' => 'btn btn-primary my-2']) !!}
            {!! Form::close() !!}
        @else
            {!! Form::open(['route' => ['user.unfollow',$user->id],'method' => 'delete']) !!}
                {!! Form::submit('フォロー解除', ['class' => 'btn btn-secondary my-2']) !!}
            {!! Form::close() !!}
        @endif
    @endif
@endif
            