<div class="author">
    <?php
        $author = DB::table('users')->where('id', '=', $recette->id_user)->first();
        $nb_recipes = DB::table('recipes')->where('id_user', '=', $recette->id_user )->count();
    ?>
        <div class="is-flex">
                {{--Avatar--}}
                <figure class="image is-48x48"><img src="/user/{{$author->id}}/{{$author->avatar}}" class="is-rounded " style="height: 100%; width: 100%;"></figure>

                {{--pseudo--}}
               <p> <span style="padding-right: 0.3rem; margin-left: 1rem">@lang("common.by") </span><a href="/user/{{$nom}}">@php echo str_limit($nom, 20, ' (...)'); @endphp</a></p>
        </div>

            {{--date inscription--}}
            @lang("common.registered") {{Carbon\Carbon::parse($author->created_at)->format('d/m/Y')}}
        <br />
            {{--nb recette--}}
            {{$nb_recipes}}  @lang("common.recipes")

            {{--reseaux sociaux--}}



</div>


