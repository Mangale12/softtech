<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class SeedSupply extends Model
{
    use HasFactory;
    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'raw_materials';
    protected $id;
    protected $prefix_path_image = '/upload_file/raw_materials/';

    protected $fillable = [
        'supplier_id', 'quantity', 'unit_price', 'order_date', 'seed_id' , 'seed_type_id', 'reorder_level', 'transaction_id', 'unit_id'
    ];
    public function __construct()
    {

        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    //get Data
    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(10);
    }

    public function storeData($request, $requestData)
    {
        try {
            DB::beginTransaction();
              $transaction = Transaction::create([
                    'supplier_id'=>$requestData['supplier_id'],
                    'total_amount' => $requestData['total_amount'],
                    'transaction_date' => $requestData['order_date'],
                    'paid_amount' => 0,
                    'remaining_amount' => $requestData['total_amount'],
                    'transaction_key' => 'txn_hybridbiu_'. time() . '_' . Str::random(8),

                ]);
            foreach($requestData['seed_id'] as $i => $seed){
                $data                               = new SeedSupply;
                $data->seed_id                      = $seed;
                $data->supplier_id                  = $requestData['supplier_id'];
                $data->order_date                   = $requestData['order_date'];
                $data->quantity                     = $requestData['quantity'][$i];
                $data->unit_id                      = $requestData['unit_id'][$i];
                $data->unit_price                   = $requestData['unit_price'][$i];
                $data->total_cost                   = $requestData['total_cost'][$i];
                $data->reorder_level                +=1;
                $data->transaction_id               = $transaction->id;
                $saved   = $data->save();

                $inventory = Inventory::where('seed_id', $seed)->first();
                if ($inventory) {
                    // Update stock quantity if inventory exists
                    $inventory->stock_quantity += $requestData['quantity'][$i];
                    $inventory->last_updated = now();
                    $inventory->save();
                } else {
                    // Create new inventory record if it doesn't exist
                    Inventory::create([
                        'seed_id' => $seed,
                        'stock_quantity' => $requestData['quantity'][$i],
                        'last_updated' => now(),
                    ]);
                }


            }

            DB::commit();
            return true;
        } catch (HttpResponseException $e) {
            DB::rollback();
            return false;
        }
    }

    public function updateData($request, $id, $raw_material_id, $supplier, $stock_quantity, $expire_date, $unit_id, $unit_price, $description){
        try {
            $data                               = RawMaterial::findOrFail($id);
            $stockDifference                    = $stock_quantity - $data->stock_quantity;
            $data->raw_material_id              = $raw_material_id;
            $data->supplier_id                  = $supplier;
            $data->stock_quantity               = $stock_quantity;
            $data->expiry_date                  = $expire_date;
            $data->unit_id                      = $unit_id;
            $data->unit_price                   = $unit_price;
            $data->description                  = $description;


            $rawMaterial = $data->update();

            if($rawMaterial){
                $inventory = Inventory::where('raw_material_id', $raw_material_id)->first();
                if ($inventory) {
                    // Update stock quantity if inventory exists
                    if ($stockDifference > 0) {
                        $inventory->stock_quantity += $stockDifference;
                    } else if ($stockDifference < 0) {
                        $inventory->stock_quantity -= abs($stockDifference);
                    }
                    $inventory->last_updated = now();
                    $inventory->save();
                } else {
                    // Create new inventory record if it doesn't exist
                    Inventory::create([
                        'raw_material_id' => $raw_material_id,
                        'stock_quantity' => $request->stock_quantity,
                        'last_updated' => now(),
                    ]);
                }

            }
            return true;

        } catch (HttpResponseException $e) {
            return false;
        }
    }

    function getRules($id = null){
        $uniqueRule = Rule::unique($this->getTable());

        if ($id) {
            $uniqueRule->ignore($id);
        }
        return [
            'raw_material_id'               => 'required',
            'stock_quantity'                => 'required',
            'unit_price'                    => 'required',
            'unit_id'                       => 'required',
        ];
    }

    public function getMessage()
    {
        return [
            'raw_material_id.required' => 'कच्चा पद्दार्थ आवश्यक छ !!',
            'stock_quantity.required' => 'कच्चा पद्दार्थ मात्रा आवश्यक छ !!',
            'unit_id.required' => 'एकाइ आवश्यक छ !!',
            'unit_price.address' => 'एकाइ मूल्य आवश्यक छ !!', // Assuming you have a custom address validation rule
        ];
    }
}
