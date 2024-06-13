<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends DM_BaseController
{
    protected $panel = 'Product List';
    protected $base_route = 'admin.product';
    protected $view_path = 'admin.product';
    protected $model;
    protected $table;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }
    public function index(Request $request)
    {
        $data['rows'] =  $this->model->getData();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }

    public function create()
    {
        $data['rows']                   = $this->model->getUdhyog();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }

    public function store(Request $request)
    {
        // $request->validate($this->model->getRules(), $this->model->getMessage());
        $success =  $this->model->create($request->all());
        if ($success) {
            session()->flash('alert-success', ' उत्पादन अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', ' उत्पादन अध्यावधिक हुन सकेन ।');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function edit($id)
    {
        $data['rows'] = $this->model::where('id', '=', $id)->firstOrFail();
        $data['category']                   = $this->model->getUdhyog();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);
        $success =  $data->update($request->all());
        if ($success) {
            session()->flash('alert-success', ' उत्पादन अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', ' उत्पादन अध्यावधिक हुन सकेन ।');
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
