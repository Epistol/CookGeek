<div class="ficheinfo">
    {{--@include('recipes.show.social')--}}
    <section class="section-nomargin-side">

        @include("recipes.show.ingredient")
        <div style="display:flex;justify-content:flex-end;align-items:center; margin-top: 10%">


            @if($recette->id_user === Auth::user()->id )
                <div style="margin-right: 5%">
                    <a href="{{route("recipe.edit", $recette->slug)}}">
                        <div class="tags has-addons">
                            <span class="tag icon"><i class="fas fa-edit"></i></span>
                            <span class="tag ">@lang("common.edit")</span>
                        </div>
                    </a>
                </div>
            @endif

            @guest
                <signalrecipe recipeid="{{$recette->id}}" user_id='null'></signalrecipe>
            @endguest
            @auth
                <signalrecipe recipeid="{{$recette->id}}" user_id={{ Auth::user()->id }} ></signalrecipe>

            @endauth
        </div>

    </section>

</div>

{{--// Is-premium (afficher son yt, fb, creations)--}}
{{--// Parts--}}
{{--  @include("recipes.show.parts")--}}
{{--// Temps--}}
{{--   @include("recipes.show.timing")--}}
{{--// Liking--}}
{{--    @include("recipes.show.like")--}}
