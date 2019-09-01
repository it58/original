@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="row">
              
                    <div class="text-center mt-5">
                        <div class="center jumbotron ">
                            <h1>将棋の盤面の写真を投稿し、コメント及び評価できるサイト</h1>
                        
                        <div class="d-md-flex flex-row justify-content-around mt-5	">
                            {!! link_to_route('signup.get', '会員登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
                            {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-primary']) !!}
                            {!! link_to_route('welcome', '会員登録せずに始める', [], ['class' => 'btn btn-lg btn-primary']) !!}
                            
                        </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
       
                