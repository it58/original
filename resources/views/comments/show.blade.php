@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <aside class="col-sm-4 center">
                <div class="border">
                    <img src= {{ Storage::disk('s3')->url($post->image_file_name) }} alt="" width=100%>
                </div>
                <div class = "mt-4">
                    <a href="{{ route('users.show',['id' => $post->user->id]) }}"><p> 投稿者：{{ $post->user->name }} </p></a>
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
                
                <select onChange="location.href=value;">
                    <option class="selected">並び替え</option>
                    <option value="/comments/{{ $post->id }}">新しい順</option>
                    <option value="/show.reference/{{ $post->id }}">参考になった順</option>
                </select>
                
                
                <!--$Commentsの数だけループして表示する-->
                    @foreach($comments as $comment)
                       <div class="border mt-2">
                            <div>
                                @if($comment->user->id  != 1)
                                    <a href="{{ route('users.show', ['id' => $comment->user->id]) }}"><p>投稿： {{ $comment->user->name }} </p></a>
                                @else
                                    <p>投稿：ゲスト </p> 
                                @endif
                            </div>
                            <div>
                                <p> {{ $comment->comment }} </p>
                            </div>
                                <div>
                                @if (Auth::check())
                                    <!--ログイン者が対象のコメントをまだ参考にしていない場合かつ、対象のコメントが自分のものでない場合-->
                                    @if (!Auth::user()->is_reference($comment->id) && Auth::id() != $comment->user_id)
                                        {!! Form::open(['route' => ['reference.store',$comment->id]]) !!}
                                            {!! Form::submit('参考になった', ['class' => 'btn btn-primary ']) !!}
                                        {!! Form::close() !!}
                                    @endif
                                @else
                                    {!! link_to_route('login', '参考になった',null, ['class' => 'btn btn-primary ']) !!}
                                   
                                @endif
                                </div>
                                <div>
                                    <p>{{ $comment->referencedUsers()->get()->count() }}人が参考になったといっています</p>
                                </div>
                        </div>
                    @endforeach
                {{ $comments->render('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection