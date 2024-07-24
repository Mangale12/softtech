<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductionBatch;
use App\Models\RawMaterial;
use App\Models\RawMaterialName;
use App\Models\InventoryProduct;
use Illuminate\Support\Facades\DB;
use App\Models\ProductionBatchRawMaterial;
use App\Models\Inventory;
use Carbon\Carbon;
use NepaliDate\NepaliDate;
use App\Models\Udhyog;
use Illuminate\Support\Str;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\ProductionBatchProduct;
use App\Models\WorkerTypes;
use App\Models\WorkerPosition;
use App\Models\WorkerList;


class ProductionBatchController extends DM_BaseController
{
    protected $panel = 'Production Batch';
    protected $base_route = 'admin.inventory.production_batch';
    protected $view_path = 'admin.production_batch';
    protected $model;
    protected $table;

    public function __construct(ProductionBatch $model)
    {
        $this->model = $model;
        $this->middleware('permission:view ProductionBatch')->only(['index', 'show']);
        $this->middleware('permission:create ProductionBatch')->only(['create', 'store']);
        $this->middleware('permission:edit ProductionBatch')->only(['edit', 'update']);
        $this->middleware('permission:delete ProductionBatch')->only('destroy');
    }

    public function index(Request $request)
    {
        // dd("test");
        // $data['rows'] =  $this->model->getData();
        if($request->has('udhyog')){
            $udhyogName = $request->udhyog;
            $udhyog = Udhyog::where('name', $udhyogName)->first();
            if($udhyog){
                $data['udhyog'] = $udhyog;
                $this->base_route = 'admin.udhyog.'.Str::lower(Str::replace(' ', '', $udhyog->name)).'.inventory.production_batch';
                $data['rows'] =  $this->model->where('udhyog_id', $udhyog->id)->paginate(10);
            }else{
                session()->flash('alert-success', 'उद्योग फेला परेन ।');
            }
        }
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }

    public function datatables(Request $request)
    {
        $udhyogName = $request->udhyog; // Fetch parameter from request

        $query = $this->model::with('udhyog','inventoryProduct'); // Ensure the udhyog relationship is loaded

        // Apply filtering based on udhyogName if provided
        if (!empty($udhyogName)) {
            $query->whereHas('udhyog', function($q) use ($udhyogName) {
                $q->where('name', $udhyogName);
            });
        }

        $_base_route = 'admin.udhyog.'.strtolower(str_replace(' ', '', $udhyogName)).'.inventory.production_batch';
        return datatables()->of($query)
        ->addColumn('action', function ($row) use ($_base_route) {
            $editButton = view('admin.section.buttons.button-edit', compact('row', '_base_route'))->render();
            $reportButton = view('admin.section.buttons.button-production-batch-report', compact('row', '_base_route'))->render();
            $deleteButton = view('admin.section.buttons.button-delete', compact('row', '_base_route'))->render();


            // Concatenate the HTML output of each button view
            return $editButton . ' ' . $deleteButton . ' ' . $reportButton;
        })
            ->rawColumns(['action'])
            ->toJson();
    }

    public function create(Request $request)
    {
        $currentDate = date('Y-m-d');
        //conver English date to Nepali date   // Thaman 2078-01-01
        $data['ProductionBatchNo'] = $this->model->getProductionBatchNo();
        $data['nep_date_unicode']  = datenepUnicode($currentDate, 'nepali');
        $data['products'] = InventoryProduct::get();
        $data['suppliers'] = Supplier::get();
        $data['units'] = Unit::get();

        $data['worker_list'] = WorkerList::get();
        // $data['raw_materials'] = RawMaterialName::get();
        $data['raw_materials'] = RawMaterialName::join('inventories', 'raw_material_names.id', '=', 'inventories.raw_material_id')
                    ->where('inventories.stock_quantity', '>', 0)
                    ->select('raw_material_names.*', 'inventories.stock_quantity')
                    ->get();
        if($request->has('udhyog')){
            $udhyogName = $request->udhyog;
            $udhyog = Udhyog::where('name', $udhyogName)->first();
            if($udhyog){
                $data['udhyog'] = $udhyog;
                $data['products'] = InventoryProduct::where('udhyog_id', $udhyog->id)->get();
                $data['suppliers'] = Supplier::where('udhyog_id', $udhyog->id)->get();
                $data['raw_materials'] = RawMaterialName::where('udhyog_id', $udhyog->id)
                                        // ->join('inventories', 'raw_material_names.id', '=', 'inventories.raw_material_id')
                                        // // ->where('inventories.stock_quantity', '>', 0)
                                        // ->select('raw_material_names.*', 'inventories.stock_quantity')
                                        ->get();
                                        // dd($data['raw_materials']);
                 $data['worker_list'] = WorkerList::where('udhyog_id', $udhyog->id)->get();
                return view(parent::loadView($this->view_path . '.create'),compact('data','currentDate'));
            }else{
                session()->flash('alert-success', 'उद्योग फेला परेन ।');
            }

        }

    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate($this->model->getRules(), $this->model->getMessage());


        try {
            if($request->udhyog != null){
                DB::beginTransaction();
                $productionBatch = new ProductionBatch();
                $udhyogDetails = Udhyog::where('name', $request->udhyog)->first();
                if($udhyogDetails){
                    $productionBatch->udhyog_id = $udhyogDetails->id;
                }else{
                    session()->flash('alert-danger', 'उद्योग अवस्थित छैन ।');
                    return redirect()->back();
                }

                $productionBatch->inventory_product_id = $request->input('product_id');
                $productionBatch->batch_no = $request->input('batch_no');
                $productionBatch->production_date = $request->input('production_date');
                $productionBatch->expiry_date = $request->input('expiry_date');
                $productionBatch->quantity_produced = $request->input('quantity_produced');
                $productionBatch->stock_quantity = $request->input('quantity_produced');
                $productionBatch->unit_id = $request->input('batch_unit');
                $productionBatch->unit_price = $request->input('unit_price');
                $batch = $productionBatch->save();

                // Get raw materials and quantities from the request
                $rawMaterials = $request->raw_material;
                $quantities = $request->quantity;
                $suppliers =  $request->supplier_id;
                $units = $request->unit_id;
                $unit_price = $request->unit_cost;
                $total_cost = $request->total_cost;
                $worker_list_id = $request->worker_list_id;
                $hours_worked  = $request->hours_worked;
                $days_worked  = $request->days_worked;

                // Compact and store raw materials and quantities
                if($batch){
                    $data = [];
                    if(count($rawMaterials) > 0){
                        for ($i = 0; $i < count($rawMaterials); $i++) {
                            $data[] = [
                                'quantity' => $quantities[$i],
                                'raw_material_id' => $rawMaterials[$i],
                                'production_batch_id' => $productionBatch->id,
                                'supplier_id' => $suppliers[$i],
                                'unit_id' => $units[$i],
                                'unit_cost' => $unit_price[$i],
                                'total_cost' => $total_cost[$i],
                            ];
                            Inventory::where('raw_material_id', $rawMaterials[$i])->decrement('stock_quantity', $quantities[$i]);
                            RawMaterialName::where('id', $rawMaterials[$i])->decrement('stock_quantity', $quantities[$i]);
                        }
                        DB::table('production_batch_raw_materials')->insert($data);

                        $production_batch_product = ProductionBatchProduct::where('production_batch_id', $productionBatch['id'])->first();
                        if($production_batch_product != null || $production_batch_product != false){
                            $production_batch_product->quantity_produced += $request->input('quantity_produced');
                            $production_batch_product->save();
                        }else{
                            DB::table('production_batch_products')->insert([
                                'production_batch_id' => $productionBatch['id'],
                                'inventory_product_id' => $request->input('product_id'),
                                'quantity_produced' => $request->input('quantity_produced'),
                            ]);
                        }
                        $inventoryProduct = InventoryProduct::find($request->input('product_id'));

                        if ($inventoryProduct) {
                            // Increment the product's quantity by the quantity produced
                            $inventoryProduct->stock_quantity += $productionBatch->quantity_produced;
                            // Save the updated product
                            $inventoryProduct->save();
                        }
                    }else{
                        session()->flash('alert-danger', 'कम्तीमा एक कच्चा पदार्थ आवश्यक छ ।');
                        return redirect()->back();
                    }
                    // // save worker List details
                    // $workers = [];
                    // if(count($worker_list_id) > 0){
                    //     for ($i = 0; $i < count($worker_list_id); $i++) {
                    //         $workers[] = [
                    //             'worker_list_id' => $worker_list_id[$i],
                    //             'hours_worked' => $hours_worked[$i],
                    //             'production_batch_id' => $productionBatch->id,
                    //             'days_worked' => $days_worked[$i],
                    //         ];
                    //     }
                    //     DB::table('production_batch_worker_lists')->insert($workers);
                    // }else {
                    //     session()->flash('alert-danger', 'कम्तीमा एक कार्यकर्ता आवश्यक छ ।');
                    //     return redirect()->back();
                    // }


                } else {
                    session()->flash('alert-danger', 'केही त गलत छ ।');
                    return redirect()->back();

                }
                DB::commit();
                session()->flash('alert-success', 'उत्पादन ब्याच अध्यावधिक ।');
                $redirectUrl = 'admin/udhyog/'.Str::lower(Str::replace(' ','',$udhyogDetails->name)).'/inventory/production-batch?udhyog='.$udhyogDetails->name;
                return redirect($redirectUrl);
            }
        } catch (\Throwable $th) {

            DB::rollback();
            session()->flash('alert-danger', 'उत्पादन ब्याच अध्यावधिक हुन सकेन ।');
            return redirect()->back();

        }
    }

    public function edit($id)
    {
        $data['units'] = Unit::get();
        $currentDate = date('Y-m-d');
        $data['nep_date_unicode']  = datenepUnicode($currentDate, 'nepali');
        $data['products'] = InventoryProduct::get();
        $data['row'] = ProductionBatch::findOrFail($id);
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id) {
        // dd($request->all());
        DB::beginTransaction();
        try {
            $productionBatch = ProductionBatch::findOrFail($id);
            $preStockQuantity = $productionBatch->quantity_produced;
            $requestStockQuantity = $request->input('quantity_produced');
            $differenceStockQuantity = $preStockQuantity - $requestStockQuantity;

            $productionBatch->inventory_product_id = $request->input('product_id');
            $productionBatch->production_date = $request->input('production_date');
            $productionBatch->expiry_date = $request->input('expiry_date');
            $productionBatch->unit_id = $request->input('batch_unit');
            $productionBatch->unit_price = $request->input('unit_price');
            $productionBatch->batch_no = $request->input('batch_no');
            $productionBatch->quantity_produced = $request->input('quantity_produced');
            $productionBatch->save();

            // Adjust inventory product stock quantity based on the difference
            $inventoryProduct = InventoryProduct::findOrFail($request->input('product_id'));
            if($differenceStockQuantity > 0 ){
                $productionBatch->stock_quantity -= $differenceStockQuantity;
                $productionBatch->save();
                $inventoryProduct->decrement('stock_quantity', $differenceStockQuantity);
            }else if($differenceStockQuantity < 0) {
                // $productionBatch->stock_quantity->increment(abs($differenceStockQuantity));
                $productionBatch->stock_quantity += abs($differenceStockQuantity);
                $productionBatch->save();
                $inventoryProduct->increment('stock_quantity', abs($differenceStockQuantity));
            }
            DB::commit();
            $udhyog = Udhyog::where('id', $productionBatch->udhyog_id)->first();
            $redirectUrl = 'admin/udhyog/'.Str::lower(Str::replace(' ','',$udhyog->name)).'/inventory/production-batch?udhyog='.$udhyog->name;
            return redirect($redirectUrl);
        }
        catch (\Exception $e) {
            DB::rollback();
            dd($e);
            session()->flash('alert-danger', 'उत्पादन ब्याच अध्यावधिक हुन सकेन ।');
            return redirect()->back();
        }

    }
    public function updateold(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $productionBatch = ProductionBatch::findOrFail($id);

            // Adjust inventory product stock quantity based on the difference
            $inventoryProduct = InventoryProduct::find($productionBatch->inventory_product_id);
            if ($inventoryProduct) {
                $inventoryProduct->decrement('stock_quantity', $productionBatch->quantity_produced);
            } else {
                throw new \Exception('Inventory product not found.');
            }
            // Update the ProductionBatch details
            $productionBatch->inventory_product_id = $request->input('product_id');
            $productionBatch->production_date = $request->input('production_date');
            $productionBatch->expiry_date = $request->input('expiry_date');
            $productionBatch->quantity_produced = $request->input('quantity_produced');
            $productionBatch->save();


            $newInventoryProduct = InventoryProduct::find($request->input('product_id'));
            if ($newInventoryProduct) {
                $newInventoryProduct->increment('stock_quantity', $productionBatch->quantity_produced);
            } else {
                throw new \Exception('New inventory product not found.');
            }

            // Get existing raw materials
            // Get existing raw materials
            $existingRawMaterials = $productionBatch->rawMaterials;

            // Prepare the raw materials and quantities from the request
            $quantities = $request->quantity;
            $rawMaterials = $request->raw_material;

            $rawMaterialIdsInRequest = [];

            foreach ($rawMaterials as $index => $rawMaterialId) {
                $quantity = $quantities[$index];
                $existing = $productionBatch->rawMaterials()->where('raw_material_id', $rawMaterialId)->first();

                if ($existing) {
                    // If the raw material exists, update the inventory accordingly
                    $currentQuantity = $existing->quantity;
                    $difference = $quantity - $currentQuantity;
                    $existing->quantity = $quantity;
                    $existing->save();

                    if ($difference > 0) {
                        Inventory::where('raw_material_id', $rawMaterialId)->decrement('stock_quantity', $difference);
                    } else if ($difference < 0) {
                        Inventory::where('raw_material_id', $rawMaterialId)->increment('stock_quantity', abs($difference));
                    }
                } else {
                    // If it's a new raw material, add it and update the inventory
                    // $productionBatch->rawMaterials()->attach($rawMaterialId, ['quantity' => $quantity]);
                    // $productionBatch->rawMaterials()->attach($rawMaterialId, ['quantity' => $quantity]);
                    $data = [
                        'quantity' => $quantity,
                        'raw_material_id' => $rawMaterialId,
                        'production_batch_id' =>$id,
                    ];
                    DB::table('production_batch_raw_materials')->insert($data);
                    Inventory::where('raw_material_id', $rawMaterialId)->decrement('stock_quantity', $quantity);
                }

                // Track raw material IDs from the request
                $rawMaterialIdsInRequest[] = $rawMaterialId;
            }

        // Determine raw materials to remove
            foreach ($existingRawMaterials as $existingRawMaterial) {
                if (!in_array($existingRawMaterial->raw_material_id, $rawMaterialIdsInRequest)) {
                    // Remove from production batch and update inventory
                    $existingRawMaterial->delete();
                    Inventory::where('raw_material_id', $existingRawMaterial->raw_material_id)->increment('stock_quantity', $existingRawMaterial->quantity);
                }
            }

        // Determine raw materials to remove


            DB::commit();

            if($request->has('udhyog')){
                if($request->input('udhyog')!=null){
                    $udhyogDetails = Udhyog::where('id',$request->input('udhyog'))->first();
                    $redirectUrl = 'admin/udhyog/'.Str::lower(Str::replace(' ','',$udhyogDetails->name)).'/inventory/production-batch?udhyog='.$udhyogDetails->name;
                    return redirect($redirectUrl);

                }
            }
            return redirect()->route($this->base_route . '.index')->with('success', 'Production batch updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return redirect()->back()->with('error', 'Failed to update production batch: ' . $e->getMessage());
        }
            return redirect()->route($this->base_route . '.index');
        }
        private function updateInventory($rawMaterialId, $quantity)
        {
            $inventory = Inventory::where('raw_material_id', $rawMaterialId)->first();

            if ($inventory) {
                if ($inventory->stock_quantity + $quantity < 0) {
                    throw new \Exception('Insufficient stock for raw material ID ' . $rawMaterialId);
                }
                $inventory->stock_quantity += $quantity;
                $inventory->save();
            } else {
                throw new \Exception('Raw material not found in inventory: ' . $rawMaterialId);
            }
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

        function stockQuantity(Request $request){
            $id = $request->id;
            $raw_material = RawMaterial::where('id', $id)->first();
            return response()->json(['data' => $raw_material]);
        }


        public function view_report($id)
        {
            $productionBatch = ProductionBatch::with('worker_list')->findOrFail($id);
            $report = DB::table('production_batches as pb')
                    ->join('production_batch_raw_materials as pbrm', 'pb.id', '=', 'pbrm.production_batch_id')
                    ->join('raw_material_names as rm', 'pbrm.raw_material_id', '=', 'rm.id')
                    ->join('inventory_products as p', 'pb.inventory_product_id', '=', 'p.id')
                    ->select(
                        // 'p.name as product_name',
                        // 'pb.quantity_produced',
                        'rm.name as raw_material_name',
                        // 'rm.id as raw_material_id',
                        // 'pb.production_date as production_date',
                        // 'pb.expiry_date as expiry_date',
                        DB::raw('SUM(pbrm.quantity) as total_quantity_used')
                    )
                    ->groupBy('pb.id', 'rm.id')
                    ->where('pb.id', $id)
                    // ->with('rawMaterials')
                    ->get();

            $batch = ProductionBatch::with(['product', 'damages', 'rawMaterials', 'worker_list'])
                ->where('id', $id)
                ->first();

                // dd($batch->damages);
            $currentDate = date('Y-m-d');
            $data['nep_date_unicode']  = datenepUnicode($currentDate, 'nepali');
            $data['raw_materials'] = RawMaterialName::where('udhyog_id', $productionBatch->udhyog_id)->get();
            $data['suppliers']  = Supplier::where('udhyog_id', $productionBatch->udhyog_id)->get();
            $data['units'] = Unit::get();
            $data['worker'] = WorkerList::where('udhyog_id', $productionBatch->udhyog_id)->get();
            return view(parent::loadView($this->view_path.'.report'), compact('report','productionBatch','data','batch'));
            // Calculate the number of raw materials use
        }

        // public function getExpiringProducts()
        // {
        //     $currentDate = Carbon::today();
        //     $nepaliCurentDate = datenepUnicode($currentDate, 'nepali');
        //     // $todayNepaliFormatted = $todayNepali->format('Y-m-d');

        //     $productionBatches = ProductionBatch::with('inventoryProduct')->get();

        //     foreach ($productionBatches as $key => $batch) {
        //         // dd(str_replace('/','-',$batch->production_date));
        //         $productionDate = dateeng(str_replace('/','-',$batch->production_date));
        //         $alertDays = $batch->inventoryProduct->alert_days;
        //         $expiryDate = Carbon::parse($productionDate)->addDays($alertDays);
        //         // Compare expiry date with today's date and the end of the alert period
        //         if ($expiryDate >= $currentDate && $expiryDate <= $expiryDate) {
        //             $expiringProducts[] = [
        //                 'product_name' => $batch->inventoryProduct->name,
        //                 'batch_number' => $batch->batch_no,
        //                 'expiration_date' => $expiryDate,
        //             ];

        //         }
        //     }

        //     dd($expiringProducts);
        //     return $expiringProducts;
        // }
        public function getExpiringProducts(Request $request)
        {
            $this->panel = "View Alert";
            $currentDate = Carbon::today();
            $productionBatches = ProductionBatch::with('inventoryProduct')->get();
            $nepaliCurrentDate = datenepUnicode($currentDate->toDateString(), 'nepali');

            if ($request->has('udhyog') && $request->input('udhyog') != null) {
                $udhyogDetails = Udhyog::where('name', $request->input('udhyog'))->first();
                if ($udhyogDetails) {
                    $productionBatches = ProductionBatch::with('inventoryProduct')
                                                        ->where('udhyog_id', $udhyogDetails->id)
                                                        ->get();
                }
            }

            $expiringProducts = [];

            foreach ($productionBatches as $batch) {
                $productionDate = Carbon::parse(dateeng(str_replace('/', '-', $batch->production_date)));
                $productionExpiryDate = Carbon::parse(dateeng(str_replace('/', '-', $batch->expiry_date)));
                $productAlertDays = $batch->inventoryProduct->alert_days;
                $alertDay = $productionDate->copy()->addDays($productAlertDays);

                $daysToExpire = $currentDate->diffInDays($productionExpiryDate, false);

                if ($productionExpiryDate->greaterThan($currentDate) && $alertDay->lessThanOrEqualTo($currentDate)) {
                    $expiringProducts[] = [
                        'product_name' => $batch->inventoryProduct->name,
                        'batch_number' => $batch->batch_no,
                        'expiration_date' => $batch->expiry_date,
                        'quantity_produced' => $batch->quantity_produced,
                        'stock_quantity' => $batch->stock_quantity,
                        'production_date' => $batch->production_date,
                        'daysToExpire' => $daysToExpire,
                    ];
                }
            }

            $data['rows'] = $expiringProducts;
            return view(parent::loadView($this->view_path . '.warning_product'), compact('data'));
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
                        $productAlertDays = $batch->inventoryProduct->alert_days;
                        $productionDate = Carbon::parse(dateeng(str_replace('/','-',$batch->production_date)));
                    $alertDay = $productionDate->addDays($productAlertDays);

                    $daysUntilExpiry = $currentDate->diffInDays($productionExpiryDate, false);

                    if ($productionExpiryDate->greaterThan($currentDate) && $alertDay->lessThanOrEqualTo($currentDate)) {
                        $expiringProducts[] = [
                            'product_name' => $batch->inventoryProduct->name,
                            'batch_number' => $batch->batch_no,
                            'expiration_date' => $batch->expiry_date,
                            'quantity_produced' => $batch->quantity_produced,
                            'production_date' => $batch->production_date,
                            'days_until_expiry' => $daysUntilExpiry,
                        ];
                    }
                }

                return response()->json([
                    'status' => 'success',
                    'data' => $expiringProducts,
                ]);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
            }
        }

        function check_stock_quantity(Request $request){
            $batchQuantity = ProductionBatch::where('batch_no', $request['id'])->first();
            if($batchQuantity){
                $bool = true;
            }else{
                $bool = false;
            }
            return response()->json(['bool' => $bool, 'batchQuantity'=>$batchQuantity]);
        }

        function add_raw_material(Request $request){
            $request->validate([
                'raw_material_id'=>'required',
                'supplier_id'=>'required',
                'unit_id'=>'required',
                'unit_cost'=>'required',
                'quantity'=>'required',
            ]);
            try {
                $data = [
                    'quantity' => $request->quantity,
                    'raw_material_id' => $request->raw_material_id,
                    'production_batch_id' => $request->batch_id,
                    'supplier_id' => $request->supplier_id,
                    'unit_id' => $request->unit_id,
                    'unit_cost' => $request->unit_cost,
                    'total_cost' => $request->total_cost,
                ];
                Inventory::where('raw_material_id', $request->raw_material_id)->decrement('stock_quantity', $request->quantity);
                RawMaterialName::where('id', $request->raw_material_id)->decrement('stock_quantity', $request->quantity);
                DB::table('production_batch_raw_materials')->insert($data);
                session()->flash('alert-success', 'आवश्यक छ ।');
                return redirect()->back();
            } catch (\Throwable $th) {
                session()->flash('alert-warning ', 'आवश्यक छ ।');
                return redirect()->back();
            }


        }

        function add_worker(Request $request){
            $request->validate([
                'batch_id' => 'required',
                'worker_id' => 'required',
                'worked_hour' => 'required',
                'worked_day' => 'required',
                'wages_per_hour' => 'required',
            ]);
            try {
                DB::table('production_batch_worker_lists')->insert([
                    'production_batch_id' => $request->batch_id,
                    'worker_list_id' => $request->worker_id,
                    'hours_worked' => $request->worked_hour,
                    'days_worked' => $request->worked_day,
                    'wages_per_hour' => $request->wages_per_hour,
                    'total_wages' => $request->total_wages,
                ]);
                session()->flash('alert-success', 'उद्योग फेला परेन ।');
                return redirect()->back();
            } catch (\Throwable $th) {
                dd($th);
                session()->flash('alert-warning', 'उद्योग फेला परेन ।');
                return back();
            }

        }

        function add_other_material(Request $request){
            $request->validate([
                'batch_id' => 'required',
                'name' => 'required',
                'unit_id' => 'required',
                'unit_price' => 'required',
                'quantity' => 'required',
            ]);
            try {
                // dd($request->all());
                DB::table('production_batch_other_materials')->insert([
                    'production_batch_id' => $request->batch_id,
                    'unit_id' => $request->unit_id,
                    'supplier_id' => $request->supplier_id,
                    'unit_price' => $request->unit_price,
                    'total_cost' => $request->total_cost,
                    'name' => $request->name,
                    'quantity'=>$request->quantity,
                ]);
                session()->flash('alert-success', 'उद्योग फेला परेन ।');
                return redirect()->back();
            } catch (\Throwable $th) {
                dd($th);
                session()->flash('alert-warning', 'उद्योग फेला परेन ।');
                return back();
            }

        }

        function add_damage_record(Request $request){
            $request->validate([
                'damagedamage_type_id' => 'required',
                'damage_date' => 'required',
                'total_damage' => 'required',
            ]);
            try {
                    $batch = ProductionBatch::where('id', $request->production_batch_id)->first();
                    $item = InventoryProduct::find($requestItem['product_id']);
                    $damageRecord = new DamageRecord();
                    $damageRecord->quantity_damaged = $requestItem['quantity_damaged'];
                    $damageRecord->damage_type_id = $requestItem['damage_type_id'];
                    $damageRecord->damage_date = $requestItem['damage_date'];
                    $damageRecord->reported_by = auth()->user()->id;
                    // $damageRecord->action_taken = $request->input('action_taken');
                    // $damageRecord->notes = $request->input('notes');
                    $damageRecord->total_damage = $requestItem['quantity_damaged'];
                    $damageRecord->production_batch_id = $batch != null ? $batch->id : null;
                    $damageRecord->production_date = $requestItem['production_date'];
                    $damageRecord->damagable()->associate($item);
                    if($request->udhyog != null){
                        $udhyogDetails = Udhyog::where('name', $request->udhyog)->first();
                        if($udhyogDetails){
                            $damageRecord->udhyog_id = $udhyogDetails->id;
                        }else{
                            DB::rollback();
                            return redirect()->back()->with('alert-warning', 'उद्योग भेटिएन ।');
                            // return redirect()->back();
                        }
                    }
                    $damageData = $damageRecord->save();
                    if($damageData){
                        InventoryProduct::where('id', $requestItem['product_id'])->decrement('stock_quantity', $requestItem['quantity_damaged']);
                        ProductionBatch::where('id', $batch->id)->decrement('stock_quantity', $requestItem['quantity_damaged']);
                        ProductionBatchProduct::where("inventory_product_id",$requestItem['product_id'])->decrement('quantity_produced', $requestItem['quantity_damaged']);
                    }
                DB::commit();
                session()->flash('alert-success', 'अध्यावधिक भयो ।');
                $redirectUrl = 'admin/udhyog/'.Str::lower(Str::replace(' ','',$udhyogDetails->name)).'/inventory/damage-records?udhyog='.$udhyogDetails->name;
                return redirect($redirectUrl);
            } catch (\Throwable $th) {
                DB::rollback();
                DB::rollback();
                session()->flash('alert-warning', 'त्रुटि: कृपया पुनः प्रयास गर्नुहोस्।');
                return redirect()->back()->with('alert-danger', 'त्रुटि: कृपया पुनः प्रयास गर्नुहोस्।');
            }
        }

        function delete_worker(Request $request, $id){
            try {
                DB::table('production_batch_worker_lists')->where('id', $id)->delete();
                return response()->json(['bool'=>true]);
            } catch (\Throwable $th) {
                return response()->json(['bool'=>false]);
            }

        }

        function delete_raw_material(Request $request, $id){
            try {
                $data = DB::table('production_batch_raw_materials')->where('id', $id)->first();
                Inventory::where('raw_material_id', $data->raw_material_id)->increment('stock_quantity', $data->quantity);
                RawMaterialName::where('id', $data->raw_material_id)->increment('stock_quantity', $data->quantity);

                DB::table('production_batch_raw_materials')->where('id', $id)->delete();
                return response()->json(['bool'=>true]);
            } catch (\Throwable $th) {
                return response()->json(['bool'=>false]);
            }

        }

        function delete_other_material(Request $request, $id){
            try {
                DB::table('production_batch_other_materials')->where('id', $id)->delete();
                return response()->json(['bool'=>true]);
            } catch (\Throwable $th) {
                return response()->json(['bool'=>false]);
            }
        }

        function delete_damage_record(Request $request, $id){
            try {
                DB::table('damage_records')->where('id', $id)->delete();
                return response()->json(['bool'=>true]);
            } catch (\Throwable $th) {
                return response()->json(['bool'=>false]);
            }
        }
    }

