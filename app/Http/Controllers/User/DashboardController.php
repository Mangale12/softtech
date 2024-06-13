<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Http\Controllers\Controller;
use App\Models\GeneralProfile;
use Illuminate\Http\Request;
use DB;
use Auth;

class DashboardController extends DM_BaseController
{
    protected $panel = 'Dashboard';
    protected $base_route = '';
    protected $view_path = 'user.';

    public function __construct(GeneralProfile $model_1)
    {
        // dd('dashoard');
        $this->middleware('auth');
        $this->model_1 = $model_1;
    }

    public function index()
    {
        // dd(auth()->user()->getAllPermissions());
        $data['profile']    = $this->model_1::where('user_id', '=', Auth::user()->id)->first();
        // $data['pending']    = $this->model::where('user_id', '=', Auth::user()->id)->where('status', '=', 0)->get();
        // $data['approved']   = $this->model::where('user_id', '=', Auth::user()->id)->where('status', '=', 1)->get();
        return view(parent::loadView($this->view_path.'.index'), compact('data'));    }
}
