@extends('layouts.app')

@section('titrepage', ucfirst(strip_tags(clean($recette->title))))
<?php
if ($validPictures->isNotEmpty()) {
    $imageSocial = $validPictures->first();
    $pic = collect($imageSocial->urls)->firstWhere('name', '=', 'normal');
} else {
    $pic = collect();
}
?>
@if(collect($pic)->isNotEmpty())
    @section('image_og',$pic['url'])
@endif
@section('content')


    @if(!empty($status))
        @if ($status)
            <Notif title="is-alert" v-if="seen" @close="seen = false" content="{{$status}}">
            </Notif>
        @endif
    @endif

    <div class="recipeaddbg">
        <div class="container">
            {{--// BREADCRUMB--}}
            @include("recipes.show.bread")
            <div class="section">
                <div class="columns shadowbox">
                    {{--Photo + ingredients--}}
                    <div class="column is-one-fifth is-marginless is-paddingless side-left" id="side_recipe">
                        @include("recipes.show.images")
                        {{--Fiche gauche - INGREDIENTS --}}
                        @include("recipes.show.ficheinfo")
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
                                <div class="has-text-centered">
                                    @include("recipes.show.univers")
                                </div>
                            </div>

                            <div class="column">
                                <div class="has-text-centered">
                                    @include("recipes.show.parts")
                                </div>
                            </div>
                            <div class="column">
                                <div class="has-text-centered">
                                    @include("recipes.show.stars")
                                </div>
                            </div>

                            {{--// Auteur--}}
                        </div>
                        <div class="page--no-pading">
                            <div class="content">
                                <div class="columns is-marginless">
                                    <div class="column is-9" style="padding: 2.5rem;">
                                        @include("recipes.show.comment")
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

    $type = DB::table('type_recipes')->where("id", "=", $recette->type)->first();
    ?>


    <script type="application/ld+json">
    {
      "@context": "http://schema.org/",
      "@type": "Recipe",
      "name": "{{strip_tags(clean($recette->title))}}",

      "image": [
        @if(collect($pic)->isNotEmpty())
            "{{$pic['url']}}"
            @else
            "{{$pic}}"
            @endif
        ],
        "author": {
          "@type": "Person",
          "name": "{{strip_tags(clean($nom))}}"
        },
        "datePublished": "{{Carbon::parse($recette->created_at)->format('Y-m-d')}}",
        "description": "{{$recette->title . " - CDG"}}",
        "prepTime" : "{{$preptimeiso}}",
        "cookTime" : "{{$cooktimeiso}}",
        "totalTime" : "{{$totaliso}}",
        "recipeCategory" : "{{strip_tags(clean($type->name))}}",
        "recipeIngredient": [
        @foreach ($ingredients as $key => $ingredient)
            <?php
            $qtt = strip_tags(clean(app('profanityFilter')->filter($ingredient->qtt)));
            $nom_in = strip_tags(clean(app('profanityFilter')->filter($ingredient->name)));
            ?>
            @if($loop->last)

                "{{$qtt}} {{$nom_in}}"
                            @else
                "{{$qtt}} {{$nom_in}}",
                    @endif

        @endforeach
        ],
        "recipeInstructions": [
          @foreach ($steps as $key => $etape)
            {
                "@type": "HowToStep",
<?php $nom_in = strip_tags(clean(app('profanityFilter')->filter($steps[$key]->instruction)));?>
            "text": "{{$nom_in}}"
            @if($loop->last)
                }
            @else
                },
             @endif
        @endforeach
        ]
}


    </script>
@endsection




