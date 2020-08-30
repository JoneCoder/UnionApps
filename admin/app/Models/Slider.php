<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use Image, Request;

class Slider extends Model
{
    protected $fillable = ['title', 'caption', 'photo', 'sequence', 'union_code', 'status', 'created_by', 'updated_by', 'created_by_ip', 'updated_by_ip'];

    use SoftDeletes;

    //get slides
    public static function getSlides()
    {
        $data = Slider::where('union_code', Auth::user()->union_code)->orderBy('sequence', 'asc')->get();
        return $data;
    }

    //store slide
    public static function store($request)
    {
        $id = Slider::create($request->except('_token', 'photo'))->id;

        if($request->hasFile('photo')){
            $photo = $request->photo;
            $fileExtension = $photo->getClientOriginalExtension();
            $fileName = Auth::user()->union_code.$id.'.'.$fileExtension;
            Image::make($photo)->resize(960, 322)->save(base_path('public/images/slider/'.$fileName), 100);
            Slider::find($id)->update([
                'photo'      => $fileName
            ]);
        }

        return true;
    }

    //get slide order by sequence
    public static function sequence()
    {
        $data = Slider::where('union_code', Auth::user()->union_code)->orderBy('sequence', 'desc')->get();
        return $data;
    }

    //get sequence
    public static function GetSequence()
    {
        $data = Slider::where('union_code', Auth::user()->union_code)->orderBy('sequence', 'desc')->first()->sequence;
        return $data;
    }

    //update status
    public static function updateStatus($id)
    {
        $status = Slider::where('union_code', Auth::user()->union_code)->where('id', $id)->first()->status;

        if ($status){
            Slider::find($id)->update([
                'status'        => false,
                'updated_by'    => Auth::user()->employee_id,
                'updated_by_ip' => Request::ip()
            ]);
        }else{
            Slider::find($id)->update([
                'status'        => true,
                'updated_by'    => Auth::user()->employee_id,
                'updated_by_ip' => Request::ip()
            ]);
        }
        return true;
    }

    //update slide
    public static function updateSlide($request)
    {
        Slider::find($request->id)->update($request->except('_token', 'photo'));

        if($request->hasFile('photo')){
            $photo = $request->photo;
            $fileExtension = $photo->getClientOriginalExtension();
            $fileName = Auth::user()->union_code.$request->id.'.'.$fileExtension;
            Image::make($photo)->resize(960, 322)->save(base_path('public/images/slider/'.$fileName), 100);
            Slider::find($request->id)->update([
                'photo'      => $fileName
            ]);
        }

        return true;
    }

    //update sequence
    public static function updateSequence($request)
    {
        foreach ($request->seq as $key => $item)
        {
            Slider::find($item)->update([
                'sequence' => $key+1,
                'updated_by' => Auth::user()->pin,
                'updated_by_ip' => $request->ip()
            ]);
        }
        return true;
    }
}
