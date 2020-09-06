<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class CommitteeMember extends Model
{
    protected $fillable = [ 'union_code', 'committee_id', 'name', 'designation', 'member_name', 'mobile', 'address', 'created_by', 'updated_by', 'created_by_ip', 'updated_by_ip'];

    use SoftDeletes;

    static function store($request)
    {
        $request['union_code']      = auth()->user()->union_code;
        $request['created_by']      = auth()->user()->pin;
        $request['created_by_ip']   = $request->ip();

        $id = CommitteeMember::create($request->except('_token'))->id;
        return $id;
    }

    static function getCommitteeList($request)
    {
        $name = $request->name;
        $start = $request->start;
        $length = $request->length;
        $searchData = ($request['search']['value'] != '') ? $request['search']['value'] : false;


        $query = CommitteeMember::where('committee_members.union_code', auth()->user()->union_code)
            ->select('committee_members.*', 'CM.name as committee_name')
            ->join('committees AS CM', function($join){
                $join->on('CM.id', '=', 'committee_members.committee_id')
                    ->where('CM.status', 1)
                    ->where('CM.union_code', auth()->user()->union_code)
                    ->whereNull('CM.deleted_at');
            })
            ->offset($start)
            ->limit($length)
            ->orderBy('id', 'DESC')
            ->where(function ($query) use ($name) {
                if($name > 0){
                    $query->Where('committee_id', $name);
                }
            });

        //for searching on page
        if($searchData != false){

            $query->where(function ($query) use ($searchData) {

                return $query->Where("committee_members.name", "LIKE", $searchData)
                    ->orWhere("committee_members.mobile", "LIKE", $searchData)
                    ->orWhere("committee_members.address", "LIKE", "%".$searchData."%");
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
