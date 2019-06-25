<div class="navbar mobile-only" role="navigation" aria-label="main navigation">
    <!-- Collapsed Hamburger -->
    <div class="columns is-mobile is-marginless is-paddingless is-multiline">

        <div class="column is-6">
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
        </div>
        <div class="column is-6">
            {{--User--}}
            @guest
                <div class="navbar-item"><a class="button"
                                            href="{{ route('register') }}">{{__('common.register')}}</a></div>
                <div class="navbar-item"><a class="button is-primary"
                                            href="{{ route('login') }}">{{__('common.login')}}</a>
                </div>
                {{--<div class="navbar-item" ><a class="button is-primary"  @click="showModal = true" >Connexion</a></div>--}}
                {{--@include("auth.modal.login")--}}
            @else
                <div class="navbar-item is-hoverable"
                     style="display:flex;justify-content:center;align-items:flex-end;    padding-left: 1rem!important;">
                    <a class="navbar-item user_profile">
                        <div class="user_picture">
                            @if(Auth::user()->avatarUser!== 'users/default.png')
                                <figure class="image is-32x32">
                                    <img class="is-rounded "
                                         src="/user/{{Auth::user()->id}}/{{strip_tags(clean(Auth::user()->avatarUser))}}"
                                         style="height: 100%;width: 100%;">
                                </figure>
                            @else
                                <figure class="image is-32x32">
                                    <img class="is-rounded"
                                         src="https://api.adorable.io/avatars/32/{{ strip_tags(clean(Auth::user()->name))}}">
                                </figure>
                            @endif

                        </div>
                        <a class="navbar-item bg-white">
                            {{ str_limit(strip_tags(clean(Auth::user()->name, 25, "..."))) }}
                        </a>
                    </a>
                </div>
            @endguest
        </div>

        <div class="column">
            {{--Search icon if not shown--}}
            @if(Route::currentRouteNamed('home'))
            @else
            @endif
            {{--<switch-light></switch-light>--}}
        </div>
    </div>
</div>