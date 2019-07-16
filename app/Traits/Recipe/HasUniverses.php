<?php

namespace App\Traits\Recipe;


use App\Univers;

trait HasUniverses
{

    public function insertUniverse($request)
    {
        $universes = Univers::where(['name' => $this->cleanInput($request->univers)])->get();
        if ($universes->isNotEmpty()) {
            foreach ($universes as $universe) {
                $this->universes()->attach($universe);
            }
        } else {
            if ($this->cleanInput($request->univers) !== '') {
                $universe = new Univers(['name' => $this->cleanInput($request->univers)]);
                $this->universes()->save($universe);
            }
        }
        return $this->universes();
    }
}
