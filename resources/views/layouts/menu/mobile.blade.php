<div id="second-navbar" role="navigation" aria-label="main navigation">
    <!-- Collapsed Hamburger -->
            {{--User--}}
            @guest
                <div class="navbar-item"><a class="button"
                                            href="{{ route('register') }}">{{__('common.register')}}</a></div>
                <div class="navbar-item"><a class="button is-primary"
                                            href="{{ route('login') }}">{{__('common.login')}}</a>
                </div>
            @endguest
</div>