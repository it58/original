<div>
    <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" alt="">
</div>
<div>
    <p class="border mt-4">ユーザ名：{{ $user->name }}</p>
    <p class="border mt-4">棋力：{{ $user->strength }}</p>
    <p class="border mt-4">好きな戦法：{{ $user->tactics }}</p>
</div>
{!! Form::open(['route' => ['users.edit',$user->id], 'method' => 'get']) !!}
    {!! Form::submit('ユーザ情報編集', ['class' => 'btn btn-secondary my-2']) !!}
{!! Form::close() !!}
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
            