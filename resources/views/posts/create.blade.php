@extends('layouts.app.admin')
@section('titrepage', "Ajouter une recette")
@section('content')

    <div class="container recipe-add">

        <section class="section blockcontent">

            <header class="background-round">
                <div class="columns">
                    <div class="column">
                        <div class="has-text-centered">
                            <h1 class="title">Créer un article</h1>
                        </div>
                    </div>
                </div>
            </header>
            <div class="field">
                <label class="label">Titre</label>
                <div class="control">
                    <input class="input" type="text" placeholder="Titre">
                </div>
            </div>

            <div class="field">
                <label class="label">Contenu</label>
                {{--                <editor id="tinymce" v-model="content"></editor>--}}
                <div class="control">
                    <textarea id="gutenvel" name="gutenvel" class="form-control">
                        {!! old('gutenvel') !!}
                    </textarea>
                </div>
            </div>
        </section>

    </div>
@endsection
