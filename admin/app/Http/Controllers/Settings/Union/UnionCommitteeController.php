<?php

namespace App\Http\Controllers\Settings\Union;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use App\Models\CommitteeMember;
use Illuminate\Http\Request;
use Alert;

class UnionCommitteeController extends Controller
{
    public function index()
    {
        $committees = Committee::getAll();
        return view('settings.union.committee', compact('committees'));
    }

    public function storeCommittee(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:100',
            'description'   => 'required|string|max:100'
        ], [
            'name.required' => 'কমিটি টাইটেল দিন....',
            'name.string'   => 'কমিটি টাইটেল দিন....',
            'name.max'      => 'কমিটি টাইটেল ১০০ অক্ষরের মধ্যে দিন....',

            'description.required' => 'কমিটি বিবরণ দিন....',
            'description.string'   => 'কমিটি বিবরণ দিন....',
            'description.max'      => 'কমিটি বিবরণ ১০০ অক্ষরের মধ্যে দিন....'
        ]);

        $res = Committee::store($request);
        if ($res){
            return back();
        }else{
            Alert::toast('কিছু ভুল হয়েছে!','error');
            return back();
        }
    }

    public function storeCommitteeMember(Request $request)
    {
        $request->validate([
            'committee_id'  => 'required',
            'name'          => 'required|string|max:100',
            'designation'   => 'required|string|max:100',
            'mobile'        => 'required|numeric|max:99999999999',
            'address'       => 'required|string|max:100'
        ], [
            'committee_id.required' => 'কমিটি সিলেক্ট করুন....',
            'name.required' => 'সদস্যের নাম দিন....',
            'name.string'   => 'সদস্যের নাম দিন....',
            'name.max'      => 'সদস্যের নাম ১০০ অক্ষরের মধ্যে দিন....',

            'designation.required' => 'সদস্যের পদবী দিন....',
            'designation.string'   => 'সদস্যের পদবী দিন....',
            'designation.max'      => 'সদস্যের পদবী ১০০ অক্ষরের মধ্যে দিন....',

            'mobile.required'   => 'সদস্যের মোবাইল নং দিন....',
            'mobile.numeric'    => 'সদস্যের ভ্যালিড মোবাইল নং দিন....',
            'mobile.max'        => 'মোবাইল নং ১০০ অক্ষরের মধ্যে দিন....',

            'address.required' => 'সদস্যের ঠিকানা দিন....',
            'address.string'   => 'সদস্যের ঠিকানা দিন....',
            'address.max'      => 'সদস্যের ঠিকানা ১১ অক্ষরের মধ্যে দিন....'
        ]);

        $res = CommitteeMember::store($request);
        if ($res){
            return back();
        }else{
            Alert::toast('কিছু ভুল হয়েছে!','error');
            return back();
        }
    }

    public function committeeMembersList(Request $request)
    {
        $res = CommitteeMember::getCommitteeList($request);
        return response()->json($res);
    }

    public function committeeList(Request $request)
    {
        $res = Committee::getCommitteeList($request);
        return response()->json($res);
    }
}
