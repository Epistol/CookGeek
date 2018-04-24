@extends('layouts.app')

@section('content')
    <div class="recipeaddbg">
        <div class="container">
            <section class="">
                <div class="round_bg">
                    @include("types.index.bread")
                </div>

                <div class="content">


                    @foreach($types as $type)
                        {{--On affiche 4 recettes par type--}}
                        <section class="section blockcontent">
                            <div>
                                @include("recipes.index.partyperecette_all")

                            </div>
                        </section>
                    @endforeach


                </div>

            </section>
        </div>
    </div>

@endsection
