@extends('layouts.app.app')
@section('titrepage', "Ajouter une recette")
@section('content')

    <div class="container recipe-add">
        {{-- Bug commence ici--}}
        <section class="section">
            <form class="form-horizontal recipe-add" enctype="multipart/form-data" method="POST"
                  action="{{ route('recipe.store') }}">
                @csrf

                <create-recipe></create-recipe>

                <div class="columns" style="margin-bottom: 2rem;">
                    <div class="column  is-paddingless page is-4">
                        <div class="padding-sides">
                            <div class="columns timing">
                                <div class="column is-10 is-offset-1 ">
                                    @include("recipes.form.timing.tps_preparation")
                                    @include("recipes.form.timing.tps_cuisson")
                                    @include("recipes.form.timing.tps_repos")
                                    @include("recipes.form.nb_parts")
                                    @include("recipes.form.vegan")
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="section page">
                    <div class="columns">
                        <div class="column is-4"> @include("recipes.form.comment")
                            @include("recipes.form.video")
                        </div>
                        <div class="column">  @include("recipes.form.type")
                        </div>
                    </div>
                </section>

                <section class="section page">
                    @include("recipes.form.submit")
                </section>
            </form>
        </section>
    </div>

@endsection
