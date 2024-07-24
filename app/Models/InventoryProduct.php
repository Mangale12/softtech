<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryProduct extends DM_BaseModel
{
    use HasFactory;

    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'inventory_product';
    protected $id;
    protected $prefix_path_image = '/upload_file/inventory_product/';

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'stock_quantity',
        'unit_id',
        'alert_days',
    ];

    /**
     * Get the unit associated with the product.
     */

     public function __construct()
    {

        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }
    //get Data
    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(10);
    }
    public function storeData($request, $name, $alert_days, $seed_jaat_id, $udhyog=null)
    {
        try {
            $data                               = new InventoryProduct;
            $data->name                         = $name;
            $data->alert_days                   = $alert_days;
            $data->seed_jaat_id                      = $seed_jaat_id;
            if($udhyog != null){
                $udhyogDetails = Udhyog::where('name', $request->udhyog)->first();
                if($udhyogDetails){
                    $data->udhyog_id = $udhyogDetails->id;
                }else{
                    return false;
                }
            }
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return false;
        }
    }

    public function updateData($request, $id, $name, $seed_jaat_id, $alert_days){
        try {
            $data                               = InventoryProduct::findOrFail($id);
            $data->name                         = $name;
            $data->alert_days                   = $alert_days;
            $data->seed_jaat_id                      = $seed_jaat_id;
            $data->update();
            return true;
        } catch (HttpResponseException $e) {
            return false;
        }
    }

    function getRules($id = null){
        return [
            'name' => 'required|string|max:255|unique:inventory_products,name,' . $id,
        ];
    }

    public function getMessage()
    {
        return [
            'name.required' => 'product name field is required.',
        ];
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }


    protected $casts = [
        'raw_materials' => 'array', // Assuming raw materials are stored as JSON
    ];

    public function productionBatches()
    {
        return $this->hasMany(ProductionBatch::class);
    }

    public function decrementRawMaterials(array $materialsToDecrement)
    {
        $currentMaterials = $this->raw_materials ?? [];
        foreach ($materialsToDecrement as $material => $amount) {
            if (isset($currentMaterials[$material])) {
                $currentMaterials[$material] -= $amount;
                if ($currentMaterials[$material] < 0) {
                    $currentMaterials[$material] = 0; // Prevent negative values
                }
            }
        }
        $this->raw_materials = $currentMaterials;
        $this->save();
    }

    public function damageRecords()
    {
        return $this->morphMany(DamageRecord::class, 'damagable');
    }
    public function udhyog()
    {
        return $this->belongsTo(Udhyog::class, 'udhyog_id');
    }
}
