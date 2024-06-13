<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Http\Controllers\Controller;
use App\Models\AnimalCategory;
use Illuminate\Http\Request;

class AnimalsCategoryController extends DM_BaseController
{
    protected $panel = 'Animal Category';
    protected $base_route = 'admin.animal-category';
    protected $view_path = 'admin.animal-category';
    protected $model;
    protected $table;

    public function __construct(AnimalCategory $model)
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
        $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->storeData($request, $request->title, $request->status)) {
            session()->flash('alert-success', 'पशुपन्छी प्रकार अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'पशुपन्छी प्रकार अध्यावधिक हुन सकेन ।');
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
        if ($this->model->updateData($request, $id, $request->title, $request->status)) {
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
