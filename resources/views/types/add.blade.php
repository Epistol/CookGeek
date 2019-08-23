@extends('layouts.app.app')

@section('content')

    <div class="container recipe-add">
        <header class="background-round">
            <div class="flex mb-4">
                <div class="flex-1">
                    <div class="has-text-centered">
                        <h1 class="title">Ajoutez votre recette
                            <span v-cloak v-if="titre" class="ajout-recette-titre"> /  @{{titre}} </span></h1>
                    </div>
                </div>
            </div>

        </header>

        <section class="section">
            <form class="form-horizontal recipe-add" enctype="multipart/form-data" method="POST"
                  action="{{ route('recipe.store') }}">
                {{ csrf_field() }}

                <div class="flex mb-4" style="
  margin-bottom: 2rem;">


                    <div class="flex-1  recipe-right-add  ">
                        {{--Titre recette--}}
                        <div class="flex mb-4">
                            <div class="flex-1 w-10/12 is-offset-1">
                                @include("recipes.add.titre")
                                @include("recipes.form.univers")
                                @include("recipes.add.ingredients")
                                @include("recipes.add.step")
                                {{--Liste des ingrédients --}}
                            </div>
                        </div>


                    </div>
                    <div class="flex-1   page w-4/12">
                        <div class="padding-sides">
                            @include('recipes.add.image')

                            <div class="flex mb-4">
                                <div class="flex-1 w-10/12 is-offset-1">
                                    @include("recipes.add.difficulty")
                                    @include("recipes.add.categorie")
                                    @include("recipes.add.cost")
                                </div>
                            </div>
                            <div class="flex mb-4 timing">
                                <div class="flex-1 w-10/12 is-offset-1 ">
                                    {{--// Timing--}}
                                    @include("recipes.add.timing.tps_preparation")
                                    @include("recipes.add.timing.tps_cuisson")
                                    @include("recipes.add.timing.tps_repos")
                                    @include("recipes.add.nb_parts")

                                    @include("recipes.form.vegan")
                                    {{--// Nombre de portions--}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <section class="section page">
                    <div class="flex mb-4">
                        <div class="flex-1 w-4/12"> @include("recipes.add.comment")
                            @include("recipes.add.video")
                        </div>
                        <div class="flex-1">  @include("recipes.form.type")
                        </div>
                    </div>
                </section>

                <section class="section page">
                    @include("recipes.add.submit")
                </section>


            </form>
        </section>

    </div>

@endsection
