@extends('layouts.app')

@section('content')
    <div class="recipeaddbg">
        <div class="container">
            @include("recipes.show.bread")
            <div class="section">
                <div class="columns shadowbox">
                    {{--Photo + ingredients--}}
                    <div class="column  is-marginless is-3 is-paddingless" style=" background: #fdfdfd;">
                        @include("recipes.show.images")
                        <div class="page">
                        @include("recipes.show.ficheinfo")
                        </div>
                    </div>
                    {{--    Infos + steps--}}
                    <div class="column is-marginless is-paddingless is-9 ">
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
                            <div class="content">
                                <div class="columns">
                                    <div class="column is-8">
                                        @include("recipes.show.steps")
                                    </div>
                                    <div class="column is-4  ">
                                        @include("recipes.show.ingredient")

                                    </div>
                                </div>

                                @if($recette->video)
                                    @include("recipes.show.video")
                                @endif
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




