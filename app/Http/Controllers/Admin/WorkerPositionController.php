<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Http\Controllers\Controller;
use App\Models\WorkerPosition;
use Illuminate\Http\Request;

class WorkerPositionController extends DM_BaseController
{
    protected $panel = 'Worker Position';
    protected $base_route = 'admin.worker-position';
    protected $view_path = 'admin.worker-position';
    protected $model;
    protected $table;

    public function __construct(WorkerPosition $model)
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
        $data['rows'] = $this->model->getWorkerTypes();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }

    public function store(Request $request)
    {
        // $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->storeData($request, $request->addmore)) {
            session()->flash('alert-success', 'कामदार पद अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'कामदार पद अध्यावधिक हुन सकेन ।');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function edit($id)
    {
        $data['rows'] = $this->model::where('id', '=', $id)->firstOrFail();
        $data['worker-type'] = $this->model->getWorkerTypes();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->updateData($request, $id, $request->worker_id, $request->position, $request->salary, $request->bhatta)) {
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
        $data->destroy($id);
        return response()->json($data);
    }
}
