<?php

namespace App\Models\Geography;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = ['name', 'bn_name', 'url'];

    static function get()
    {
        return Division::all();
    }
}
