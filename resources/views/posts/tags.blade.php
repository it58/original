@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <!--タグ削除-->
        <div class="col-lg-6">
            <h2>登録中のタグ一覧</h2>
            {!! Form::open(['route' => ['tag.delete', $post->id], 'method' => 'delete']) !!}
                    @foreach($post->tagsToImage()->orderBy('tag_id','asc')->get() as $tag)
                        <li class="list-unstyled">
                            {!! Form::label('$tag->tag', $tag->tag ) !!}
                            {!! Form::checkbox('tagId[]', $tag->id, null, ['class' => 'field']) !!}
                        </li>
                    @endforeach
                 {!! Form::submit('解除', ['class' => 'btn btn-danger m-1']) !!}
            {!! Form::close() !!}
        </div>
   
        <!--タグ登録-->     
        <div class="col-lg-6">
            <h2>タグ一覧</h2>
            {!! Form::open(['route' => ['tag.store', $post->id], 'method' => 'post']) !!}
                @foreach(App\Tag::all() as $tag)
                    <li class="list-unstyled">
                        {!! Form::label('$tag->tag', $tag->tag ) !!}
                        {!! Form::checkbox('tagId[]', $tag->id, null, ['class' => 'field']) !!}
                    </li>
                @endforeach
                {!! Form::submit('登録', ['class' => 'btn btn-primary m-1']) !!}
            {!! Form::close() !!}

        </div>
    </div>
</div>

{!! link_to_route('users.show', '戻る',['id' => $post->user_id]) !!}

@endsection