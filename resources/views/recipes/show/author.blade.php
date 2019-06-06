<div class="author">
	<?php
	$author = DB::table('users')->where('id', '=', $recipe->id_user)->first();
	$nb_recipes = DB::table('recipes')->where('id_user', '=', $recipe->id_user)->count();
	?>

    <div class="is-flex">
        {{--Avatar--}}
        @if($author->avatar !== "users/default.png")
            <figure class="image is-48x48"><img src="/user/{{$author->id}}/{{$author->avatar}}" class="is-rounded " alt="Avatar utilisateur : {{strip_tags(clean($author->name))}} "
                                                style="height: 100%; width: 100%;"></figure>
        @else
            <figure class="image is-48x48">
                <img src="https://api.adorable.io/avatars/64/{{strip_tags(clean($author->name))}}" class="is-rounded " alt="Avatar utilisateur : {{strip_tags(clean($author->name))}}"
                     style="height: 100%; width: 100%;">
            </figure>

        @endif
        {{--pseudo--}}
        <p><span style="padding-right: 0.3rem; margin-left: 1rem">@lang("common.by") </span><a
                    href="/user/{{$nom}}">{!! str_limit(strip_tags(clean($nom)), 20, ' (...)') !!}</a></p>
    </div>

    {{--date inscription--}}
    @lang("common.registered") {{Carbon\Carbon::parse($author->created_at)->format('d/m/Y')}}
    <br/>
    {{--nb recette--}}
    {{$nb_recipes}}  @lang("common.recipes")

    {{--reseaux sociaux--}}

</div>


