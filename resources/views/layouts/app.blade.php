<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ secure_asset('css/styles.css') }}">
        <title>将棋</title>
        
        <style>
            .back {
         
                background-color: white;
            }
            
            body{
                height: 100%;
                background-size: cover;
                background: no-repeat;
                background-image:url({{ Storage::disk('s3')->url('adpDSC_6814-1.jpg') }});
            }
            
            /*.bkRGBA{*/
            /*   背景画像の透過用css */
            /*  height: 100%;*/
            /*  background: rgba(255,255,255,0.5);*/
            /*}*/
            /*.no-opacity{*/
            /*position: absolute;*/
            /*top:84px;*/
            /*right: 0;*/
            /*bottom: 0;*/
            /*left: 0;*/
            /*margin: auto;*/
            
            /*}*/
        </style>
    </head>
    <body>
        
        @if(request()->path() != '/')
            @include('commons.navbar')
        @endif
        <div class="bkRGBA no-opacity">
            <div class="container">
                @include('commons.error_messages')
                
                @yield('content')
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>
