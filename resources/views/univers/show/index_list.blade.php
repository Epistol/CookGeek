{{--Pour chaque catégorie d'univers (livre, jeux) , on va devoir savoir si il existe des univers populaire --}}
@foreach($categories as $categ)
    {{--Récupération de tout les univers--}}

        <div class="categ_univers_recette " style="margin-top: 2rem; margin-bottom: 2rem;">
            <div class="is-flex" style="padding:1rem;">
                <categ_icon text_icon="{{$categ->name}}"></categ_icon>
                <h2 style="margin-top: 0px;padding-left:1rem;">{{ucfirst($categ->name)}}</h2>
            </div>

            <div class="columns is-marginless">
                {{--// On va charger le nb de recettes lié pour chaque univers--}}
                    {{--// On charge l'info univers--}}
                        @php
                            $recipe_count = DB::table('recipes')->where("type_univers", "=", $categ->id)->where('univers', $univers->id)->count();
                            $recettes = DB::table('recipes')->where("type_univers", "=", $categ->id)->where('univers', $univers->id)->latest()->orderBy('nb_views', 'desc')->limit(6)->paginate(3);
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
            </div>
        </div>

@endforeach