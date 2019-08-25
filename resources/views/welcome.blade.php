@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="row">
                
               <!--<aside class="col-sm-2">-->
               <!--     全ユーザを表示-->
               <!--     <h6 class="mb-4 p-2 text-center border">ユーザ一覧</h6>-->
               <!--         @foreach($users as $user)-->
               <!--             @if($user->id != 1)-->
               <!--                 <li class="media mb-3">-->
               <!--                     <img class="mr-2 rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">-->
               <!--                     <div class="media-body">-->
               <!--                         <div>-->
               <!--                             <a href="{{ route('users.show', ['id' => $user->id]) }}"><p>{{ $user->name }} </p></a>-->
               <!--                         </div>-->
               <!--                     </div>-->
               <!--                 </li>-->
               <!--             @endif-->
               <!--         @endforeach-->
               <!--     {{ $users->render('pagination::bootstrap-4') }}-->
               <!-- </aside>-->
                
                @if(!Auth::check())
                    <div class="text-center mt-4">
                        <div class="center jumbotron ">
                            <h1>将棋の盤面の写真を投稿し、コメント及び評価できるサイト</h1>
                        </div>
                        <div class="d-flex flex-row justify-content-around	">
                            {!! link_to_route('signup.get', '会員登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
                            {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-primary']) !!}
                            
                        </div>
                    </div>
                @else
                
                <div>
                    <h2 class="p-2 text-center border brown">最近の投稿</h2>
                    <!--全ユーザの投稿を表示-->
                    <div class="container-fluid m-0">
                        <div class="row justify-content-start">
                            @foreach($posts as $post)
                                <div class="my-4 p-0 col-md-6 col-lg-4 border">
                                    <div class="card-header text-center">
                                        <a href="{{ route('comments.show', ['id' => $post->id]) }}"><img src= {{ Storage::disk('s3')->url($post->image_file_name) }} alt="" width=250px height=250px></a>
                                    </div>
                                    <div class="card-body p-1">
                                        <span>{{ $post->image_title }}</span>
                                    </div>
                                    <div class="card-footer p-1">
                                        <p class="m-0">投稿日時：{{ $post->created_at }} </p>
                                        <a href="{{ route('users.show', ['id' => $post->user->id]) }}"><span>投稿者：{{ $post->user->name }} </span></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{ $posts->render('pagination::bootstrap-4') }}
                </div>
                <!--@endif-->
            </div>
        </div>
@endsection

