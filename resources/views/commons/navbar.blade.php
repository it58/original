<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-light titleBackColor">
        <a class="navbar-brand" href="/welcome">将棋</a>
       
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav navbar-light ml-auto">
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
        </div>
        
    </nav>
</header>
