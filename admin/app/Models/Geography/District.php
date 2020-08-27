<?php

namespace App\Models\Geography;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = ['division_id', 'name', 'bn_name', 'lan', 'lon', 'url'];

    static function getDistricts()
    {
        return District::all();
    }

    static function get($request)
    {
        return District::where('division_id', $request->id)->get();
    }
}
