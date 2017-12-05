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
                    {{-- @include("search.advanced.prix")
                  {{--  @include("search.advanced.temps")
                   @include("search.advanced.note")
                   @include("search.advanced.parts")--}}
                </div>
            </div>
            </transition>


        </div>
    </section>
</div>

<?php

      /*  dd($result);*/

?>

@endsection