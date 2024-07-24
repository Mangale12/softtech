<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DamageType;
class DamageTypeController extends DM_BaseController
{
    protected $panel = 'Damage Type';
    protected $base_route = 'admin.inventory.damage_types';
    protected $view_path = 'admin.damage_types';
    protected $model;
    protected $table;

    public function __construct(DamageType $model)
    {
        // $this->model = $model;
        $this->middleware('permission:view Damage Type')->only(['index', 'show']);
        $this->middleware('permission:create Damage Type')->only(['create', 'store']);
        $this->middleware('permission:edit Damage Type')->only(['edit', 'update']);
        $this->middleware('permission:delete Damage Type')->only('destroy');
    }

    public function index()
    {
        dd("yes");
        $data['rows'] =  $this->model->getData();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        return view(parent::loadView($this->view_path . '.create'));
    }

    public function store(Request $request)
    {
        $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->storeData($request)) {
            session()->flash('alert-success', 'अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'अध्यावधिक हुन सकेन ।');
            return redirect()->back();
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function edit($id)
    {
        $data['row'] = $this->model::where('id', '=', $id)->firstOrFail();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->model->getRules($id), $this->model->getMessage());
        if ($this->model->updateData($request, $id)) {
            session()->flash('alert-success', ' अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', ' अध्यावधिक हुन सकेन ।');
            return redirect()->back();
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
        // return redirect()->back()->with('success_message', 'Worker Deleted Successfully !!');
        return response()->json($data);
    }
}
