@extends('layouts.app')

@section('content')
    <div class="text-center mt-4">
        <h1>ユーザ情報編集</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => ['users.update',$user->id], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'ユーザ名') !!}
                    {!! Form::text('name',$user->name, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
                </div>
           
                <div class="form-group">
                    {!! Form::label('strength', '棋力') !!}
                    {!! Form::select('strength',Config::get('strength.kiryoku') , ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('tactics', '戦法') !!}
                    {!! Form::select('tactics',Config::get('tactics.senpou') , ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>


                {!! Form::submit('変更', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection