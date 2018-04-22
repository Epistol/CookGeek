@extends('layouts.app')

@section('titrepage', "Ajouter une recette")

@section('content')

    <div class="container addrecipe">

        <section class="section">
            <form class="form-horizontal addrecipe" enctype="multipart/form-data" method="POST"
                  action="{{ route('recipe.store_test') }}">
                {{ csrf_field() }}


                    <div class="column  is-paddingless page is-4">
                        <div class="padding-sides">
                            @include('recipes.add.image')

                        </div>
                    </div>


                <section class="section page">
                    @include("recipes.add.submit")
                </section>


            </form>
        </section>

    </div>

@endsection
