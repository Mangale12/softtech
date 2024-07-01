<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Season;
class SeasonController extends DM_BaseController
{
    protected $panel = 'Season';
    protected $base_route = 'admin.inventory.seasons';
    protected $view_path = 'admin.season';
    protected $model;
    protected $table;

    public function __construct(Season $model)
    {
        $this->model = $model;
        $this->middleware('permission:view Season')->only(['index', 'show']);
        $this->middleware('permission:create Season')->only(['create', 'store']);
        $this->middleware('permission:edit Season')->only(['edit', 'update']);
        $this->middleware('permission:delete Season')->only('destroy');
    }
    function index(){
        $data['rows'] = $this->model->getData();
        $currentDate = date('Y-m-d');
        $data['nep_date_unicode']  = datenepUnicode($currentDate, 'nepali');
        return view(parent::loadView($this->view_path.'.index'), compact('data', 'currentDate'));
    }
    function create(){
        $currentDate = date('Y-m-d');
        $data['nep_date_unicode']  = datenepUnicode($currentDate, 'nepali');
        return view(parent::loadView($this->view_path.'.create'),compact('data','currentDate'));
    }

    function store(Request $request){
        $request->validate($this->model->getRules(), $this->model->getMessage());
        try {
            Season::create($request->all());
            session()->flash('alert-success', 'सिजन सिर्जना गरियो ।');
        } catch (\Throwable $th) {
            session()->flash('alert-success', 'सिजन सिर्जना असफल भयो ।');
        }
        return redirect()->route($this->base_route.'.index');
    }

    function edit($id){
        $data['row'] = Season::findOrFail($id);
        $currentDate = date('Y-m-d');
        $data['nep_date_unicode']  = datenepUnicode($currentDate, 'nepali');
        return view(parent::loadView($this->view_path.'.edit'), compact('data','currentDate'));
    }

    function update(Request $request, $id){
        $season = Season::findOrFail($id);
        $request->validate($this->model->getRules(), $this->model->getMessage());
        try {
            $season->update($request->all());
            session()->flash('alert-success', 'अपडेट सफल भयो ।');
        } catch (\Throwable $th) {
            session()->flash('alert-error', 'अपडेट असफल भयो ।');
        }
        return redirect()->route($this->base_route.'.index');
    }

    public function destroy(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);
        if (!$data) {
            $request->session()->flash('success_message', $this->panel . 'does not exists.');
            return redirect()->route($this->base_route);
        }
        $data->destroy($id);
        // return redirect()->back()->with('success_message', 'Worker Deleted Successfully !!');
        return response()->json($data);
    }
}
