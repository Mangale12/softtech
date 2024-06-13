<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends DM_BaseController
{
    protected $panel = 'Category';
    protected $base_route = 'admin.category';
    protected $view_path = 'admin.category';
    protected $model;
    protected $table;

    public function __construct(Category $model)
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
        $data['category'] = $this->model->getCategory();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->storeData($request, $request->title, $request->is_parent, $request->parent_id,$request->summary, $request->status, $request->image)) {
            session()->flash('alert-success', 'उत्पादन प्रकार  अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'उत्पादन प्रकार अध्यावधिक हुन सकेन ।');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function edit($id)
    {
        $data['category'] = $this->model->getCategory();
        $data['rows'] = $this->model::where('id', '=', $id)->firstOrFail();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->updateData($request, $id, $request->title, $request->is_parent, $request->parent_id,$request->summary, $request->status, $request->image)) {
            session()->flash('alert-success', 'उत्पादन प्रकार  अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'उत्पादन प्रकार अध्यावधिक हुन सकेन ।');
        }
        return redirect()->route($this->base_route . '.index');
    }


    public function destroy(Request $request, $id)
    {
        $row = $this->model::findOrFail($id);
        if (!$row) {
            $request->session()->flash('success_message', $this->panel . 'does not exists.');
            return redirect()->route($this->base_route);
        }
        $file_path = getcwd() . $row->image;
        // dd($file_path);
        if (is_file($file_path)) {
            unlink($file_path);
        }
        foreach ($row as $row) {
            $this->model::where('id', '=', $id)->delete();
        }        return response()->json($row);
    }
}