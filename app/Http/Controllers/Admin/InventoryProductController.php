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
use App\Models\SeedJaat;
use Carbon\Carbon;
use DB;
use DataTables;

class InventoryProductController extends DM_BaseController
{
    protected $panel = 'Inventory Product';
    protected $base_route = 'admin.inventory.products';
    protected $view_path = 'admin.inventory_products';
    protected $model;
    protected $table;
    protected $udhyog;

    public function __construct(InventoryProduct $model, Udhyog $udhyog)
    {
        $this->model = $model;
        $this->udhyog = $udhyog;
        $this->middleware('permission:view Product')->only(['index', 'show']);
        $this->middleware('permission:create Product')->only(['create', 'store']);
        $this->middleware('permission:edit Product')->only(['edit', 'update']);
        $this->middleware('permission:delete Product')->only('destroy');
        $this->middleware('permission:delete view Inventory Product')->only('inventory');
        $this->middleware('permission:view Low Stock')->only('lowStock');
        $this->middleware('permission:view Expired Product')->only('expired_products');

    }

    public function index(Request $request)
    {
        if($request->has('udhyog')){
            $udhyogName = $request->udhyog;
            $udhyog = Udhyog::where('name', $udhyogName)->first();
            if($udhyog){
                $data['udhyog'] = $udhyog;
                $this->base_route = 'admin.udhyog.'.Str::lower(Str::replace(' ', '', $udhyog->name)).'.inventory.products';
            }else{
                session()->flash('alert-warning', 'उद्योग फेला परेन ।');
                return redirect()->back();
            }
        }else{
            session()->flash('alert-warning', 'उद्योग फेला परेन');
        }
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }

    public function datatables(Request $request)
    {
        $udhyogName = $request->udhyog; // Fetch parameter from request
        $query = $this->model::with('udhyog')
                                // ->whereHas('unit')
                                ->with('unit'); // Ensure the udhyog relationship is loaded
        // Apply filtering based on udhyogName if provided
        if (!empty($udhyogName)) {
            $query->whereHas('udhyog', function($q) use ($udhyogName) {
                $q->where('name', $udhyogName);
            });
        }
        $_base_route = 'admin.udhyog.'.strtolower(str_replace(' ', '', $udhyogName)).'.inventory.products'; //to verify that the url matches the product
        return datatables()->of($query)
            ->addColumn('action', function ($row) use ($_base_route, $udhyogName) {
                return view('admin.section.buttons.action-buttons', compact('row', '_base_route', 'udhyogName'))->render();
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    // function to display the list of product in inventory according to udhyog name
    public function inventory(Request $request)
    {
        $today = Carbon::today()->toDateString(); // Get today's date
        $nepaliCurentDate = getNepToEng(datenepUnicode($today, 'nepali'));
        if($request->has('udhyog')){ //check request hasa udhyog name or not
            $udhyogName = $request->udhyog;
            $udhyog = Udhyog::where('name', $udhyogName)->first();
            if($udhyog){
                $data['udhyog'] = $udhyog;
                $this->base_route = 'admin.udhyog.'.Str::lower(Str::replace(' ', '', $udhyog->name)).'.inventory.products';
                return view(parent::loadView($this->view_path . '.inventory'), compact('data'));
            }else{

                session()->flash('alert-warning', 'उद्योग फेला परेन ।');
                return redirect()->back();
            }
        }else{
            session()->flash('alert-warning', 'उद्योग फेला परेन ।');
            return redirect()->back();
        }
    }

        // spattie datatale for inventory product
    function inventoryDataTable(Request $request){
        $today = Carbon::today()->toDateString(); // Get today's date
        $nepaliCurentDate = getNepToEng(datenepUnicode($today, 'nepali')); //convert date tonepali
        $data['rows'] = null;
        $udhyogName = $request->udhyog;
        $udhyog = Udhyog::where('name', $udhyogName)->first();
        $data['udhyog'] = $udhyog;
        $_base_route = 'admin.udhyog.'.Str::lower(Str::replace(' ', '', $udhyog->name)).'.inventory.products';
        $today = Carbon::today()->toDateString(); // Get today's date
        $nepaliCurentDate = getNepToEng(datenepUnicode($today, 'nepali'));

        $udhyogId = $udhyog->id;
        // get all production batches producct according to conditions apply
        $rows = ProductionBatch::where(function($query) use ($nepaliCurentDate) {
                                    $query->where(DB::raw("STR_TO_DATE(expiry_date, '%Y/%m/%d')"), '>', str_replace('/', '-', $nepaliCurentDate))
                                        ->orWhere(DB::raw("STR_TO_DATE(expiry_date, '%Y-%m-%d')"), '>', $nepaliCurentDate);
                                })
                                ->whereNotNull('inventory_product_id')->with('inventoryProduct')
                                ->whereNotNull('unit_id')->with('unit')
                                ->where('stock_quantity', '>', 0)
                                ->where('udhyog_id', $udhyog->id)
                                ->get();
        // get production batches expiry date
        $expiryAlertData = ProductionBatch::where('udhyog_id', $udhyog->id)
                        ->where(function($query) use ($nepaliCurentDate) {
                            $query->where(DB::raw("STR_TO_DATE(expiry_date, '%Y/%m/%d')"), '>', $nepaliCurentDate)
                                    ->orWhere(DB::raw("STR_TO_DATE(expiry_date, '%Y-%m-%d')"), '>', $nepaliCurentDate);
                        }) // Example condition for expiry date
                        ->get(['batch_no', 'expiry_date']); // Adjust fields as needed
        $dataTable = DataTables::of($rows)
        ->addColumn('days_to_expiry', function ($row) use ($expiryAlertData) {
            $currentDate = Carbon::today();
            // Find the corresponding expiry alert data for this batch
            $expiryInfo = $expiryAlertData->where('batch_no', $row->batch_no)->first();
            $daysUntilExpiry = $expiryInfo ? $currentDate->diffInDays(Carbon::parse(dateeng(str_replace('/','-',$expiryInfo->expiry_date)))) : null;
            return $daysUntilExpiry;
        })
        ->addColumn('action', function ($row) {
            $_base_route = 'admin.udhyog.' . Str::lower(Str::replace(' ', '', $row->udhyog->name)) . '.inventory.products';
            $editButton = view('admin.section.buttons.button-edit', compact('row', '_base_route'))->render();
            $deleteButton = view('admin.section.buttons.button-delete', compact('row', '_base_route'))->render();
            return $editButton . ' ' . $deleteButton;
        })
        ->rawColumns(['action']);

    return $dataTable->make(true);
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
        $data['jaat'] = SeedJaat::get();
        return view(parent::loadView($this->view_path . '.create'),compact('data'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->storeData($request, $request->name, $request->alert_days, $request->seed_jaat_id, $request->udhyog)) {

            session()->flash('alert-success', 'अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'अध्यावधिक हुन सकेन ।');
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
        if ($this->model->updateData($request, $id, $request->name, $request->seed_jaat_id, $request->alert_days)) {
            session()->flash('alert-success', 'अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'अध्यावधिक हुन सकेन ।');
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
        if($request->has('udhyog')){
            $udhyog = $this->udhyog->where('name', $request->udhyog)->firstOrfail();
            $this->panel = 'Low Stock Product';
            $data['rows'] = $this->model->where('stock_quantity', '<', 10)
                            ->where('udhyog_id', '=', $udhyog->id)
                            ->get();
            return view(parent::loadView($this->view_path.'.low_stock'), compact('data'));
        }
        else{
            return back();
        }

    }

    //lis the expired product accroding to production batches and udhyog
    function expired_products(Request $request){
        $today = Carbon::today()->toDateString(); // Get today's date
        $nepaliCurentDate = getNepToEng(datenepUnicode($today, 'nepali'));
        $data['rows'] = null;
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
                        $query->where(DB::raw("STR_TO_DATE(expiry_date, '%Y/%m/%d')"), '<=', $nepaliCurentDate)
                              ->orWhere(DB::raw("STR_TO_DATE(expiry_date, '%Y-%m-%d')"), '<=', $nepaliCurentDate);
                    })->where('udhyog_id', $udhyogId);
                    // $query->where('udhyog_id', $udhyogId);
                })->where('quantity_produced', '>', 0)
                ->paginate(10);
            }else{
                session()->flash('alert-warning', 'उद्योग फेला परेन ।');
                return redirect()->back();
            }
        }else{
            session()->flash('alert-warning', 'उद्योग फेला परेन ।');
            return redirect()->back();
        }
        return view(parent::loadView($this->view_path.'.expired_products'), compact('data'));

    }
}

