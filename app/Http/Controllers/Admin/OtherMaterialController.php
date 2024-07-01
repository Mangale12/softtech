<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OtherMaterial;
class OtherMaterialController extends DM_BaseController
{
    protected $panel = 'Other Material';
    protected $base_route = 'admin.other_material';
    protected $view_path = 'admin.other-material';
    protected $model;
    protected $table;

    public function __construct(OtherMaterial $model)
    {
        $this->model = $model;
        $this->middleware('permission:view OtherMaterial', ['only' => ['index']]);
        $this->middleware('permission:create OtherMaterial', ['only' => ['create','store']]);
        $this->middleware('permission:edit OtherMaterial', ['only' => ['edit','update']]);
        $this->middleware('permission:delete OtherMaterial', ['only' => ['destroy']]);
    }
    public function index()
    {
        $data['rows'] =  $this->model->getData();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        return view(parent::loadView($this->view_path . '.create'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->storeData($request, $request->all())) {
            session()->flash('alert-success', 'अध्यावधिक भयो ।');
        } else {

            session()->flash('alert-warning', 'अध्यावधिक हुन सकेन ।');
            return redirect()->back();
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function edit($id)
    {
        $data['rows'] = $this->model::where('id', '=', $id)->firstOrFail();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        // $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->updateData($request, $id, $request->all())) {
            session()->flash('alert-success', 'पशुपन्छी प्रकार अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'पशुपन्छी प्रकार अध्यावधिक हुन सकेन ।');
        }
        return redirect()->route($this->base_route . '.index');
    }


    public function destroy(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);
        if (!$data) {
            $request->session()->flash('success_message', $this->panel . 'does not exists.');
            return redirect()->route($this->base_route);
        }
        $data->destroy($id);
        return response()->json($data);
    }
}
