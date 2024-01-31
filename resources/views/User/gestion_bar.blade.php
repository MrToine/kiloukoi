<div class="col-3">
    <h2>Gestion</h2>
    <ul class="list-group">
        <li class="list-group-item">
            <a href="{{ route('account.rents.request') }}" class="nav-link link-danger">
                Traiter les demandes en cours
                @include('user.announces_notification')
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('account.rents.close') }}" class="nav-link link-success">Mettre fin à une location</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('account.rents.list') }}" class="nav-link link-primary">Mofidier une annonce</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('account.rents.list') }}" class="nav-link link-primary">supprimer une annonce</a>
        </li>
    </ul>
</div>
