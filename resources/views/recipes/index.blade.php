@extends('layouts.app')

@section('content')
    <div class="recipeaddbg">
        <div class="container">
            <section class="section blockcontent">

    @include("recipes.index.bread")

                <div class="content">
                    {{--@include("recipes.index.searchbar")--}}
                    @include("recipes.index.partype")

                    @if($recipes)

                        <section class="hero">
                            <div class="hero-body">
                                <div class="container">
                                    <h1 class="title">
                                        Les dernières recettes
                                    </h1>
                                    <h2 class="subtitle">

                                    </h2>
                                </div>
                            </div>
                        </section>



                        @include("recipes.index.recipe_name")
                    @endif

                </div>

            </section>
        </div>
    </div>

@endsection
