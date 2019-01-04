{{--Pour chaque catégorie d'univers (livre, jeux) , on va devoir savoir si il existe des univers populaire --}}
@foreach($categories as $categ)
    {{--Récupération de tout les univers--}}
    @php
        $univers_list_id = $controller->get_all_universes_in_categ($categ->id);
    @endphp

    @if(count($univers_list_id))
        <div class="categ_univers_recette " style="margin-top: 2rem; margin-bottom: 2rem;">
            <div class="is-flex" style="padding:1rem;">
                <categ_icon text_icon="{{$categ->name}}"></categ_icon>
                <h2 style="margin-top: 0px;padding-left:1rem;">{{ucfirst($categ->name)}}</h2>
            </div>

            <div class="columns is-marginless">
                {{--// On va charger le nb de recettes lié pour chaque univers--}}
                @foreach($univers_list_id as $univers_id)
                    {{--// On charge l'info univers--}}
                    @php
                        $univers_data = DB::table('univers')->where('id', '=', $univers_id->univers)->get();
                    @endphp

                    {{--// pour chaque univers, on va compter le nombre de recette--}}
                    @foreach($univers_data as $univers_datum)
                        @php
                            $recipe_count = DB::table('recipes')->where("type_univers", "=", $categ->id)->where('univers', $univers_datum->id)->count();
                            $recettes = DB::table('recipes')->where("type_univers", "=", $categ->id)->where('univers', $univers_datum->id)->latest()->orderBy('nb_views', 'desc')->limit(6)->paginate(3);
                        @endphp

                        @if($recipe_count >= 0)
                            <div class="univers_element column">
                                {{--Nom de l'univers--}}

                                <div class="columns is-marginless is-paddingless    ">
                                    @endif
                                        @include("univers.index.mini_recipes")
                                    @if($recipe_count >= 0)
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    @else
        {{--TODO : faire une fiche plus tard--}}
        {{--<span class="tag">{{ucfirst($categ->name)}}</span>--}}
        {{--@include("univers.index.fallback_recipes")--}}

    @endif
@endforeach