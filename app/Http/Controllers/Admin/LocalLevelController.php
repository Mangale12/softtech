<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\LocalLevel;
use Illuminate\Http\Request;

class LocalLevelController extends DM_BaseController
{
    protected $locallevel=null;
    protected $district=null;
    public function __construct(LocalLevel $locallevel, District $district)
    {
        $this->locallevel=$locallevel;
        $this->district=$district;
    }


    public function getDistrict(Request $request){
        //return $request->prov_id;
        $this->district = $this->district->getDistrict($request->prov_id);
        if ($this->district->count()) {
            //exist mahadistrict
            return response()->json(['status' => true, 'data' => $this->district, 'msg' => 'success']);
        } else {
            return response()->json(['status' => false, 'data' => null, 'msg' => 'No District Found']);
        }
    }

    public function getLocal(Request $request){
        $this->locallevel=$this->locallevel->getLocalLevel($request->dist_id);
        if ($this->locallevel->count()) {
            //exist Local level
            return response()->json(['status' => true, 'data' => $this->locallevel, 'msg' => 'success']);
        } else {
            return response()->json(['status' => false, 'data' => null, 'msg' => 'No Local Level Found']);
        }
    }

    public function getWard(Request $request){
        $this->locallevel=$this->locallevel->where('new_local_id',$request->new_local_id)->first();
        if ($this->locallevel->count()) {
            //exist Local level
            return response()->json(['status' => true, 'data' => $this->locallevel, 'msg' => 'success']);
        } else {
            return response()->json(['status' => false, 'data' => null, 'msg' => 'No Local Level Found']);
        }
    }
}
