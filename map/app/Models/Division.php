<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = ['name', 'bn_name', 'url'];

    static function get($request)
    {
        return Division::all();
    }

    static function create($request)
    {
        return $request;
    }
}
