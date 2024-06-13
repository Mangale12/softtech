<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BeemaCategory;
use Illuminate\Http\Request;

class BeemaCategoryController extends DM_BaseController
{
    protected $panel = 'Beema Category';
    protected $base_route = 'admin.beema-category';
    protected $view_path = 'admin.beema-category';
    protected $model;
    protected $table;

    public function __construct(BeemaCategory $model)
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
        return view(parent::loadView($this->view_path . '.create'));
    }

    public function store(Request $request)
    {
        // $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->storeData($request, $request->title)) {
            session()->flash('alert-success', 'बिमा  अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'बिमा अध्यावधिक हुन सकेन ।');
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
        if ($this->model->updateData($request, $id, $request->title)) {
            session()->flash('alert-success', 'बिमा  अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'बिमा अध्यावधिक हुन सकेन ।');
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