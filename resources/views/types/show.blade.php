@extends('layouts.app.app')

@section('content')
    <div class="recipeaddbg">
        <div class="container">
            <section class="">
                <div class="background-round">
                    @include("types.show.bread")
                </div>

                <div class="content">
                        {{--On affiche 4 recettes par type--}}
                        <section class="section blockcontent">
                            <div>
                                @include("recipes.index.partyperecette_all")
                            </div>
                        </section>
                </div>

            </section>
        </div>
    </div>

@endsection
