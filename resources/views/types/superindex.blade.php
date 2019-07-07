@extends('layouts.app.app')

@section('content')
    <div class="recipeaddbg">
        <div class="container">
            <header class="">
                <div class="background-round">
                    @include("types.index.bread")
                </div>
                <div class="container">
                    <section class="section ficheinfo">
                        <div class="columns is-multiline is-mobile">
                            @foreach($types as $type)
                                <div class="column is-one-third is-flex-center">
                                    {{--On affiche la liste des types de recettes--}}
                                    <a class="tag is-primary is-medium"
                                       href="{{route('type.show', lcfirst($type->name))}}">{{$type->name}}s</a>
                                </div>
                            @endforeach
                        </div>

                    </section>

                    @foreach($types as $type)
                        {{--On affiche 4 recettes par type--}}
                        <section class="section blockcontent">
                            <div>
                                @include("recipes.index.partyperecette")
                            </div>
                        </section>
                    @endforeach


                </div>

            </header>
        </div>
    </div>

@endsection
