@extends('layouts.app')

@section('content')
    <div class="recipeaddbg">
        <div class="container">
            <section class="section blockcontent">
                @include("recipes.show.bread")
                <div class="columns">
                    {{--Photo + ingredients--}}
                    <div class="column is-3">
                        @include("recipes.show.images")
                    </div>
                    {{--    Infos + steps--}}
                    <div class="column is-7">
                        <div class="has-text-centered">
                            <h1 class="title">{{$recette->title}}</h1>
                        </div>
                        <div class="content">
                            @include("recipes.show.stars")
                            @include("recipes.show.type_univers")
                            @include("recipes.show.type")
                        </div>


                    </div>
                    {{--Menu--}}
                    <div class="column">

                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection




