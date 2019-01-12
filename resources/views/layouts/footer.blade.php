<footer class="footer">
    <div class="container">
        <div class="content has-text-centered">
            <p>
                Tous droits réservés © CuisineDeGeek - 2019 @if(now()->year != 2019) / {{ now()->year }} @endif <span
                        id="updates" style="position:absolute;"></span>
                <br/>
                <a href="{{url('/contact')}}">Contact </a>
                | <a href="javascript:tarteaucitron.userInterface.openPanel();">Gestion des cookies</a>
                | <a href="{{url('/cgu')}}">CGU</a>
                @auth
                    @if (Auth::user()->hasRole('admin'))            <br/>
                    <a href="/admin">Admin</a>
                    @endif
                @endauth
            </p>
        </div>
    </div>
</footer>