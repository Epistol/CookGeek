@extends('layouts.app')

@section('content')
    <div class="recipeaddbg">
        <div class="container">
            <section class="section blockcontent">

                @include("recipes.show.bread")

                <div class="columns">
                    <div class="column is-one-quarter">
                        {{-- Images--}}
                       @include("recipes.show.images")
                    </div>
                    <div class="column">
                        {{-- Nom du produit--}}
                        <h1 class="title">{{$recette->title}}</h1>
                        {{-- AVIS --}}
                        <div class="content">
                        @include("recipes.show.type")
                        @include("recipes.show.type_univers")
                        </div>
                    </div>
                </div>




                </section>
    </div>
        </div>


@endsection
