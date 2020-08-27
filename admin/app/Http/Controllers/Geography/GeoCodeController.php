<?php

namespace App\Http\Controllers\Geography;

use App\Http\Controllers\Controller;
use App\Models\Geography\District;
use App\Models\Geography\Division;
use App\Models\Geography\Postoffice;
use App\Models\Geography\Union;
use App\Models\Geography\Upazila;
use App\Models\Geography\Policestation;
use Illuminate\Http\Request;

class GeoCodeController extends Controller
{
    protected $res, $resPS;
    public  function geoDivisionInit()
    {
        $this->res = Division::get();
        return response()->json($this->res);
    }

    public  function geoDistrictInit()
    {
        $this->res = District::getDistricts();
        return response()->json($this->res);
    }

    public  function getLocation(Request $request)
    {
        if ($request->type == 'district'){
            $this->res = District::get($request);
            return response()->json($this->res);
        }
        elseif ($request->type == 'upazila'){
            $this->res = Upazila::get($request);
            $this->resPS = Policestation::get($request);
            return response()->json([$this->resPS, $this->res]);
        }
        elseif ($request->type == 'union'){
            $this->res = Union::get($request);
            return response()->json($this->res);
        }
        elseif ($request->type == 'postoffice'){
            $this->res = Postoffice::get($request);
            return response()->json($this->res);
        }
    }
}
