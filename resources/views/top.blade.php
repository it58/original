@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="text-center mt-5">
                <div class="center jumbotron ">
                    <h2>将棋の盤面の写真を投稿し、コメント及び評価できるサイト</h2>
                <!--Flex動作を有効にする、横並び、等間隔に並列-->
                    <div class="d-md-flex flex-row justify-content-around mt-5">
                        {!! link_to_route('signup.get', '会員登録', [], ['class' => 'btn btn-sm btn-primary m-1']) !!}
                        {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-sm btn-primary m-1']) !!}
                        
                         @if(!Auth::check())
                            <form action="{{ route('login.post') }}" method="POST">
                              {{ csrf_field() }}
                                <input type="hidden" name="email" value="test@gmail.com">
                                <input type="hidden" name="password" value="123456">
                                <button type="submit" class="btn btn-sm btn-primary m-1">テストユーザーでログイン</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
       
                