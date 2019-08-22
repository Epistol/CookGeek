<div class="author">
    <div class="is-flex">
        {{--Avatar--}}
        @if($recipe->getAuthorElement('img') !== null)
            <figure class="image w-12">
                <img src="{{$recipe->getAuthorElement('img')}}" class="rounded-full"
                     alt="Avatar user {{$recipe->getAuthorElement('name')}}"
                     style="height: 100%; width: 100%;"></figure>
        @else
            <figure class="image w-12">
                <img src="https://api.adorable.io/avatars/64/{{$recipe->getAuthorElement('name')}}"
                     class="rounded-full"
                     alt="Avatar utilisateur : {{$recipe->getAuthorElement('name')}}"
                     style="height: 100%; width: 100%;">
            </figure>
        @endif
        {{--pseudo--}}
        <p><span style="padding-right: 0.3rem; margin-left: 1rem">@lang("common.by") </span><a
                    href="{{route('user.show', $recipe->getAuthorElement('id'))}}">
                {{
                str_limit($recipe->getAuthorElement('name'), 20, ' (...)')
                }}</a></p>
    </div>

    {{--date inscription--}}
    @lang("common.registered") {{Carbon\Carbon::parse( $recipe->getAuthorElement('created_at'))->format('d/m/Y')}}
    <br/>
    {{--nb recette--}}
    {{App\Recipe::where('id_user', $recipe->id_user)->count()}}  @lang("common.recipes")

    {{--reseaux sociaux--}}

</div>


