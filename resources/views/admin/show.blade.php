@extends('layouts.admin')

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
                    <div class="form-group">
                        {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
            @endif
            </div>
        </aside>
      
        
        <div class="col-sm-8">
            <h1 class="border text-center p-2">投稿一覧</h1>
            <!--ユーザ個人のpostsを表示-->
            <div class="container-fluid">
                <div class="row justify-content-between ">
                    @foreach($posts as $post)
                        
                        <!--image_file_nameカラムに保存されている画像のパスを用いて画像を一覧表示-->
                        <div class="col-sm-4">
                            <div class="card-header">
                                <a href="{{ route('comments.show', ['id' => $post->id]) }}"><img src= {{ Storage::disk('s3')->url($post->image_file_name) }} alt="" width=100% height=100%></a>
                            </div>
                            <div class="card-body text-left px-0">
                                <p class="card-title">{{ $post->image_title }}</p>
                                
                                    {!! Form::open(['route' => ['admin.delete', $post->id], 'method' => 'delete']) !!}
                                        {!! Form::submit('削除', ['class' => 'btn btn-danger card-text']) !!}
                                    {!! Form::close() !!}
                              
                            </div>
                        </div>
                        
                    @endforeach
                </div>
            </div>
            {{ $posts->render('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection