<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class File extends Model
{
    use HasFactory;

    public static function addFile($table, $data){
        return DB::table($table)->insert($data);
    }

    public static function findFile($table, $id){
        return DB::table($table)
            ->where('id', '=', "$id")
            ->first();
    }
}
