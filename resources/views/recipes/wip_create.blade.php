@extends('layouts.app.app')
@section('titrepage', trans('recipe.add-new') . ' ' . trans_choice('recipe.recipe', 1) )
@section('content')

    <div class="container recipe-add">
        <section class="section">
            <div class="columns">
                <div class="column is-10 is-offset-1">
                    <form class="form-horizontal recipe-add" enctype="multipart/form-data" method="POST"
                          action="{{ route('recipe.store') }}">
                        @csrf
                        <create-recipe></create-recipe>
                        <div class="columns">
                            <div class="column is-centered is-flex-center">
                                <button type="submit" class="button is-primary is-large publish">Ajouter ma recette</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
