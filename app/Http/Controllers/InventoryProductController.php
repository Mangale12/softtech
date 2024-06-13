<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RawMaterial;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\InventoryProduct;

class InventoryProductController extends Controller
{
    protected $panel = 'Inventory Product';
    protected $base_route = 'admin.inventory.products';
    protected $view_path = 'admin.inventory_products';
    protected $model;
    protected $table;

    public function __construct(InventoryProduct $model)
    {
        $this->model = $model;
        // $this->middleware('permission:view worker')->only(['index', 'show']);
        // $this->middleware('permission:create worker')->only(['create', 'store']);
        // $this->middleware('permission:edit worker')->only(['edit', 'update']);
        // $this->middleware('permission:delete worker')->only('destroy');
    }

    public function index()
    {
        $data['rows'] =  $this->model->getData();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        $data['suppliers'] = Supplier::get();
        $data['units'] = Unit::get();
        return view(parent::loadView($this->view_path . '.create'),compact('data'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->storeData($request, $request->name, $request->supplier_id, $request->stock_quantity, $request->expire_date, $request->unit_id, $request->unit_price, $request->description, $request->alert_days)) {
            session()->flash('alert-success', 'कामदार पद अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'कामदार पद अध्यावधिक हुन सकेन ।');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function edit($id)
    {
        $data['suppliers'] = Supplier::get();
        $data['units'] = Unit::get();
        $data['row'] = $this->model::where('id', '=', $id)->firstOrFail();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        // dd("test");
        dd($request->all());
        // $request->validate($this->model->getRules($id), $this->model->getMessage());
        if ($this->model->updateData($request, $id, $request->all())) {
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

    function lowStock(Request $request){
        $data['rows'] = $this->model->where('stock_quantity', '<', 10)->paginate(10);
        if($request->has('udhyog')){
            if($request->input('udhyog')!=null){
                $udhyogDetails = Udhyog::where('id',$request->input('udhyog'))->first();
                $data['rows'] = $this->model
                                    ->where('stock_quantity', '<', 10)
                                    ->where('udhyog_id', $udhyogDetails->id)
                                    ->paginate(10);
                $redirectUrl = 'admin/udhyog/'.Str::lower($udhyogDetails->name).'/inventory/products/low-stock?udhyog='.$udhyogDetails->name;
                return redirect($redirectUrl);

            }
        }
        return view(parent::loadView($view_path.'.low_stock'), compact('data'));
    }
}
