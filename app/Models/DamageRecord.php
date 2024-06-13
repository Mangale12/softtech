<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DamageRecord extends Model
{
    use HasFactory;

    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'production_batch';
    protected $id;
    protected $prefix_path_image = '/upload_file/production_batch/';

    protected $fillable = [
        'item_type',
        'quantity_damaged',
        'damage_type',
        'damage_date',
        'reported_by',
        'action_taken',
        'notes',
        'total_damage'
    ];

    public function __construct()
    {

        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }

    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(10);
    }
    public function storeData($request, $name, $stock_quantity, $expire_date, $unit_id, $unit_price, $description,$image)
    {
        try {
            $data                               = new InventoryProduct;
            $data->name                         = $name;
            $data->stock_quantity               = $stock_quantity;
            $data->expiry_date                  = $expire_date;
            $data->unit_id                      = $unit_id;
            $data->price                        = $unit_price;
            $data->description                  = $description;
            if ($request->hasFile('image')) {
                if ($data->image) {
                    // Assuming 'deleteImage' is a method to delete images
                    parent::deleteImage($data->image); // You need to implement this method
                }
                $data->image = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image', '', '');
            }
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return false;
        }
    }

    public function updateData($request, $id, $name, $stock_quantity, $expire_date, $unit_id, $unit_price, $description, $image){
        try {
            $data                               = InventoryProduct::findOrFail($id);
            $data->name                         = $name;
            $data->stock_quantity               = $stock_quantity;
            $data->expiry_date                  = $expire_date;
            $data->unit_id                      = $unit_id;
            $data->price                        = $unit_price;
            $data->description                  = $description;
            if ($request->hasFile('image')) {

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

    public function damagable()
    {
        return $this->morphTo();
    }
    public function damageType()
    {
        return $this->belongsTo(DamageType::class);
    }

    function getProduct(){
        return $this->belongsTo(InventoryProduct::class, 'damagable_id', 'id');
    }
    function getUser(){
        return User::where('id', $this->reported_by)->first();
    }
    public function getRawMaterial()
    {
        return $this->belongsTo(RawMaterialName::class, 'damagable_id', 'id');
    }

    public function productionBatch()
    {
        return $this->belongsTo(ProductionBatch::class);
    }

}
