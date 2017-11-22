@extends('layouts.app')

@section('content')
    <div class="recipeaddbg">
        <div class="container">
            <section class="section blockcontent">
                @include("recipes.show.bread")
                <div class="content" style="margin-bottom: 2.5rem;">
                    <div class="has-text-centered">
                        <h1 class="title is-1">{{$recette->title}}</h1>
                    </div>
                </div>
                <div class="columns">
                    {{--Photo + ingredients--}}
                    <div class="column is-3">

                        @include("recipes.show.images")
                        @include("recipes.show.stars")

                        {{--// Is-premium (afficher son yt, fb, creations)--}}

                        @include("recipes.show.ingredient")

                    </div>
                    {{--    Infos + steps--}}
                    <div class="column is-6">

                        {{--// Budget--}}

                        <div class="columns">
                            <div class="column">
                               <div class="has-text-centered">
                                   @include("recipes.show.diff")
                               </div>
                            </div><div class="is-divider-vertical" data-content=""></div>
                            <div class="column">
                                {{--// Timing--}}
                                <div class="has-text-centered">
                                    @include("recipes.show.timing")
                                </div>
                            </div>
                            <div class="is-divider-vertical" data-content=""></div>
                            <div class="column">
                                <div class="has-text-centered">
                                    @include("recipes.show.price")
                                </div>
                            </div>
                            <div class="is-divider-vertical" data-content=""></div>
                            <div class="column">
                                {{--// Parts--}}
                                <div class="has-text-centered">
                                    @include("recipes.show.parts")
                                </div>
                            </div>


                            {{--// Auteur--}}


                        </div>


                        <div class="content">
                            {{--// Parts--}}
                            {{--  @include("recipes.show.parts")--}}
                            {{--// Temps--}}
                            {{--   @include("recipes.show.timing")--}}
                            {{--// Liking--}}
                            {{--    @include("recipes.show.like")--}}
                        </div>
                        <div class="content">
                            @include("recipes.show.steps")
                        </div>


                    </div>
                    {{--Menu--}}
                    <div class="column is-offset-1">

                        <div class="has-text-centered">
                            @include("recipes.show.author")
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection




