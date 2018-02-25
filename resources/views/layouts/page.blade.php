<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Delius" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <!-- Open Ionic CSS -->
    <link href="/css/open-iconic-bootstrap.css" rel="stylesheet">

    <!-- Page-specific CSS -->
    <link rel="stylesheet" href="/css/page.css">
    @yield('styles')

    <title>Peanut Butter Sandwich</title>
</head>
<body>

@include('partials.nav')

<div class="container">

    @include('partials.flash')

    @yield('content')

    <hr>

    @include('partials.footer')
</div> <!-- /container -->

<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
@yield('scripts')

</body>
</html>