<?php

namespace App\Models\Geography;

use Illuminate\Database\Eloquent\Model;

class Union extends Model
{
    protected $fillable = ['upazila_id', 'name', 'bn_name', 'url'];

    static function get($request)
    {
        return Union::where('upazila_id', $request->id)->get();
    }
}

