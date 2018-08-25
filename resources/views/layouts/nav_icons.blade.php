<div class="second_menu" role="navigation" aria-label="main navigation">
    <!-- Collapsed Hamburger -->
    <div class="columns">
        <div class="column is-half is-offset-one-quarter is-paddingless">
            <div class="container">
                <div class="navbar-menu" id="navMenu">
                    <div class="navbar-start">

                        <?php
                        $typeuniv = DB::table('categunivers')->get();

                        ?>
                        @foreach($typeuniv as $type)
                            <div class="">
                                <a class="navbar-item nav-item-centered" href="{{ route('type.index') }}">
                                    <figure class="image is-32x32">
                                        <img src="/img/pictos/icones_menu/{{ $type->name }}.svg"/>
                                    </figure>
                                    <span class="item_navbar_second">{{ ucfirst ($type->name ) }}</span>

                                </a>
                            </div>


                        @endforeach
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

{{--{{ menu('admin' ) }}--}}