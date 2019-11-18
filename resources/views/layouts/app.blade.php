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
                background-image:url({{ Storage::disk('s3')->url('adpDSC_6814-1-750x499.png') }});
                background-position: center center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }
            
        </style>
    </head>
    <body>
        
        @if(request()->path() != '/')
            @include('commons.navbar')
        @endif
        
            <div class="container">
                @include('commons.error_messages')
                
                @yield('content')
            </div>
       
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>
