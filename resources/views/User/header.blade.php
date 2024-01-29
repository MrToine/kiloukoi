<div class="bg-light p-5 mb-5 text-center bg-img-account">
    <h1>{{ $user->name }}</h1>
</div>
<ul class="nav nav-tabs">
    @php
        $user_route = request()->route()->getName();
    @endphp
    <li class="nav-item">
        <a @class(['nav-link', 'active' => str_contains($user_route, '.home')])  aria-current="page" href="#">Ma page</a>
    </li>
    <li class="nav-item">
        <a @class(['nav-link', 'active' => str_contains($user_route, '.params')])  aria-current="page" href="#">Paramètres</a>
    </li>
    <li class="nav-item">
        <a @class(['nav-link', 'active' => str_contains($user_route, '.announces')]) aria-current="page" href="{{ route('account.announces') }}">
            Mes offres
            @include('user.announces_notification')
        </a>
    </li>
    <li class="nav-item">
        <a @class(['nav-link', 'active' => str_contains($user_route, '.rents')]) aria-current="page" href="">
            Mes locations
            @include('user.rents_notification')
        </a>
    </li>
    <li class="nav-item">
        <a @class(['nav-link', 'active' => str_contains($user_route, '.messages')])  aria-current="page" href="{{ route('account.messages.index') }}">
            Messages
            @include('user.messages_notification')
        </a>
    </li>
</ul>

