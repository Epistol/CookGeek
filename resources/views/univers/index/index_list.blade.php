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
                                $recettes = DB::table('recipes')->select('id')->where("type_univers", "=", $categ->id)->where('univers', $univers_data->id)->latest()->orderBy('nb_views', 'desc')->limit(6)->paginate(12);
                                $id_random = $recettes->random();
                                $image_au_pif = DB::table('recipe_imgs')->where('recipe_id', '=', $id_random->id)->inRandomOrder()->first();

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
                                            @if($image_au_pif !== null)
                                                <figure class="image is-128x128">
                                                    <img alt="title" class="fit-cover  image is-128x128 "
                                                         src='/recipes/{{$image_au_pif->recipe_id}}/{{$image_au_pif->user_id}}/{{$image_au_pif->image_name}}'/>
                                                </figure>
                                            @endif
                                        </div>
                                    </div>
                                    {{--  <footer class="card-footer">
                                          <a href="#" class="card-footer-item">Save</a>
                                          <a href="#" class="card-footer-item">Edit</a>
                                          <a href="#" class="card-footer-item">Delete</a>
                                      </footer>--}}
                                </div>


                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

        </div>
    @else
        {{--TODO : faire une fiche plus tard--}}
        {{--<span class="tag">{{ucfirst($categ->name)}}</span>--}}
        {{--@include("univers.index.fallback_recipes")--}}

    @endif
@endforeach