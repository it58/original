@if(Auth::check())
    <header class="mb-4">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark"> 
            <a class="navbar-brand" href="/">トップページ</a>
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
            </ul>
        </nav>
    </header>
@endif