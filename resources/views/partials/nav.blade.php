<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="/">Pok&eacute;mon Typing Game</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Request::is('/') ? 'active' : null }}">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>

            @guest
            <li class="nav-item {{ Request::is('/login') ? 'active' : null }}">
                <a class="nav-link" href="/login">Log In</a>
            </li>
            <li class="nav-item {{ Request::is('/register') ? 'active' : null }}">
                <a class="nav-link" href="/register">Register</a>
            </li>
            @endguest

            @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="/user/{{ Auth::user()->id }}/pokemon">My Pok&eacute;mon</a>
                    <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        Log Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
            @endauth
        </ul>

    </div>
</nav>