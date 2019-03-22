@extends('layouts.app.app')
@section('titrepage', "Index des ingrédients")
@section('content')

    <div class="container">
        <section class="section blockcontent">

            @include("ingredients.index.bread")

            <div class="content">
                {{--@include("recipes.index.searchbar")--}}
                {{--@include("recipes.index.partype")--}}

                @if($ingredients)
                    <section class="hero">
                        <div class="hero-body">
                            <div class="container">
                                <h1 class="title">
                                    Index des ingrédients
                                </h1>
                            </div>
                        </div>
                    </section>

                    @include("ingredients.index.list")
                @endif

            </div>

        </section>
    </div>

@endsection
