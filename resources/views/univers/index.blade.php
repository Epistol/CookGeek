@extends('layouts.app.app')
@section('titrepage', "Univers")
@section('content')

    <div class="container">
        <section class="section blockcontent  ">
            @include("recipes.bread")

            <div class="content">
                {{--@include("recipes.index.searchbar")--}}
                {{--@include("recipes.index.partype")--}}

                @if($cateunivers)
                    <section class="hero">
                        <div class="hero-body">
                            <div class="container">
                                <h1 class="title">
                                    Les univers
                                </h1>
                                <div class="subtitle">
                                    {{--@include("search.searchbar")--}}
                                </div>
                            </div>
                        </div>
                    </section>
                    @include("univers.index.index_list")
                @endif
            </div>
        </section>
    </div>
@endsection
