@extends('layouts.app.admin')
@section('titrepage', 'Admin')
@section('content')
    <div class="container">
        <h1>Espace administration </h1>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <section id="todo">
            <h2>Hello {{Auth::user()->pseudo}}</h2>
            <p>
                Il y'a {{$recipes->count()}} nouvelles recettes à valider <br />
                Il y'a {{$recipePictures->count()}} images à valider <br />
                Il y'a eu {{$universes->count()}} nouveaux univers ce mois ci <br />
            </p>
        </section>

        <section id="util-links">
            <h2>Liens utiles</h2>
            <a href="https://app.asana.com/0/281129249238260/board">Asana board</a>

        </section>


    </div>
@endsection
