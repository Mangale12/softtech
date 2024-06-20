<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Http\Controllers\Controller;
use App\Models\Talim;
use Illuminate\Http\Request;

class TalimController extends DM_BaseController
{
    protected $panel = 'Talim';
    protected $base_route = 'admin.talim';
    protected $view_path = 'admin.talim';
    protected $model;
    protected $table;

    public function __construct(Talim $model)
    {
        $this->model = $model;
        $this->middleware('permission:view training', ['only' => ['index']]);
        $this->middleware('permission:create training', ['only' => ['create','store']]);
        $this->middleware('permission:edit training', ['only' => ['edit','update']]);
        $this->middleware('permission:delete training', ['only' => ['destroy']]);
    }
    public function index()
    {
        $data['rows'] =  $this->model->getData();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create(Request $request)
    {
        $resourceArray = null;
        return view(parent::loadView($this->view_path . '.create'), compact('resourceArray'));
    }

    public function store(Request $request)
    {
        // $request->validate($this->model->getRules(), $this->model->getMessage());
        // dd($request->all());
        $phases = $request->only('phase_name', 'phase_description');
        if ($this->model->storeData($request, $request->title, $request->duration, $request->total_cost, $request->start_date, $request->end_date, $request->status, $request->description, $request->full_name, $request->position, $request->subject, $request->phone, $request->email, $request->organization_name, $phases)) {
            session()->flash('alert-success', 'तालिम  अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'तालिम अध्यावधिक हुन सकेन ।');
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
        $phases = $request->only('phase_name', 'phase_description', 'phase_id');
        if ($this->model->updateData($request, $id, $request->title, $request->duration, $request->total_cost, $request->start_date, $request->end_date, $request->status, $request->description, $request->full_name, $request->position, $request->subject, $request->phone, $request->email, $request->organization_name, $phases)) {
            session()->flash('alert-success', 'तालिम  अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'तालिम अध्यावधिक हुन सकेन ।');
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

    function view($id){
        $data['rows'] = $this->model::where('id', '=', $id)->firstOrFail();
        return view(parent::loadView($this->view_path . '.view'), compact('data'));
    }
}
