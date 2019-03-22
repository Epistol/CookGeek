@extends('layouts.app.app')

@section('content')

    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-2 "  id="left_column">
                    @include('user.user_space.parts.menu')
                </div>

                <div class="column is-three-quarters blockcontent">

                    <h1>Mes recettes </h1>

                    @include("user_space.recipes.double_list_small_recipe")
                </div>
            </div>
        </div>
    </div>
@endsection
