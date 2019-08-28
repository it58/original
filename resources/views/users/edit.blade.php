@extends('layouts.app')

@section('content')
    

    <div class="row my-2">
        <div class="col-sm-6 offset-sm-3">
            
            <h2 class="border text-center p-2  brown">ユーザ情報編集</h2>

            {!! Form::open(['route' => ['users.update',$user->id], 'method' => 'put','files' => true]) !!}
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
                
                <div class="form-group">
                    {!! Form::label('file', 'ユーザアイコンを選択') !!}
                    {!! Form::file('file') !!}
                </div>
                        
                {!! Form::submit('変更', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection