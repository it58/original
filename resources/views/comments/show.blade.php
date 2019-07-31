@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <aside class="col-sm-4 center">
                <div class="border">
                    <img src= {{ Storage::disk('s3')->url($post->image_file_name) }} alt="" width=100%>
                </div>
                <div class = "mt-4">
                    <p>タイトル：{{ $post->image_title }}</p>
                </div>
                <div class ="mt-4">
                    {!! Form::open(['route' => ['store',$post->id]]) !!}
                            {!! Form::textarea('comment',null, ['class' => 'form-control']) !!}
                        {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </aside>
            <div class="col-sm-8 center">
                <h1 class="border text-center p-2">コメント一覧</h1>
                <!--$Commentsの数だけループして表示する-->
                   @foreach($post->comments as $comment)
                       <div class="border mt-2">
                            <div>
                                <a href="{{ route('users.show', ['id' => $comment->user->id]) }}"><p>投稿： {{ $comment->user->name }} </p></a>
                            </div>
                            <div>
                                <p> {{ $comment->comment }} </p>
                            </div>
                                <div>
                                @if (!Auth::user()->is_reference($comment->id))
                                    {!! Form::open(['route' => ['reference.store',$comment->id]]) !!}
                                        {!! Form::submit('参考になった', ['class' => 'btn btn-primary ']) !!}
                                    {!! Form::close() !!}
                                @endif
                                </div>
                                <div>
                                    <p>{{ $comment->referencedUsers()->get()->count() }}人が参考になったといっています</p>
                                </div>
                        </div>
                    @endforeach
                
            </div>
        </div>
    </div>
@endsection