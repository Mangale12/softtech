<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalsController extends DM_BaseController
{
    protected $panel = 'Animal';
    protected $base_route = 'admin.animal';
    protected $view_path = 'admin.animal';
    protected $model;
    protected $table;

    public function __construct(Animal $model)
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
        $data['rows'] = $this->model->getAnimalCategory();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->storeData($request, $request->animal_id, $request->title, $request->status)) {
            session()->flash('alert-success', 'पशुपन्छी प्रकार अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'पशुपन्छी प्रकार अध्यावधिक हुन सकेन ।');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function edit($id)
    {
        $data['category'] = $this->model->getAnimalCategory();
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
