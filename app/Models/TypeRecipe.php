<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * Class TypeRecipe
 * @package App
 */
class TypeRecipe extends Model
{
    use Searchable;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = 'type_recipes';

    /**
     * @param $value
     *
     * @return string
     */
    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * @param $id
     *
     * @return string
     */
    public function getnamefromid($id)
    {
        $type = $this->where('id', $id)->first();

        return "{$type->name}";
    }
}
