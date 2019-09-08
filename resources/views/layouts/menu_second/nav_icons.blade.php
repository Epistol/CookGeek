<div class="" id="navIcons" role="navigation" aria-label="main navigation">
    <!-- Collapsed Hamburger -->
            <div class="navbar-start">
				<?php $typeuniv = DB::table('categunivers')->get(); ?>
                @foreach($typeuniv as $type)
                    <a class="navbar-item items-center" href="{{route("media.show", lcfirst($type->name))}}">
                        <figure class="image w-8 h-8">
                            <img class="w-8 h-8" src="/img/pictos/icones_menu/{{ $type->name }}.svg"
                                 alt="{{ strip_tags($type->name) }}"/>
                        </figure>
                        @if($type->name !== "anime")
                            <span class="navbar-secondaire-item">{{ ucfirst ($type->name ) }}</span>
                        @else
                            <span class="navbar-secondaire-item">Manga / Anime</span>
                        @endif
                    </a>
                @endforeach
                    {{--<a class="navbar-item " href="/vegan">
                        Vegan
                    </a>--}}
                    {{--<a class="navbar-item " href="/debut">
                            Débutant
                        </a>--}}
            </div>
            <div class="navbar-end">
                <a class="navbar-item items-center" href="{{route('page.shop')}}">
                    <div style="position:relative">
                        <span class="icon"><i class="fas fa-shopping-bag"></i></span>
                        <span>{{__('common.goodies')}}</span>
                    </div>
                </a>
                <a class="navbar-item items-center" href="https://www.facebook.com/Cuisine2Geek/">
                    <i class="fab fa-facebook-f fa-fw"></i>
                    <span hidden>Facebook</span>
                </a>
                <a class="navbar-item items-center" href="https://twitter.com/CuisineDeGeek">
                    <i class="fab fa-twitter fa-fw"></i>
                    <span hidden>Twitter</span>
                </a>
            </div>
</div>

{{--{{ menu('admin' ) }}--}}