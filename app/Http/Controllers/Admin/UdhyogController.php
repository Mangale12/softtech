<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Udhyog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UdhyogController extends DM_BaseController
{
    protected $panel = 'Udhyog List';
    protected $base_route = 'admin.udhyog.achar';
    protected $view_path = 'admin.udhyog';
    protected $model;
    protected $table;

    public function __construct(Udhyog $model)
    {
        $this->model = $model;
    }
    public function index(Request $request)
    {
        $data['rows'] =  $this->model->getData();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }

    public function Getdata(Request $request)
    {
        $categories = Udhyog::all();

        return Datatables::of($categories)
            ->addColumn('action', function($categories){
                return '<a onclick="editForm('. $categories->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                    '<a onclick="deleteData('. $categories->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            })
            ->rawColumns(['action'])->make(true);
    }

    public function create()
    {
        return view(parent::loadView($this->view_path . '.create'));
    }

    public function store(Request $request)
    {
        $request->validate($this->model->getRules(), $this->model->getMessage());
        $success =  $this->model->create($request->all());
        if ($success) {
            session()->flash('alert-success', 'उद्योग बिबरण अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'उद्योग बिबरण अध्यावधिक हुन सकेन ।');
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
        $data = $this->model->findOrFail($id);
        $success =  $data->update($request->all());
        $data->key = Str::random(32);
        $data->save();
        if ($success) {
            session()->flash('alert-success', 'उद्योग बिबरण अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'उद्योग बिबरण अध्यावधिक हुन सकेन ।');
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

    function fianance(){

    }
}
