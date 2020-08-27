<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UnionSetupRequest;
use App\Http\Requests\Admin\UnionUpdateRequest;
use App\Models\Information;
use http\Env\Response;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UnionSetupController extends Controller
{
    public function showUnion()
    {
        return view('admin.union-list');
    }

    public function unions(Request $request)
    {
        $res = Information::getUnionList($request);
        return response()->json($res);
    }

    public function showUnionSetupForm()
    {
        return view('admin.union-setup-form');
    }

    public function createUnion(UnionSetupRequest $request)
    {
        $res = Information::store($request);
        if($res){
            Alert::toast('Union Created Successfully!', 'success')->position('center');
            return redirect(route('admin.unionSetup'));
        }else{
            Alert::toast('Something Else!', 'error')->position('center');
            return redirect()->back();
        }
    }

    public function showUnionEditForm($id)
    {
        $union = Information::getUnionById($id);
        return view('admin.union-edit-form', compact('union'));
    }

    public function update(UnionUpdateRequest $request)
    {
        $res = Information::updated($request);
        if($res){
            Alert::toast('Union Update Successfully!', 'success')->position('center');
            return redirect(route('admin.unionSetup'));
        }else{
            Alert::toast('Something Else!', 'error')->position('center');
            return redirect()->back();
        }
    }

    public function deactivateOrActivate($id)
    {
        $res = Information::changeStatus($id);
        if($res){
            return back();
        }else{
            Alert::toast('Something Else!', 'error')->position('center');
            return redirect()->back();
        }
    }


}
