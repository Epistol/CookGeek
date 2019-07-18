@extends('layouts.app.admin')
@section('titrepage', "Ajouter une recette")
@section('content')

    <div class="container recipe-add">
        <div class="columns">
            <div class="column is-8">
                <section class="section">
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
            <div class="column is-3">
                <aside class="sidebar">
                    <p class="menu-label">
                        <a href="{{"/admin"}}">
                            Image</a>
                    </p>
                    <ul class="menu-list has-dropdown is-hoverable">
                        <div class="menu-item">
                            <div class="control">
                                <div class="input-group">
                       <span class="input-group-btn">
                         <a id="lfm" data-input="thumbnail" data-preview="holder" class="button btn-primary">
                           <i class="fa fa-picture-o"></i> Choose
                         </a>
                       </span>
                                    <input id="thumbnail" class="form-control" type="hidden" name="filepath">
                                </div>
                                <img id="holder" style="margin-top:15px;max-height:100px;">
                            </div>
                        </div>
                    </ul>

                </aside>
            </div>
        </div>
    </div>
@endsection
