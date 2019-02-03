@extends('layouts.app')
@section('titrepage', strip_tags(clean($ingredient->name)) . " | " . __('recipe.ingredient'))
@section('content')

    <div class="container">
        <section class="section blockcontent">

            @include("ingredients.index.bread")

            <div class="content">
                {{--@include("recipes.index.searchbar")--}}
                {{--@include("recipes.index.partype")--}}

                @if($ingredient)
                    <section class="hero">
                        <div class="hero-body">
                            <div class="container">
                                <h1 class="title">
                                    {{strip_tags(clean($ingredient->name))}}
                                </h1>
                            </div>
                        </div>
                    </section>
                    <section class="section">
                        @include('ingredients.show.recipe_name')
                    </section>
                @endif
            </div>
        </section>
    </div>

@endsection