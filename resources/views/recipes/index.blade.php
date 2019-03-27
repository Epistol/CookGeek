@extends('layouts.app.app')
@section('titrepage', __('common.recipes'))
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
                                    @lang('recipe.last-recipes')
                                </h1>
                            </div>
                        </div>
                    </section>
                    @include("recipes.index.recipe_name")
                @endif

            </div>

        </section>
    </div>

    @include('modal_login')

@endsection
