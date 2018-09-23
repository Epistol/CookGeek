<footer class="footer">
    <div class="container">
        <div class="content has-text-centered">
            <p>
               <a href="{{url('/admin')}}">Tous droits réservés CuisineDeGeek.com - 2017</a>
                <a href="javascript:tarteaucitron.userInterface.openPanel();">Gestion des cookies</a>

                @if (Auth::user()->hasRole('admin'))            <br />
                <a href="/admin">Admin</a>
                @endif

            </p>
        </div>
    </div>
</footer>