<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Setting;
use App\Utils\ImageUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SettingUpdateRequest;

class SettingsController extends Controller
{
    public function index()
    {
        return view('dashboard.settings.index');
    }


    public function update(SettingUpdateRequest $request , Setting $setting)
    {
        // dd($request->all());
        $setting->update($request->validated());
        // dd($request->all());

        if ($request->has("logo")){
            $logo = (ImageUpload::uploadImage($request->logo , 200 , 300 , 'logo/' ));
            $setting->update(['logo' => $logo]);
        };

        if ($request->has("favicon")){
            $favicon = (ImageUpload::uploadImage($request->favicon , 200 , 300 , 'favicon/' ));
            $setting->update(['favicon' => $favicon]);
        };
        return redirect()->route('dashboard.settings.index');
    }
}
