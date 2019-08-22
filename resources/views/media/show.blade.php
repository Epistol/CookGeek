@extends('layouts.app.app')

@section('content')
    <div class="pt-4">
        <div class="container">
            <header class="">
                <div class="background-round">
                    @include("media.show.bread")
                </div>

                <div class="container">
                    {{--On affiche 4 recettes par type--}}
                    <section class="section blockcontent">
                        <div class="flex mb-4 is-multiline">
                            @foreach($recipes as $i=>$recipe)
                                <div class="flex-1 w-2/12">
                                    <div class="card cdg">
                                        <div class="card-image"><a href="{{route('recipe.show', $recipe->slug)}}">
                                                @include('recipes.elements.picture')
                                            </a>
                                        </div>
                                        {{--   <categ_icon text_icon="{{$categ->name}}"></categ_icon>
                                           @include("recipes.medaillon")--}}
                                        <div class="card-content recipe-index">
                                            <div class="media">
                                                <div class="media-content is-centered">
                                                    <p class="title w-4/12"><a
                                                                href="{{route('recipe.show', $recipe->slug)}}"> {{$recipe->title}}</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{ $recipes->links() }}
                        </div>
                    </section>
                </div>
            </header>
        </div>
    </div>

@endsection
