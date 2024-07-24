<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PartnerOrganization;
class PartnerOrganizationController extends DM_BaseController
{
    protected $panel = 'Partner Organization';
    protected $base_route = 'admin.partener_organization';
    protected $view_path = 'admin.partener-organization';
    protected $model;
    protected $table;

    public function __construct(PartnerOrganization $model)
    {
        $this->model = $model;
        // $this->middleware('permission:view Payment')->only(['index', 'show']);
        // $this->middleware('permission:create Payment')->only(['create', 'store']);
        // $this->middleware('permission:edit Payment')->only(['edit', 'update']);
        // $this->middleware('permission:delete Payment')->only('destroy');
    }

    public function index(){
        $data['rows'] =  $this->model->getData();
        return view(parent::loadView($this->view_path.'.index'),compact('data'));
    }

    public function create(){

        return view(parent::loadView($this->view_path.'.create'));
    }

    public function store(Request $request){
        // dd($request->all());
        $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->storeData($request, $request->all())) {
            session()->flash('alert-success', 'अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'अध्यावधिक हुन सकेन ।');
        }

        return redirect()->route($this->base_route.'.index');
    }

    public function edit($id){
        $data['row'] = $this->model::findOrFail($id);
        return view(parent::loadView($this->view_path.'.edit'), compact('data'));
    }

    public function update(Request $request, $id){
        // dd($request->all());
        $request->validate($this->model->getRules($id), $this->model->getMessage());
        $data = $this->model->findOrFail($id);
        if ($this->model->updateData($request, $id, $request->all())) {
            session()->flash('alert-success', 'अध्यावधिक भयो ।');
            return redirect()->route($this->base_route.'.index');
        } else {
            session()->flash('alert-danger', 'अध्यावधिक हुन सकेन ।');
            return redirect()->back();
        }
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
