@extends('layouts.admin')
@section('titrepage', 'Admin')
@section('content')
    <div class="container">
        <h1>Recettes</h1>

        <section class="section">
            <form method="PATCH" action="{{route("admin.recipe.update", $recipe->slug)}}">
                @csrf
                @foreach($recipe->getAttributes() as $key => $r)
                    <div class="field">
                        <label class="label">{{$key}}</label>
                        <div class="control">
                            <input class="input" value="{{strip_tags(clean($r)) }}">
                        </div>
                    </div>
                @endforeach

                <button type="submit" class="button is-primary">Sauvegarder</button>
            </form>
        </section>


    </div>
@endsection
