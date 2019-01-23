@extends('layouts.app')
@section('titrepage', "Recettes")
@section('content')

        <div class="container">
            <section class="section blockcontent">

                @include("recipes.index.bread")

                <div class="content">
                    {{--@include("recipes.index.searchbar")--}}
                    {{--@include("recipes.index.partype")--}}

                    @if($recipes)
                        <section class="hero">
                            <div class="hero-body">
                                <div class="container">
                                    <h1 class="title">
                                        Les dernières recettes
                                    </h1>
                                </div>
                            </div>
                        </section>

                        @include("recipes.index.recipe_name")
                    @endif

                </div>

            </section>
        </div>


    <modal v-if="showModalLike" @close="showModalLike = false" v-cloak>
        <h3 slot="header">Connexion requise</h3>
        <p slot="body">Vous ne pouvez pas ajouter de recette en favori sans être connecté ! </p>
        <div slot="footer">
            <a class="button is-primary" href="/login">Connexion</a>
        </div>

    </modal>

@endsection
