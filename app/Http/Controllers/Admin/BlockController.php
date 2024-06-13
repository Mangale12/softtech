<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Block;
use Illuminate\Http\Request;

class BlockController extends DM_BaseController
{
    protected $panel = 'Block';
    protected $base_route = 'admin.block';
    protected $view_path = 'admin.block';
    protected $model;
    protected $table;

    public function __construct(Block $model)
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
        return view(parent::loadView($this->view_path . '.create'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // $request->validate($this->model->getRules(), $this->model->getMessage());
        $data = $request->all();
        $this->model->fill($data);
        $success =  $this->model->save();
        if ($success) {
            session()->flash('alert-success', 'यूनिट अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'यूनिट अध्यावधिक हुन सकेन ।');
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
        $this->model = $this->model->findOrFail($id);
        $data = $request->all();
        $this->model->fill($data);
        $success =  $this->model->save();
        if ($success) {
            session()->flash('alert-success', 'यूनिट अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'यूनिट अध्यावधिक हुन सकेन ।');
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

