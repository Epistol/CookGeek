@extends('layouts.app')

@section('content')
    <div class="recipeaddbg">
        <div class="container">
            <section class="section ">

                @include("recipes.show.bread")

                {{-- Nom du produit--}}
                <h1 class="title">{{$recette->title}}</h1>
                {{-- AVIS --}}
                <section class="section">

                </section>
                {{-- Images--}}
                <section class="section">
                    <figure class="image is-128x128 principale">



                        <img src="/recipes/{{$recette->id}}/{{$recette->id_user}}/{{$firstimg->image_name}}">
                    </figure>
                </section>







            </section>



        </div>
    </div>

@endsection
