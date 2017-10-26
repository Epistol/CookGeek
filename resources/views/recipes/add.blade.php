@extends('layouts.app')

@section('content')
    <div class="recipeaddbg">
        <div class="container">
            <section class="section">
                <div style="    align-items: center;    justify-content: center; display: flex;">
                    <h1 class="title ">Ajoutez votre recette</h1>
                </div>

                <hr>
            </section>



            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="columns">
                    <div class="column  is-paddingless left_recipe_add is-4 is-offset-1">
                        <div class="padding-sides">
                            @include('recipes.add.image')
                            @include("recipes.add.difficulty")
                            @include("recipes.add.categorie")
                        </div>
                    </div>

                    <div class="column right_recipe_add is-6 ">

                        {{--Titre recette--}}
                        @include("recipes.add.titre")
                        @include("recipes.add.type")
                        {{--Liste des ingrédients --}}
                        @include("recipes.add.ingredients")
                        <div>
                            <button type="button" class="button is-medium is-primary" @click="addRow"><i class="fa fa-plus" aria-hidden="true"></i></button>
                        </div>


                    </div>

                </div>
              @include("recipes.add.submit")
            </form>
        </div>
    </div>

@endsection
