@extends('layouts.app')

@section('content')
    <div class="text-center my-4">
        <h1>ユーザ検索</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'search.post']) !!}
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            {!! Form::label('text', 'ユーザ名:') !!}
                        </div>
                        <div class="col-sm-9">
                            {!! Form::text('name' ,'', ['class' => 'form-control', 'placeholder' => '指定なし'] ) !!}
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    {!! Form::label('strength', '棋力:') !!}
                    {!! Form::select('strength', ['指定なし' => '指定なし'] + Config::get('strength.kiryoku') ,'指定なし') !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('tactics', '戦法:') !!}
                    {!! Form::select('tactics', ['指定なし' => '指定なし'] + Config::get('tactics.senpou') , '指定なし') !!}
                </div>
                {!! Form::submit('ユーザ検索', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
            
            @if(!empty($data))
                @foreach($data as $item)
                    <div class="container">
                        <div class="row py-2 border-bottom text-center">
                            
                                <div class="col-sm-4">
                                    <a href="{{ route('users.show', ['id' => $item->id]) }}">{{ $item->name }}</a>
                                </div>
                                <div class="col-sm-4">
                                    {{ $item->strength }}
                                </div>
                                <div class="col-sm-4">
                                    {{ $item->tactics }}
                                </div>
                           
                        </div>  
                    </div> 
                 @endforeach
                {{ $data->render('pagination::bootstrap-4') }}
            @endif
        </div>
    </div>
@endsection