@extends('layouts.app')

@section('content')
    <div class="recipeaddbg">
        <div class="container">

            @include("recipes.show.bread")


            <div class="section">

                <div class="columns">
                    {{--Photo + ingredients--}}
                    <div class="column  is-marginless is-3 is-paddingless" style=" background: #fdfdfd;">

                            @include("recipes.show.images")
                        <div class="page">
                            @include("recipes.show.ingredient")

                        </div>


                    </div>
                    {{--    Infos + steps--}}
                    <div class="column is-marginless is-paddingless is-9 side_recipe">

                        {{--// Budget--}}

                        <div class="columns list-h-show  is-marginless is-paddingless" >
                            <div class="column">
                               <div class="has-text-centered">
                                   @include("recipes.show.timing")
                               </div>
                            </div>
                            <div class="column">
                                {{--// Timing--}}
                                <div class="has-text-centered">
                                    @include("recipes.show.parts")
                                </div>
                            </div>
                            <div class="column">
                                <div class="has-text-centered">
                                    @include("recipes.show.univers")
                                </div>
                            </div>
                            <div class="column">
                                {{--// Parts--}}
                                <div class="has-text-centered">
                                    @include("recipes.show.stars")
                                </div>
                            </div>


                            {{--// Auteur--}}


                        </div>

                        <div class="page">
                            <div class="columns">
                                <div class="column is-half is-offset-one-quarter">
                                    <div class="content ficheinfo">
                                        <div class="columns">
                                            <div class="column">
                                                <p>
                                                    Auteur :
                                                    @include("recipes.show.author")
                                                </p>
                                                <div style="display:flex;" class="">
                                                    <p>  @lang('recipe.diff') :</p>@include("recipes.show.diff")
                                                </div>

                                                <div style="display:flex;" class="">
                                                    <p>    @include("recipes.show.price")
                                                </div>

                                            </div>
                                            <div class="column">
                                                @include("recipes.show.times")

                                            </div>
                                        </div>



                                        {{--// Is-premium (afficher son yt, fb, creations)--}}


                                        {{--// Parts--}}
                                        {{--  @include("recipes.show.parts")--}}
                                        {{--// Temps--}}
                                        {{--   @include("recipes.show.timing")--}}
                                        {{--// Liking--}}
                                        {{--    @include("recipes.show.like")--}}
                                    </div>
                                </div>
                            </div>

                            <div class="content">

                                @include("recipes.show.steps")
                            </div>
                        </div>



                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="recipeaddbg">
        <div class="container">
            <section class="section blockcontent">
            {{-- RECETTE SIMILAIRES (4 BLOCS) --}}
            </section>
        </div>
    </div>

    <div class="recipeaddbg">
        <div class="container">
            <section class="section blockcontent">
                {{-- COMMMENTAIRES --}}
                <div class="columns">
                    <div class="column is-8 is-offset-2">
                        <div class="fb-commentaire">
                            <div class="fb-comments" data-href="{{url()->current()}}" data-width="100%" data-numposts="21"></div>

                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>


@endsection




