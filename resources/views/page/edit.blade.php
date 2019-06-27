@extends('layouts.app.admin')


@section('content')

    <div class="container">

        <form method="POST" action="{{route("page.update", $page->id)}}">
           @csrf
            <input type="hidden" name="_method" value="PATCH">
            <div class="field">
                <label class="label">Nom de la page</label>
                <p class="control">
                    <input class="input" name="name" type="text" value="{{$page->name}}">
                </p>
            </div>

            <div class="field">
                <label class="label">Message</label>
                <p class="control">
                    <textarea id="mytextarea" name="contenu" class="textarea"
                              placeholder="Textarea">{{$page->content}}</textarea>
                </p>
            </div>


            <div class="field is-grouped">
                <p class="control">
                    <button class="button is-primary">Envoyer</button>
                </p>

            </div>
        </form>
    </div>

@endsection
