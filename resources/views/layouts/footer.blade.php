<footer class="footer">
    <div class="container">
        <div class="columns">
            <div class="column">
                {{--Logo et infos--}}
                <ul>
                    <li>
                        CuisineDeGeek - © 2019 @if(now()->year != 2019) / {{ now()->year }} @endif
                    </li>
                    <li><br />
                        @lang('common.cdg.description')
                    </li>
                    <li>
                        <br /><a href="{{url('/contact')}}">Devenir annonceur </a>
                    </li>

                </ul>

            </div>
            <div class="column">
                <ul>
                    <li>
                        @lang('common.time-is') <fulltime></fulltime> | <i class="fas fa-bullhorn"></i> <span
                                id="updates" style="position:absolute;"></span>
                    </li>
                    <li><br />
                        <a href="{{url('/contact')}}"> Contact </a>
                    </li>
                    <li>
                        <a href="javascript:tarteaucitron.userInterface.openPanel();">Gestion des cookies</a>
                    </li>

                    <li>
                        <a href="{{route('page.conf')}}">Politique de confidentialité</a>
                    </li>
                    <li>
                        <a href="{{route('page.cgu')}}">CGU</a>
                    </li>
                    <li>
                        <a href="{{route('sitemap')}}">Sitemap</a>
                    </li>
                    @auth
                        @if (Auth::user()->hasRole('super-admin'))
                                <li>
                                    <a href="/admin">Admin</a>
                                </li>
                        @endif
                    @endauth


                </ul>
            </div>


        </div>
        </div>
</footer>