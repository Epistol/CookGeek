@extends('layouts.admin')
@section('titrepage', "Ajouter une recette")
@section('content')

    <div class="container recipe-add">

        <section class="section blockcontent">

            <div class="background-round">
                <div class="columns">
                    <div class="column">
                        <div class="has-text-centered">
                            <h1 class="title">Créer un univers</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field">
                <label class="label">Titre</label>
                <div class="control">
                    <input class="input" type="text" placeholder="Text input">
                </div>
            </div>

        </section>

    </div>

@endsection
