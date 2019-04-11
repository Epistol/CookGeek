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
            </form>
        </section>
    </div>

@endsection
