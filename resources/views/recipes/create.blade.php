@extends('layouts.app.app')
@section('titrepage', "Ajouter une recette")
@section('content')
    <div class="container recipe-add">
        <header class="background-round">
            <div class="flex mb-4">
                <div class="flex-1">
                    <div class="has-text-centered">
                        <h1 class="title">{{__('Create your recipe')}}
                            <span v-cloak v-if="titre" class="ajout-recette-titre"></span></h1>
                    </div>
                </div>
            </div>
        </header>
        {{-- Bug commence ici--}}
        <section class="section">
            <form class="form-horizontal recipe-add" enctype="multipart/form-data" method="POST"
                  action="{{ route('recipe.store') }}">
                @csrf
                <div class="flex mb-4 bg-white mb-8">
                    <div class="flex-1  recipe-right-add w-8/12">
                        {{--Titre recette--}}
                        <div class="flex mb-4">
                            <div class="flex-1 bg-white p-3">
                                @include("recipes.form.titre")
                                @include("recipes.form.univers")
                                @include("recipes.form.ingredients")
                                 @include("recipes.form.step")
{{--                                Liste des ingrédients--}}
                            </div>
                        </div>
                    </div>
                    <div class=" page w-4/12">
                        <div class="padding-sides">
                            @include('recipes.form.image')
                            <div class="flex mb-4">
                                <div class="flex-1 w-10/12 is-offset-1">
                                    @include("recipes.form.difficulty")
                                    @include("recipes.form.categorie")
                                    @include("recipes.form.cost")
                                </div>
                            </div>
                          <div class="flex mb-4 timing">
                                <div class="flex-1 w-10/12 is-offset-1 ">
                                    @include("recipes.form.timing.tps_preparation")
                                    @include("recipes.form.timing.tps_cuisson")
                                    @include("recipes.form.timing.tps_repos")
                                     @include("recipes.form.nb_parts")
                                    @include("recipes.form.vegan")
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="section page">
                    <div class="flex mb-4">
                        <div class="flex-1 w-4/12"> @include("recipes.form.comment")
                            @include("recipes.form.video")
                        </div>
                        <div class="flex-1">  @include("recipes.form.type")
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