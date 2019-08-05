@extends('layouts.app.admin')
@section('titrepage', "Ajouter une recette")
@section('content')

    <div class="container recipe-add">

        <section class="section blockcontent">

            <header class="background-round">
                <div class="flex mb-4">
                    <div class="flex-1">
                        <div class="has-text-centered">
                            <h1 class="title">Créer un univers</h1>
                        </div>
                    </div>
                </div>
            </header>

            <div class="field">
                <label class="label">Titre</label>
                <div class="control">
                    <input class="input" type="text" placeholder="Text input">
                </div>
            </div>

        </section>

    </div>

@endsection
