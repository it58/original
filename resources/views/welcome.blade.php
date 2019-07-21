@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <h1>将棋の盤面の写真を投稿し、コメント及び評価できるサイト</h1>
            {!! link_to_route('signup.get', '会員登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
            <button class="btn btn-primary">ログイン</button>
            
        </div>
    </div>
@endsection

