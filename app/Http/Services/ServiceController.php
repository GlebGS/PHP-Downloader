<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;

class ServiceController
{

    public static function strLimit($str, $first, $length){
        return substr($str, $first, $length);
    }

}
