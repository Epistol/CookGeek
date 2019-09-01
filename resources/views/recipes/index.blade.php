@extends('layouts.app.app')
@section('titrepage', __('common.recipes'))
@section('content')

    <div class="container">
        <section class="section blockcontent">
            @include("recipes.bread")
            <div class="container">
                {{--@include("recipes.index.searchbar")--}}
                {{--@include("recipes.index.partype")--}}
                @if($recipes)
                    <section class="tendance">
                        <h1>En tendance</h1>
                    </section>
                    <h1>Nouvelles recettes</h1>
                    <section id="new-recipes">
                            <div class="container">
                                <h1 class="title">
                                    @lang('recipe.last-recipes')
                                </h1>
                            </div>
                    </section>
                    @include("recipes.index.recipe_name")
                @endif
            </div>
        </section>
    </div>

    @include('modal_login')

@endsection
