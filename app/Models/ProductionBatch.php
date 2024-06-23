<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class ProductionBatch extends DM_BaseModel
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
        'inventory_product_id',
        'production_date',
        'quantity_produced',
        'raw_materials_used',
        'expiry_date',
        'batch_no',
    ];

    protected $casts = [
        'raw_materials_used' => 'array',
    ];

    public function __construct()
    {

        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }

    public function inventoryProduct()
    {
        return $this->belongsTo(InventoryProduct::class);
    }

    public function getProductionBatchNo()
    {
        $data = ProductionBatch::orderBy('id', 'DESC')->first();

        if ($data) {

            return $data['id'] + 1;
        } else {
            return 1;
        }
    }

    public static function boot()
    {
        parent::boot();
        //auto inrcrement atch no
        static::creating(function ($productionBatch) {
            $maxBatchNo = self::where('inventory_product_id', $productionBatch->inventory_product_id)->max('batch_no');
            $productionBatch->batch_no = $maxBatchNo ? $maxBatchNo + 1 : 1;
        });

        static::created(function ($productionBatch) {
            $product = $productionBatch->product;
            $product->decrementRawMaterials($productionBatch->raw_materials_used);
        });
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
        return [
            'product_id'             => 'required',
            // 'mobile'                => 'required|digits:10|unique:worker_lists,mobile',
            'production_date'                => 'required',
            'expiry_date'               => 'required',
            'quantity_produced'                => 'required|numeric',
            'batch_no' => 'required|unique:production_batches,batch_no,' . $id,
        ];
    }

    public function getMessage()
    {
        return [
            'product_id.required' => 'उत्पादन आवश्यक छ !!',
            'production_date.required' => 'उत्पादन मिति आवश्यक छ !!',
            'expiry_date.required' => 'म्याद सकिने मिति आवश्यक छ !!',
            'quantity_produced.required' => 'उत्पादन भएको मात्रा आवश्यक छ !!',
            'batch_no.required'  =>  'यो फिल्ड आवश्यक छ !!',
            'batch_no.unique'  =>  'ब्याच नम्बर अद्वितीय हुनुपर्छ !!',
        ];
    }


    // public function rawMaterials()
    // {
    //     return $this->belongsToMany(RawMaterial::class, 'production_batch_raw_materials')
    //                 ->withPivot('quantity'); // if you have a pivot table with additional attributes like quantity
    // }

    public function product()
    {
        return $this->belongsTo(InventoryProduct::class);
    }

    // public function rawMaterials()
    // {
    //     return $this->belongsToMany(RawMaterial::class, 'production_batch_raw_materials')->withPivot('quantity');
    // }

    function rawMaterials(){
        return $this->hasMany(ProductionBatchRawMaterial::class,'production_batch_id', 'id');
    }
    public function rawMaterialsUsed($id = null){
        // return $this->id;
        return DB::table('production_batch_raw_materials')->where('production_batch_id', $id)->count();
    }

    public function damages()
    {
        return $this->hasMany(DamageRecord::class);
    }

    public function worker_list(){
        return $this->hasMany(ProductionBatchWorkerList::class);
    }
}
