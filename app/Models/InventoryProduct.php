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
    public function storeData($request, $name, $stock_quantity, $expire_date, $unit_id, $unit_price, $description,$image, $alert_days, $udhyog=null)
    {
        try {
            $data                               = new InventoryProduct;
            $data->name                         = $name;
            $data->stock_quantity               = $stock_quantity;
            $data->expiry_date                  = $expire_date;
            $data->unit_id                      = $unit_id;
            $data->price                        = $unit_price;
            $data->description                  = $description;
            $data->alert_days                   = $alert_days;
            if ($request->hasFile('image')) {

                $data->image = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image', '', '');
            }
            if($udhyog != null){

                $udhyogDetails = Udhyog::where('name', $request->udhyog)->first();
                if($udhyogDetails){
                    $data->udhyog_id = $udhyogDetails->id;
                }else{

                    return redirect()->back();
                }
            }
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return false;
        }
    }

    public function updateData($request, $id, $name, $stock_quantity, $expire_date, $unit_id, $unit_price, $description, $image, $alert_days){
        try {
            $data                               = InventoryProduct::findOrFail($id);
            $data->name                         = $name;
            $data->stock_quantity               = $stock_quantity;
            $data->expiry_date                  = $expire_date;
            $data->unit_id                      = $unit_id;
            $data->price                        = $unit_price;
            $data->description                  = $description;
            $data->alert_days                   = $alert_days;
            if ($request->hasFile('image')) {
                if ($data->image) {
                    // Assuming 'deleteImage' is a method to delete images
                    parent::deleteImage($data->image); // You need to implement this method
                }
                $data->image = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image', '', '');
            }
            $data->update();
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
            'full_name'             => 'required|string|max:255',
            'mobile'                => [
                                'required',
                                'digits:10',
                                $uniqueRule,
                            ],
            // 'mobile'                => 'required|digits:10|unique:worker_lists,mobile',
            'gender'                => 'required',
            'address'               => 'required|string',
            'day_of_joining'        => 'required',
            // 'worker_position_id'    => 'required',
            'salary'                => 'required|numeric',
            'bhatta'                => 'required|numeric',

            // Add other validation rules as needed
        ];
    }

    public function getMessage()
    {
        return [
            'full_name.required' => 'The full name field is required.',
            'full_name.string' => 'The full name must be a string.',
            'full_name.max' => 'The full name may not be greater than 255 characters.',
            'mobile.required' => 'The mobile field is required.',
            'mobile.digits' => 'The mobile must be exactly 10 digits.',
            'mobile.unique' => 'The mobile number has already been taken.',
            'gender.required' => 'The gender field is required.',
            'address.address' => 'The address is invalid.', // Assuming you have a custom address validation rule
            'day_of_joining.required' => 'The day of joining field is required.',
            'worker_position_id.required' => 'The worker position ID field is required.',
            'salary.required' => 'The salary field is required.',
            'salary.numeric' => 'The salary must be a number.',
            'bhatta.required' => 'The bhatta field is required.',
            'bhatta.numeric' => 'The bhatta must be a number.',
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
}
