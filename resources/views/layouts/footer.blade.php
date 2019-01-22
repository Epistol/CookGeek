<footer class="footer">
    <div class="container">
        <div class="columns">
            <div class="column">
                {{--Logo et infos--}}
                <ul>
                    <li>
                        CuisineDeGeek - © 2019 @if(now()->year != 2019) / {{ now()->year }} @endif <span
                                id="updates" style="position:absolute;"></span>
                    </li>
                    <li>
                        @lang('common.cdg.description')
                    </li>

                </ul>

            </div>
            <div class="column">
                <ul>
                    <li>
                        <a href="{{url('/contact')}}">Contact </a>
                    </li>
                    <li>
                        <a href="javascript:tarteaucitron.userInterface.openPanel();">Gestion des cookies</a>
                    </li>
                    <li>
                        <a href="{{route('page.cgu')}}">CGU</a>
                    </li>
                    <li>
                        <a href="{{route('page.conf')}}">Politique de confidentialité</a>
                    </li>
                    <li>
                        <a href="{{route('sitemap')}}">Sitemap</a>
                    </li>
                </ul>
            </div>

            @auth
                @if (Auth::user()->hasRole('admin'))
                    <div class="column">
                        {{--Networks--}}
                        <li>
                            <a href="/admin">Admin</a>
                        </li>
                    </div>

                @endif
            @endauth

        </div>
        </div>
</footer>