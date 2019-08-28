@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <aside class="col-lg-6">
                <div class="border p-0">
                    <div class="card-header text-center">
                        <img src= {{ Storage::disk('s3')->url($post->image_file_name) }} alt="" width=350px height=350px >
                    </div>
                    <div class = "card-body p-1">
                        <a href="{{ route('users.show',['id' => $post->user->id]) }}"><span> 投稿者：{{ $post->user->name }} </span></a>
                    </div>
                    <div class = "card-footer p-1">
                        <span>タイトル：{{ $post->image_title }}</span>
                    </div>
                </div>
                <div class ="mt-4 text-center">
                    {!! Form::open(['route' => ['store',$post->id]]) !!}
                            {!! Form::textarea('comment',null, ['class' => 'form-control']) !!}
                        {!! Form::submit('投稿', ['class' => 'btn btn-primary my-2']) !!}
                    {!! Form::close() !!}
                </div>
            </aside>
            <div class="col-lg-6 center">
                <h3 class="border text-center p-2 brown">コメント一覧</h3>
                
                <select onChange="location.href=value;">
                    <option class="selected">並び替え</option>
                    <option value="/comments/{{ $post->id }}">新しい順</option>
                    <option value="/show.reference/{{ $post->id }}">参考になった順</option>
                </select>
                
                
                <!--$Commentsの数だけループして表示する-->
                    @foreach($comments as $comment)
                       <div class="border mt-2 card">
                            <div class="card-header m-0 p-0 pl-1">
                                @if($comment->user->id  != 1)
                                    <a href="{{ route('users.show', ['id' => $comment->user->id]) }}"><span>投稿： {{ $comment->user->name }} </span></a>
                                    <span>投稿日時： {{ $comment->created_at }} </span>
                                @else
                                    <span>投稿：ゲスト </span> 
                                    <span>投稿日時： {{ $comment->created_at }} </span>
                                @endif
                            </div>
                            <div class="card-body">
                                <p> {{ $comment->comment }} </p>
                            </div>
                            <div class="card-footer m-0 p-0 pl-1">
                            <!--ログイン者とコメント者のIDが同じなら削除ボタン表示-->
                                
                                <!--認証済みかどうか確認-->
                                @if (Auth::check())
                                   
                                       <!--ログイン者が対象のコメントをまだ参考にしていない場合かつ、対象のコメントが自分のものでない場合-->
                                       @if (!Auth::user()->is_reference($comment->id) && Auth::id() != $comment->user_id)
                                           <div class="inline">
                                               {!! Form::open(['route' => ['reference.store',$comment->id]]) !!}
                                                    {!! Form::submit('参考になった', [
                                                     'class' => 'btn btn-primary',
                                                    ]) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        <!--ログイン者がコメントを参考にしていてログイン者自身のコメントでない場合-->
                                        @elseif(Auth::user()->is_reference($comment->id) && Auth::id() != $comment->user_id)
                                            <div class="inline">
                                                {!! Form::open(['route' => ['reference.destroy',$comment->id],'method' => 'delete']) !!}
                                                    {!! Form::submit('取り消す', [
                                                      'class' => 'btn btn-secondary',
                                                    ]) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        <!--ログイン者自身のコメントの場合、削除ボタン表示-->
                                        @elseif(Auth::id() == $comment->user_id)
                                            <div class="inline">
                                                {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete']) !!}
                                                    {!! Form::submit('削除', ['class' => 'btn btn-danger card-text my-2']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                            <div class="inline">
                                                {!! Form::open(['route' => ['reference.destroy',$comment->id],'method' => 'delete']) !!}
                                                    {!! Form::submit('参考になった', [
                                                      'class' => 'btn btn-secondary',
                                                    ]) !!}
                                                {!! Form::close() !!}
                                            </div>
                                            
                                        @endif
                                        <div class="inline">
                                           <span class="balloon-left">{{ $comment->referencedUsers()->get()->count() }}</span>
                                        </div>
                                            
                                    
                                   
                                <!--認証済みでない場合、ボタンを押すとログイン画面に移動する-->
                                @else
                                    {!! link_to_route('login', '参考になった',null, ['class' => 'btn btn-primary ']) !!}
                                @endif
                            </div>
                        </div>
                    @endforeach
                {{ $comments->render('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection