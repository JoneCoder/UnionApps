<?php

namespace App\Http\Controllers\Settings\Union;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UnionUpdateRequest;
use Alert;

class UnionProfileController extends Controller
{
    public function index()
    {
        $union = Information::getUnionByUser(auth()->user()->union_code);
        return view('settings.union.union-profile', compact('union'));
    }

    public function update(UnionUpdateRequest $request)
    {
        $res = Information::updated($request);
        if($res){
            Alert::toast('সফলভাবে ইউনিয়ন এর তথ্য আপডেট হয়েছে!', 'success')->position('center');
            return redirect()->back();
        }else{
            Alert::toast('দুঃখিত কিছু ভুল হয়েছে!', 'error')->position('center');
            return redirect()->back();
        }
    }
}
