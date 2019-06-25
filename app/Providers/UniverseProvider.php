<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UniverseProvider extends ServiceProvider
{

    /**
     * @param $text
     *
     * @return mixed
     */
    public function first_found_universe($text)
    {
        $univ = DB::table('univers')->select('id')->where('name', 'like', '%' . $text . '%')->get();

        if ($univ->isEmpty()) {
            $string = app('profanityFilter')->filter($text);

            if (preg_match("/^(?:.*)[\*\*](?:.*)$/", $string)) {
                $string = '';
            }

            // Adding to the DB
            $id_univers = DB::table('univers')->insertGetId(
                ['name' => $string]
            );
            $univ       = $id_univers;
        } else {
            $univ = $univ->first();
            $univ = $univ->id;
        }

        return $univ;
    }
}
