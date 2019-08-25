<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark"> 
        <a class="navbar-brand" href="/admin/home">トップページ</a>
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav navbar-light">
            <li class="nav-item">{!! link_to_route('admin.search', 'ユーザ検索',null, ['class' => 'navbar-brand']) !!}</li>
            @if(Auth::guard('admin')->check())
                <li class="nav-item">{!! link_to_route('admin.logout', 'ログアウト',null ,['class' => 'navbar-brand']) !!}</li>
            @endif
        </ul>
    </nav>
</header>
