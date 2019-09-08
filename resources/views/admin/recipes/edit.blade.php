@extends('layouts.app.admin')
@section('titrepage', 'Editer recette / ADMIN')
@section('content')
    <div class="container">
        <h1>Recettes</h1>

        <section class="section">
            <form method="POST" action="{{route('admin.recipe.update', $recipe->id)}}">
                @csrf
                @method('PATCH')

                @foreach($recipe->getAttributes() as $key => $r)
                    <div class="field">
                        <label class="label">{{$key}}</label>
                        <div class="control">
                            <input class="input" value="{{strip_tags($r) }}" name="{{$key}}">
                        </div>
                    </div>
                @endforeach

                <button type="submit" class="button is-primary">Sauvegarder</button>
            </form>
        </section>


    </div>
@endsection
