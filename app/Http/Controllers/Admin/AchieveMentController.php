<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AchieveMentController extends DM_BaseController
{
    protected $panel = 'AchieveMent';
    protected $base_route = 'admin.achievement';
    protected $view_path = 'admin.achieve_ment';
    protected $model;
    protected $table;
    public function __construct(\App\Models\AchieveMent $model)
    {
        $this->model = $model;
    }
    public function index()
    {
        $data['rows'] = $this->model->getData();
        return view(parent::loadView($this->view_path. '.index'), compact('data'));
    }
    public function create(){
        return view(parent::loadView($this->view_path. '.create'));
    }
    public function store(Request $request){
        $rules = $this->model->getRules();
        $request->validate($rules);
        if ($this->model->storeData($request, $request->image, $request->title, $request->status)) {
            session()->flash('alert-success', $this->panel . '  Successfully Added !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Added');
        }
        return redirect()->route($this->base_route. '.index');
    }
    public function edit($id)
    {
        $data['rows'] = $this->model->findOrFail($id);
        return view(parent::loadView($this->view_path. '.edit'), compact('data'));
    }
    public function update(Request $request, $id){
        $rules = $this->model->getRules($id);
        $request->validate($rules);
        if ($this->model->updateData($request, $id, $request->image, $request->title, $request->status)) {
            session()->flash('alert-success', $this->panel.' Successfully Updated!');
        } else {
            session()->flash('alert-danger', $this->panel.' can not be Updated');
        }
        return redirect()->route($this->base_route. '.index');
    }
    public function delete($id)
    {
       $this->model->deleteData($id);
       return response()->json(array('success' => true));
    }

}
