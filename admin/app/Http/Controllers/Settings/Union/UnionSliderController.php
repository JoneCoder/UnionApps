<?php

namespace App\Http\Controllers\Settings\Union;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Alert;

class UnionSliderController extends Controller
{
    public function index()
    {
        $slides = Slider::getSlides();
        return view('settings.union.slider', compact('slides'));
    }

    //store slide
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:150',
            'photo'         => 'required|mimes:jpg,png,jpeg',
            'caption'       => 'string|max:200|nullable'
        ],[
            'title.required'    => 'স্লাইডার টাইটেল দিন....',
            'title.string'      => 'স্লাইডার টাইটেল দিন....',
            'title.max'         => 'স্লাইডার টাইটেল ১০০ অক্ষরের নিচে দিন....',

            'photo.required'    => 'স্লাইডার ফটো দিন....',
            'photo.mimes'       => 'স্লাইডার ফটো (jpg, png, jpeg) ফরমেট দিন....',
            'caption.string'    => 'স্লাইডার ক্যাপশন দিন....',
            'caption.max'       => 'স্লাইডার ক্যাপশন ২০০ অক্ষরের নিচে দিন....'
        ]);

        $request['union_code']        = auth()->user()->union_code;
        $request['created_by']      = auth()->user()->pin;
        $request['created_by_ip']   = $request->ip();
        if(count(Slider::sequence()) == 0){
            $request['sequence'] = 1;
        }else{
            $request['sequence'] = Slider::GetSequence() + 1;
        }
        $data = Slider::store($request);
        if ($data){
            Alert::toast('স্লাইডার অ্যাড হয়েছে!','success');
            return redirect()->back();
        }else{
            Alert::toast('কিছু ভুল হয়েছে!','error');
            return redirect()->back();
        }
    }

    //update slider status
    public function updateStatus($id)
    {
        $data = Slider::updateStatus($id);
        if ($data){
            return redirect()->back();
        }else{
            Alert::toast('কিছু ভুল হয়েছে!','error');
            return redirect()->back();
        }
    }

    //get slide
    public function getSlide(Request $request)
    {
        $data = Slider::find($request->id);
        return $data;
    }

    //update slide
    public function updateSlide(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:150',
            'photo'         => 'mimes:jpg,png,jpeg|nullable',
            'caption'       => 'string|max:200|nullable'
        ],[
            'title.required'    => 'স্লাইডার টাইটেল দিন....',
            'title.string'      => 'স্লাইডার টাইটেল দিন....',
            'title.max'         => 'স্লাইডার টাইটেল ১০০ অক্ষরের নিচে দিন....',

            'photo.mimes'       => 'স্লাইডার ফটো (jpg, png, jpeg) ফরমেট দিন....',
            'caption.string'    => 'স্লাইডার ক্যাপশন দিন....',
            'caption.max'       => 'স্লাইডার ক্যাপশন ২০০ অক্ষরের নিচে দিন....'
        ]);

        $request['updated_by']      = auth()->user()->pin;
        $request['updated_by_ip']   = $request->ip();

        $data = Slider::updateSlide($request);
        if ($data){
            Alert::toast('স্লাইডার আপডেট হয়েছে!','success');
            return redirect()->back();
        }else{
            Alert::toast('কিছু ভুল হয়েছে!','error');
            return redirect()->back();
        }
    }

    //update sequence
    public function updateSequence(Request $request)
    {
        $res = Slider::updateSequence($request);
        if ($res){
            return ['success' => 'yes'];
        }
    }

    //delete slide
    public function deleteSlide(Request $request)
    {
        Slider::find($request->id)->delete();
        return back();
    }
}
