@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            <div>
                <img src= {{ Storage::disk('s3')->url($post->image_file_name) }} alt="" width="300px" height="300px">
            </div>
            <div>
                <p>{{ $post->image_title }}</p>
            </div>
            <div>
                {!! Form::open(['route' => ['store',$post->id]]) !!}
                        {!! Form::text('comment') !!}
                    {!! Form::submit('投稿', ['class' => 'btn btn-primary btn-block']) !!}
                {!! Form::close() !!}
            </div>
        </aside>
        <div class="col-sm-8">
            <!--$Commentsの数だけループして表示する-->
           @foreach($post->comments as $comment)
                <div>
                    <a href="{{ route('users.show', ['id' => $comment->user->id]) }}"><p> {{ $comment->user->name }} </p></a>
                </div>
                <div>
                    <p> {{ $comment->comment }} </p>
                </div>
                {!! Form::open(['route' => ['store',$post->id]]) !!}
                        {!! Form::text('comment') !!}
                    {!! Form::submit('投稿', ['class' => 'btn btn-primary btn-block']) !!}
                {!! Form::close() !!}
            @endforeach
        </div>
    </div>
@endsection