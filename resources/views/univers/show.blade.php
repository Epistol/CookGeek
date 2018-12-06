@extends('layouts.app')
@section('titrepage', "Univers")
@section('content')

    <div class="container">
        <section class="section blockcontent is-paddingless ">

            @include("recipes.index.bread")

            <div class="content">
                {{--@include("recipes.index.searchbar")--}}
                {{--@include("recipes.index.partype")--}}

                @if($univers)
                    <section class="hero">
                        <div class="hero-body">
                            <div class="container">
                                <h1 class="title">
                                    Univers :
                                </h1>
                                <div class="subtitle">
                                    {{--@include("search.searchbar")--}}
                                </div>
                            </div>
                        </div>
                    </section>

                {{--Picture of universe--}}

                {{--Ajout votre propre image ? --}}

                {{--Liste des icones type recette--}}

                    {{--<categ-icon :text-icon="{{$typeuniv->name}}"></categ-icon>--}}



                    {{--Liste des recettes par catégorie avec pagination --}}
                    @include("univers.show.index_list")
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
