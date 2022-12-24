<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.setting.index',compact('setting'));
    }

    public function store(Request $request)
    {
        $setting = Setting::first();
        if($setting){
            // update data
            $setting->update([
                'website_name' => $request-> website_name,
                'website_url' => $request-> website_url,
                'page_title' => $request-> page_title,
                'meta_keyword' => $request-> meta_keyword,
                'meta_description' => $request-> meta_description,
                'address' => $request-> address,
                'phone1' => $request-> phone1,
                'phone2' => $request-> phone2,
                'mail1' => $request-> mail1,
                'mail2' => $request-> mail2,
                'facebook' => $request-> facebook,
                'twitter' => $request-> twitter,
                'instagram' => $request-> instagram,
                'youtube' => $request->youtube
            ]);

            return redirect()->back()->with('message','Đã cập nhật');
        }else{
            // create data
            Setting::create([
                'website_name' => $request-> website_name,
                'website_url' => $request-> website_url,
                'page_title' => $request-> page_title,
                'meta_keyword' => $request-> meta_keyword,
                'meta_description' => $request-> meta_description,
                'address' => $request-> address,
                'phone1' => $request-> phone1,
                'phone2' => $request-> phone2,
                'mail1' => $request-> mail1,
                'mail2' => $request-> mail2,
                'facebook' => $request-> facebook,
                'twitter' => $request-> twitter,
                'instagram' => $request-> instagram,
                'youtube' => $request->youtube
            ]);

            return redirect()->back()->with('message','Đã cài đặt xong');
        }
    }
}
