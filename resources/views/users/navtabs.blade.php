<ul class="nav nav-tabs nav-justified">
    <li class="nav-item"><a href="{{ route('users.following',['id' => $user->id]) }}" class="nav-link">フォロー <span class="badge badge-primary">{{ $user->followings()->get()->count() }}</span></a></li>
    <li class="nav-item"><a href="{{ route('users.follower',['id' => $user->id]) }}" class="nav-link">フォロワー <span class="badge badge-primary">{{ $user->followers()->get()->count() }}</span></a></li>
</ul>