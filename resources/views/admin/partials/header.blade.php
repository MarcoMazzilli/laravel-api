<header>

    <nav class="navbar navbar-expand-md p-0 h-100">
        <div class="container-fluid px-5">

            <a class="navbar d-flex align-items-center" href="{{ url('/') }}">
            <div class="logo_mvm">
                <img src="/assets/mvm-avatar.png" alt="">
            </div>
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{url('/') }}">Vai al sito</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                {{-- Se l'utente è loggato --}}
                @else

                <li class="nav-item d-flex ">

                    <span class="nav-link px-5 text-capitalize text-white"> {{ Auth::user()->name }} </span>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Log-out</button>
                    </form>

                </li>

                @endguest

            </ul>
        </div>
    </div>
</nav>
</header>
