@extends('layouts.app')

@section('content')
    
    <div class="row">
        <div class="col-sm-4">
            <div class="text-center my-4">
                <h3 class="titleBackColor border p-2">ユーザ検索</h3>
            </div>
            {!! Form::open(['route' => 'search', 'method' => 'get']) !!}
                <div class="form-group">
                    {!! Form::label('text', 'ユーザ名:') !!}
                    {!! Form::text('name' ,'', ['class' => 'form-control', 'placeholder' => '指定なし'] ) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('strength', '棋力:') !!}
                    {!! Form::select('strength', ['指定なし' => '指定なし'] + Config::get('strength.kiryoku') ,'指定なし') !!}
                </div>
                <div class="form-group">
                    {!! Form::label('tactics', '好きな戦法:') !!}
                    {!! Form::select('tactics', ['指定なし' => '指定なし'] + Config::get('tactics.senpou') , '指定なし') !!}
                </div>
                {!! Form::submit('検索', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
        <div class="col-sm-8">
            <div class="text-center my-4">
                <h3 class="titleBackColor p-2">ユーザ一覧</h3>
            </div>
            
            <div class="container">
                <!--検索ボタンが押された時に実行-->
                @if(!empty($data))
                    <div class="my-2 p-0">
                        <div class="row  border-bottom text-center">
                            <div class="col-sm-4">
                                <p>ユーザ名</p>
                            </div>
                            <div class="col-sm-4">
                                <p>棋力</p>
                            </div>
                            <div class="col-sm-4">
                                <p>好きな戦法</p>
                            </div>
                        </div>
                        @foreach($data as $item)
                            @if($item->name != 'guest')
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
                           @endif
                        @endforeach
                    </div>
                    {{ $data->appends(request()->input())->render('pagination::bootstrap-4') }}
                @endif
            </div>
        </div>
    </div>
@endsection