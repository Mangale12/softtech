<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Http\Controllers\Controller;
use App\Models\WorkerTypes;
use Illuminate\Http\Request;

class WorkerTypesController extends DM_BaseController
{
    protected $panel = 'Worker Types';
    protected $base_route = 'admin.worker-types';
    protected $view_path = 'admin.worker-types';
    protected $model;
    protected $table;

    public function __construct(WorkerTypes $model)
    {
        $this->model = $model;
        $this->middleware('permission:view Worker Types')->only(['index', 'show']);
        $this->middleware('permission:create Worker Types')->only(['create', 'store']);
        $this->middleware('permission:edit Worker Types')->only(['edit', 'update']);
        $this->middleware('permission:delete Worker Types')->only('destroy');
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
    public function store(Request $request, $udyog_id = null)
    {
        $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->storeData($request, $request->types, $request->status, $request->udhyog_id)) {
            session()->flash('alert-success', 'कामदार प्रकार अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'कामदार प्रकार अध्यावधिक हुन सकेन ।');
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
        $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->updateData($request, $id, $request->types, $request->status)) {
            session()->flash('alert-success', 'कामदार प्रकार अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'कामदार प्रकार अध्यावधिक हुन सकेन ।');
        }
        return redirect()->route($this->base_route . '.index');
    }


    public function destroy(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);
        if (!$data) {
            $request->session()->flash('error_message', $this->panel . 'does not exists.');
            return redirect()->route($this->base_route);
        }
        $data->destroy($id);
        return response()->json($data);
    }
}
