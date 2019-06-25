<?php

namespace App\Search;

use Algolia\ScoutExtended\Searchable\Aggregator;
use App\Categunivers;
use App\Ingredient;
use App\Page;
use App\Recipe;
use App\TypeRecipe;
use App\Univers;

class BigSearch extends Aggregator
{
    /**
     * The names of the models that should be aggregated.
     *
     * @var array
     */
    protected $models = [
        Recipe::class,
        Ingredient::class,
        Categunivers::class,
        Page::class,
        TypeRecipe::class,
        Univers::class,
    ];
}
