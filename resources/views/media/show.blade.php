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

                            @foreach($recipes as $i=>$recipe)
                                <div class="column is-2">

                                    <div class="card cdg">
                                        <div class="card-image"><a href="{{route('recipe.show', $recipe->slug)}}">
                                                <figure class="image is-4by3">
													<?php
													$img = DB::table('recipe_imgs')->where('user_id', '=', $recipe->id_user)->where('recipe_id', '=', $recipe->id)->first();
													?>
                                                    @if($img == null or empty($img))
                                                        <img src="http://via.placeholder.com/300x200?text={{$recipe->title}}"
                                                             class="fit-cover"
                                                             alt="{{$recipe->title}} / CDG">
                                                    @else
                                                        <img src="/recipes/{{$recipe->id}}/{{$recipe->id_user}}/{{$img->image_name}}"
                                                             class="fit-cover"
                                                             alt="{{$recipe->title}} / CDG">
                                                    @endif

                                                </figure>
                                            </a>
                                        </div>
                                        {{--   <categ_icon text_icon="{{$categ->name}}"></categ_icon>


                                           @include("recipes.medaillon")--}}

                                        <div class="card-content indexrecipe">
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
