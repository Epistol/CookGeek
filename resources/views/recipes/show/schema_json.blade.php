<?php

/**
 * Created by PhpStorm.
 * @package : cdg_reload
 * @license : https://creativecommons.org/licenses/by-nd/4.0/
 * @link : Bitbucket
 * Date: 2019-03-21
 */
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
