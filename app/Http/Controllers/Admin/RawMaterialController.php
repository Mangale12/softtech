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
use App\Models\Seed;
use Illuminate\Support\Str;
use DataTables;


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
        $this->middleware('permission:view Raw Material Supply')->only(['index', 'show']);
        $this->middleware('permission:create Raw Material Supply')->only(['create', 'store']);
        $this->middleware('permission:edit Raw Material Supply')->only(['edit', 'update']);
        $this->middleware('permission:delete Raw Material Supply')->only('destroy');
    }

    public function index(Request $request)
    {
        $data['udhyog'] = null;
        $data['row'] =  $this->model->getData();
        // $data['rows'] =  $this->model->getData();
        if($request->has('udhyog')){
            $udhyogName = $request->udhyog;
            $udhyog = Udhyog::where('name', $udhyogName)->first();
            if($udhyog){
                $data['udhyog'] = $udhyog;
                $this->base_route = 'admin.udhyog.'.Str::lower(Str::replace(' ', '', $udhyog->name)).'.inventory.raw_materials';
                $data['row'] =  $this->model->getTransactions($udhyog->id);
                // dd($data['rows']);
            }else{
                session()->flash('alert-warning', 'उद्योग फेला परेन ।');
                return redirect()->back();
            }
        }else{
            session()->flash('alert-warning', 'उद्योग फेला परेन ।');
            return redirect()->back();
        }
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create(Request $request)
    {
        try {
            $data['raw_material_name'] = RawMaterialName::get();
            $data['suppliers'] = Supplier::get();
            $data['seed'] = Seed::get();
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
                    return back();
                }
            }
            $currentDate = date('Y-m-d');
            //conver English date to Nepali date   // Thaman 2078-01-01

            $data['nep_date_unicode']  = datenepUnicode($currentDate, 'nepali');
            return view(parent::loadView($this->view_path . '.create'),compact('data', 'currentDate'));
        } catch (\Throwable $th) {
            session()->flash('alert-success', 'माफ गर्नुहोस् केहि गलत भयो ।');
            return back();
        }
    }

    public function store(Request $request)
    {
        try {

            $request->validate($this->model->getRules(), $this->model->getMessage());
            if ($this->model->storeData($request, $request->raw_material_id, $request->supplier_id, $request->stock_quantity, $request->expire_date, $request->unit_id, $request->unit_price, $request->udhyog, $request->total_cost, $request->total_amount, $request->seed_id)) {
                session()->flash('alert-success', 'कच्चा पद्दार्थ अध्यावधिक भयो ।');
            } else {
                session()->flash('alert-warning', 'कच्चा पद्दार्थ अध्यावधिक हुन सकेन ।');
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
            //code...
        } catch (\Throwable $th) {
            dd($th);
            return back();
        }

    }

    public function edit(Request $request,$id)
    {
        $data['units'] = Unit::get();
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

            }else{
                session()->flash('alert-success', 'उद्योग फेला परेन ।');
                return back();
            }
        }else{
            session()->flash('alert-success', 'उद्योग फेला परेन ।');
            return back();
        }

        return redirect()->route($this->base_route . '.index');
    }


    public function destroy(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);
        $data->destroy($id);
        // return redirect()->back()->with('success_message', 'Worker Deleted Successfully !!');
        return response()->json($data);
    }
    public function inventory(Request $request)
    {
        // $data['rows'] = Inventory::paginate(10);
        $this->panel = 'Raw Material Inventory';

        if ($request->has('udhyog')) {
            $udhyogName = $request->udhyog;
            $udhyog = Udhyog::where('name', $udhyogName)->first();

            if ($udhyog) {
                $data['udhyog'] = $udhyog;
                // $data['rows'] = Inventory::whereHas('rawMaterial', function ($query) use ($udhyog) {
                //     $query->where('udhyog_id', $udhyog->id);
                // })->paginate(10);
                return view(parent::loadView($this->view_path . '.inventory'), compact('data'));

            } else {
                session()->flash('alert-success', 'उद्योग फेला परेन ।');
                return back();

            }
        }else{
            session()->flash('alert-success', 'उद्योग फेला परेन ।');
            return back();
        }

    }

    public function datatables(Request $request)
    {
        $udhyogName = $request->udhyog; // Fetch parameter from request
        $udhyog = Udhyog::where('name', $udhyogName)->first();
        $query = RawMaterialName::where('udhyog_id', $udhyog->id)
                ->where('stock_quantity', '>', 0)
                ->whereNotNull('unit_id')->with('unit')
                ->get();

        // Use DataTables' query builder to generate JSON response
        return DataTables::of($query)
            ->toJson();
    }

    function lowStock(){
        $data['rows'] = Inventory::where('stock_quantity', '<', 10)->paginate(10);
        $_panel = 'Low Stock Raw Material';
        $_base_route = 'admin.inventory.products';
        return view('admin.inventory_products.low_stock',compact('data','_panel','_base_route'));
    }

}
