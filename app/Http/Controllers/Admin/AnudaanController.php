<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Http\Controllers\Controller;
use App\Models\Anudann;
use Illuminate\Http\Request;

class AnudaanController extends DM_BaseController
{
    protected $panel = 'Anudaan';
    protected $base_route = 'admin.anudaan';
    protected $view_path = 'admin.anudaan';
    protected $model;
    protected $table;

    public function __construct(Anudann $model)
    {
        $this->model = $model;
        $this->middleware('permission:view anudan', ['only' => ['index']]);
        $this->middleware('permission:create anudan', ['only' => ['create','store']]);
        $this->middleware('permission:edit anudan', ['only' => ['edit','update']]);
        $this->middleware('permission:delete anudan', ['only' => ['destroy']]);
    }
    public function index()
    {
        $data['rows'] =  $this->model->getData();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        $data['category'] = $this->model->getAnudaanCategory();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }

    public function store(Request $request)
    {
        // $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->storeData($request, $request->category_id, $request->title, $request->amount,$request->bibran, $request->times, $request->criteria, $request->daatrinikay_sahayog, $request->status)) {
            session()->flash('alert-success', 'अनुदान अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'अनुदान अध्यावधिक हुन सकेन ।');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function edit($id)
    {
        $data['rows'] = $this->model::where('id', '=', $id)->firstOrFail();
        $data['category'] = $this->model->getAnudaanCategory();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->updateData($request, $id, $request->category_id, $request->title, $request->amount,$request->bibran, $request->times, $request->criteria, $request->daatrinikay_sahayog, $request->status)) {
            session()->flash('alert-success', 'अनुदान अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'अनुदान अध्यावधिक हुन सकेन ।');
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
