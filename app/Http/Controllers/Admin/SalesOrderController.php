<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SalesOrder;
use App\Models\Dealer;
use App\Models\InventoryProduct;
use App\Models\SalesOrderItem;
use Illuminate\Support\Facades\DB;
use App\Models\Udhyog;
use Illuminate\Support\Str;
use App\Models\Unit;
use App\Models\ProductionBatchProduct;
use App\Models\Transaction;
use App\Models\ProductionBatch;
use App\Models\SeedBatch;
use App\Models\Khadhyanna;

class SalesOrderController extends DM_BaseController
{
    protected $panel = 'Sales Order';
    protected $base_route = 'admin.inventory.sales_orders';
    protected $view_path = 'admin.sales_orders';
    protected $model;
    protected $table;

    public function __construct(SalesOrder $model)
    {
        $this->model = $model;
        $this->middleware('permission:view SalesOrder')->only(['index', 'show']);
        $this->middleware('permission:create SalesOrder')->only(['create', 'store']);
        $this->middleware('permission:edit SalesOrder')->only(['edit', 'update']);
        $this->middleware('permission:delete woSalesOrderrker')->only('destroy');
    }

    public function index(Request $request)
    {
        $data['rows'] =  $this->model->getData();
        if($request->has('udhyog')){
            $udhyogName = $request->udhyog;
            $udhyog = Udhyog::where('name', $udhyogName)->first();
            if($udhyog){
                $data['udhyog'] = $udhyog;
                $this->base_route = 'admin.udhyog.'.Str::lower(Str::replace(' ', '', $udhyog->name)).'.inventory.sales_orders';
                $data['rows'] =  $this->model->where('udhyog_id', $udhyog->id)->paginate(10);
            }else{
                session()->flash('alert-success', 'उद्योग फेला परेन ।');
            }
        }
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create(Request $request)
    {
        $data['products'] = InventoryProduct::get();
        $data['dealers'] = Dealer::get();
        $data['units'] = Unit::get();
        if($request->has('udhyog')){
            $udhyogName = $request->udhyog;
            $udhyog = Udhyog::where('name', $udhyogName)->first();
            if($udhyog){
                $data['udhyog'] = $udhyog;
                // $this->base_route = 'admin.udhyog.achar.inventory.sales_orders';
                $data['products'] = InventoryProduct::where('udhyog_id', $udhyog->id)->get();
                $data['dealers'] = Dealer::where('udhyog_id', $udhyog->id)->get();
            }else{
                session()->flash('alert-success', 'उद्योग फेला परेन ।');
            }
        }
        $currentDate = date('Y-m-d');
        //conver English date to Nepali date   // Thaman 2078-01-01
        $data['nep_date_unicode']  = datenepUnicode($currentDate, 'nepali');

        return view(parent::loadView($this->view_path . '.create'),compact('data','currentDate'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $khadhyanna = null;
        $request->validate($this->model->getRules(), $this->model->getMessage());
        try {
            $batchType = $request->batch_type;
            $udhyogDetails = null;
            DB::beginTransaction();
            $data                                    = new SalesOrder;
            $data->dealer_id                         = $request['dealer_id'];
            $data->total_amount                      = $request['total_amount'];
            $data->order_date                        = $request['order_date'];
            $data->payment_status                    = $request->has('payment_status') ? 1 : 0;
            $data->order_status                      = $request->has('order_status') ? 1 : 0;
            if($request->has('udhyog')){
                if($request->udhyog != null){
                    $udhyogDetails = Udhyog::where('name', $request->udhyog)->first();
                    if($udhyogDetails){
                        $data->udhyog_id = $udhyogDetails->id;
                    }else{
                        session()->flash('alert-danger', 'अर्डर अध्यावधिक हुन सकेन ।');
                        return redirect()->back();
                    }
                }
            }
            $data->save();
            $transaction = TRansaction::create([
                'dealer_id'=>$request['dealer_id'],
                'total_amount' => $request['total_amount'],
                'transaction_date' => $request['order_date'],
                'paid_amount' => 0,
                'remaining_amount' => $request['total_amount'],
                'transaction_key' => 'txn_'.str_replace($udhyogDetails->name, ' ', '-'). time() . '_' . Str::random(8),

            ]);
            foreach ($request['items'] as $key => $item) {
                // $salesOrderItem = new SalesOrderItem([
                //     'inventory_product_id' => $item['product_id'],
                //     'quantity' => $item['quantity'],
                // ]);
                // dd($item['product_id']);
                $batch = null;
                if ($batchType === 'product') {
                    $batch = ProductionBatch::where('batch_no', $item['batch_no'])->first();
                } elseif ($batchType === 'seed') {
                    $batch = SeedBatch::where('batch_no', $item['batch_no'])->first();
                    $khadhyanna = Khadhyanna::where('seed_batch_id', $batch->id)->first();
                }
                // $batch = ProductionBatch::where('batch_no', $item['batch_no'])->first();
                // if($item['is_khadhyanna'])
                if(!empty($item['is_khadhyanna']) ){
                    if($khadhyanna != null){
                        Khadhyanna::decrement('stock_quantity', $item['quantity']);
                    }

                }else {
                    $batch->decrement('stock_quantity',$item['quantity']);
                }


                $salesOrderItem = new SalesOrderItem();
                $salesOrderItem->inventory_product_id = $item['product_id'];
                $salesOrderItem->quantity = $item['quantity'];
                $salesOrderItem->sales_order_id = $data->id;
                $salesOrderItem->is_complete = !empty($item['is_complete']) ? 1 : 0;
                $salesOrderItem->unit_id = $item['unit_id'];
                $salesOrderItem->total_cost = $item['sub_total'];
                $salesOrderItem->unit_price = $item['unit_price'];
                $salesOrderItem->transaction_id = $transaction->id;

                if ($batchType === 'product') {
                    $salesOrderItem->production_batch_id = $batch->id;
                } else {
                    if(!empty($item['is_khadhyanna']) ){
                        if($khadhyanna != null){
                            $salesOrderItem->khadhyanna_id = $khadhyanna->id;
                        }
                    }else{
                        $salesOrderItem->seed_batch_id = $batch->id;
                    }
                }
                $salesOrderItem->save();
                // Batch wise inventory product decrement
                if ($batchType === 'product') {
                    $inventoryProduct = ProductionBatchProduct::where('production_batch_id', $batch->id)->first();
                    if ($inventoryProduct) {
                        $inventoryProduct->decrement('quantity_produced', $item['quantity']);
                    }
                }
                // overal product decrement
                $total_product = InventoryProduct::where('id' , $item['product_id'])->first();
                if($total_product){
                    $total_product->decrement('stock_quantity',$item['quantity']);
                }

            }
            session()->flash('alert-success', 'अर्डर अध्यावधिक भयो ।');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            session()->flash('alert-danger', 'अर्डर अध्यावधिक हुन सकेन ।');
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

        if($request->has('udhyog')){
            if($request->input('udhyog')!=null){
                $udhyogDetails = Udhyog::where('name',$request->input('udhyog'))->first();
                if($udhyogDetails!=null){
                    $redirectUrl = 'admin/udhyog/'.Str::lower(Str::replace(' ','',$udhyogDetails->name)).'/inventory/sales_orders?udhyog='.$udhyogDetails->name;
                    return redirect($redirectUrl);
                }
            }
        }else{
            return redirect()->back();
        }
        return redirect()->route($this->base_route.'.index');


        if ($this->model->storeData($request, $request->all())) {
            session()->flash('alert-success', 'अर्डर अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'अर्डर अध्यावधिक हुन सकेन ।');
        }

    }

    public function edit($id)
    {
        $data['row'] = SalesOrder::findOrFail($id);
        $data['products'] = InventoryProduct::get();
        $data['dealers'] = Dealer::get();
        if($data['row']['udhyog_id'] != null){
            // $this->base_route = 'admin.udhyog.achar.inventory.sales_orders';
            $data['products'] = InventoryProduct::where('udhyog_id', $data['row']['udhyog_id'])->get();
            $data['dealers'] = Dealer::where('udhyog_id', $data['row']['udhyog_id'])->get();
        }
        $currentDate = date('Y-m-d');
        //conver English date to Nepali date   // Thaman 2078-01-01
        $data['nep_date_unicode']  = datenepUnicode($currentDate, 'nepali');
        return view(parent::loadView($this->view_path . '.edit'),compact('data','currentDate'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        // try {
            $salesOrder = SalesOrder::findOrFail($id);
            $salesOrder->dealer_id = $request->input('dealer_id');
            $salesOrder->total_amount = $request->input('total_amount');
            $salesOrder->order_date = $request->input('order_date');
            $salesOrder->save();

            $existingProducts = $salesOrder->items;
            $requestItems = $request->items;
            $productIdsInRequest = [];

            foreach ($requestItems as $index => $item) {
                $productId = $item['product_id'];
                $quantity = $item['quantity'];
                $productIdsInRequest[] = $productId; // Track product IDs from the request
                $existing = $salesOrder->items->where('inventory_product_id', $productId)->first();

                if ($existing) {
                    $existing->quantity = $quantity;
                    $existing->save();
                } else {
                    $salesOrderItem = new SalesOrderItem();
                    $salesOrderItem->quantity = $quantity;
                    $salesOrderItem->inventory_product_id = $productId;
                    $salesOrderItem->sales_order_id = $salesOrder->id;
                    $salesOrderItem->save();
                }
            }

            // Determine items to remove
            foreach ($existingProducts as $existingProduct) {
                if (!in_array($existingProduct->inventory_product_id, $productIdsInRequest)) {
                    $existingProduct->delete();
                }
            }

            DB::commit();
            if($request->has('udhyog')){
                if($request->input('udhyog')!=null){
                    $udhyogDetails = Udhyog::where('id',$request->input('udhyog'))->first();
                    $redirectUrl = 'admin/udhyog/'.Str::lower(Str::replace(' ', '',$udhyogDetails->name)).'/inventory/sales_orders?udhyog='.$udhyogDetails->name;
                    return redirect($redirectUrl);

                }
            }
            return redirect()->route($this->base_route . '.index')->with('success', 'Production batch updated successfully.');
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

    function view($id){
        $currentDate = date('Y-m-d');
        //conver English date to Nepali date   // Thaman 2078-01-01
        $data['nep_date_unicode']  = datenepUnicode($currentDate, 'nepali');
        $data['sales_order'] = SalesOrder::findOrFail($id);
        return view(parent::loadView($this->view_path.'.view'), compact('data','currentDate'));
    }

    function get_order_type(Request $request){
        $dealers = Dealer::get();
        if($request->order_type == 1){
            $dealers = Dealer::where('is_dealer', 1)->get();
        }elseif($request->order_type == 2){
            $dealers = Dealer::where('is_dealer', 0)->get();
        }
        else{
            $dealers = Dealer::get();
        }

        return response()->json($dealers);
    }
}
