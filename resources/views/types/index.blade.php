@extends('layouts.app.app')

@section('content')
    <div class="pt-4">
        <div class="container">
            <section class="section blockcontent">
                @include("types.index.bread")
                <div class="container">
                    @if($recipes)
                        <section class="hero">
                            <div class="hero-body">
                                <div class="container">
                                    <h1 class="title">
                                        Toutes les recettes {{ucfirst($universcateg->name)}}
                                    </h1>
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
