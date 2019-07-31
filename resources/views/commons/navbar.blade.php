@if(Auth::check())
    <header class="mb-4">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark"> 
            <a class="navbar-brand" href="/">トップページ</a>
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                <li>{!! link_to_route('logout.get', 'ログアウト',null, ['class' => 'navbar-brand']) !!}</li>
            </ul>
        </nav>
    </header>
@endif