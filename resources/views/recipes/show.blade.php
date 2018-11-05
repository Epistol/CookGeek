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
                    <div class="column  is-marginless is-3 is-paddingless" style=" background: #fdfdfd;">
                        @include("recipes.show.images")
                        <div class="page">
                            @include("recipes.show.ficheinfo")
                        </div>
                    </div>
                    {{--    Infos + steps--}}
                    <div class="column is-marginless is-paddingless is-9 ">
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
                                    <div class="column is-8" style="padding: 2.5rem;">
                                        @include("recipes.show.steps")
                                        @if($recette->video)
                                            @include("recipes.show.video")
                                        @endif

                                        @include("recipes.show.social")


                                        {{--Espace commentaires --}}
                                        <div id="#fb-commentaire_container">
                                            <div class="fb-commentaire">
                                                <div class="fb-comments" data-href="{{url()->current()}}"
                                                     data-width="100%" data-numposts="5" data-colorscheme="light"></div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="column is-4  list-h-show ">

                                        @include('recipes.show.fiche_droite')

                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="recipeaddbg">
        <div class="container">
            <section class="section blockcontent">
                {{-- RECETTE SIMILAIRES (4 BLOCS) --}}
            </section>
        </div>
    </div>


    <?php
    use Carbon\Carbon;use Spatie\SchemaOrg\Schema;$ingredientliste = array();
    foreach ($ingredients as $ingr) {
        $nom_in = DB::table('ingredients')->where('id', $ingr->id_ingredient)->value('name');
        $ingredientliste[] = $ingr->qtt . " " . $nom_in;
    }

    if (isset($firstimg->image_name)) {
        $img = $firstimg->image_name;
    } else {
        $img = null;
    }

    // Shema.org
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
        ->recipeIngredient([$ingredientliste])
    ?>


    {!! $datas->toScript()  !!}
@endsection




