@extends('layouts.app')

@section('titrepage', $recette->title)
@section('content')

    <div class="recipeaddbg">
        <div class="container">
            {{--// BREADCRUMB--}}
            @include("recipes.show.bread")
            <div class="section">
                <div class="columns shadowbox">
                    {{--Photo + ingredients--}}
                    <div class="column is-one-fifth is-marginless is-paddingless left_side">
                        @include("recipes.show.images")
                        <div class="">
                            @include("recipes.show.ficheinfo")
                        </div>
                    </div>
                    {{--    Infos + steps--}}
                    <div class="column is-marginless is-paddingless ">
                        {{--// Budget--}}
                        <div class="columns list-h-show  is-marginless is-paddingless">
                            <div class="column">
                                <div class="has-text-centered">
                                    @include("recipes.show.timing")
                                </div>
                            </div>
                            <div class="column">
                                {{--// Timing--}}
                                <div class="has-text-centered">
                                    @include("recipes.show.parts")
                                </div>
                            </div>
                            <div class="column">
                                <div class="has-text-centered">
                                    @include("recipes.show.univers")
                                </div>
                            </div>
                            <div class="column">
                                {{--// Parts--}}
                                <div class="has-text-centered">
                                    @include("recipes.show.stars")
                                </div>
                            </div>


                            {{--// Auteur--}}
                        </div>
                        <div class="page_no_padding">
                            <div class="content">
                                <div class="columns is-marginless">
                                    <div class="column is-9" style="padding: 2.5rem;">
                                        @include("recipes.show.steps")
                                        @if($recette->video)
                                            @include("recipes.show.video")
                                        @endif



                                        {{--Espace commentaires --}}
                                        <div id="#fb-commentaire_container">
                                            <div class="fb-commentaire">
                                                <div class="fb-comments" data-href="{{url()->current()}}"
                                                     data-width="100%" data-numposts="5" data-colorscheme="light"></div>
                                            </div>
                                        </div>


                                    </div>
                                    <aside class="column is-3 list-h-show ">
                                        @include('recipes.show.fiche_droite')
                                    </aside>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <section class="section blockcontent">
            {{-- RECETTE SIMILAIRES (4 BLOCS) --}}
            @include('recipes.show.more_like_this')
        </section>
    </div>

	<?php
	use Carbon\Carbon;use Spatie\SchemaOrg\Schema;

	$instructions = array();
	foreach($instructions as $key => $etape) {
		$nom_in = app('profanityFilter')->filter($steps[$key]->instruction);
		$instructions[] = $nom_in;
	}

	if(isset($firstimg->image_name)) {
		$img = $firstimg->image_name;
	} else {
		$img = null;
	}

	$type = DB::table('type_recipes')->where("id", "=", $recette->type)->first();
	// Shema.org TODO STEPS
	$datas = Schema::Recipe()
		->name($recette->title)
		->image(url('/') . "/recipes/" . $recette->id . "/" . $recette->id_user . "/" . $img)
		->datePublished(Carbon::parse($recette->created_at)->format('Y-m-d'))
		->aggregateRating(Schema::AggregateRating()->ratingValue($stars1)->reviewCount($countrating))
		->author(Schema::person()->name($nom))
		->prepTime($preptimeiso)
		->cookTime($cooktimeiso)
		->totalTime($totaliso)
		->description($recette->title . " - CDG")
		->recipeIngredient(json_encode($ingredients))
		->recipeCategory($type->name)
	?>

    {!! $datas->toScript()  !!}
@endsection




