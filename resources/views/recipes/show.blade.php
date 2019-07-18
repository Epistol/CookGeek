@extends('layouts.app.app')
@section('titrepage', ucfirst(strip_tags(clean($recipe->title))))

@if ($urlToFirstListImage = $recipe->getFirstMediaUrl('images', 'thumb'))
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
            <div class="columns shadowbox is-marginless">
                {{--Photo + ingredients--}}
                <aside class="column is-one-fifth is-marginless is-paddingless side-left" id="side_recipe">
                    @include("recipes.show.images")
                    {{--Fiche gauche - INGREDIENTS --}}
                    @include("recipes.show.ficheinfo")
                </aside>
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
                        <div class="container">
                            <div class="columns is-marginless">
                                <div class="column is-9" style="padding: 2.5rem;">
                                    @include("recipes.show.comment")
                                    @include("recipes.show.steps")
                                    @include("recipes.show.video")
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
    {{--    For mobile :--}}

{{--    <div class="tabs is-centered is-boxed">--}}
{{--        <ul>--}}
{{--            <li class="is-active">--}}
{{--                <a>--}}
{{--                    <span class="icon is-small"><i class="fas fa-image" aria-hidden="true"></i></span>--}}
{{--                    <span>Pictures</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a>--}}
{{--                    <span class="icon is-small"><i class="fas fa-music" aria-hidden="true"></i></span>--}}
{{--                    <span>Music</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a>--}}
{{--                    <span class="icon is-small"><i class="fas fa-film" aria-hidden="true"></i></span>--}}
{{--                    <span>Videos</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a>--}}
{{--                    <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>--}}
{{--                    <span>Documents</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}


    <div class="container">
        <section class="section blockcontent">
            {{-- RECETTE SIMILAIRES (4 BLOCS) --}}
            @include('recipes.show.more_like_this')
        </section>
    </div>

    @include('recipes.show.schema_json')

@endsection




