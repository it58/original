<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ secure_asset('css/styles.css') }}">
        <title>将棋</title>
        
        <style>
            body{
                background-color: #aaa;
            }
            
            .backgray {
                width:500px;
                border: 1px solid #000;
                padding: 1em;
                text-align: center;
                background-color: #dedede;
            }
            
            .back-ground{
                back-ground-color:silver;
            }
        </style>
    </head>
    <body>
        
        @include('admin.admin_navbar')
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
