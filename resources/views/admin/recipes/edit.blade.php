@extends('layouts.admin')
@section('titrepage', 'Admin')
@section('content')
    <div class="container">
        <h1>Recettes</h1>

        <a href="{{route('page.create')}}" class="button is-primary">+ Ajouter une recette</a>

        <section class="section">

            @foreach($recipe as $key => $r)
                <div class="field">
                    <label class="label">{{$key}}</label>
                    <div class="control">
                        <input class="input" value="{{strip_tags(clean($r)) }}">
                    </div>
                </div>
            @endforeach
        </section>


    </div>
@endsection
