@extends('layouts.app')
@section('titrepage', "Univers")
@section('content')

    <div class="container">
        <section class="section blockcontent is-paddingless ">

            @include("recipes.index.bread")

            <div class="content">
                {{--@include("recipes.index.searchbar")--}}
                {{--@include("recipes.index.partype")--}}

                @if($cateunivers)
                    <section class="hero">
                        <div class="hero-body">
                            <div class="container">
                                <h1 class="title">
                                    Les univers
                                </h1>
                                <div class="subtitle">
                                    {{--@include("search.searchbar")--}}
                                </div>
                            </div>
                        </div>
                    </section>

                    @include("univers.index.index_list")
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
