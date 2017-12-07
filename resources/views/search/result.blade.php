@extends('layouts.app')

@section('content')

    <div class="container">
        <section class="searchresult">
            <div class="advanced">
                <div class="columns ">
                    <div class="column is-half is-offset-one-quarter">
                        @include("search.searchbar")
                    </div>
                    <div class="column">
                        @include("search.settings")
                    </div>

                </div>
                <transition name="slide">
                    <div class="columns is-marginless results" v-if="seen" v-cloak>
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

                <div class="linesmall">
                    @if(array_key_exists('categunivers', $result))
                            @foreach($result['categunivers'] as $c)

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

                    @if(array_key_exists('univers', $result))
                            @foreach($result['univers'] as $univ)
                                <a class="button is-rounded"> {{$cat->name}}</a>
                            @endforeach
                    @endif

                        @if(array_key_exists('type_recipes', $result))
                            @foreach($result['type_recipes'] as $cat)
                                <a class="button is-rounded"> {{$cat->name}}</a>
                            @endforeach
                    @endif

                    @if(array_key_exists('ingredient', $result))
                            @foreach($result['ingredient'] as $cat)
                                <a class="button is-rounded"> {{$cat->name}}</a>
                            @endforeach
                    @endif

                </div>


                @if(array_key_exists('recipe', $result))
                    @foreach($result['recipe'] as $cat)
                        {{$cat->name}}
                    @endforeach
                @endif

            </div>


        </section>
    </div>


@endsection