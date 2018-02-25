<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <!-- Bootstrap "Cover" template -->
    <link rel="stylesheet" href="css/jumbotron.css">

    <title>Peanut Butter Sandwich</title>
</head>
<body>

@include('partials.nav')

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1 class="display-3">Welcome!</h1>
        <p>This purpose of this website is to provide simple educational games and resources for kindergarten-level kids.</p>
        {{--<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>--}}
    </div>
</div>

@include('partials.flash')

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-4">
            <h2>Pok&eacute;mon Typing Game</h2>
            <p>Type the word you see and a Pok&eacute;mon appears from the Pokeball! If you're signed in, Pok&eacute;mon will get saved to your collection.</p>
            <p><a class="btn btn-secondary" href="/pokemon/typing-game" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Pok&eacute;mon Math Game</h2>
            <p>If you answer the question correctly you get a new Pok&eacute;mon! But if you get it wrong, watch out; you lose one! </p>
            <p><a class="btn btn-secondary" href="/pokemon/math-game" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Register</h2>
            <p>The only purpose for registration at this point is to save Pok&eacute;mon to your collection. There may be more features in the future but there will never be spam and your information will never be shared or sold.</p>
            <p><a class="btn btn-secondary" href="/register" role="button">View details &raquo;</a></p>
        </div>
    </div>

    <hr>

    @include('partials.footer')
</div> <!-- /container -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</body>
</html>