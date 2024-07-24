<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeedJaat;
class SeedJaatController extends DM_BaseController
{
    protected $panel = 'Seed Jaat';
    protected $base_route = 'admin.udhyog.hybridbiu.inventory.seed_jaat';
    protected $view_path = 'admin.seed_jaat';
    protected $model;
    protected $table;

    public function __construct(SeedJaat $model)
    {
        $this->model = $model;
        // $this->middleware('permission:view Seed Jaat')->only(['index', 'show']);
        // $this->middleware('permission:create Seed Jaat')->only(['create', 'store']);
        // $this->middleware('permission:edit Seed Jaat')->only(['edit', 'update']);
        // $this->middleware('permission:delete Seed Jaat')->only('destroy');
    }

    function index() {
        $data['rows'] = $this->model->getData();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    function create() {
        return view(parent::loadView($this->view_path . '.create'));
    }
    function store(Request $request){
        $request->validate([
            'jaat' => 'required',
        ]);
        $this->model->jaat = $request->jaat;
        $this->model->status = $request->status;
        $this->model->save();
        session()->flash('alert-success', 'सिर्जना गरियो ।');
        return redirect()->route($this->base_route . '.index');
    }

    function edit($id) {
        $data['row'] = $this->model::where('id', '=', $id)->firstOrFail();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    function update(Request $request, $id) {
        $request->validate([
            'jaat' =>'required',
        ]);
        $data = $this->model->findOrFail($id);
        $data->jaat = $request->jaat;
        $data->status = $request->status;
        $data->save();
        session()->flash('alert-success', 'स����ा��न ��रिय�� ।');
        return redirect()->route($this->base_route . '.index');
    }

    function destroy(Request $request, $id) {
        $data = $this->model->findOrFail($id);
        $data->delete();
        return response()->json($data);
    }
}
