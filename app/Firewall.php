<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Firewall extends Model
{
	static function getAllIps(){
			$list = DB::table('firewall')->get();
			return $list;
	}
}
