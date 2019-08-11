@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="row">
                <aside class="col-sm-2">
                    <!--全ユーザを表示-->
                    <h6 class="mb-4 p-2 text-center border">ユーザ一覧</h6>
                        @foreach($users as $user)
                            @if($user->id != 1)
                                <li class="media mb-3">
                                    <img class="mr-2 rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
                                    <div class="media-body">
                                        <div>
                                            <a href="{{ route('users.show', ['id' => $user->id]) }}"><p>{{ $user->name }} </p></a>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    {{ $users->render('pagination::bootstrap-4') }}
                </aside>
                <div class="col-sm-10">
                    <h2 class="mb-4 p-2 text-center border brown">最近の投稿</h2>
                    <!--全ユーザの投稿を表示-->
                    <div class="container-fluid">
                        <div class="row justify-content-between ">
                            @foreach($posts as $post)
                                <div class="col-sm-4">
                                    <div class="card-header">
                                        <a href="{{ route('comments.show', ['id' => $post->id]) }}"><img src= {{ Storage::disk('s3')->url($post->image_file_name) }} alt="" width=100% height=100%></a>
                                    </div>
                                    <div class="card-body">
                                        <span>{{ $post->image_title }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{ $posts->render('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
@endsection

