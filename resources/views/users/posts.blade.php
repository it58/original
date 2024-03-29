<!--あるユーザの投稿一覧を表示-->

<h1 class="border text-center p-2  titleBackColor">投稿一覧</h1>

<div class="container-fluid">
    <div class="row justify-content-start ">
        @foreach($posts as $post)
            
            <!--image_file_nameカラムに保存されている画像のパスを用いて画像を一覧表示-->
            <div class="col-lg-6 border p-0">
                <div class="card-header text-center">
                    <a href="{{ route('comments.show', ['id' => $post->id]) }}"><img src= {{ Storage::disk('s3')->url($post->image_file_name) }} alt="" width=250px height=250px></a>
                </div>
                <div class="card-body p-1">
                    <span class="card-title">{{ $post->image_title }}</span>
                </div>
                <div class="card-footer  m-0 p-0 pl-1">
                    <span>タグ:</span>
                    <!--投稿写真がログイン者のものであれば、タグの編集が可能-->
                    @if (Auth::id() == $post->user_id)
                        @foreach($post->tagsToImage()->orderBy('tag_id','asc')->get() as $tag)
                            <span>{{ $tag->tag }}</span>
                        @endforeach
                        <span>
                            {!! Form::open(['route' => ['tag.index', $post->id], 'method' => 'get']) !!}
                                {!! Form::submit('編集', ['class' => 'btn btn-primary my-2']) !!}
                            {!! Form::close() !!}
                        </span>
                    @endif
                    <!--投稿写真がログイン者のものであれば、タグの削除が可能-->
                    @if (Auth::id() == $post->user_id)
                        {!! Form::open(['route' => ['delete', $post->id], 'method' => 'delete']) !!}
                                {!! Form::submit('削除', ['class' => 'btn btn-danger my-2']) !!}
                        {!! Form::close() !!}
                        
                    @endif
                   
                </div>
            </div>
            
        @endforeach
    </div>
</div>
{{ $posts->render('pagination::bootstrap-4') }}
