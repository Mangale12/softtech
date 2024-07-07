<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\RawMaterial;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\InventoryProduct;
use App\Models\Udhyog;
use Illuminate\Support\Str;
use App\Models\ProductionBatchProduct;
use App\Models\ProductionBatch;
use Carbon\Carbon;
use DB;

class InventoryProductController extends DM_BaseController
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

    public function index(Request $request)
    {
        $data['rows'] =  $this->model->getData();
        if($request->has('udhyog')){
            $udhyogName = $request->udhyog;
            $udhyog = Udhyog::where('name', $udhyogName)->first();
            if($udhyog){
                $data['udhyog'] = $udhyog;
                $this->base_route = 'admin.udhyog.'.Str::lower(Str::replace(' ', '', $udhyog->name)).'.inventory.products';
                $data['rows'] =  $this->model->where('udhyog_id', $udhyog->id)->paginate(10);
            }else{
                session()->flash('alert-success', 'उद्योग फेला परेन ।');
                return redirect()->back();
            }
        }
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }

    public function inventory(Request $request)
    {
        $today = Carbon::today()->toDateString(); // Get today's date
        $nepaliCurentDate = getNepToEng(datenepUnicode($today, 'nepali'));
        $data['rows'] = null;
        // $data['rows'] = ProductionBatchProduct::whereHas('productionBatch', function ($query) use ($nepaliCurentDate) {
        //     $query->where(DB::raw("STR_TO_DATE(expiry_date, '%Y-%m-%d')"), '>=', $nepaliCurentDate);
        // })->where('quantity_produced', '>', 0)
        // ->paginate(10);

        if($request->has('udhyog')){
            $udhyogName = $request->udhyog;
            $udhyog = Udhyog::where('name', $udhyogName)->first();
            if($udhyog){
                $data['udhyog'] = $udhyog;
                $this->base_route = 'admin.udhyog.'.Str::lower(Str::replace(' ', '', $udhyog->name)).'.inventory.products';
                $today = Carbon::today()->toDateString(); // Get today's date
                $nepaliCurentDate = getNepToEng(datenepUnicode($today, 'nepali'));

                $udhyogId = $udhyog->id;

            //    dd($nepaliCurentDate);
                $data['rows'] = ProductionBatchProduct::whereHas('productionBatch', function ($query) use ($nepaliCurentDate, $udhyogId) {
                    $query->where(function ($query) use ($nepaliCurentDate) {
                        $query->where(DB::raw("STR_TO_DATE(expiry_date, '%Y/%m/%d')"), '>', $nepaliCurentDate)
                              ->orWhere(DB::raw("STR_TO_DATE(expiry_date, '%Y-%m-%d')"), '>', $nepaliCurentDate);
                    })->where('udhyog_id', $udhyogId);
                    // $query->where('udhyog_id', $udhyogId);
                })->where('quantity_produced', '>', 0)
                ->paginate(10);

                // Debug: Print fetched rows
                // dd($data['rows']);
            }else{
                session()->flash('alert-success', 'उद्योग फेला परेन ।');
                return redirect()->back();
            }
        }


        return view(parent::loadView($this->view_path . '.inventory'), compact('data'));
    }
    public function seedInventory(Request $request)
    {
        $today = Carbon::today()->toDateString(); // Get today's date
        $nepaliCurentDate = getNepToEng(datenepUnicode($today, 'nepali'));
        $data['rows'] = null;
        $udhyogName = $request->udhyog;
        $udhyog = Udhyog::where('name', 'hybrid biu')->first();
        if($udhyog){
            $data['udhyog'] = $udhyog;
            $this->base_route = 'admin.udhyog.'.Str::lower(Str::replace(' ', '', $udhyog->name)).'.inventory.products';
            $today = Carbon::today()->toDateString(); // Get today's date
            $nepaliCurentDate = getNepToEng(datenepUnicode($today, 'nepali'));

            $udhyogId = $udhyog->id;

        //    dd($nepaliCurentDate);
            $data['rows'] = SeedBatchProduction::where('stock_quantity', '>', 0)
            ->paginate(10);

            // Debug: Print fetched rows
            // dd($data['rows']);
        }else{
            session()->flash('alert-success', 'उद्योग फेला परेन ।');
            return redirect()->back();
        }
        return view(parent::loadView($this->view_path . '.inventory'), compact('data'));
    }

    function batchInventory(Request $request){
        if($request->has('udhyog')){
            $udhyogName = $request->udhyog;
            $udhyog = Udhyog::where('name', $udhyogName)->first();
            if($udhyog){
                $data['udhyog'] = $udhyog;
                $this->base_route = 'admin.udhyog.'.Str::lower(Str::replace(' ', '', $udhyog->name)).'.inventory.products';
                $today = Carbon::today()->toDateString(); // Get today's date
                $nepaliCurentDate = getNepToEng(datenepUnicode($today, 'nepali'));
                $udhyogId = $udhyog->id;
                $data['rows'] = ProductionBatchProduct::where('stock_quantity', '>', 0)->paginate(10);
                return view(parent::loadView($this->view_path . '.inventory'), compact('data'));

            }else{
                session()->flash('alert-success', 'उद्योग फेला परेन ।');
                return redirect()->back();
            }
        }
    }
    public function getExpiryAlertData(Request $request)
    {
        try {
            $currentDate = Carbon::today();
            $query = ProductionBatch::with('inventoryProduct');

            if ($request->has('udhyog') && $request->input('udhyog') != null) {
                $udhyogDetails = Udhyog::where('name', $request->input('udhyog'))->first();
                if ($udhyogDetails) {
                    $query->where('udhyog_id', $udhyogDetails->id);
                } else {
                    return response()->json(['status' => 'error', 'message' => 'Udhyog not found'], 404);
                }
            }

            $productionBatches = $query->get();
            $expiringProducts = [];

            foreach ($productionBatches as $batch) {
                $productionExpiryDate = Carbon::parse(dateeng(str_replace('/','-',$batch->expiry_date)));
                // $productAlertDays = $batch->inventoryProduct->alert_days;
                // $productionDate = Carbon::parse(dateeng(str_replace('/','-',$batch->production_date)));
                // $alertDay = $productionDate->addDays($productAlertDays);

                $daysUntilExpiry = $currentDate->diffInDays($productionExpiryDate, false);
                $expiringProducts[] = [
                    'product_name' => $batch->inventoryProduct->name,
                    'batch_number' => $batch->batch_no,
                    'expiration_date' => $batch->expiry_date,
                    'quantity_produced' => $batch->quantity_produced,
                    'production_date' => $batch->production_date,
                    'days_until_expiry' => $daysUntilExpiry,
                    'productionExpiryDate' => $productionExpiryDate,
                ];
            }

            return response()->json([
                'status' => 'success',
                'data' => $expiringProducts,
            ]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
    // public function getExpiryAlertData(Request $request)
    // {
    //     try {
    //         $currentDate = Carbon::today()->toDateString();
    //         $query = ProductionBatch::with('inventoryProduct');
    //         if ($request->has('udhyog') && $request->input('udhyog') != null) {
    //             $udhyogDetails = Udhyog::where('name', $request->input('udhyog'))->first();
    //             if ($udhyogDetails) {
    //                 $query->where('udhyog_id', $udhyogDetails->id);
    //             } else {
    //                 return response()->json(['status' => 'error', 'message' => 'Udhyog not found'], 404);
    //             }
    //         }

    //         $productionBatches = $query->get();
    //         $expiringProducts = [];

    //         foreach ($productionBatches as $batch) {
    //             $productionExpiryDate = Carbon::parse(dateeng(str_replace('/','-',$batch->expiry_date)));
    //             $productAlertDays = $batch->inventoryProduct->alert_days;
    //             $productionDate = Carbon::parse(dateeng(str_replace('/','-',$batch->production_date)));
    //             $alertDay = $productionDate->addDays($productAlertDays)->toDateString();

    //             $daysUntilExpiry = $productionExpiryDate->diffInDays($currentDate, false);

    //             // if ($productionExpiryDate > $currentDate && $alertDay <= $currentDate) {
    //             //     $expiringProducts[] = [
    //             //         'days_until_expiry' => $daysUntilExpiry,
    //             //     ];
    //             // }

    //             if ($alertDay <= $currentDate) {
    //                 $expiringProducts[] = [
    //                     'product_name' => $batch->inventoryProduct->name,
    //                     'batch_number' => $batch->batch_no,
    //                     'expiration_date' => $batch->expiry_date,
    //                     'quantity_produced' => $batch->quantity_produced,
    //                     'production_date' => $batch->production_date,
    //                     'days_until_expiry' => $daysUntilExpiry,
    //                 ];
    //             }
    //         }

    //         return response()->json([
    //             'status' => 'success',
    //             'data' => $expiringProducts,
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
    //     }
    // }






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
        if ($this->model->storeData($request, $request->name, $request->stock_quantity, $request->expire_date, $request->unit_id, $request->unit_price, $request->description, $request->image, $request->alert_days, $request->udhyog)) {
            session()->flash('alert-success', 'कामदार पद अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'कामदार पद अध्यावधिक हुन सकेन ।');
        }
        if($request->has('udhyog')){
            if($request->input('udhyog')!=null){
                $udhyogDetails = Udhyog::where('name',$request->input('udhyog'))->first();
                if($udhyogDetails!=null){
                    $redirectUrl = 'admin/udhyog/'.Str::lower(Str::replace(' ', '', $udhyogDetails->name)).'/inventory/products?udhyog='.$udhyogDetails->name;
                    return redirect($redirectUrl);
                }


            }
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
        // $request->validate($this->model->getRules($id), $this->model->getMessage());
        if ($this->model->updateData($request, $id, $request->name, $request->stock_quantity, $request->expire_date, $request->unit_id, $request->unit_price, $request->description, $request->image, $request->alert_days)) {
            session()->flash('alert-success', 'कामदार पद अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'कामदार पद अध्यावधिक हुन सकेन ।');
        }
        if($request->has('udhyog')){
            if($request->input('udhyog')!=null){
                $udhyogDetails = Udhyog::where('id',$request->input('udhyog'))->first();
                $redirectUrl = 'admin/udhyog/'.Str::lower(Str::replace(' ', '', $udhyogDetails->name)).'/inventory/products?udhyog='.$udhyogDetails->name;
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

    function lowStock(Request $request){
        $this->panel = 'Low Stock Product';
        $data['rows'] = $this->model->where('stock_quantity', '<', 10)->paginate(10);
        return view(parent::loadView($this->view_path.'.low_stock'), compact('data'));
    }
}

