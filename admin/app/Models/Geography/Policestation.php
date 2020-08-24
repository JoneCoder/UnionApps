<?php

namespace App\Models\Geography;

use Illuminate\Database\Eloquent\Model;

class Policestation extends Model
{
    protected $fillable = ['district_id', 'name', 'bn_name'];

    static function get($request)
    {
        return Policestation::where('district_id', $request->id)->get();
    }

}
