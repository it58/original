@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="text-center mt-5">
                <div class="center jumbotron ">
                    <h1>将棋の盤面の写真を投稿し、コメント及び評価できるサイト</h1>
                <!--Flex動作を有効にする、横並び、等間隔に並列-->
                    <div class="d-md-flex flex-row justify-content-around mt-5">
                        {!! link_to_route('signup.get', '会員登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
                        {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-primary']) !!}
                        {!! link_to_route('welcome', 'テストユーザでログイン', [], ['class' => 'btn btn-lg btn-primary']) !!}
                        
                        <!-- @if(!Auth::check())-->
                        <!--<form action="{{ route('login.post') }}" method="POST" class="mt-3">-->
                          
                        <!--    <input type="hidden" name="id" value="1">-->
                        <!--    <input type="hidden" name="name" value="guest">-->
                        <!--    <input type="hidden" name="email" value="guest@gmail.com">-->
                        <!--    <input type="hidden" name="password" value="guestpass">-->
                        <!--    <input type="hidden" name="tactics" value="中飛車">-->
                        <!--    <input type="hidden" name="strength" value="10級">-->
                        <!--    <input type="hidden" name="remember_token" value="guestpass">-->
                        <!--    <button type="submit" class="btn btn-primary">テストユーザーでログイン</button>-->
                        <!--</form>-->
                        <!--@endif-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
       
                