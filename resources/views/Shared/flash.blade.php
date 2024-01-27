@if (session('success'))
    <div class="mt-5 alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="mt-5 alert alert-danger">
        {{ session('error') }}
    </div>
@endif
