<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Http\Controllers\Controller;
use App\Models\Beema;
use Illuminate\Http\Request;

class BeemaController extends DM_BaseController
{
    protected $panel = 'Beema';
    protected $base_route = 'admin.beema';
    protected $view_path = 'admin.beema';
    protected $model;
    protected $table;

    public function __construct(Beema $model)
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
        $data['category'] = $this->model->getBeemaCategory();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->storeData($request, $request->beema_id, $request->title, $request->anudaan, $request->duration, $request->total_cost, $request->area, $request->start_date, $request->end_date, $request->status)) {
            session()->flash('alert-success', 'बिमा  अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'बिमा अध्यावधिक हुन सकेन ।');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function edit($id)
    {
        $data['rows'] = $this->model::where('id', '=', $id)->firstOrFail();
        $data['category'] = $this->model->getBeemaCategory();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->updateData($request, $id, $request->beema_id, $request->title, $request->anudaan, $request->duration, $request->total_cost, $request->area, $request->start_date, $request->end_date, $request->status)) {
            session()->flash('alert-success', 'बिमा  अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'बिमा अध्यावधिक हुन सकेन ।');
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
