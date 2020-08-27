<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Image;
use DB;

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

    static function getUnionList($request)
    {
        $district = $request->district;
        $upazila = $request->upazila;
        $union = $request->union;
        $start = $request->start;
        $length = $request->length;
        $searchData = ($request['search']['value'] != '') ? $request['search']['value'] : false;


        $query = DB::table('information AS UI')
            ->select('UI.id', 'UI.bn_name', 'UI.code', 'UI.subdomain', 'UI.mobile', 'UI.status', 'UADD1.bn_name as district_name_bn', 'UADD2.bn_name as upazila_name_bn', 'UADD3.bn_name as postoffice_name_bn', 'UGS.username')
            ->leftJoin('users AS UGS', function($join){
                $join->on('UGS.union_code', '=', 'UI.code')
                    ->whereNull('UGS.deleted_at');
            })
            ->join('districts AS UADD1', 'UADD1.id', '=', 'UI.district_id')
            ->join('upazilas AS UADD2', 'UADD2.id', '=', 'UI.upazila_id')
            ->join('postoffices AS UADD3', 'UADD3.id', '=', 'UI.postoffice_id')
            ->whereNull('UI.deleted_at')
            ->offset($start)
            ->limit($length)
            ->orderBy('UI.id', 'DESC')
            ->where(function ($query) use ($district, $upazila, $union) {
                if($district > 0){
                    $query->Where("UI.district_id", $district);
                }
                if($upazila > 0){
                    $query->Where("UI.upazila_id", $upazila);
                }
                if($union > 0){
                    $query->Where("UI.union_id", $union);
                }
            });

        //for searching on page
        if($searchData != false){

            $query->where(function ($query) use ($searchData) {

                return $query->Where("UI.subdomain", "LIKE", $searchData)
                    ->orWhere("UI.code", "LIKE", $searchData)
                    ->orWhere("UI.bn_name", "LIKE", $searchData)
                    ->orWhere("UI.mobile", "LIKE", "%".$searchData."%");
            });
        }

        $res['data'] = $query->get();

        $count = DB::select("SELECT FOUND_ROWS() as `row_count`")[0]->row_count;
        $res['recordsTotal']    = $count;
        $res['recordsFiltered'] = $count;
        $res['draw'] = $request->draw;

        return $res;
    }

    static function getUnionById($id)
    {
        return Information::find($id);
    }

    static function updated($request)
    {
        $request['updated_by']      = auth()->user()->pin;
        $request['updated_by_ip']   = $request->ip();
        $id = Information::find($request->id)->update($request->except('_token', 'main_logo', 'brand_logo', 'jolchap', '_wysihtml5_mode', 'division_id', 'district_id', 'upazila_id', 'policestation_id', 'postoffice_id', 'union_id', 'map', 'id'));

        if ($request->hasFile('main_logo')){
            $photo = $request->main_logo;
            $fileExtension = $photo->getClientOriginalExtension();
            $fileName = 'main_logo_'.$request->code.'.'.$fileExtension;
            Image::make($photo)->resize(100, 100)->save(base_path('public/images/union/'.$fileName), 100);
            Information::find($request->id)->update([
                'main_logo'      => $fileName
            ]);
        }

        if ($request->hasFile('brand_logo')){
            $photo = $request->brand_logo;
            $fileExtension = $photo->getClientOriginalExtension();
            $fileName = 'brand_logo_'.$request->code.'.'.$fileExtension;
            Image::make($photo)->resize(100, 100)->save(base_path('public/images/union/'.$fileName), 100);
            Information::find($request->id)->update([
                'brand_logo'      => $fileName
            ]);
        }

        if ($request->hasFile('jolchap')){
            $photo = $request->jolchap;
            $fileExtension = $photo->getClientOriginalExtension();
            $fileName = 'jolchap_'.$request->code.'.'.$fileExtension;
            Image::make($photo)->resize(900, 900)->opacity(22)->save(base_path('public/images/union/'.$fileName), 100);
            Information::find($request->id)->update([
                'jolchap'      => $fileName
            ]);
        }

        //Check data exited
        if ($request->postoffice_id != Null && $request->union_id != Null){
            Information::find($request->id)->update([
                'postoffice_id' => $request->postoffice_id,
                'union_id'      => $request->union_id
            ]);
        }

        if($request->map != Null){
            Information::find($request->id)->update([
                'map'      => $request->map
            ]);
        }
        return $id;
    }

    static function changeStatus($id)
    {
        if(Information::find($id)->status == 1){
            $res = Information::find($id)->update([
                'status'    =>  0
            ]);
        }else{
            $res = Information::find($id)->update([
                'status'    =>  1
            ]);
        }

        return $res;
    }

    static function getUnionByUser($code)
    {
        return Information::select('information.*', 'UADD1.bn_name as district', 'UADD2.bn_name as upazila', 'UADD3.bn_name as postoffice', 'UADD3.code as postoffice_code', 'UGS.name as secretary')
            ->where('information.code', $code)
            ->leftJoin('users AS UGS', function($join){
            $join->on('UGS.union_code', '=', 'information.code')
                ->where('designation', 1)
                ->whereNull('UGS.deleted_at');
            })
            ->join('districts AS UADD1', 'UADD1.id', '=', 'information.district_id')
            ->join('upazilas AS UADD2', 'UADD2.id', '=', 'information.upazila_id')
            ->join('postoffices AS UADD3', 'UADD3.id', '=', 'information.postoffice_id')
            ->whereNull('information.deleted_at')
            ->first();
    }
}
