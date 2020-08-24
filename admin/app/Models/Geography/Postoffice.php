<?php

namespace App\Models\Geography;

use Illuminate\Database\Eloquent\Model;

class Postoffice extends Model
{
    protected $fillable = ['policestation_id', 'name', 'bn_name', 'code'];

    static function get($request)
    {
        return Postoffice::where('policestation_id', $request->id)->get();
    }

}
