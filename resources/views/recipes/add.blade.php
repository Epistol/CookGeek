@extends('layouts.app')

@section('content')

    <div class="container addrecipe">
        <div class="breadbg">
            <div class="columns">
                <div class="column">
                    <div class="has-text-centered">
                        <h1 class="title">Ajoutez votre recette
                            <span v-cloak v-if="titre" class="ajout-recette-titre"> /  @{{titre}} </span></h1>
                    </div>
                </div>
            </div>

        </div>

        <section class="section">
            <form class="form-horizontal addrecipe" enctype="multipart/form-data" method="POST" action="{{ route('recipe.store') }}">
                {{ csrf_field() }}

                <div class="columns">


                    <div class="column  right_recipe_add  ">
                        {{--Titre recette--}}
                        <div class="columns">
                            <div class="column is-10 is-offset-1">
                                @include("recipes.add.titre")
                                @include("recipes.add.univers")
                                @include("recipes.add.ingredients")

                                @include("recipes.add.step")
                                {{--Liste des ingrédients --}}
                            </div>
                        </div>


                    </div>
                    <div class="column  is-paddingless page is-4">
                        <div class="padding-sides">
                            @include('recipes.add.image')

                            <div class="columns">
                                <div class="column is-10 is-offset-1">
                                    @include("recipes.add.difficulty")
                                    @include("recipes.add.categorie")
                                    @include("recipes.add.cost")
                                </div>
                            </div>
                            <div class="columns timing">
                                <div class="column is-10 is-offset-1 ">
                                    {{--// Timing--}}
                                    @include("recipes.add.timing.tps_preparation")
                                    @include("recipes.add.timing.tps_cuisson")
                                    @include("recipes.add.timing.tps_repos")
                                    @include("recipes.add.nb_parts")

                                    @include("recipes.add.vegan")
                                    {{--// Nombre de portions--}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <section class="section page" style="margin-bottom: 1rem">
                    <div class="columns">
                        <div class="column is-4"> @include("recipes.add.comment")

                        </div>
                        <div class="column">  @include("recipes.add.type")
                        </div>
                    </div>
                </section>

                <section class="section page">
                    @include("recipes.add.submit")
                </section>


    </div>

    </form>
    </section>

    </div>

@endsection
