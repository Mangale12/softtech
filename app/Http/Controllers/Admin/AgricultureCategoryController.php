<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Http\Controllers\Controller;
use App\Models\AgricultureCategory;
use Illuminate\Http\Request;

class AgricultureCategoryController extends DM_BaseController
{
    protected $panel = 'Agriculture Category';
    protected $base_route = 'admin.agriculture-category';
    protected $view_path = 'admin.agriculture-category';
    protected $model;
    protected $table;

    public function __construct(AgricultureCategory $model)
    {
        $this->model = $model;
        $this->middleware('permission:view setting')->only(['index']);
        $this->middleware('permission:edit setting')->only(['update']);
        // $this->middleware('permission:delete main setup')->only('destroy');
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
            session()->flash('alert-success', 'बालीनाली प्रकार अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'बालीनाली प्रकार अध्यावधिक हुन सकेन ।');
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
            session()->flash('alert-success', 'बालीनाली प्रकार अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'बालीनाली प्रकार अध्यावधिक हुन सकेन ।');
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
