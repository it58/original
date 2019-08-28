@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="row">
              
                    <div class="text-center mt-4">
                        <div class="center jumbotron ">
                            <h1>将棋の盤面の写真を投稿し、コメント及び評価できるサイト</h1>
                        </div>
                        <div class="d-flex flex-row justify-content-around	">
                            {!! link_to_route('signup.get', '会員登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
                            {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-primary']) !!}
                            {!! link_to_route('welcome', '会員登録せずに始める', [], ['class' => 'btn btn-lg btn-primary']) !!}
                            
                        </div>
                    </div>
                </div>
            </div>
@endsection
       
                