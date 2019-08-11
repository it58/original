<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark"> 
        <a class="navbar-brand" href="/">トップページ</a>
        <ul class="navbar-nav mr-auto"></ul>
        @if(Auth::check())
            <ul class="navbar-nav">
                <li>{!! link_to_route('search', 'ユーザ検索',null, ['class' => 'navbar-brand']) !!}</li>
                <li>{!! link_to_route('logout.get', 'ログアウト',null, ['class' => 'navbar-brand']) !!}</li>
            </ul>
        @else
            <ul class="navbar-nav">
                <li>{!! link_to_route('search', 'ユーザ検索',null, ['class' => 'navbar-brand']) !!}</li>
                <li>{!! link_to_route('signup.get', '会員登録',null, ['class' => 'navbar-brand']) !!}</li>
                <li>{!! link_to_route('login', 'ログイン',null, ['class' => 'navbar-brand']) !!}</li>
            </ul>
        @endif
    </nav>
</header>
