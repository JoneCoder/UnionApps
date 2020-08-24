<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UnionSetupRequest;
use App\Models\Information;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UnionSetupController extends Controller
{
    public function showUnion()
    {
        return view('admin.union-list');
    }

    public function showUnionSetupForm()
    {
        return view('admin.union-setup-form');
    }

    public function createUnion(UnionSetupRequest $request)
    {
        $res = Information::store($request);
        if($res){
            return redirect()->back()->with('toast_success', 'Union Created Successfully!');
        }else{
            //Alert::toast('Something Else!', 'error')->position('center');
            return redirect()->back()->with('toast_error', 'Something Else!');
        }
    }

    public function showUnionEditForm()
    {
        return view('admin.union-edit-form');
    }


}
