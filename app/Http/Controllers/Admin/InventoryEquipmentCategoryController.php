<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InventoryEquipmentCategory;
use Illuminate\Http\Request;

class InventoryEquipmentCategoryController extends DM_BaseController
{
    protected $panel = 'Equipment Setup';
    protected $base_route = 'admin.lnventory_equipment_category';
    protected $view_path = 'admin.lnventory_equipment_category';
    protected $model;
    protected $table;

    public function __construct(InventoryEquipmentCategory $model)
    {
        $this->model = $model;
        $this->middleware('permission:view inventory', ['only' => ['index']]);
        $this->middleware('permission:create inventory', ['only' => ['create','store']]);
        $this->middleware('permission:edit inventory', ['only' => ['edit','update']]);
        $this->middleware('permission:delete inventory', ['only' => ['destroy']]);
    }
    public function index(Request $request)
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
        // $request->validate($this->model->getRules(), $this->model->getMessage());
        $success =  $this->model->create($request->all());
        if ($success) {
            session()->flash('alert-success', 'जमिन किसिम अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'जमिन किसिम अध्यावधिक हुन सकेन ।');
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
        $data = $this->model->findOrFail($id);
        $success =  $data->update($request->all());
        if ($success) {
            session()->flash('alert-success', 'आर्थिक बर्ष अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'आर्थिक बर्ष अध्यावधिक हुन सकेन ।');
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
