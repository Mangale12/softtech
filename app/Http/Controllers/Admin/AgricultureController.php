<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Http\Controllers\Controller;
use App\Models\Agriculture;
use Illuminate\Http\Request;

class AgricultureController extends DM_BaseController
{
    protected $panel = 'Agriculture';
    protected $base_route = 'admin.agriculture';
    protected $view_path = 'admin.agriculture';
    protected $model;
    protected $table;

    public function __construct(Agriculture $model)
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
        $data['rows'] = $this->model->getAgricultureCategory();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->storeData($request, $request->agricultural_id, $request->title, $request->status)) {
            session()->flash('alert-success', 'नयाँ बालीनाली  अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'नयाँ बालीनाली अध्यावधिक हुन सकेन ।');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function edit($id)
    {
        $data['category'] = $this->model->getAgricultureCategory();
        $data['rows'] = $this->model::where('id', '=', $id)->firstOrFail();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->updateData($request, $id, $request->title, $request->status)) {
            session()->flash('alert-success', 'नयाँ बालीनाली अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'नयाँ बालीनाली अध्यावधिक हुन सकेन ।');
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
