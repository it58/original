@extends('layouts.app')

@section('content')

<h2>登録中のタグ一覧</h2>
{!! Form::open(['route' => ['tag.delete', $post->id], 'method' => 'delete']) !!}
    @foreach($post->tagsToImage()->orderBy('tag_id','asc')->get() as $tag)
        {{Form::checkbox('tagId[]', $tag->id, null, ['class' => 'field'])}}
        {{ $tag->tag }}
    @endforeach
    <br/>
     {!! Form::submit('解除', ['class' => 'btn btn-danger m-1']) !!}
{!! Form::close() !!}

<h2>タグ一覧</h2>
{!! Form::open(['route' => ['tag.store', $post->id], 'method' => 'post']) !!}
    @foreach(App\Tag::all() as $tag)
        {{Form::checkbox('tagId[]', $tag->id, null, ['class' => 'field'])}}
        {{ $tag->tag }}
    @endforeach
    <br/>
    {!! Form::submit('登録', ['class' => 'btn btn-primary m-1']) !!}
{!! Form::close() !!}

{!! link_to_route('users.show', '戻る',['id' => $post->user_id]) !!}

@endsection