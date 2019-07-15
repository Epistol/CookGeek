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
            if (preg_match("/^(?:.*)[\*\*](?:.*)$/", app('profanityFilter')->filter($text))) {
                $string = '';
            }
            // Adding to the DB
            $univ = DB::table('univers')->insertGetId(
                ['name' => $string]
            );
        } else {
            $univ = $univ->first()->id;
        }
        return $univ;
    }
}
