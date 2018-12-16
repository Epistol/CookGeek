{{--Pour chaque catégorie d'univers (livre, jeux) , on va devoir savoir si il existe des univers populaire --}}
@foreach($categories as $categ)
    {{--Récupération de tout les univers--}}
    @php
        $univers_list_id = $controller->get_all_universes_in_categ($categ->id);
    @endphp

    @if(count($univers_list_id))
        <div class="categ_univers_recette " style="margin-top: 2rem; margin-bottom: 2rem;">
            <h2>{{ucfirst($categ->name)}}</h2> <br/>
            <categ_icon text_icon="{{$categ->name}}"></categ_icon>
            <div class="columns is-marginless">
				<?php //var_dump(count($univers_list_id)); ?>
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
                            $recettes = DB::table('recipes')->where("type_univers", "=", $categ->id)->where('univers', $univers_datum->id)->latest()->orderBy('nb_views', 'desc')->limit(6)->paginate(12);
                        @endphp

                        @if($recipe_count >= 0)
                            <div class="univers_element column">
                                {{--Nom de l'univers--}}

                                <div class="columns is-marginless is-paddingless    ">
                                    @endif

                                    @switch($recipe_count)
                                        @case($recipe_count >= 5)
                                        <div class="column">
                                            <p>Hello6</p>
                                            <div class="card">{{$univers_datum->name}}</div>
                                            @include("univers.index.mega_recipes")
                                        </div>
                                        @break

                                        @case($recipe_count >= 3)
                                        <div class="column">
                                            <p>Hello4</p>
                                            <div class="card">{{$univers_datum->name}}</div>
                                            @include("univers.index.middle_recipes")
                                        </div>
                                        @break

                                        @case($recipe_count >= 1)

                                        @include("univers.index.mini_recipes")
                                        @break

                                        @case($recipe_count < 0)
										<?php var_dump("hey=0"); ?>
                                        @break
                                        {{--@include("univers.index.fallback_recipes")--}}
                                    @endswitch

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
        <span class="tag">{{ucfirst($categ->name)}}</span>
        {{--@include("univers.index.fallback_recipes")--}}

    @endif
@endforeach