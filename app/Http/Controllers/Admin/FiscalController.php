<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fiscal;
use Illuminate\Http\Request;
use DataTables;

class FiscalController extends DM_BaseController
{
    protected $panel = 'Fiscal';
    protected $base_route = 'admin.fiscal';
    protected $view_path = 'admin.fiscal';
    protected $model;
    protected $table;

    public function __construct(Fiscal $model)
    {
        $this->model = $model;
        $this->middleware('permission:view Fiscal', ['only' => ['index']]);
        $this->middleware('permission:create Fiscal', ['only' => ['create','store']]);
        $this->middleware('permission:edit Fiscal', ['only' => ['edit','update']]);
        $this->middleware('permission:delete Fiscal', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $data['rows'] =  $this->model->getData();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));    }

    public function getData(Request $request)
    {
        $data = Fiscal::latest()->get();
        return DataTables::of($data)->make(true);
    }

    public function create()
    {
        return view(parent::loadView($this->view_path . '.create'));
    }

    public function store(Request $request)
    {
        // $request->validate($this->model->getRules(), $this->model->getMessage());
        $data = $request->all();
        $this->model->fill($data);
        $success =  $this->model->save();
        if ($success) {
            session()->flash('alert-success', 'आर्थिक बर्ष अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'आर्थिक बर्ष अध्यावधिक हुन सकेन ।');
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
            session()->flash('alert-success', 'आर्थिक बर्ष अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'आर्थिक बर्ष अध्यावधिक हुन सकेन ।');
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
