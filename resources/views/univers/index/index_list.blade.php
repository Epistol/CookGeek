{{--Pour chaque catégorie d'univers (livre, jeux) , on va devoir savoir si il existe des univers populaire --}}
@foreach($cateunivers as $categ)
    {{--Récupération de tout les univers--}}
    @php
        $univers_list_id = $controller->get_all_universes_in_categ($categ->id);
    @endphp

    @if(count($univers_list_id))
        <div class="categ_univers_recette ">
            <section class="hero">
                <div class="is-flex hero-body">
                    <a href="{{route('media.show', $categ->name)}}"><h2 class="title"
                                                                        style="padding-right: 0.5rem">{{ucfirst($categ->name)}}</h2>
                    </a>
                    <categ_icon text_icon="{{$categ->name}}"></categ_icon>
                </div>
            </section>
            <div class="univers_element ">
                <!-- Liste des univers contenus -->
                <ul class=" columns is-multiline is-flex-center">

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
                                $recette = collect(DB::table('recipes')->where("type_univers", "=", $categ->id)->where('univers', $univers_data->id)->latest()->orderBy('nb_views', 'desc')->get())->random();
                                $img = $pictureService->loadFirstRecipePicture($recette);
                            @endphp

                            {{--Nom de l'univers--}}
                            <li class="column is-2" style="margin: 1%;">
                                <div class="card">
                                    <header class="card-header">
                                        <p class="card-header-title">
                                            <a href="{{route('univers.show', $univers_data->id)}}">{{str_limit($univers_data->name, 20)}}</a>
                                        </p>
                                        {{--  <a href="#" class="card-header-icon" aria-label="more options">
        <span class="icon">
          <i class="fas fa-angle-down" aria-hidden="true"></i>
        </span>
                                          </a>--}}
                                    </header>
                                    <div class="card-content is-flex-center">
                                        <div class="content">
                                            @if($img !== null)
                                                <figure class="image is-128x128 ">
                                                    @if($img == null or empty($img) or $img->isEmpty())
                                                        <img class="fit-cover"
                                                             src="http://via.placeholder.com/300x200?text={!! strip_tags($recette->title) !!}"
                                                             alt="{{ strip_tags(clean($recette->title)) }} / CDG">
                                                    @else
                                                        @if(collect($img[0])->firstWhere('name', 'index')['url'] == "")
                                                            <clazy-load
                                                                    src="{{collect($img[0])->firstWhere('name', 'normal')['url']}}">
                                                                <!-- The image slot renders after the image loads. -->
                                                                <img class="fit-cover"
                                                                     src="{{collect($img[0])->firstWhere('name', 'normal')['url']}}"
                                                                     alt="{{ strip_tags(clean($recette->title)) }} / CDG">
                                                                @else
                                                                    <clazy-load
                                                                            src="{{collect($img[0])->firstWhere('name', 'index')['url']}}">
                                                                        <!-- The image slot renders after the image loads. -->
                                                                        <img class="fit-cover"
                                                                             src="{{collect($img[0])->firstWhere('name', 'index')['url']}}"
                                                                             alt="{{ strip_tags(clean($recette->title)) }} / CDG">
                                                                    @endif

                                                                    <!-- The placeholder slot displays while the image is loading. -->
                                                                        <div slot="placeholder">
                                                                            <!-- You can put any component you want in here. -->
                                                                        </div>
                                                                    </clazy-load>
                                                        @endif
                                                </figure>
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