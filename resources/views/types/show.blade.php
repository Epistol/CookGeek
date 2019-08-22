@extends('layouts.app.app')

@section('content')
    <div class="pt-4">
        <div class="container">
            <section class="">
                <header class="background-round">
                    @include("types.show.bread")
                </header>

                <div class="container">
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
