@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <aside class="col-sm-2">
            <h6 class="p-2 text-center border brown" >タグ一覧</h6>
            @foreach(App\Tag::all() as $tag)
                <span><a href="{{ route('tag.search',['id' => $tag->id] ) }}">{{ $tag->tag }}</a></span>
                <span class="badge badge-primary">{{ $tag->taggedImages()->get()->count() }}</span><br/>
            @endforeach
        </aside>    
        <div class="col-sm-10">
            
            <h2 class="p-2 text-center border brown">最近の投稿</h2>
            <!--全ユーザの投稿を表示-->
            <div class="container-fluid m-0">
                <div class="row justify-content-start">
                    @foreach($posts as $post)
                        <div class="my-4 p-0 col-lg-6 col-xl-4 border">
                            <div class="card-header text-center">
                                <a href="{{ route('comments.show', ['id' => $post->id]) }}"><img src= {{ Storage::disk('s3')->url($post->image_file_name) }} alt="" width=250px height=250px></a>
                            </div>
                            <div class="card-body p-1">
                                <span>{{ $post->image_title }}</span>
                            </div>
                            <div class="card-footer p-1">
                                <p class="m-0">投稿日時：{{ $post->created_at }} </p>
                                <p class="m-0">タグ</p>
                                @foreach($post->tagsToImage()->orderBy('tag_id','asc')->get() as $tag)
                                    <span>{{ $tag->tag }}</span>
                                @endforeach
                                <a href="{{ route('users.show', ['id' => $post->user->id]) }}"><p>投稿者：{{ $post->user->name }} </p></a>
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

