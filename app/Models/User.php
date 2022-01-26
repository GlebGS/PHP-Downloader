<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory;

    public static function add($table, $data){
        return DB::table($table)->insert($data);
    }

    public static function findUser($table, $data){
        return DB::table($table)->where([
            'email' => $data['email'],
        ])->first();
    }

    public static function edit($table, $id, $data){
        return DB::table($table)
            ->where("id", '=', $id)
            ->update($data);
    }

    public static function find($table, $id){
        return DB::table($table)->where([
            'id' => $id,
        ])->first();
    }

    public static function deleteUser($table, $id){
        return DB::table($table)
            ->where('id', '=', $id)
            ->delete();
    }

    public static function deleteFile($table, $id){
        return DB::table($table)
            ->where('id', '=', $id)
            ->delete();
    }
}
