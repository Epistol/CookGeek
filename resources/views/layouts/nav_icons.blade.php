<div class="second_menu" role="navigation" aria-label="main navigation">
    <!-- Collapsed Hamburger -->
    <div class="container">
        <div class="columns is-marginless">
            <div class="column is-half  is-paddingless">

                <div class="navbar-menu" id="navMenu">
                    <div class="navbar-start">

                        <?php
                        $typeuniv = DB::table('categunivers')->get();
                        ?>
                        @foreach($typeuniv as $type)
                            <a class="navbar-item " href="{{route("type.show", lcfirst($type->name))}}">
                                <figure class="image is-32x32">
                                    <img src="/img/pictos/icones_menu/{{ $type->name }}.svg"/>
                                </figure>
                                <span class="item_navbar_second">{{ ucfirst ($type->name ) }}</span>

                            </a>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

{{--{{ menu('admin' ) }}--}}