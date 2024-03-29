@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.information',['user' =>$user])
            @include('users.navtabs',['user' =>$user])
            
            <div>
            @if(Auth::id() == $user->id )
                {!! Form::open(['route' => 'upload', 'method' => 'post','files' => true]) !!}
                    <div class="form-group">
                        {!! Form::label('file', '画像投稿', ['class' => 'control-label']) !!}
                        {!! Form::file('file') !!}
                    </div>
                    <div class="form-group m-0">
                        {!! Form::label('textarea', '投稿コメント', ['class' => 'control-label']) !!}
                        {!! Form::textarea('comment',null,['class' => 'form-control']) !!}
                    </div>   
                    <div class="form-group text-center">
                        {!! Form::submit('投稿', ['class' => 'btn btn-primary my-2']) !!}
                    </div>
                {!! Form::close() !!}
            @endif
            </div>
        </aside>
        <div class="col-sm-8">
             @include('users.posts',['posts' => $posts])
        </div>
    </div>
@endsection