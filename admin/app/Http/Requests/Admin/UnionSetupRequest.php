<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UnionSetupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (auth()->user()->role('Super Admin')){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'              =>  ['required', 'string', 'max:100', 'regex:/^[a-zA-Z. ():]+$/'],

            'division_id'       => ['required'],
            'district_id'       => ['required'],
            'upazila_id'        => ['required'],
            'policestation_id'  => ['required'],
            'postoffice_id'     => ['required'],
            'union_id'          => ['required'],

            'bn_name'           =>  ['required', 'string', 'max:100', 'regex:/^[\p{Bengali}. ():]{0,100}$/u'],
            'code'              => ['required','unique:information', 'numeric', 'max:9999999'],
            'subdomain'         => ['required','string'],

            'village'           => ['required', 'string', 'max:100', 'regex:/^[\p{Bengali}. (),:;_।]{0,255}$/u'],
            'mobile'            => ['required', 'min:11', 'max:11', 'string'],
            'email'             => ['email', 'nullable'],
            'about'             => ['required', 'string', 'max:1000'],
            'map'               => ['required', 'string', 'max:500'],
            'main_logo'         => ['required', 'mimes:png', 'max:2048'],
            'brand_logo'        => ['required', 'mimes:png', 'max:2048'],
            'jolchap'           => ['required', 'mimes:png', 'max:2048'],
        ];
    }

    /**
     * Get the validation error messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'          => 'ইউনিয়নের নাম দিন ইংরেজি....',
            'name.string'            => 'ইউনিয়নের নাম অবশ্যই ইংরেজি বর্ণের হবে....',
            'name.max'               => 'ইউনিয়নের নাম ইংরেজি বর্ণের ৭০ শব্দের মধ্যে হবে....',
            'name.regex'             => 'ইউনিয়নের নাম ইংরেজি বর্ণের সাথে ডেট (.) ও ব্রাকেট () দেওয়া যাবে....',

            'division_id.required'      => 'অনুগ্রহ করে বিভাগ নির্বাচন করুন....',
            'district_id.required'      => 'অনুগ্রহ করে জেলা নির্বাচন করুন....',
            'upazila_id.required'       => 'অনুগ্রহ করে উপজেলা নির্বাচন করুন....',
            'policestation_id.required' => 'অনুগ্রহ করে থানা নির্বাচন করুন....',
            'postoffice_id.required'    => 'পোস্ট অফিস নির্বাচন করুন....',
            'union_id.required'         => 'ইউনিয়ন নির্বাচন করুন....',

            'bn_name.required'          => 'ইউনিয়নের নাম দিন বাংলায়....',
            'bn_name.string'            => 'ইউনিয়নের নাম অবশ্যই বাংলা বর্ণের হবে....',
            'bn_name.max'               => 'ইউনিয়নের নাম বাংলা বর্ণের ৭০ শব্দের মধ্যে হবে....',
            'bn_name.regex'             => 'ইউনিয়নের নাম বাংলা বর্ণের সাথে ডেট (.) ও ব্রাকেট () দেওয়া যাবে....',

            'code.required'       => 'অনুগ্রহ করে ইউনিয়ন কোড দিন....',
            'code.unique'         => 'এই ইউনিয়ন কোড ইতিমধ্যে নেওয়া হয়েছে....',
            'code.numeric'        => 'ইউনিয়ন কোড নম্বর হবে....',
            'code.max'            => 'ইউনিয়ন কোড সর্বোচ্চ ৭ ডিজিটের হবে....',

            'subdomain.required'    => 'অনুগ্রহ করে ভ্যালিড ওয়েব লিংক দিন....',
            'subdomain.string'      => 'অনুগ্রহ করে ভ্যালিড ওয়েব লিংক দিন....',

            'village.required'          => 'গ্রাম/মহল্লা নাম দিন বাংলায়....',
            'village.string'            => 'গ্রাম/মহল্লা নাম দিন বাংলায়....',
            'village.max'               => 'গ্রাম/মহল্লা নাম বাংলা বর্ণের ৭০ শব্দের মধ্যে হবে....',
            'village.regex'             => 'গ্রাম/মহল্লা নাম বাংলা বর্ণের সাথে ডেট (.), কমা (,), সেমিকোলন (;), কোলন (:), ড্যাশ (_) ও ব্রাকেট () দেওয়া যাবে....',

            'mobile.required'           => '১১ ডিজিটের মোবাইল নম্বর দিন....',
            'mobile.min'                => '১১ ডিজিটের মোবাইল নম্বর দিন....',
            'mobile.max'                => '১১ ডিজিটের মোবাইল নম্বর দিন....',
            'mobile.string'             => '১১ ডিজিটের মোবাইল নম্বর দিন....',

            'email.email'               => 'অনুগ্রহ করে ভ্যালিড ই-মেইল দিন....',

            'about.string'              => 'ইউনিয়ন পরিষদ সম্পর্কে বাংলায় লিখুন....',
            'about.max'                 => 'ইউনিয়ন পরিষদ সম্পর্কে ৫০০ অক্ষরের নিচে লিখুন বাংলায়....',
            'map.required'              => 'ইউনিয়ন পরিষদ গুগল ম্যাপ কী ফ্রেম দিন....',
            'map.string'                => 'ইউনিয়ন পরিষদ গুগল ম্যাপ কী ফ্রেম দিন....',
            'map.max'                   => 'অনুগ্রহ করে ভ্যালিড গুগল ম্যাপ কী ফ্রেম দিন....',

            'main_logo.required'        =>  'মেইন লোগো সিলেক্ট করুন....',
            'main_logo.mimes'           =>  'মেইন লোগো (PNG)* ফরমেট দিতে হবে....',
            'main_logo.max'             =>  'অনুগ্রহ করে ভ্যালিড লোগো দিন....',

            'brand_logo.required'        =>  'ব্র্যান্ড লোগো সিলেক্ট করুন',
            'brand_logo.mimes'           =>  'ব্র্যান্ড লোগো (PNG)* ফরমেট দিতে হবে',
            'brand_logo.max'             =>  'অনুগ্রহ করে ভ্যালিড লোগো দিন....',

            'jolchap.required'        =>  'জলছাপ সিলেক্ট করুন',
            'jolchap.mimes'           =>  'জলছাপ লোগো (PNG)* ফরমেট দিতে হবে',
            'jolchap.max'             =>  'অনুগ্রহ করে ভ্যালিড লোগো দিন....',

        ];
    }

}
