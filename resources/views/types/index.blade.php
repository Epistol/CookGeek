@extends('layouts.app')

@section('content')
    <div class="recipeaddbg">
        <div class="container">
            <section class="section blockcontent">

                @include("types.index.bread")

                <div class="content">


                    @if($recipes)

                        <section class="hero">
                            <div class="hero-body">
                                <div class="container">
                                    <h1 class="title">
                                        Toutes les recettes {{ucfirst($universcateg->name)}}
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
