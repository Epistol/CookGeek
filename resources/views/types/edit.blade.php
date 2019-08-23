@extends('layouts.app.app')

@section('content')

    <div class="container recipe-add">
        <header class="background-round">
            <div class="flex mb-4">
                <div class="flex-1">
                    <div class="has-text-centered">
                        <h1 class="title">Modification de : {{$recipe->title}}
                            <span v-cloak v-if="titre" class="ajout-recette-titre"> /  @{{titre}} </span></h1>
                    </div>
                </div>
            </div>

        </header>

        <section class="section">
            <form class="form-horizontal recipe-add" enctype="multipart/form-data" method="PUT"
                  action="{{ route('recipe.store') }}">
                {{ csrf_field() }}

                <div class="flex mb-4" style="
  margin-bottom: 2rem;">


                    <div class="flex-1  recipe-right-add  ">
                        {{--Titre recette--}}
                        <div class="flex mb-4">
                            <div class="flex-1 w-10/12 is-offset-1">
                                @include("recipes.form.titre")
                                @include("recipes.edit.univers")
                                @include("recipes.form.ingredients")
                                @include("recipes.form.step")
                                {{--Liste des ingrédients --}}
                            </div>
                        </div>


                    </div>
                    <div class="flex-1   page w-4/12">
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
                                    {{--// Timing--}}
                                    @include("recipes.form.timing.tps_preparation")
                                    @include("recipes.form.timing.tps_cuisson")
                                    @include("recipes.form.timing.tps_repos")
                                    @include("recipes.form.nb_parts")

                                    @include("recipes.edit.vegan")
                                    {{--// Nombre de portions--}}
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
                        <div class="flex-1">  @include("recipes.edit.type")
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
