<div class="UserCard">
    <div class="UserCard__bg"></div>
    <div class="Box">
        <div class="flexRow">
            <div class="UserCard__avatar">
                <img src="{{ asset('images/avatar.jpeg') }}" alt="{{ $user->name }}" title="{{ $user->name }}" class="img-thumbnail" />
            </div>

            <div class="UserCard__names">
                <h2 class="UserCard__name">{{ $user->name }}</h2>
                <small class="UserCard__username">{{ '@'.$user->username }}</small>
            </div>
        </div>

        <ul class="UserCard__stats">
            <li class="UserCard__stat">
                <span class="UserCard__stat--label">{{ str_plural('Tweet', $user->tweets->count()) }}</span>
                <span class="UserCard__stat--value">{{ $user->tweets->count() }}</span>
            </li>

            <li class="UserCard__stat">
                <a href="{{ route('following', $user->username) }}">
                    <span class="UserCard__stat--label">Following</span>
                    <span class="UserCard__stat--value">{{ $user->following->count() }}</span>
                </a>
            </li>

            <li class="UserCard__stat">
                <a href="{{ route('followers', $user->username) }}">
                    <span class="UserCard__stat--label">{{ str_plural('Follower', $user->followers->count()) }}</span>
                    <span class="UserCard__stat--value">{{ $user->followers->count() }}</span>
                </a>
            </li>
        </ul>
    </div>  
</div>