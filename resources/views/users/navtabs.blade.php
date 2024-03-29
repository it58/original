<!--フォロー,フォロワー,投稿一覧タブを表示。タブをクリックすると表示を切り替える-->
<ul class="nav nav-tabs nav-justified">
    <li class="nav-item"><a href="{{ route('users.following',['id' => $user->id]) }}" class="nav-link">フォロー <span class="badge badge-primary">{{ $user->followings()->get()->count() }}</span></a></li>
    <li class="nav-item"><a href="{{ route('users.follower',['id' => $user->id]) }}" class="nav-link">フォロワー <span class="badge badge-primary">{{ $user->followers()->get()->count() }}</span></a></li>
    <li class="nav-item"><a href="{{ route('users.show',['id' => $user->id]) }}" class="nav-link">投稿一覧 <span class="badge badge-primary">{{ $user->posts()->get()->count() }}</span></a></li>
</ul>