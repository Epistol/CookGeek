<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Firewall extends Model
{
    public static function getAllIps()
    {
        return DB::table('firewall')->get();
    }
}
