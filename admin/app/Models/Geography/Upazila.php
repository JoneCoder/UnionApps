<?php

namespace App\Models\Geography;

use Illuminate\Database\Eloquent\Model;

class Upazila extends Model
{
    protected $fillable = ['district_id', 'name', 'bn_name', 'url'];

    static function get($request)
    {
        return Upazila::where('district_id', $request->id)->get();
    }

}
