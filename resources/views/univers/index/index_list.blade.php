{{--Pour chaque catégorie d'univers (livre, jeux) , on va devoir savoir si il existe des univers populaire --}}
@foreach($cateunivers as $categ)
    {{--Récupération de tout les univers--}}
    @php
        $univers_list_id = $controller->get_all_universes_in_categ($categ->id);
    @endphp

    @if(count($univers_list_id))
        <div class="categ-univers-recette ">
            <section class="hero">
                <div class="is-flex hero-body">
                    <a href="{{route('media.show', $categ->name)}}"><h2 class="title"
                                                                        style="padding-right: 0.5rem">{{ucfirst($categ->name)}}</h2>
                    </a>
                    <categ_icon text_icon="{{$categ->name}}"></categ_icon>
                </div>
            </section>
            <div class="univers-element ">
                <!-- Liste des univers contenus -->
                <ul class=" flex mb-4 is-multiline is-flex-center">

                    {{--Pour chaque univers dans le categ--}}
                    @foreach($univers_list_id as $nb => $univers_id)

                        {{--// On charge l'info univers--}}
                        @php
                            $univers_data = DB::table('univers')->where('id', '=', $univers_id->univers)->first();
                        @endphp

                        {{--// pour chaque univers, on va compter le nombre de recette--}}
                        @if($univers_data !== null)
                            @php
                                $recipe_count = DB::table('recipes')->where("type_univers", "=", $categ->id)->where('univers', $univers_data->id)->count();
                                $recipe = collect(DB::table('recipes')->where("type_univers", "=", $categ->id)->where('univers', $univers_data->id)->latest()->orderBy('nb_views', 'desc')->get())->random();
                                $img = $pictureService->loadRecipePicturesValid($recipe);
                            @endphp

                            {{--Nom de l'univers--}}
                            <li class="flex-1 w-2/12" style="margin: 1%;">
                                <div class="card">
                                    @if(strip_tags($univers_data->name))
                                    <header class="card-header">
                                        <p class="card-header-title">
                                            <a href="{{route('univers.show', $univers_data->name)}}">{{str_limit(strip_tags($univers_data->name)), 20}}</a>
                                        </p>
                                    </header>
                                    @endif
                                    <div class="card-content is-flex-center">
                                        <div class="content">
                                            @if($img !== null)

                                                @if(collect($img->first())->isEmpty())
                                                    <figure class="image is-128x128 ">
                                                        <img class="fit-cover"
                                                             src="http://via.placeholder.com/300x200?text={{ strip_tags($recipe->title)}}"
                                                             alt="{{ strip_tags($recipe->title) }} / CDG">
                                                        @else
                                                            @if(collect($img->first()->urls)->firstWhere('name', 'index')['url'] == "")
                                                                <clazy-load
                                                                        src="{{collect($img->first()->urls)->firstWhere('name', 'normal')['url']}}">
                                                                    <!-- The image slot renders after the image loads. -->
                                                                    <img class="fit-cover"
                                                                         src="{{collect($img->first()->urls)->firstWhere('name', 'normal')['url']}}"
                                                                         alt="{{ strip_tags($recipe->title) }} / CDG">
                                                                    @else
                                                                        <clazy-load
                                                                                src="{{collect($img->first()->urls)->firstWhere('name', 'webp')['url']}}">
                                                                            <!-- The image slot renders after the image loads. -->
                                                                            <img class="fit-cover"
                                                                                 src="{{collect($img->first()->urls)->firstWhere('name', 'webp')['url']}}"
                                                                                 alt="{{ strip_tags($recipe->title) }} / CDG">
                                                                        @endif
                                                                        <!-- The placeholder slot displays while the image is loading. -->
                                                                            <div slot="placeholder">
                                                                                <!-- You can put any component you want in here. -->
                                                                            </div>
                                                                        </clazy-load>
                                                    </figure>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

        </div>
    @else
        {{--TODO : faire une fiche plus tard--}}
    @endif
@endforeach