@extends('layouts.admin')


@section('content')

    <div class="container">

        <form method="POST" action="/admin/page">
            {{ csrf_field() }}
            <div class="field">
                <label class="label">Nom de la page</label>
                <p class="control">
                    <input class="input" name="name" type="text" placeholder="Text input">
                </p>
            </div>

            <div class="field">
                <label class="label">Message</label>
                <p class="control">
                    <textarea id="mytextarea" name="contenu" class="textarea" placeholder="Textarea"></textarea>
                </p>
            </div>


            <div class="field is-grouped">
                <p class="control">
                    <button class="button is-primary">Submit</button>
                </p>
                <p class="control">
                    <button class="button is-link">Cancel</button>
                </p>
            </div>
        </form>
    </div>

@endsection
