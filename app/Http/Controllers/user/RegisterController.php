<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\city;

class RegisterController extends Controller
{
    public function index(){
        $data['Provinces'] = Province::get(["name","id"]);
        return view('user.registration', $data);
    }

    public function getCities(Request $request)
    {
        // $data['name'] = city::where("province_id",$request->province_id)->get(["name","id"]);
        // return response()->json($data);
        $cities = City::where("province_id", $request->province_id)->get(["name","id"]);
        return response()->json(['cities'=>$cities]);
    }
}
