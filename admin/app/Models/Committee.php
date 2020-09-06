<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Committee extends Model
{
    protected $fillable = [ 'union_code', 'name', 'description', 'status', 'created_by', 'updated_by', 'created_by_ip', 'updated_by_ip'];

    use SoftDeletes;

    static function getAll()
    {
        return Committee::all();
    }

    static function store($request)
    {
        $request['union_code']      = auth()->user()->union_code;
        $request['created_by']      = auth()->user()->pin;
        $request['created_by_ip']   = $request->ip();

        $id = Committee::create($request->except('_token'))->id;
        return $id;
    }

    static function getCommitteeList($request)
    {
        $start = $request->start;
        $length = $request->length;
        $searchData = ($request['search']['value'] != '') ? $request['search']['value'] : false;

        $query = Committee::where('union_code', auth()->user()->union_code)
            ->offset($start)
            ->limit($length)
            ->orderBy('id', 'DESC');

        //for searching on page
        if($searchData != false){

            $query->where(function ($query) use ($searchData) {

                return $query->Where("name", "LIKE", $searchData)
                    ->orWhere("created_at", "LIKE", $searchData)
                    ->orWhere("description", "LIKE", "%".$searchData."%");
            });
        }

        $res['data'] = $query->get();

        $count = DB::select("SELECT FOUND_ROWS() as `row_count`")[0]->row_count;
        $res['recordsTotal']    = $count;
        $res['recordsFiltered'] = $count;
        $res['draw'] = $request->draw;

        return $res;
    }
}
