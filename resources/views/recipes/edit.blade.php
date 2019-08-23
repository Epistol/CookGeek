@extends('layouts.app.app')
@section('titrepage',  __('common.editing') . ' ' . __('recipe.of') . " : ". $recipe->title)

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
    <div class="pt-4">
        <div class="container">
            @include("recipes.show.breadcrumb")
            <div class="flex mb-4 shadowbox m-0">
                {{--Photo + ingredients--}}
                <aside class="w-1/5 m-0  side-left" id="side_recipe">
                    @include("recipes.show.images")
                    {{--Fiche gauche - INGREDIENTS --}}
                    @include("recipes.show.ficheinfo")
                </aside>
                {{--    Infos + steps--}}
                <div class="flex-1 m-0  ">
                    {{--// Budget--}}
                    <div class="flex mb-4 list-h-show  m-0 ">
                        <div class="flex-1">
                            <div class="has-text-centered">
                                @include("recipes.show.univers")
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="has-text-centered">
                                @include("recipes.show.parts")
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="has-text-centered">
                                @include("recipes.show.stars")
                            </div>
                        </div>

                        {{--// Auteur--}}
                    </div>
                    <div class="page--no-pading">
                        <div class="content">
                            <div class="flex mb-4 m-0">
                                <div class="flex-1 w-3/4" style="padding: 2.5rem;">
                                    @include("recipes.show.comment")
                                    @include("recipes.show.steps")
                                    @if($recipe->video)
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
                                <aside class="w-1/4 list-h-show ">
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




