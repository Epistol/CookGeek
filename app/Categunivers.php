<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categunivers extends Model
{
    public $timestamps = false;
    protected $table = 'categunivers';


	/**
	 * @return mixed
	 */
	public function alltypes() {
		$all_types = DB::table($this->table)->get();
		return $all_types;
	}



}
