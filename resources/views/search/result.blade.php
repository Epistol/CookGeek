@extends('layouts.app')

@section('content')

    <div class="container">
        <section class="searchresult">
            <div class="advanced">
                <div class="columns ">
                    <div class="column is-8 is-offset-2">
                        @include("search.searchbar")
                    </div>
                    <div class="column">
                        @include("search.settings")
                    </div>

                </div>
                <transition name="slide">
                    <div v-bind:class="{ active: seen }" class="columns is-marginless results not-active "  v-if="seen" v-cloak>
                        <div class="column">
                            @include("search.advanced.type")
                            @include("search.advanced.diff")
                            @include("search.advanced.prix")
                            {{--  @include("search.advanced.temps")
                             @include("search.advanced.note")
                             @include("search.advanced.parts")--}}
                        </div>
                    </div>
                </transition>



            </div>


            <div class="resultats">
                <div class="columns ">
                    <div class="column is-10 is-offset-1">
                        <div class="linesmall">
                            @if(array_key_exists('categunivers', $resultats))
                                @foreach($resultats['categunivers'] as $c)

                                    <a href="{{route('media.show', $c->name)}}">
                                        <div class=" ">
                                            @if($c->name== 'tv')
                                                <div class="medail {{strtolower($c->name)}}" ></div>
                                            @else
                                                <div class="medail {{strtolower($c->name)}}"></div>
                                            @endif
                                        </div>
                                    </a>

                                @endforeach
                            @endif

                            @if(array_key_exists('univers', $resultats))
                                @foreach($resultats['univers'] as $univ)
                                    <a class="button is-rounded"> {{$cat->name}}</a>
                                @endforeach
                            @endif

                            @if(array_key_exists('type_recipes', $resultats))
                                @foreach($resultats['type_recipes'] as $cat)
                                    <a class="button is-rounded"> {{$cat->name}}</a>
                                @endforeach
                            @endif

                            @if(array_key_exists('ingredient', $resultats))
                                @foreach($resultats['ingredient'] as $cat)

                                    <a class="button is-rounded"> {{$cat->name}}</a>
                                @endforeach
                            @endif

                        </div>

                        @include("search.recipe_categ")

                        @include("search.recipe_name")
                       {{-- @include("search.recipe_ingr")--}}
                    </div>
                </div>

            </div>


        </section>
    </div>


@endsection