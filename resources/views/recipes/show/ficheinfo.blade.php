<div class="ficheinfo">
    {{--@include('recipes.show.social')--}}
    <section class="section-nomargin-side">

        @include("recipes.show.ingredient")
        <div style="display:flex;justify-content:flex-end;align-items:center; margin-top: 10%">
            @guest
        <signalrecipe recipeid="{{$recette->id}}" user_id='null' ></signalrecipe>
                @elseguest
                <signalrecipe recipeid="{{$recette->id}}" user_id={{ Auth::user()->id }} ></signalrecipe>

            @endguest
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
