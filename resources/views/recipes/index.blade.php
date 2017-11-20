@extends('layouts.app')

@section('content')
    <div class="recipeaddbg">
        <div class="container">
            <section class="section blockcontent">

    @include("recipes.index.bread")

                <div class="content">
                    @include("recipes.index.partype")
                </div>

            </section>
        </div>
    </div>

@endsection
