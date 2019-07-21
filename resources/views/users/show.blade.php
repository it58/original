@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            <div>
                <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" alt="">
            </div>
            <div>
                <p class="border mt-4">ユーザ名：{{ $user->name }}</p>
                <p class="border mt-4">棋力：{{ $user->strength }}</p>
                <p class="border mt-4">好きな戦法：{{ $user->tactics }}</p>
            </div>
        </aside>
        <div class="col-sm-8">
            <ul class="nav nav-tabs nav-justified mb-3">
                
            </ul>
        </div>
    </div>
@endsection