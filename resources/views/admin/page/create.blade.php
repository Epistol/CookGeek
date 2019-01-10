@extends('layouts.admin')


@section('content')

    <div class="container">

        <h1 class="title">Ajouter une page</h1>

        <form method="POST" action="{{route('page.store')}}">
            @csrf
            <div class="field">
                <label class="label">Nom de la page</label>
                <p class="control">
                    <input class="input" name="name" type="text" placeholder="Nom">
                </p>
            </div>

            <div class="field">
                <label class="label">Contenu</label>
                <p class="control">
                    <textarea id="mytextarea" name="contenu" class="textarea" placeholder="Contenu"></textarea>
                </p>
            </div>


            <div class="field is-grouped">
                <p class="control">
                    <button class="button is-primary">Ajouter</button>
                </p>
                <p class="control">
                    <button class="button is-link">Cancel</button>
                </p>
            </div>
        </form>
    </div>

@endsection
