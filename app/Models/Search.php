<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    /**
     * @param $value
     * @return array
     */
    public function explode_star($value)
    {
        $recipe = Recipe::where('id', $value)->first();
        $note = $recipe->note;
        if ($note !== null) {
            $note = $recipe->note->avg('note');
            $stars1 = number_format($note, 1, '.', '');
            $starsget = explode('.', $stars1, 2);
        } else {
            $starsget = $note;
        }
        return $starsget;
    }
}
