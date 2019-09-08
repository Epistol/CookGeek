@extends('layouts.app.app')
@section('titrepage',   strip_tags($univers->name) )
@section('content')

    @if($univers->picture)
        <div role="navigation" class="second-menu">
            <img src="{{$univers->picture}}" />
        </div>
        @endif

    <div class="container">
        <section class="section blockcontent  ">


            @include("univers.show.bread")

            <section class="section">
                <h1 class="title">
                    {{ strip_tags($univers->name) }}
                </h1>
            </section>

            @if($univers->description)
                <div role="navigation" class="second-menu">
                    {{strip_tags($univers->description)}}
                </div>
            @endif


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



@endsection
