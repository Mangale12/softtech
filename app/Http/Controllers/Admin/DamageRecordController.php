<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DamageRecord;
use App\Models\DamageType;
use App\Models\InventoryProduct;
use App\Models\RawMaterial;
use App\Models\RawMaterialName;
use App\Models\ProductionBatch;
use App\Models\Inventory;
use Illuminate\Support\Str;
use App\Models\Udhyog;

class DamageRecordController extends DM_BaseController
{
    protected $panel = 'Damage Record';
    protected $base_route = 'admin.inventory.damage_records';
    protected $view_path = 'admin.damage_records';
    protected $model;
    protected $table;

    public function __construct(DamageRecord $model)
    {
        $this->model = $model;
        // $this->middleware('permission:view worker')->only(['index', 'show']);
        // $this->middleware('permission:create worker')->only(['create', 'store']);
        // $this->middleware('permission:edit worker')->only(['edit', 'update']);
        // $this->middleware('permission:delete worker')->only('destroy');
    }

    public function index(Request $request)
    {
        $data['damage_item'] = 'product';
        $damageRecordsQuery = DamageRecord::query();
        if($request->has('udhyog')){
            $udhyogName = $request->udhyog;
            $udhyog = Udhyog::where('name', $udhyogName)->first();
            if($udhyog){
                $data['udhyog'] = $udhyog;
                $this->base_route = 'admin.udhyog.'.Str::lower(Str::replace(' ','',$udhyog->name)).'.inventory.damage_records';
                $damageRecordsQuery->where('udhyog_id', $udhyog->id);
            }else{
                session()->flash('alert-success', 'उद्योग फेला परेन ।');
            }
        }
        if($request->has('damage_item')){
            if($request->damage_item == "raw material"){
                $this->panel = "Damage Raw Material";
                $data['damage_item'] = 'raw material';
                $damageRecordsQuery->whereHasMorph(
                    'damagable',
                    RawMaterialName::class
                );
            }else{
                session()->flash('alert-warning', 'यो बस्तु छैन भयो ।');
                return redirect()->route($this->base_route . '.index');
            }

        }else{
            $this->panel = "Damage Product";
            $damageRecordsQuery->whereHasMorph(
                'damagable',
                InventoryProduct::class
            );
        }

        // $data['rows'] =  $this->model->getData();
        $data['rows'] = $damageRecordsQuery->paginate(10)->withQueryString();

        return view(parent::loadView($this->view_path . '.index'), compact('data'));

        $data['damage_item'] = 'product'; // Default to product
        $damageRecordsQuery = DamageRecord::query();

        if ($request->has('damage_item')) {
            $damageItem = $request->damage_item;
            if ($damageItem == "raw_material") {
                $this->panel = "Damage Raw Material";
                $data['damage_item'] = 'raw material';
                // Assuming you have a relationship between DamageRecord and RawMaterial
                $damageRecordsQuery->whereHas('rawMaterial');
            } else {
                $data['damage_item'] = 'product';
                // Assuming you have a relationship between DamageRecord and Product
                $damageRecordsQuery->whereHas('product');
            }
        }

        $data['rows'] = $damageRecordsQuery->get();
    }
    public function create(Request $request)
    {
        $data['damage_item'] = 'product';
        if(isset($request->damage_item)){
            if($request->damage_item == "raw material"){
                // $data['rows'] = RawMaterial::where('stock_quantity', '>', 0)->get();
                $data['rows'] = RawMaterialName::join('inventories', 'raw_material_names.id', '=', 'inventories.raw_material_id')
                    ->where('inventories.stock_quantity', '>', 0)
                    ->where('udhyog_id', )
                    ->select('raw_material_names.*', 'inventories.stock_quantity')
                    ->get();
                $data['damage_item'] = 'raw material';
            }else{
                session()->flash('alert-warning', 'यो बस्तु छैन ।');
            }

        }else{
            $data['rows'] = InventoryProduct::where('stock_quantity', '>', 0)->get();
        }
        if($request->has('udhyog')){
            if($request->input('udhyog')!=null){
                $udhyogDetails = Udhyog::where('name',$request->input('udhyog'))->first();
                if($udhyogDetails != null){
                    if(isset($request->damage_item)){
                        if($request->damage_item == "raw material"){
                            // $data['rows'] = RawMaterial::where('stock_quantity', '>', 0)->get();
                            $data['rows'] = RawMaterialName::where('udhyog_id', $udhyogDetails->id)
                                ->join('inventories', 'raw_material_names.id', '=', 'inventories.raw_material_id')
                                ->where('inventories.stock_quantity', '>', 0)

                                ->select('raw_material_names.*', 'inventories.stock_quantity')
                                ->get();
                            $data['damage_item'] = 'raw material';
                        }else{
                            session()->flash('alert-warning', 'यो बस्तु छैन ।');
                        }

                    }else{
                        $data['rows'] = InventoryProduct::
                                                        where('stock_quantity', '>', 0)
                                                        ->where('udhyog_id', $udhyogDetails->id)
                                                        ->get();
                    }
                }
            }
        }

        $currentDate = date('Y-m-d');
        //conver English date to Nepali date   // Thaman 2078-01-01

        $data['nep_date_unicode']  = datenepUnicode($currentDate, 'nepali');
        $data['damage_types'] = DamageType::get();
        return view(parent::loadView($this->view_path . '.create'),compact('data','currentDate'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'addmore.*.production_batch' => 'required_if:damage_item,product|numeric',
            // 'addmore.*.product_id' => 'required|exists:products,id',
            'addmore.*.damage_type_id' => 'required|exists:damage_types,id',
            'addmore.*.quantity_damaged' => 'required|numeric|min:1',
            'addmore.*.damage_date' => 'required',
            'addmore.*.product_id' => 'required',
        ]);
        // dd($request->all());
        $itemType = $request->input('item_type');

        // Create the damage record based on the item type
        if ($itemType === 'raw material') {
            foreach($request->addmore as $requestItem){
                $item = RawMaterialName::find($requestItem['product_id']);
                $damageRecord = new DamageRecord();
                $damageRecord->quantity_damaged = $requestItem['quantity_damaged'];
                $damageRecord->damage_type_id = $requestItem['damage_type_id'];
                $damageRecord->damage_date = $requestItem['damage_date'];
                $damageRecord->reported_by = auth()->user()->id;
                // $damageRecord->action_taken = $request->input('action_taken');
                // $damageRecord->notes = $request->input('notes');
                $damageRecord->total_damage = $requestItem['quantity_damaged'];
                $damageRecord->production_date = $requestItem['production_date'];
                $damageRecord->damagable()->associate($item);

                if($request->udhyog != null){
                    $udhyogDetails = Udhyog::where('name', $request->udhyog)->first();
                    if($udhyogDetails){
                        $damageRecord->udhyog_id = $udhyogDetails->id;
                    }else{

                        return redirect()->back();
                    }
                }
                $damageData = $damageRecord->save();
                if($damageData){
                    Inventory::where('raw_material_id', $requestItem['product_id'])->decrement('stock_quantity', $requestItem['quantity_damaged']);
                }
            }

            if($request->has('udhyog')){
                if($request->input('udhyog')!=null){
                    $udhyogDetails = Udhyog::where('name',$request->input('udhyog'))->first();
                    if($udhyogDetails!=null){
                        $redirectUrl = 'admin/udhyog/'.Str::lower(Str::replace(' ', '', $udhyogDetails->name)).'/inventory/damage-records?damage_item=raw material&udhyog='.$udhyogDetails->name;
                        return redirect($redirectUrl);
                    }


                }
            }

        } elseif ($itemType === 'product') {
            foreach($request->addmore as $requestItem){
                $batch = ProductionBatch::where('batch_no', $requestItem['production_batch'])->first();
                // dd($batch);
                // if (!$batch) {
                //     session()->flash('alert-warning', 'Production batch number does not exist.');
                //     return back();
                // }
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

                        return redirect()->back();
                    }
                }
                $damageData = $damageRecord->save();
                if($damageData){
                    InventoryProduct::where('id', $requestItem['product_id'])->decrement('stock_quantity', $requestItem['quantity_damaged']);
                }
            }

            if($request->has('udhyog')){
                if($request->input('udhyog')!=null){
                    $udhyogDetails = Udhyog::where('name',$request->input('udhyog'))->first();
                    if($udhyogDetails!=null){
                        $redirectUrl = 'admin/udhyog/'.Str::lower(Str::replace(' ','',$udhyogDetails->name)).'/inventory/damage-records?udhyog='.$udhyogDetails->name;
                        return redirect($redirectUrl);
                    }


                }
            }
        } else {
            session()->flash('alert-warning', 'यो बस्तु छैन ।');
            return back();
        }

        return redirect()->route($this->base_route . '.index');
    }

    public function edit($id)
    {
        $damageRecord = DamageRecord::findOrFail($id);
        if ($damageRecord->damagable_type === RawMaterialName::class) {
            // Fetch additional data for RawMaterial
            $data['damage_item'] = 'raw material';
            // $data['rows'] = RawMaterial::where('stock_quantity', '>', 0)->get();
            $data['rows'] = RawMaterialName::join('inventories', 'raw_material_names.id', '=', 'inventories.raw_material_id')
                    // ->where('inventories.stock_quantity', '>', 0)
                    ->select('raw_material_names.*', 'inventories.stock_quantity')
                    ->get();
        } elseif ($damageRecord->damagable_type === InventoryProduct::class) {
            // Fetch additional data for Product
            $data['damage_item'] = 'product';
            $data['rows'] = InventoryProduct::where('stock_quantity', '>', 0)->get();
        } else {
            // Handle other types of damagable models, if necessary
            abort(404);
        }
        $data['row'] = $damageRecord;
        $currentDate = date('Y-m-d');
        //conver English date to Nepali date   // Thaman 2078-01-01

        $data['nep_date_unicode']  = datenepUnicode($currentDate, 'nepali');
        $data['damage_types'] = DamageType::get();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        // dd("test");
        // $request->validate($this->model->getRules($id), $this->model->getMessage());
        $damageRecord = DamageRecord::findOrFail($id);
        $oldQuantityDamaged = $damageRecord->quantity_damaged; // 3
        $newQuantityDamaged = $request->quantity_damaged; //2
        $quantityDifference = $newQuantityDamaged - $oldQuantityDamaged; // -1

        if ($damageRecord->damagable_type === RawMaterialName::class) {
            // $rawMaterial = Inventory::findOrFail($request->product_id);

            $rawMaterial = Inventory::where('raw_material_id',$request->product_id)->first();
            if(!$rawMaterial){
                abort(404);
            }
            if ($quantityDifference > 0) {
                // Increment stock if the new quantity is greater than the old one
                $rawMaterial->stock_quantity -= $quantityDifference;
            } elseif ($quantityDifference < 0) {
                // Decrement stock if the new quantity is less than the old one
                $rawMaterial->stock_quantity += abs($quantityDifference);
            }
            $rawMaterial->save();
        } elseif ($damageRecord->damagable_type === InventoryProduct::class) {
            // Fetch additional data for Product
            $product = InventoryProduct::findOrFail($request->product_id);
            if ($quantityDifference > 0) {
                // Increment stock if the new quantity is greater than the old one
                $product->stock_quantity -= $quantityDifference;
            } elseif ($quantityDifference < 0) {
                // Decrement stock if the new quantity is less than the old one
                $product->stock_quantity += abs($quantityDifference);
            }
            $product->save();
        }
        // } else {
        //     abort(404);
        // }
        // Update the damage record
        $damageRecord->quantity_damaged = $newQuantityDamaged;
        $damageRecord->damage_type_id = $request->damage_type_id;
        $damageRecord->damage_date = $request->damage_date;
        $damageRecord->reported_by = auth()->user()->id;
        $damageRecord->total_damage = $newQuantityDamaged;

        // Associate the raw material with the damage record
        //$damageRecord->damagable()->associate($rawMaterial);
        $damageRecord->save();
        session()->flash('alert-success', 'कामदार पद अध्यावधिक भयो ।');

        if($request->has('udhyog')){
            if($request->input('udhyog')!=null){
                $udhyogDetails = Udhyog::where('id',$request->input('udhyog'))->first();
                $redirectUrl = 'admin/udhyog/'.Str::lower(Str::replace(' ','',$udhyogDetails->name)).'/inventory/damage-records?udhyog='.$udhyogDetails->name;
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

    function stockQuantity(Request $request){
        $id = $request->id;
        $raw_material = RawMaterial::where('id', $id)->first();
        return response()->json(['data' => $raw_material]);
    }

    function checkProductionBatch(Request $request){
        $batch = null;
        $production_batch = ProductionBatch::where('batch_no', $request['production_batch'])->with('inventoryProduct')->first();
        if($production_batch){
            $bool = true;
            $batch = $production_batch->inventoryProduct;
        }else{
            $bool = false;
        }
        return response()->json(['bool' => $bool, 'batch'=>$batch, 'production_batch'=>$production_batch]);
    }

    function checkQuantity(Request $request){
        $batch = null;
        $production_batch = ProductionBatchProduct::where('production_batch_id', $request['batch_id'])->first();
        if($production_batch->quantity > 0){
            $bool = true;
            $batch = $production_batch;
        }else{
            $bool = false;
        }
        return response()->json(['bool' => $bool, 'batch'=>$batch, 'production_batch'=>$production_batch]);
    }
}
