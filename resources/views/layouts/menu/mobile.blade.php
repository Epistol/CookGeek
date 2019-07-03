<div class="navbar mobile-only" role="navigation" aria-label="main navigation">
    <!-- Collapsed Hamburger -->
    <div class="columns is-mobile is-marginless is-paddingless is-multiline">
            {{--Logo--}}
            <div class="navbar-brand">
                <a href="{{url('/')}}" class="navbar-item is-paddingless is-marginless" style="width: 4.2rem;">
                    <img src="{{asset('img/logoo_rond.png')}}" alt="CDG : Cuisine De geek"
                         style="max-height: 100%; padding: 0.2rem;">
                </a>
                <a href="{{url('/')}}" class="navbar-brand logo">
                    CDG
                    <span class="logo-beta">
                    BETA
                </span>
                </a>
            </div>
            {{--User--}}
            @guest
                <div class="navbar-item"><a class="button"
                                            href="{{ route('register') }}">{{__('common.register')}}</a></div>
                <div class="navbar-item"><a class="button is-primary"
                                            href="{{ route('login') }}">{{__('common.login')}}</a>
                </div>
            @endguest
    </div>
</div>