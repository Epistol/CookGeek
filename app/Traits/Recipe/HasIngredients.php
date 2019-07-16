<?php


namespace App\Traits\Recipe;

use App\Ingredient;
use Illuminate\Support\Facades\Lang;

trait HasIngredients
{
    /**
     * @param $request
     */
    public function insertIngredients($request)
    {
        // Storing ingredients and attach to the recipe
        foreach ($request->ingredient as $ingredient) {
            $ingredient = Ingredient::firstOrCreate([
                'name' => $this->cleanInput($ingredient),
                'lang' => Lang::locale()
            ]);
            $filteredIngredients = $this->ingredients->filter(function ($value, $key) use ($ingredient) {
                return $value->id === $ingredient->id;
            });
            // if the ingredient already exist
            if ($filteredIngredients) {
                $this->ingredients()->toggle($ingredient->id);
            } else {
                $this->ingredients()->detach($filteredIngredients->id);
            }
        }
    }
}
