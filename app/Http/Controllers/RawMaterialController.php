<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RawMaterial;
use App\Models\RawMaterialName;
use App\Models\Inventory;
class RawMaterialController extends DM_BaseController
{
    protected $panel = 'Raw Material';
    protected $base_route = 'admin.inventory.raw_materials';
    protected $view_path = 'admin.raw_materials';
    protected $model;
    protected $table;

    public function __construct(RawMaterial $model)
    {
        $this->model = $model;
        // $this->middleware('permission:view worker')->only(['index', 'show']);
        // $this->middleware('permission:create worker')->only(['create', 'store']);
        // $this->middleware('permission:edit worker')->only(['edit', 'update']);
        // $this->middleware('permission:delete worker')->only('destroy');
    }

    public function index()
    {
        $data['udhyog'] = null;
        $data['rows'] =  $this->model->getData();
        if($request->has('udhyog')){
            dd("dd");
            $udhyogName = $request->udhyog;
            $udhyog = Udhyog::where('name', $udhyogName)->first();
            if($udhyog){
                $data['udhyog'] = $udhyog;
                $this->base_route = 'admin.udhyog.achar.inventory.raw_materials';
                $data['rows'] =  $this->model->where('udhyog_id', $udhyog->id)->paginate(10);
            }else{
                session()->flash('alert-success', 'उद्योग फेला परेन ।');
            }
        }
        $data['rows'] =  $this->model->getData();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        $data['suppliers'] = Supplier::get();
        return view(parent::loadView($this->view_path . '.create'),compact('data'));
    }

    public function store(Request $request)
    {
        // $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->storeData($request, $request->name, $request->phone, $request->email, $request->address)) {
            session()->flash('alert-success', 'कामदार पद अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'कामदार पद अध्यावधिक हुन सकेन ।');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function edit($id)
    {
        $data['row'] = $this->model::where('id', '=', $id)->firstOrFail();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate($this->model->getRules($id), $this->model->getMessage());
        if ($this->model->updateData($request, $id, $request->name, $request->phone, $request->email, $request->address)) {
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
        // return redirect()->back()->with('success_message', 'Worker Deleted Successfully !!');
        return response()->json($data);
    }

    function inventory(){
        $inventory = Inventory::get();
        $this->panel = 'Raw Material Inventory';
        return view(parent::loadView($this->view_path.'.inventory'),compact('inventory'));
    }

    function lowStock(){
        $inventory = Inventory::where('stock_quantity', '<', 10)->paginate(10);
        $this->panel = 'Raw Material Low Stock';
        if($request->has('udhyog')){
            if($request->input('udhyog')!=null){
                $udhyogDetails = Udhyog::where('id',$request->input('udhyog'))->first();
                $data['rows'] = Inventory::where('stock_quantity', '<', 10)
                                    ->where('udhyog_id', $udhyogDetails->id)
                                    ->paginate(10);
                $redirectUrl = 'admin/udhyog/'.Str::lower($udhyogDetails->name).'/inventory/raw-materials/low-stock?udhyog='.$udhyogDetails->name;
                return redirect($redirectUrl);

            }
        }
        return view('admin.inventory_products.low_stock',compact('inventory'));
    }
    //
}
