<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Palika;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StateDistrictPalikaController extends DM_BaseController
{
    function index()
    {
        $data['states'] = DB::table('states')->get();

        return view("dropdown", $data);
    }
    function getDistrict(Request $request)
    {
        $data['district'] = District::where("province_id", $request->province_id)->get(["district_np", "id"]);
        return response()->json($data);
    }
    function getPalika(Request $request)
    {
        $data['palika'] = Palika::where("district_id", $request->district_id)->get(["palika_np", "id"]);
        return response()->json($data);

        // return view("dropdown",$result);
    }
}
