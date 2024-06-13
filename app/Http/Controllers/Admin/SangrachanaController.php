<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Http\Controllers\Controller;
use App\Models\Sangrachana;
use Illuminate\Http\Request;

class SangrachanaController extends DM_BaseController
{
    protected $panel = 'Sangrachana';
    protected $base_route = 'admin.sangrachana';
    protected $view_path = 'admin.sangrachana';
    protected $model;
    protected $table;

    public function __construct(Sangrachana $model)
    {
        $this->model = $model;
        $this->middleware('permission:view Physical structure', ['only' => ['index']]);
        $this->middleware('permission:create Physical structure', ['only' => ['create','store']]);
        $this->middleware('permission:edit Physical structure', ['only' => ['edit','update']]);
        $this->middleware('permission:delete Physical structure', ['only' => ['destroy']]);
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
        // $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->storeData($request, $request->types, $request->bottom, $request->length, $request->width, $request->area, $request->made_date, $request->type_of_makeup, $request->use_of, $request->user, $request->remarks, $request->status)) {
            session()->flash('alert-success', 'भौतिक संरचना अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'भौतिक संरचना अध्यावधिक हुन सकेन ।');
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
        // $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->updateData($request, $id, $request->types, $request->bottom, $request->length, $request->width, $request->area, $request->made_date, $request->type_of_makeup, $request->use_of, $request->user, $request->remarks, $request->status)) {
            session()->flash('alert-success', 'भौतिक संरचना अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'भौतिक संरचना अध्यावधिक हुन सकेन ।');
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
