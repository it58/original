@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            <div>
                <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" alt="">
            </div>
            <div>
                <p class="border mt-4">ユーザ名：{{ $user->name }}</p>
                <p class="border mt-4">棋力：{{ $user->strength }}</p>
                <p class="border mt-4">好きな戦法：{{ $user->tactics }}</p>
            </div>
            
            @if(Auth::id() == $user->id )
                {!! Form::open(['route' => 'upload', 'method' => 'post','files' => true]) !!}
                    <div class="form-group">
                        {!! Form::label('file', '画像アップロード', ['class' => 'control-label']) !!}
                        {!! Form::file('file') !!}
                    </div>   
                    <div class="form-group">
                        {!! Form::submit('アップロード', ['class' => 'btn btn-default']) !!}
                    </div>
                {!! Form::close() !!}
            @endif
        </aside>
      
        
        <div class="col-sm-8">
            @foreach($posts as $post)
                
                <!--image_file_nameカラムに保存されている画像のパスを用いて画像を一覧表示-->
                <div class="row">
                    <div class="col-sm-6">
                        <a href=""><img src= {{ Storage::disk('s3')->url($post->image_file_name) }} alt="" width="300px" height="300px"></a>
                    </div>
                    <div class="col-sm-6">
                        <p>{{ $post->image_title }}</p>
                        <p>{{ $post->image_file_name }}</p>
                    </div>
                </div>
                @if (Auth::id() == $post->user_id)
                    {!! Form::open(['route' => ['delete', $post->id], 'method' => 'delete']) !!}
                            {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                @endif
            @endforeach
        </div>
    </div>
@endsection