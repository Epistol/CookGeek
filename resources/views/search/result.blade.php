@extends('layouts.app.app')
@section('titrepage', "Résultats de la recherche")
@section('content')

    <div class="container">
        <section class="section searchresult">
            <div class="columns is-paddingless is-marginless ">
                {{--  <div class="column is-8 is-offset-2">

                  </div>--}}
                <div class="column">
                    @include("search.searchbar")
                    {{--  @include("search.settings")--}}
                </div>
            </div>
        </section>
        {{--    <transition name="slide">
                <div v-bind:class="{ active: seen }" class="columns is-marginless results not-active " v-if="seen"
                     v-cloak>
                    <div class="column">
                        --}}{{--@include("search.advanced.type")--}}{{--
                        --}}{{--@include("search.advanced.diff")--}}{{--
                        --}}{{--@include("search.advanced.prix")--}}{{--
                        --}}{{--  @include("search.advanced.temps")
                         @include("search.advanced.note")
                         @include("search.advanced.parts")--}}{{--
                    </div>
                </div>
            </transition>--}}
        <section class="section ">

            <div class="columns" id="results">
                <div class="column is-7 searchresult">
                    @if($result['recipe']->count() > 0)
                        @include("search.elements.recipe_name")
                    @else
                        <div style="position: relative;">
                            <h1 class="title">{{ucfirst(strip_tags(clean($result['value'])))}}</h1>
                            <span style="position: absolute;bottom: -1.5rem;left: 0px;"><i>0 recette trouvé :/ </i></span>
                        </div>

                    @endif
                </div>
                <div class="column is-4 is-offset-1 searchresult">
                    <div class="">
                        {{--Medaillons--}}
                        <h2 class="title">Médias :</h2>
                        @if($result['categunivers']->count() > 0)
                            @includeIf("search.elements.categ")
                        @endif
                    </div>
                    <div class="">
                        {{--HP, Narnia, etc--}}
                        <h2 class="title">Univers :</h2>
                        @if($result['univers']->count() > 0)
                            @includeIf("search.elements.univers")
                        @endif
                    </div>
                    <div class="">
                        @if($result['ingredient']->count() > 0)
                        @includeIf("search.elements.recipe_ingr")
                            @endif
                    </div>
                </div>


            </div>

        </section>
    </div>


@endsection