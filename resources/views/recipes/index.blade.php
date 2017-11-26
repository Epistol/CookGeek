@extends('layouts.app')

@section('content')
    <div class="recipeaddbg">
        <div class="container">
            <section class="section blockcontent">

    @include("recipes.index.bread")

                <div class="content">
                    @include("recipes.index.partype")
                    @include("recipes.index.searchbar")
                </div>

            </section>
        </div>
    </div>

@endsection
