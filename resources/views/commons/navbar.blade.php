<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-light" style="background-color: #eee;">
        <a class="navbar-brand" href="/">トップページ</a>
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav navbar-light">
            <li class="nav-item">{!! link_to_route('search', 'ユーザ検索',null, ['class' => 'navbar-brand']) !!}</li>
            @if(Auth::check())
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item">{!! link_to_route('users.show', 'マイページ' ,['id' => Auth::id()]) !!}</li>
                        <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト',null ) !!}</li>
                    </ul>
                </li>
            @else
                <li class="nav-item">{!! link_to_route('signup.get', '会員登録',null, ['class' => 'navbar-brand']) !!}</li>
                <li class="nav-item">{!! link_to_route('login', 'ログイン',null, ['class' => 'navbar-brand']) !!}</li>
            @endif
        </ul>
    </nav>
</header>
