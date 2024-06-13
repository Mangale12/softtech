<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RawMaterial;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\RawMaterialName;
use App\Models\Inventory;
use App\Models\Udhyog;
use Illuminate\Support\Str;

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

    public function index(Request $request)
    {
        $data['udhyog'] = null;
        $data['rows'] =  $this->model->getData();
        // $data['rows'] =  $this->model->getData();
        if($request->has('udhyog')){
            $udhyogName = $request->udhyog;
            $udhyog = Udhyog::where('name', $udhyogName)->first();
            if($udhyog){
                $data['udhyog'] = $udhyog;
                $this->base_route = 'admin.udhyog.'.Str::lower(Str::replace(' ', '', $udhyog->name)).'.inventory.raw_materials';
                $data['rows'] =  $this->model->where('udhyog_id', $udhyog->id)->paginate(10);
                // dd($data['rows']);
            }else{
                session()->flash('alert-success', 'उद्योग फेला परेन ।');
            }
        }
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create(Request $request)
    {
        $data['raw_material_name'] = RawMaterialName::get();
        $data['suppliers'] = Supplier::get();
        $data['units'] = Unit::get();
        if($request->has('udhyog')){
            $udhyogName = $request->udhyog;
            $udhyog = Udhyog::where('name', $udhyogName)->first();
            if($udhyog){
                $data['udhyog'] = $udhyog;
                $this->base_route = 'admin.udhyog.'.Str::lower(Str::replace(' ', '',$udhyog->name)).'.inventory.raw_materials';
                $data['suppliers'] = Supplier::where('udhyog_id', $udhyog->id)->get();
                // dd($data['rows']);
                $data['raw_material_name'] = RawMaterialName::where('udhyog_id', $udhyog->id)->get();
            }else{
                session()->flash('alert-success', 'उद्योग फेला परेन ।');
            }
        }
        return view(parent::loadView($this->view_path . '.create'),compact('data'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->storeData($request, $request->raw_material_id, $request->supplier_id, $request->stock_quantity, $request->expire_date, $request->unit_id, $request->unit_price, $request->description, $request->udhyog)) {
            session()->flash('alert-success', 'कामदार पद अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'कामदार पद अध्यावधिक हुन सकेन ।');
        }
        if($request->has('udhyog')){
            if($request->input('udhyog')!=null){
                $udhyogDetails = Udhyog::where('name',$request->input('udhyog'))->first();
                if($udhyogDetails!=null){
                    $redirectUrl = 'admin/udhyog/'.Str::lower(Str::replace(' ', '', $udhyogDetails->name)).'/inventory/raw-materials?udhyog='.$udhyogDetails->name;
                    return redirect($redirectUrl);
                }


            }
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function edit(Request $request,$id)
    {
        $data['raw_material_name'] = RawMaterialName::get();
        $data['suppliers'] = Supplier::get();
        $data['units'] = Unit::get();
        if($request->has('udhyog')){
            $udhyogName = $request->udhyog;
            $udhyog = Udhyog::where('name', $udhyogName)->first();
            if($udhyog){
                $data['udhyog'] = $udhyog;
                $this->base_route = 'admin.udhyog.'.Str::lower(Str::replace(' ', '', $udhyog->name)).'.inventory.raw_materials';
                $data['suppliers'] = Supplier::where('udhyog_id', $udhyog->id)->get();
                // dd($data['rows']);
            }else{
                session()->flash('alert-success', 'उद्योग फेला परेन ।');
            }
        }
        $data['row'] = $this->model::where('id', '=', $id)->firstOrFail();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        // dd("test");
        // $request->validate($this->model->getRules($id), $this->model->getMessage());
        if ($this->model->updateData($request, $id, $request->raw_material_id, $request->supplier_id, $request->stock_quantity, $request->expire_date, $request->unit_id, $request->unit_price, $request->description)) {
            session()->flash('alert-success', 'कामदार पद अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'कामदार पद अध्यावधिक हुन सकेन ।');
        }
        if($request->has('udhyog')){
            if($request->input('udhyog')!=null){
                $udhyogDetails = Udhyog::where('id',$request->input('udhyog'))->first();
                $redirectUrl = 'admin/udhyog/'.Str::lower(Str::replace(' ', '', $udhyogDetails->name)).'/inventory/raw-materials?udhyog='.$udhyogDetails->name;
                return redirect($redirectUrl);

            }
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

    // function inventory(Request $request){
    //     $data['rows'] = Inventory::paginate(10);
    //     // dd($data['rows']);
    //     $this->panel = 'Raw Material Inventory';
    //     if($request->has('udhyog')){
    //         $udhyogName = $request->udhyog;
    //         $udhyog = Udhyog::where('name', $udhyogName)->first();
    //         if($udhyog){
    //             $data['udhyog'] = $udhyog;
    //             $data['rows'] = Inventory::paginate(10);

    //             $data['rows'] =  $this->model->where('udhyog_id', $udhyog->id)->paginate(10);
    //             // dd($data['rows']);
    //         }else{
    //             session()->flash('alert-success', 'उद्योग फेला परेन ।');
    //         }
    //     }
    //     return view(parent::loadView($this->view_path.'.inventory'),compact('data'));
    // }


    public function inventory(Request $request)
{
    $data['rows'] = Inventory::paginate(10);
    $this->panel = 'Raw Material Inventory';

    if ($request->has('udhyog')) {
        $udhyogName = $request->udhyog;
        $udhyog = Udhyog::where('name', $udhyogName)->first();

        if ($udhyog) {
            $data['udhyog'] = $udhyog;
            $data['rows'] = Inventory::whereHas('rawMaterial', function ($query) use ($udhyog) {
                $query->where('udhyog_id', $udhyog->id);
            })->paginate(10);
        } else {
            session()->flash('alert-success', 'उद्योग फेला परेन ।');
        }
    }

    return view(parent::loadView($this->view_path . '.inventory'), compact('data'));
}


    function lowStock(){
        $data['rows'] = Inventory::where('stock_quantity', '<', 10)->paginate(10);
        $_panel = 'Low Stock Raw Material';
        $_base_route = 'admin.inventory.products';
        return view('admin.inventory_products.low_stock',compact('data','_panel','_base_route'));
    }

}
