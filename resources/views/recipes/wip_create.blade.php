@extends('layouts.app.app')
@section('titrepage', trans('recipe.add-new') . ' ' . trans_choice('recipe.recipe', 1) )
@section('content')

    <div class="container recipe-add">
        <section class="section">
            <div class="flex mb-4">
                <div class="flex-1 w-10/12 is-offset-1">
                    <form class="form-horizontal recipe-add" enctype="multipart/form-data" method="POST"
                          action="{{ route('recipe.store') }}">
                        @csrf
                        <create-recipe></create-recipe>
                        <div class="flex mb-4">
                            <div class="flex-1 is-centered is-flex-center">
                                <button type="submit" class="button is-primary is-large publish">Ajouter ma recette</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
