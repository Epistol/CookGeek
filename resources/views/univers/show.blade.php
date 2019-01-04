@extends('layouts.app')
@section('titrepage', "Univers")
@section('content')

    <div class="container">
        <section class="section blockcontent is-paddingless ">


            @include("univers.show.bread")

            <section class="section">
                <h1 class="title">
                    {{ $univers->name }}
                </h1>

            </section>


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
