{{--Pour chaque catégorie d'univers (livre, jeux) , on va devoir savoir si il existe des univers populaire --}}
@foreach($categories as $categ)
    {{--Récupération de tout les univers--}}
    <div class="categ-univers-recette ">
        <div class="is-flex univers-media-titre" style="padding:1rem;">
            <categ_icon text_icon="{{$categ->name}}"></categ_icon>
            <h2 style="margin-top: 0px;padding-left:1rem;">{{ucfirst($categ->name)}}</h2>
        </div>
        {{--// On va charger le nb de recettes lié pour chaque univers--}}
        {{--// On charge l'info univers--}}
        @php
            $recipe_count = DB::table('recipes')->where("type_univers", "=", $categ->id)->where('univers', $univers->id)->count();
            $recipes = DB::table('recipes')->where("type_univers", "=", $categ->id)->where('univers', $univers->id)->where('validated', '=', 1)->latest()->orderBy('nb_views', 'desc')->limit(6)->paginate(3);
        @endphp

        @if($recipe_count > 0)
            <div class="flex mb-4 m-0">
                <div class="univers-element flex-1">
                    {{--Nom de l'univers--}}
                    <div class="flex mb-4 m-0     ">
                        @include("univers.index.mini_recipes")
                    </div>
                </div>
            </div>

        @endif
    </div>

@endforeach