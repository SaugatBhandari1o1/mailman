<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Province;
use App\Models\city;

class FormController extends Controller
{
    public function index(){
        $existingProvince = Province::all();
        return view('admin.form', compact('existingProvince'));
    }
    public function createCity(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'province'=>'required',
            'city'=>'required|unique:tbl_city,name',
        ]);

        $provinceId = $request->province;

        $cityName = $request->city;

        $province = Province::findOrFail($provinceId);

        $city = new City();
        $city->name = $cityName;
        $city->province()->associate($province);
        $city->save();
        return redirect()->back()->with('success','City has been added');

    }

    public function provinceUpdate(Request $request){
        $request->validate([
            'province'=> 'required',
            'newProvince'=>'required|string|max:255|unique:tbl_province,name',
        ]);

        $province = Province::findOrFail($request->province);
        $province->name = $request->newProvince;
        $province->save();

        return redirect()->back()->with('success','Province updated Successfully');

    }
}
