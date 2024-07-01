<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Http\Controllers\Controller;
use App\Models\MalBibran;
use Illuminate\Http\Request;

class MalBibranController extends DM_BaseController
{
    protected $panel = 'Mal Bibran';
    protected $base_route = 'admin.mal-bibran';
    protected $view_path = 'admin.mal-bibran';
    protected $model;
    protected $table;

    public function __construct(MalBibran $model)
    {
        $this->model = $model;
        $this->middleware('permission:view MalBibran', ['only' => ['index']]);
         $this->middleware('permission:create MalBibran', ['only' => ['create','store']]);
         $this->middleware('permission:edit MalBibran', ['only' => ['edit','update']]);
         $this->middleware('permission:delete MalBibran', ['only' => ['destroy']]);
    }
    public function index()
    {
        $data['rows'] =  $this->model->getData();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        $resourceArray = null;
        return view(parent::loadView($this->view_path . '.create'), compact('resourceArray'));
    }

    public function store(Request $request)
    {
        $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->storeData($request, $request->title, $request->anudaan, $request->status)) {
            session()->flash('alert-success', 'मल बिबरण अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'मल बिबरण अध्यावधिक हुन सकेन ।');
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
        if ($this->model->updateData($request, $id, $request->title, $request->anudaan, $request->status)) {
            session()->flash('alert-success', 'मल बिबरण अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'मल बिबरण अध्यावधिक हुन सकेन ।');
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

