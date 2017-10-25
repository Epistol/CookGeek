{{--
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">


        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
            </ul>
        </div>
    </div>
</nav>
--}}


<nav class="navbar" role="navigation" aria-label="main navigation">
    <!-- Collapsed Hamburger -->

<div class="container">


    <div class="navbar-brand">

        <a class="navbar-brand logo" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        <button class="button navbar-burger" data-target="navMenu">
            <span></span>
            <span></span>
            <span></span>
        </button>


    </div>

    <div class="navbar-menu" id="navMenu">
        <div class="navbar-start">
            <a class="navbar-item">
                Home
            </a>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Docs
                </a>

                <div class="navbar-dropdown">
                    <a class="navbar-item">
                        Overview
                    </a>
                    <a class="navbar-item">
                        Elements
                    </a>
                    <a class="navbar-item">
                        Components
                    </a>
                    <hr class="navbar-divider">
                    <div class="navbar-item">
                        Version 0.6.0
                    </div>
                </div>
            </div>

        </div>

        <div class="navbar-end">
            @guest
                <a class="navbar-item" href="{{ route('login') }}">Login</a>
                <a class="navbar-item" href="{{ route('register') }}">Register</a>
                @else
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link" >
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="navbar-dropdown">

                                <a class="navbar-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            <div>
                    </div>
                    @endguest
        </div>
    </div>

</div>



</nav>

