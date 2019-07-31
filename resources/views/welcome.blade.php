@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <h1 class="mb-4 p-2 text-center border">最近の投稿</h1>
        <!--全ユーザの投稿を表示-->
        @foreach($posts as $post)
            <div class="row mt-4">
                <div class="col-sm-4">
                    <a href="{{ route('comments.show', ['id' => $post->id]) }}"><img src= {{ Storage::disk('s3')->url($post->image_file_name) }} alt="" width="300px" height="300px"></a>
                </div>
                <div class="col-sm-8">
                    <p>{{ 'タイトル：'.$post->image_title }}</p>
                </div>
            </div>
        @endforeach
    @else
        
    <div class="text-center mt-4">
        <div class="center jumbotron ">
            <h1>将棋の盤面の写真を投稿し、コメント及び評価できるサイト</h1>
        </div>
        <div class="d-flex flex-row justify-content-around	">
            {!! link_to_route('signup.get', '会員登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
            {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    @endif
@endsection

