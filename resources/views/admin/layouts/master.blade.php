<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <!-- Open Ionic CSS -->
    <link href="/css/open-iconic-bootstrap.css" rel="stylesheet">

    <!-- Admin Styles -->
    <link rel="stylesheet" href="/css/admin.css">

    <title>Peanut Butter Sandwich | Admin</title>
</head>
<body>

@include('admin.partials.top-nav')

<div class="container-fluid">
    <div class="row">
        @include('admin.partials.side-nav');

        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">

            @yield('content')

        </main>
    </div>
</div>

@include('admin.partials.footer')

</body>
</html>