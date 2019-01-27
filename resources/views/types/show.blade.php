@extends('layouts.app')

@section('content')
    <div class="recipeaddbg">
        <div class="container">
            <section class="">
                <div class="round_bg">
                    @include("types.show.bread")
                </div>

                <div class="content">
                        {{--On affiche 4 recettes par type--}}
                        <section class="section blockcontent">
                            <div>
                                @include("recipes.index.partyperecette_all")
                            </div>
                        </section>
                </div>

            </section>
        </div>
    </div>

@endsection
