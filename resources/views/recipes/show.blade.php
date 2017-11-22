@extends('layouts.app')

@section('content')
    <div class="recipeaddbg">
        <div class="container">
            <section class="section blockcontent">
                @include("recipes.show.bread")
                <div class="content">
                    <div class="has-text-centered">
                        <h1 class="title is-1">{{$recette->title}}</h1>
                    </div>
                </div>
                <div class="columns">
                    {{--Photo + ingredients--}}
                    <div class="column is-3">

                        @include("recipes.show.images")
                        @include("recipes.show.stars")

                        {{--// Auteur--}}
                        @include("recipes.show.author")
                        {{--// Is-premium (afficher son yt, fb, creations)--}}

                    </div>
                    {{--    Infos + steps--}}
                    <div class="column is-7">

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
                        </div>


                        {{--// Parts--}}
                      {{--  @include("recipes.show.parts")--}}
                        {{--// Temps--}}
                     {{--   @include("recipes.show.timing")--}}
                        {{--// Liking--}}
                    {{--    @include("recipes.show.like")--}}
                        <div class="content">




                        </div>
                        <div class="content">
                            @include("recipes.show.steps")
                        </div>


                    </div>
                    {{--Menu--}}
                    <div class="column">

                        Menu latéral<br />
                        Like / Print / Share
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection




