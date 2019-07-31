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
            
            <div>
            @if(Auth::id() == $user->id )
                {!! Form::open(['route' => 'upload', 'method' => 'post','files' => true]) !!}
                    <div class="form-group">
                        {!! Form::label('file', '画像投稿', ['class' => 'control-label']) !!}
                        {!! Form::file('file') !!}
                    </div>
                    <div class="form-group m-0">
                        {!! Form::label('textarea', '投稿コメント', ['class' => 'control-label']) !!}
                        {!! Form::textarea('comment',null,['class' => 'form-control']) !!}
                    </div>   
                    <div class="form-group">
                        {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
            @endif
            </div>
        </aside>
      
        
        <div class="col-sm-8">
            <h1 class="border text-center p-2">投稿一覧</h1>
            <!--ユーザ個人のpostsを表示-->
            @foreach($posts as $post)
                
                <!--image_file_nameカラムに保存されている画像のパスを用いて画像を一覧表示-->
                <div class="row my-4">
                    <div class="col-sm-6">
                        <a href="{{ route('comments.show', ['id' => $post->id]) }}"><img src= {{ Storage::disk('s3')->url($post->image_file_name) }} alt="" width="300px" height="300px"></a>
                    </div>
                    <div class="col-sm-6">
                        <p>{{ 'タイトル：'.$post->image_title }}</p>
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