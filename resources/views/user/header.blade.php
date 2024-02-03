<div class="bg-light p-5 mb-5 text-center bg-img-account">
    <h1>{{ $user->name }}</h1>
</div>

<ul class="nav nav-tabs mb-4 flex-column flex-sm-row">
    @php
        $userRoute = request()->route()->getName();
    @endphp

    <!--<li class="nav-item">
        <a class="nav-link {{ str_contains($userRoute, '.mypage') ? 'active' : '' }}" href="{{ route('account.mypage') }}">Ma page</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ str_contains($userRoute, '.params') ? 'active' : '' }}" href="#">Paramètres</a>
    </li>-->

    <li class="nav-item">
        <a class="nav-link {{ str_contains($userRoute, '.announces') ? 'active' : '' }}" href="{{ route('account.announces') }}">
            Mes offres
            @include('user.announces_notification')
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ str_contains($userRoute, '.rents') ? 'active' : '' }}" href="{{ route('account.rents') }}">
            Mes locations
            @include('user.rents_notification')
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ str_contains($userRoute, '.messages') ? 'active' : '' }}" href="{{ route('account.messages.index') }}">
            Messages
            @include('user.messages_notification')
        </a>
    </li>
</ul>
