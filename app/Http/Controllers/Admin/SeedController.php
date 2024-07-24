<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seed;
use App\Models\SeedType;
use App\Models\Unit;
use App\Models\Inventory;
use App\Models\Udhyog;
use App\Models\RawMaterial;
use DB;
use App\Models\SeedJaat;
class SeedController extends DM_BaseController
{
    protected $panel = 'Seed';
    protected $base_route = 'admin.inventory.seeds';
    protected $view_path = 'admin.biu-bijan';
    protected $model;
    protected $table;
    protected $seedJaat;

    public function __construct(Seed $model, SeedJaat $seedJaat)
    {
        $this->model = $model;
        $this->seedJaat = $seedJaat;
        $this->middleware('permission:view Seed')->only(['index', 'show']);
        $this->middleware('permission:create Seed')->only(['create', 'store']);
        $this->middleware('permission:edit Seed')->only(['edit', 'update']);
        $this->middleware('permission:delete Seed')->only('destroy');
    }
    function index(){
        $data['rows'] = $this->model->getData();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }

    function create(){
        $data['seed_type'] = SeedType::get();
        $data['seed_jaat'] = $this->seedJaat::get();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }

    function store(Request $request){
        $request->validate([
            'seed_name'=>'required|unique:seeds,seed_name',
        ]);
        // dd($request->all());
        try {
            Seed::create($request->only('seed_name','description','seed_type_id', 'seed_jaat_id'));
            session()->flash('alert-success', 'तालिम  अध्यावधिक भयो ।');
        } catch (\Throwable $th) {
            session()->flash('alert-success', 'तालिम अध्यावधिक हुन सकेन ।');
        }
        return redirect()->route($this->base_route.'.index');
        return view(parent::loadView($this->view_path.'.index'));
    }

    public function edit($id){
        $data['seed_type'] = SeedType::where('status', 1)->get();
        $data['seed_jaat'] = $this->seedJaat::get();
        $data['rows'] = Seed::findOrFail($id);
        return view(parent::loadView($this->view_path.'.edit'), compact('data'));
    }

    function update(Request $request, $id){
        $request->validate([
            'seed_name'=>'required',
            'seed_type_id' => 'required',
        ]);
        try {
            $seedType = Seed::findOrFail($id);
            $seedType->update($request->all());
            session()->flash('alert-success', 'सफलतापूर्वक अद्यावधिक भयो ।');

        } catch (\Throwable $th) {
            session()->flash('alert-error', 'सफलतापूर्वक अद्यावधिक भयो ।');
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

    function inventory(){
        $_panel = "Seed Inventory";
        $_base_route = $this->base_route;
        $udhog = Udhyog::where('name', 'Hybrid biu')->first();
        $data['rows'] = RawMAterial::where('udhyog_id', $udhog->id)
                        ->where('stock_quantity', '>', 0)
                        ->where('seed_id', '!=', null)
                        ->paginate(10);
        return view('admin.seed-supplier.inventory', compact('data','_panel','_base_route'));
    }

}
