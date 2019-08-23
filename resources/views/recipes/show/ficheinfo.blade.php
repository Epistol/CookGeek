<affix class="sidebar-menu" relative-element-selector="#liste-etapes">
    @include("recipes.show.ingredient")
</affix>

<div class="ficheinfo">
    {{--@include('recipes.show.social')--}}
    <section class="section ">
        <div style="display:flex;justify-content:flex-end;align-items:center; margin-top: 10%">
            {{--@auth
                @if($recipe->id_user === Auth::user()->id )
                    <div style="margin-right: 5%">
                        <a href="{{route("recipe.edit", $recipe->slug)}}">
                            <div class="tags has-addons">
                                @if(!Route::is('*.edit'))
                                <span class="tag icon"><i class="fas fa-edit"></i></span>
                                <span class="tag ">@lang("common.edit")</span>
                                @endif

                            </div>
                        </a>
                    </div>
                @endif
                <SignalRecipe recipeid="{{$recipe->id}}" user_id={{ Auth::user()->id }} ></SignalRecipe>
            @endauth--}}

            @guest
                <SignalRecipe recipeid="{{$recipe->id}}" user_id='null'></SignalRecipe>
            @else
                <SignalRecipe recipeid="{{$recipe->id}}" user_id={{ Auth::user()->id }} ></SignalRecipe>

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
