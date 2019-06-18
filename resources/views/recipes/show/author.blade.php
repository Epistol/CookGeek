<div class="author">
    <?php
    $nb_recipes = App\Recipe::where('id_user', $recipe->id_user)->count();
    ?>

    <div class="is-flex">
        {{--Avatar--}}
        @if($recipe->getAuthorElement('img') !== null)
            <?php dd($recipe->getAuthorElement('img'));?>
            <figure class="image is-48x48">
                <img src="/user/{{$recipe->id_user}}/{{$recipe->getAuthorElement('img')}}" class="is-rounded"
                     alt="Avatar user {{$recipe->getAuthorElement('name')}}"
                     style="height: 100%; width: 100%;"></figure>
        @else
            <figure class="image is-48x48">
                <img src="https://api.adorable.io/avatars/64/{{$recipe->getAuthorElement('name')}}"
                     class="is-rounded"
                     alt="Avatar utilisateur : {{$recipe->getAuthorElement('name')}}"
                     style="height: 100%; width: 100%;">
            </figure>

        @endif
        {{--pseudo--}}
        <p><span style="padding-right: 0.3rem; margin-left: 1rem">@lang("common.by") </span><a
                    href="/user/{{$recipe->getAuthorElement('name')}}">
                {!! str_limit($recipe->getAuthorElement('name'), 20, ' (...)') !!}</a></p>
    </div>

    {{--date inscription--}}
    @lang("common.registered") {{Carbon\Carbon::parse( $recipe->getAuthorElement('created_at'))->format('d/m/Y')}}
    <br/>
    {{--nb recette--}}
    {{$nb_recipes}}  @lang("common.recipes")

    {{--reseaux sociaux--}}

</div>


