<div class="">
    <a href="/user/{{$nom}}">
		<?php
		$author = DB::table('users')->where('id', '=', $recette->id_user)->first();
		$nb_recipes = DB::table('recipes')->where('id_user', '=', $recette->id_user)->count();
		?>
        <div class="is-flex-center">
            {{--Avatar--}}
            @if($author->avatar !== "users/default.png")
                <figure class="image is-48x48"><img src="/user/{{$author->id}}/{{$author->avatar}}" class="is-rounded "
                                                    style="height: 100%; width: 100%;"></figure>
            @else
                <figure class="image is-48x48">
                    <img src="https://api.adorable.io/avatars/64/{{$author->name}}" class="is-rounded "
                         style="height: 100%; width: 100%;">
                </figure>

            @endif
            {{--pseudo--}}
            <p><span style="padding-right: 0.3rem; margin-left: 1rem">@lang("common.by") </span><a
                        href="/user/{{$nom}}">@php echo str_limit($nom, 20, ' (...)'); @endphp</a></p>
        </div>
    </a>

    {{--reseaux sociaux--}}


</div>


