<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeedType;
class SeedTypeController extends DM_BaseController
{
    protected $panel = 'Seed Type';
    protected $base_route = 'admin.inventory.seed_types';
    protected $view_path = 'admin.seed-type';
    protected $model;
    protected $table;

    public function __construct(SeedType $model)
    {
        $this->model = $model;
        // $this->middleware('permission:view worker')->only(['index', 'show']);
        // $this->middleware('permission:create worker')->only(['create', 'store']);
        // $this->middleware('permission:edit worker')->only(['edit', 'update']);
        // $this->middleware('permission:delete worker')->only('destroy');
    }

    function index(){
        $data['rows'] = $this->model->getData();
        return view(parent::loadView($this->view_path . '.index'),compact('data'));
    }

    function create(){
        return view(parent::loadView($this->view_path.'.create'));
    }

    function store(Request $request){
        $request->validate([
            'name'=>'required',
        ]);
        try {
            SeedType::create($request->all());
            session()->flash('alert-success', 'पशुपन्छी प्रकार सफलतापूर्वक थपियो ।');
        } catch (Exception $e) {
            session()->flash('alert-error', 'पशुपन्छी प्रकार थप्न असफल भयो: ' . $e->getMessage());
        }
        return redirect()->route($this->base_route.'.index');
    }

    function edit($id){
        $data['rows'] = SeedType::findOrFail($id);
        return view(parent::loadView($this->view_path.'.edit'), compact('data'));
    }

    function update(Request $request, $id){
        try {
            $seedType = SeedType::findOrFail($id);
            $seedType->update($request->all());
            session()->flash('alert-success', 'पशुपन्छी प्रकार सफलतापूर्वक अद्यावधिक भयो ।');

        } catch (\Throwable $th) {
            session()->flash('alert-success', 'पशुपन्छी प्रकार सफलतापूर्वक अद्यावधिक भयो ।');
            return redirect()->back();
        }
        return redirect()->route($this->base_route.'.index');
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
