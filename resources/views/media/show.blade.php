@extends('layouts.app.app')

@section('content')
    <div class="recipeaddbg">
        <div class="container">
            <section class="">
                <div class="background-round">
                    @include("media.show.bread")
                </div>

                <div class="content">
                    {{--On affiche 4 recettes par type--}}
                    <section class="section blockcontent">
                        <div class="columns is-multiline">
                            @foreach($recipes as $i=>$recipe)
                                <div class="column is-2">
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
                                                    <p class="title is-4"><a
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
            </section>
        </div>
    </div>

@endsection
