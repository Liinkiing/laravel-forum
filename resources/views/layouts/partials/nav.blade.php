<nav class="main-nav">
    <div class="branding">
        <a href="{{ route('homepage') }}" class="nav-item">{{ config('app.name') }}</a>
    </div>

    <div class="nav-items">
        <ul>
            <li><a class="nav-item" href="">Test</a></li>
            <li><a class="nav-item" href="">Test 2</a></li>
            <li><a class="nav-item" href="">Test 3</a></li>
            @if(Auth::check())
                <li><a class="nav-item" href="#">{{ Auth::user()->name }}</a></li>
                <li><a class="nav-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       href="{{ route('logout') }}">Se déconnecter</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @else
                <li><a class="nav-item" href="{{ route('login') }}">Se connecter / S'inscrire</a></li>
            @endif
        </ul>
    </div>
</nav>