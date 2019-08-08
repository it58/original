@extends('layouts.app')

@section('content')
    <div class="text-center mt-4">
        <h1>ユーザ検索</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'search.post']) !!}
           
                <div class="form-group">
                    {!! Form::label('strength', '棋力:') !!}
                    {!! Form::select('strength',Config::get('strength.kiryoku') , ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('tactics', '戦法:') !!}
                    {!! Form::select('tactics',Config::get('tactics.senpou') , ['class' => 'form-control']) !!}
                </div>
                <!--検索ボタンを押すと、SearchControllerのindexメソッドを実行-->
                {!! Form::submit('ユーザ検索', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
            
            @foreach($data as $item)
                <div> {{ $item->name }} </div>
                <div> {{ $item->strength }} </div>
                <div> {{ $item->tactics }} </div>
            @endforeach
        </div>
    </div>
@endsection