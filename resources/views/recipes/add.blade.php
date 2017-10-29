@extends('layouts.app')

@section('content')
    <div class="recipeaddbg">
        <div class="container">
            <section class="section ajoutrecipe">
                <div style="    align-items: center;    justify-content: center; display: flex;">
                    <h1 class="title">Ajoutez votre recette
                        <span v-cloak v-if="titre" class="ajout-recette-titre"> /  @{{titre}} </span></h1>
                </div>
                <hr>
            </section>


            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="columns">
                    <div class="column  is-paddingless left_recipe_add is-5">
                        <div class="padding-sides">
                            @include('recipes.add.image')
                            <div class="columns">
                                <div class="column is-offset-2 is-4">
                                    @include("recipes.add.difficulty")
                                </div>
                                <div class="column is-4">
                                    @include("recipes.add.categorie")
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column is-8 is-offset-2">
                                    @include("recipes.add.vegan")
                                    @include("recipes.add.cost")
                                </div>
                            </div>
                            <div class="columns timing">
                                <div class="column is-8 is-offset-2 ">
                                    {{--// Timing--}}
                                    @include("recipes.add.timing.tps_preparation")
                                    @include("recipes.add.timing.tps_cuisson")
                                    @include("recipes.add.timing.tps_repos")
                                    {{--// Nombre de portions--}}
                                </div>
                            </div>


                            @include("recipes.add.nb_parts")
                        </div>
                    </div>

                    <div class="column right_recipe_add is-7 ">
                        {{--Titre recette--}}
                        @include("recipes.add.titre")
                        @include("recipes.add.univers")
                        @include("recipes.add.type")
                        {{--Liste des ingrédients --}}
                        @include("recipes.add.ingredients")
                    </div>
                </div>



                <div class="columns">
                    <div class="column  steps  is-10 is-offset-1">
                        @include("recipes.add.step")
                        @include("recipes.add.comment")
                    </div>
                </div>
                @include("recipes.add.submit")
            </form>
        </div>
    </div>

@endsection
