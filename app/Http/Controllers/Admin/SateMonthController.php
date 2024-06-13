<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Http\Controllers\Controller;
use App\Models\StateMonth;
use Illuminate\Http\Request;

class SateMonthController extends DM_BaseController
{
    protected $panel = 'Ritu';
    protected $base_route = 'admin.state-month';
    protected $view_path = 'admin.state-month';
    protected $model;
    protected $table;

    public function __construct(StateMonth $model)
    {
        $this->model = $model;
    }
    public function index()
    {
        $data['rows'] =  $this->model->getData();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        $data['category']        = $this->model->getCategory();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->storeData($request, $request->category_id, $request->month,  $request->status)) {
            session()->flash('alert-success', 'प्रदेश तथा महिना अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'प्रदेश तथा महिना अध्यावधिक हुन सकेन ।');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function edit($id)
    {
        $data['rows'] = $this->model::where('id', '=', $id)->firstOrFail();
        $data['category']        = $this->model->getCategory();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->updateData($request, $id, $request->category_id, $request->month,  $request->status)) {
            session()->flash('alert-success', 'प्रदेश तथा महिना अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'प्रदेश तथा महिना अध्यावधिक हुन सकेन ।');
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
    }
}
