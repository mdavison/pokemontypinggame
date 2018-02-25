@if (session('message'))
    <div class="alert alert-info" role="alert">
        {{ session('message') }}
    </div>
@endif

@if (session('status') && !session('errors') && !session('success'))
    <div class="alert alert-info" role="alert">
        {{ session('status') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

@if (session('errors') && session('status'))
    <div class="alert alert-danger" role="alert">
        {{ session('status') }}
    </div>
@endif
