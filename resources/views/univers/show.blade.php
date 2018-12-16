@extends('layouts.app')
@section('titrepage', "Univers")
@section('content')

    <section class="entete">
        <div class="container">
            <div class="columns">
                @if(isset($univers->picture))
                <div class="column">
                        <univpictureupload :universe_id={{$univers->id}} :picture={{$univers->picture}}></univpictureupload>
                    {{--@else--}}
                        {{--<univpictureupload :universe_id={{$univers->id}} :picture="null"></univpictureupload>--}}
                </div>
                @endif

                <div class="column">
                    <h1 class="title">
                        {{ $univers->name }}
                    </h1>
                </div>
            </div>
        </div>

    </section>


    <div class="container">
        <section class="section blockcontent is-paddingless ">

            @include("univers.show.bread")

            <div class="content">
                {{--@include("recipes.index.searchbar")--}}
                {{--@include("recipes.index.partype")--}}

                @if($univers)
                    {{--Liste des recettes par catégorie avec pagination --}}
                    @include("univers.show.index_list")
                @endif

            </div>

        </section>
    </div>


    <modal v-if="showModalLike" @close="showModalLike = false" v-cloak>
        <h3 slot="header">Connexion requise</h3>
        <p slot="body">Vous ne pouvez pas ajouter de recette en favori sans être connecté ! </p>
        <div slot="footer">
            <a class="button is-primary" href="/login">Connexion</a>
        </div>

    </modal>

@endsection
