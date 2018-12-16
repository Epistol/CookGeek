@extends('layouts.app')
@section('titrepage', "Résultats de la recherche")
@section('content')

    <div class="container">
        <section class="searchresult">
            <div class="advanced">
                <div class="columns ">
                    {{--  <div class="column is-8 is-offset-2">

                      </div>--}}
                    <div class="column">
                        @include("search.searchbar")
                        {{--  @include("search.settings")--}}
                    </div>

                </div>
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


            </div>


            <div class="resultats">
                <div class="columns ">
                    <div class="column is-10 is-offset-1">
                        <div class="is-flex">
                            {{--Medaillons--}}
                            @if($categunivers)
                                @includeIf("search.elements.categ")
                            @endif
                        </div>
                        <div class="is-flex">
                            {{--HP, Narnia, etc--}}
                            @if($univers)
                                @includeIf("search.elements.univers")
                            @endif
                        </div>
                        <div class="is-flex">

                            {{--@if($valeurs['type_recipes'])--}}
                            {{--@includeIf("search.elements.type_univ")--}}
                            {{--@endif--}}

                            {{--Ingrédients--}}
                            @includeIf("search.elements.recipe_ingr")
                        </div>


                        @if($recipe)
                            @include("search.elements.recipe_name")
                        @endif

                    </div>
                </div>

            </div>


        </section>
    </div>


@endsection