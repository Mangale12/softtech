<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkerList;
use Illuminate\Http\Request;
use App\Models\WorkTypes;
class WorkerListController extends DM_BaseController
{
    protected $panel = 'Worker List';
    protected $base_route = 'admin.worker-list';
    protected $view_path = 'admin.worker-list';
    protected $model;
    protected $table;

    public function __construct(WorkerList $model)
    {
        $this->model = $model;
        $this->middleware('permission:view worker')->only(['index', 'show']);
        $this->middleware('permission:create worker')->only(['create', 'store']);
        $this->middleware('permission:edit worker')->only(['edit', 'update']);
        $this->middleware('permission:delete worker')->only('destroy');
    }
    public function index()
    {
        $data['rows'] =  $this->model->getData();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {

        $data['rows'] = $this->model->getWorkerPosition();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->storeData($request, $request->full_name, $request->mobile, $request->gender, $request->address, $request->day_of_joining, $request->worker_position_id, $request->salary, $request->bhatta, $request->image)) {
            session()->flash('alert-success', 'कामदार पद अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'कामदार पद अध्यावधिक हुन सकेन ।');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function edit($id)
    {
        $data['rows'] = $this->model::where('id', '=', $id)->firstOrFail();
        $data['worker-position'] = $this->model->getWorkerPosition();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->model->getRules($id), $this->model->getMessage());
        if ($this->model->updateData($request, $id, $request->full_name, $request->mobile, $request->gender, $request->address, $request->day_of_joining, $request->worker_position_id, $request->salary, $request->bhatta, $request->image)) {
            session()->flash('alert-success', 'कामदार पद अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'कामदार पद अध्यावधिक हुन सकेन ।');
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
        if($data->image){
            parent::deleteImage($data->image);
        }
        $data->destroy($id);
        // return redirect()->back()->with('success_message', 'Worker Deleted Successfully !!');
        return response()->json($data);
    }
}
