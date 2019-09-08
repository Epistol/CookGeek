<?php

/**
 * Created by PhpStorm.
 * @package : cdg_reload
 * @license : https://creativecommons.org/licenses/by-nd/4.0/
 * @link : Bitbucket
 * Date: 2019-03-21
 */
use Carbon\Carbon;

$date = Carbon::parse($recipe->created_at)->format('Y-m-d');
$preptimeiso = "PT" . $recipe->sumerise($recipe->prep_time);
$cooktimeiso = "PT" . $recipe->sumerise($recipe->cook_time);
//            $resttimeiso = "PT".$this->sumerise($recipe->rest_time);
$totaliso = "PT" . $recipe->sumerise($recipe->prep_time + $recipe->cook_time + $recipe->rest_time);

?>

<script type="application/ld+json">
    {
      "@context": "http://schema.org/",
      "@type": "Recipe",
      "name": "{{strip_tags($recipe->title)}}",

      "image": [
        @if(collect($pic)->isNotEmpty())
            "{{$pic['url']}}"
            @else
            "{{$pic}}"
            @endif
        ],
        "author": {
          "@type": "Person",
          "name": "{{strip_tags($nom)}}"
        },
        "datePublished": "{{$date}}",
        "description": "{{$recipe->title . " - CDG"}}",
        "prepTime" : "{{$preptimeiso}}",
        "cookTime" : "{{$cooktimeiso}}",
        "totalTime" : "{{$totaliso}}",
        "recipeCategory" : "{{$recipe->types->name}}",
        "recipeIngredient": [
        @foreach ($recipe->ingredients as $key => $ingredient)
            <?php
            $qtt = strip_tags(app('profanityFilter')->filter($ingredient->qtt));
            $nom_in = strip_tags(app('profanityFilter')->filter($ingredient->name));
            ?>
            @if($loop->last)

                "{{$qtt}} {{$nom_in}}"
                            @else
                "{{$qtt}} {{$nom_in}}",
                    @endif

        @endforeach
        ],
        "recipeInstructions": [
          @foreach ($steps = $recipe->steps()->get() as $key => $etape)
            {
                "@type": "HowToStep",
<?php $nom_in = strip_tags(app('profanityFilter')->filter($steps[$key]->instruction));?>
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
