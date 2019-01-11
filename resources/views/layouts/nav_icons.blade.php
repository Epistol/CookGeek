<div class="second_menu" role="navigation" aria-label="main navigation">
    <!-- Collapsed Hamburger -->
    <div class="container">
        <div class="navbar-menu" id="navMenu">
            <div class="navbar-start">
				<?php $typeuniv = DB::table('categunivers')->get(); ?>

                @foreach($typeuniv as $type)
                    <a class="navbar-item " href="{{route("media.show", lcfirst($type->name))}}">
                        <figure class="image is-32x32">
                            <img src="/img/pictos/icones_menu/{{ $type->name }}.svg"/>
                        </figure>
                        @if($type->name !== "anime")
                        <span class="item_navbar_second">{{ ucfirst ($type->name ) }}</span>
                            @else
                            <span class="item_navbar_second">Manga / Anime</span>
                        @endif

                    </a>
                @endforeach
            </div>
            <div class="navbar-end">
                <div class="navbar-item">
                    <a class="navbar-item "  href="https://www.facebook.com/Cuisine2Geek/">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="navbar-item "  href="https://twitter.com/CuisineDeGeek">
                        <i class="fab fa-twitter"></i>
                    </a>

                </div>
            </div>
        </div>

    </div>

</div>

{{--{{ menu('admin' ) }}--}}