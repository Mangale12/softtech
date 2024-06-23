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
                $this->base_route = 'admin.udhyog.'.Str::lower(Str::replace(' ', '', $udhyog->name)).'.inventory.production_batch';
                $data['rows'] =  $this->model->where('udhyog_id', $udhyog->id)->paginate(10);
            }else{
                session()->flash('alert-success', 'उद्योग फेला परेन ।');
            }
        }
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
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
        DB::beginTransaction();
        try {
            $productionBatch = new ProductionBatch();
            $productionBatch->inventory_product_id = $request->input('product_id');
            $productionBatch->batch_no = $request->input('batch_no');
            $productionBatch->production_date = $request->input('production_date');
            $productionBatch->expiry_date = $request->input('expiry_date');
            $productionBatch->quantity_produced = $request->input('quantity_produced');
            if($request->udhyog != null){

                $udhyogDetails = Udhyog::where('name', $request->udhyog)->first();
                if($udhyogDetails){
                    $productionBatch->udhyog_id = $udhyogDetails->id;
                }else{
                    session()->flash('alert-danger', 'उद्योग अवस्थित छैन ।');
                    return redirect()->back();
                }
            }
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
                // save worker List details
                $workers = [];
                if(count($worker_list_id) > 0){
                    for ($i = 0; $i < count($worker_list_id); $i++) {
                        $workers[] = [
                            'worker_list_id' => $worker_list_id[$i],
                            'hours_worked' => $hours_worked[$i],
                            'production_batch_id' => $productionBatch->id,
                            'days_worked' => $days_worked[$i],
                        ];
                    }
                    DB::table('production_batch_worker_lists')->insert($workers);
                }else {
                    session()->flash('alert-danger', 'कम्तीमा एक कार्यकर्ता आवश्यक छ ।');
                    return redirect()->back();
                }


            } else {
                session()->flash('alert-danger', 'केही त गलत छ ।');
                return redirect()->back();

            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            session()->flash('alert-danger', 'उत्पादन ब्याच अध्यावधिक हुन सकेन ।');

        }

        if($request->has('udhyog')){
            if($request->input('udhyog')!=null){
                $udhyogDetails = Udhyog::where('name',$request->input('udhyog'))->first();
                if($udhyogDetails!=null){
                    $redirectUrl = 'admin/udhyog/'.Str::lower(Str::replace(' ','',$udhyogDetails->name)).'/inventory/production-batch?udhyog='.$udhyogDetails->name;
                    return redirect($redirectUrl);
                }


            }
        }
        return redirect()->route($this->base_route . '.index');
        // $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->storeData($request, $request->name, $request->stock_quantity, $request->expire_date, $request->unit_id, $request->unit_price, $request->description, $request->image)) {
            session()->flash('alert-success', 'कामदार पद अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'कामदार पद अध्यावधिक हुन सकेन ।');
        }

    }

    public function edit($id)
    {   $productionBatch = ProductionBatch::with('rawMaterials.rawMaterial')->find($id);
        $currentDate = date('Y-m-d');
        //conver English date to Nepali date   // Thaman 2078-01-01
        $data['ProductionBatchNo'] = $this->model->getProductionBatchNo();
        $data['nep_date_unicode']  = datenepUnicode($currentDate, 'nepali');
        $data['products'] = InventoryProduct::get();
        $data['raw_materials'] = RawMaterialName::get();
        $data['row'] = ProductionBatch::find($id);
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        // try {
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

            // Adjust raw material stock quantities and handle updates and deletions

            // Update the stock quantity of the produced product
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
        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     dd($e);
        //     return redirect()->back()->with('error', 'Failed to update production batch: ' . $e->getMessage());
        // }
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
            // $batch = Batch::with('labors')->findOrFail($batchId);
            // dd($productionBatch->worker_list);

            // calculate worker wages or salary
            // $totalLaborCost = 0;
            // foreach ($productionBatch->worker_list as $labor) {
            //     if ($labor->type == 'hourly') {
            //         $totalLaborCost += $labor->pivot->hours_worked * $labor->rate;
            //     } elseif ($labor->type == 'daily') {
            //         $totalLaborCost += $labor->pivot->days_worked * $labor->rate;
            //     } elseif ($labor->type == 'monthly') {
            //         $totalLaborCost += $labor->monthly_salary * ($labor->pivot->days_worked / 30);
            //     }
            // }

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
            return view(parent::loadView($this->view_path.'.report'), compact('report','productionBatch','data','batch'));
            // Calculate the number of raw materials used




            $rawMaterialsUsed = DB::table('production_batch_raw_materials')
                ->select('raw_material_id', DB::raw('SUM(quantity) as total_quantity_used'))
                ->groupBy('raw_material_id')
                ->get();

            // Calculate total products produced
            $totalProductsProduced = ProductionBatch::sum('quantity_produced');

            // Calculate total products damaged
            $totalProductsDamaged = DamageRecord::where('damagable_type', 'App\\Models\\Product')
                ->sum('quantity_damaged');

            // Calculate total raw materials damaged
            $totalRawMaterialsDamaged = DamageRecord::where('damagable_type', 'App\\Models\\RawMaterial')
                ->sum('quantity_damaged');

            return view('inventory.metrics', compact('rawMaterialsUsed', 'totalProductsProduced', 'totalProductsDamaged', 'totalRawMaterialsDamaged'));
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
            $currentDate = Carbon::today()->toDateString();
            $productionBatches = ProductionBatch::with('inventoryProduct')->get();
            $nepaliCurentDate = datenepUnicode($currentDate, 'nepali');

            if($request->has('udhyog')){
                if($request->input('udhyog')!=null){
                    $udhyogDetails = Udhyog::where('name',$request->input('udhyog'))->first();
                    $productionBatches = ProductionBatch::with('inventoryProduct')
                                                        ->where('udhyog_id', $udhyogDetails->id)
                                                        ->get();
                }
            }
            $expiringProducts = [];

            foreach ($productionBatches as $key => $batch) {
                $productionDate = dateeng(str_replace('/','-',$batch->production_date));
                $productionExpiryDate = dateeng(str_replace('/','-',$batch->expiry_date));
                $productAlertDays = $batch->inventoryProduct->alert_days;
                $alertDay = Carbon::parse($productionDate)->addDays($productAlertDays)->toDateString();
                // Check if the expiry date is within the alert period
                // dd($alertDay);
                $productionExpiryDate = Carbon::parse($productionExpiryDate );
                if ($productionExpiryDate > $currentDate&& $alertDay <= Carbon::today()) {
                    $expiringProducts[] = [
                        'product_name' => $batch->inventoryProduct->name,
                        'batch_number' => $batch->batch_no,
                        'expiration_date' => $batch->expiry_date,
                        'quantity_produced' => $batch->quantity_produced,
                        'production_date' => $batch->production_date,
                    ];
                }
            }
            $data['rows'] = $expiringProducts;
            return view(parent::loadView($this->view_path.'.warning_product'), compact('data'));

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
            $batchQuantity = ProductionBatchProduct::where('production_batch_id', $request['id'])->first();
            if($batchQuantity){
                $bool = true;
            }else{
                $bool = false;
            }
            return response()->json(['bool' => $bool, 'batchQuantity'=>$batchQuantity]);
        }

    }

