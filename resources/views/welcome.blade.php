@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="row">
            
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
            </div>
        </div>
@endsection

