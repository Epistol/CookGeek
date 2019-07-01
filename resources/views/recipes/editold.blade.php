@extends('layouts.app.app')
@section('titrepage',  __('common.editing') . ' ' . __('recipe.of') . " : ". $recipe->title)
@section('content')

    <div class="container recipe-add">
        <div class="background-round">
            <div class="columns">
                <div class="column">
                    <div class="has-text-centered">
                        <h1 class="title">
                            <span v-cloak v-if="titre" class="ajout-recette-titre"> /  @{{titre}} </span></h1>
                    </div>
                </div>
            </div>
        </div>


        <section class="section">
            <form class="form-horizontal recipe-add" enctype="multipart/form-data" method="POST"
                  action="{{ route('recipe.edit', $recipe->id) }}">
                {{ csrf_field() }}
                <div class="columns" style="margin-bottom: 2rem;">
                    <div class="column recipe-right-add">
                        {{--Titre recette--}}
                        <div class="columns">
                            <div class="column is-10 is-offset-1">
                                @include("recipes.form.titre")
                                @include("recipes.form.univers")
                                @include("recipes.form.ingredients")
                                @include("recipes.form.step")
                                {{--Liste des ingrédients --}}
                            </div>
                        </div>
                    </div>
                    <div class="column  is-paddingless page is-4">
                        <div class="padding-sides">
                            @include('recipes.form.image')

                            <div class="columns">
                                <div class="column is-10 is-offset-1">
                                    @include("recipes.form.difficulty")
                                    @include("recipes.form.categorie")
                                    @include("recipes.form.cost")
                                </div>
                            </div>
                            <div class="columns timing">
                                <div class="column is-10 is-offset-1 ">
                                    {{--// Timing--}}
                                    @include("recipes.form.timing.tps_preparation")
                                    @include("recipes.form.timing.tps_cuisson")
                                    @include("recipes.form.timing.tps_repos")
                                    @include("recipes.form.nb_parts")

                                    @include("recipes.form.vegan")
                                    {{--// Nombre de portions--}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <section class="section page">
                    <div class="columns">
                        <div class="column is-4"> @include("recipes.form.comment")
                            @include("recipes.form.video")
                        </div>
                        <div class="column">
                            @include("recipes.form.type")
                        </div>
                    </div>
                </section>

                <section class="section page">
                    @include("recipes.form.submit")
                </section>
            </form>
        </section>
    </div>
@endsection
