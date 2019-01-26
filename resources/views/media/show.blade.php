@extends('layouts.app')

@section('content')
    <div class="recipeaddbg">
        <div class="container">
            <section class="">
                <div class="round_bg">
                    @include("types.index.bread")
                </div>

                <div class="content">
                    {{--On affiche 4 recettes par type--}}
                    <section class="section blockcontent">
                        <div class="columns is-multiline">

                            @foreach($recipes as $i=>$recette)
                                <div class="column is-2">

                                    <div class="card cdg">
                                        <div class="card-image"><a href="{{route('recipe.show', $recette->slug)}}">
                                                    <?php   $img = $pictureService->loadRecipePictures($recette); ?>
                                                    @include('recipes.elements.picture')
                                            </a>
                                        </div>
                                        {{--   <categ_icon text_icon="{{$categ->name}}"></categ_icon>


                                           @include("recipes.medaillon")--}}

                                        <div class="card-content indexrecipe">
                                            <div class="media">
                                                <div class="media-content is-centered">
                                                    <p class="title is-4"><a
                                                                href="{{route('recipe.show', $recette->slug)}}"> {{$recette->title}}</a>
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
