@extends('layouts.app.app')
@section('titrepage', ucfirst(strip_tags(clean($recette->title))))

@if ($urlToFirstListImage = $recette->getFirstMediaUrl('images', 'thumb'))
    @php
        $pic = $urlToFirstListImage;
    @endphp
@else
    @php
        $pic = collect();
    @endphp
@endif

@if(collect($pic)->isNotEmpty())
    @section('image_og', $pic)
@endif


@section('content')

    @include('notifications')

    <div class="recipeAddBg">
        <div class="container">
            @include("recipes.show.breadcrumb")
                <div class="section columns shadowbox">
                    {{--Photo + ingredients--}}
                    <div class="column is-one-fifth is-marginless is-paddingless side-left" id="side_recipe">
                        @include("recipes.show.images")
                        {{--Fiche gauche - INGREDIENTS --}}
                        @include("recipes.show.ficheinfo")
                    </div>
                    {{--    Infos + steps--}}
                    <div class="column is-marginless is-paddingless ">
                        {{--// Budget--}}
                        <div class="columns list-h-show  is-marginless is-paddingless">
                            <div class="column">
                                <div class="has-text-centered">
                                    @include("recipes.show.timing")
                                </div>
                            </div>
                            <div class="column">
                                <div class="has-text-centered">
                                    @include("recipes.show.univers")
                                </div>
                            </div>

                            <div class="column">
                                <div class="has-text-centered">
                                    @include("recipes.show.parts")
                                </div>
                            </div>
                            <div class="column">
                                <div class="has-text-centered">
                                    @include("recipes.show.stars")
                                </div>
                            </div>

                            {{--// Auteur--}}
                        </div>
                        <div class="page--no-pading">
                            <div class="content">
                                <div class="columns is-marginless">
                                    <div class="column is-9" style="padding: 2.5rem;">
                                        @include("recipes.show.comment")
                                        @include("recipes.show.steps")
                                        @if($recette->video)
                                            @include("recipes.show.video")
                                        @endif

                                        {{--Espace commentaires --}}
                                        <div id="#fb-commentaire_container">
                                            <div class="fb-commentaire">
                                                <div class="fb-comments" data-href="{{url()->current()}}"
                                                     data-width="100%" data-numposts="5" data-colorscheme="light"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <aside class="column is-3 list-h-show ">
                                        @include('recipes.show.fiche_droite')
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>


    <div class="container">
        <section class="section blockcontent">
            {{-- RECETTE SIMILAIRES (4 BLOCS) --}}
            @include('recipes.show.more_like_this')
        </section>
    </div>

    @include('recipes.show.schema_json')

@endsection




