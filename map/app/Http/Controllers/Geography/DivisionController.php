<?php

namespace App\Http\Controllers\Geography;

use App\Http\Controllers\Controller;
use App\Http\Requests\Geography\Divisions;
use App\Models\Division;
use Illuminate\Http\Request;
use App\DataTables\DivisionDataTable;

class DivisionController extends Controller
{
    public function showDivisions(DivisionDataTable $dataTable)
    {
        return $dataTable->render('geography.division');
    }

    public function newDivision(Divisions $request)
    {
        $response = Division::create($request);
        if($response){
            return $response->jesone('success', 200);
        }
        else{
            return $response->jesone('error', 201);
        }
    }
}
