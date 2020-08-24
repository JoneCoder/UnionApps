<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Image;

class Information extends Model
{
    protected $fillable = ['code', 'division_id', 'district_id', 'upazila_id', 'policestation_id',
        'postoffice_id', 'union_id', 'name', 'bn_name', 'village', 'subdomain', 'mobile', 'email', 'main_logo',
        'brand_logo', 'jolchap', 'print', 'about', 'map', 'status', 'created_by', 'updated_by', 'created_by_ip', 'updated_by_ip'];

    use SoftDeletes;

    static function store($request)
    {
        $request['created_by']      = auth()->user()->pin;
        $request['created_by_ip']   = $request->ip();
        $id = Information::create($request->except('_token', 'main_logo', 'brand_logo', 'jolchap', '_wysihtml5_mode'))->id;

        if ($request->hasFile('main_logo')){
            $photo = $request->main_logo;
            $fileExtension = $photo->getClientOriginalExtension();
            $fileName = 'main_logo_'.$request->code.'.'.$fileExtension;
            Image::make($photo)->resize(100, 100)->save(base_path('public/images/union/'.$fileName), 100);
            Information::find($id)->update([
                'main_logo'      => $fileName
            ]);
        }else{
            Information::find($id)->update([
                'main_logo'      => 'default_main_logo.png'
            ]);
        }

        if ($request->hasFile('brand_logo')){
            $photo = $request->brand_logo;
            $fileExtension = $photo->getClientOriginalExtension();
            $fileName = 'brand_logo_'.$request->code.'.'.$fileExtension;
            Image::make($photo)->resize(100, 100)->save(base_path('public/images/union/'.$fileName), 100);
            Information::find($id)->update([
                'brand_logo'      => $fileName
            ]);
        }else{
            Information::find($id)->update([
                'brand_logo'      => 'default_brand_logo.png'
            ]);
        }

        if ($request->hasFile('jolchap')){
            $photo = $request->jolchap;
            $fileExtension = $photo->getClientOriginalExtension();
            $fileName = 'jolchap_'.$request->code.'.'.$fileExtension;
            Image::make($photo)->resize(900, 900)->opacity(22)->save(base_path('public/images/union/'.$fileName), 100);
            Information::find($id)->update([
                'jolchap'      => $fileName
            ]);
        }else{
            Information::find($id)->update([
                'jolchap'      => 'default_jolchap.png'
            ]);
        }
        return $id;
    }
}
