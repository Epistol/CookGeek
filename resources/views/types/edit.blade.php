@extends('layouts.app')

@section('content')

    <div class="container recipe-add">
        <div class="background-round">
            <div class="columns">
                <div class="column">
                    <div class="has-text-centered">
                        <h1 class="title">Modification de : {{$recette->title}}
                            <span v-cloak v-if="titre" class="ajout-recette-titre"> /  @{{titre}} </span></h1>
                    </div>
                </div>
            </div>

        </div>

        <section class="section">
            <form class="form-horizontal recipe-add" enctype="multipart/form-data" method="PUT"
                  action="{{ route('recipe.store') }}">
                {{ csrf_field() }}

                <div class="columns" style="
  margin-bottom: 2rem;">


                    <div class="column  recipe-right-add  ">
                        {{--Titre recette--}}
                        <div class="columns">
                            <div class="column is-10 is-offset-1">
                                @include("recipes.edit.titre")
                                @include("recipes.edit.univers")
                                @include("recipes.edit.ingredients")
                                @include("recipes.edit.step")
                                {{--Liste des ingrédients --}}
                            </div>
                        </div>


                    </div>
                    <div class="column  is-paddingless page is-4">
                        <div class="padding-sides">
                            @include('recipes.edit.image')

                            <div class="columns">
                                <div class="column is-10 is-offset-1">
                                    @include("recipes.edit.difficulty")
                                    @include("recipes.edit.categorie")
                                    @include("recipes.edit.cost")
                                </div>
                            </div>
                            <div class="columns timing">
                                <div class="column is-10 is-offset-1 ">
                                    {{--// Timing--}}
                                    @include("recipes.edit.timing.tps_preparation")
                                    @include("recipes.edit.timing.tps_cuisson")
                                    @include("recipes.edit.timing.tps_repos")
                                    @include("recipes.edit.nb_parts")

                                    @include("recipes.edit.vegan")
                                    {{--// Nombre de portions--}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <section class="section page">
                    <div class="columns">
                        <div class="column is-4"> @include("recipes.edit.comment")
                            @include("recipes.edit.video")
                        </div>
                        <div class="column">  @include("recipes.edit.type")
                        </div>
                    </div>
                </section>

                <section class="section page">
                    @include("recipes.edit.submit")
                </section>


            </form>
        </section>

    </div>

@endsection
