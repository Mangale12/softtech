<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    use HasFactory;

    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'sales_orders';
    protected $id;
    protected $prefix_path_image = '/upload_file/sales_orders/';

    protected $fillable = [
        'dealer_id',
        'payment_status',
        'total_amount',
        'order_status',
        'order_date',
    ];
    public function __construct()
    {

        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }
    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(10);
    }
    public function storeData($request, $requestData)
    {
        try {
            $data                                    = new SalesOrder;
            $data->product_id                        = $requestData['product_id'];
            $data->dealer_id                         = $requestData['dealer_id'];
            $data->total_amount                      = $requestData['total_amount'];
            $data->order_date                        = $requestData['order_date'];
            $data->payment_status                    = 0;
            $data->order_status                      = 0;
            $salesOrder = $data->save();
            if($salesOrder->order_status == 1){
                $inventoryProduct = InventoryProduct::where('id',$requestData['product_id'])->first();
                $inventoryProduct->decrement($requestData['total_amount']);
                $inventoryProduct->save();
            }
            return true;
        } catch (HttpResponseException $e) {
            return false;
        }
    }

    public function updateData($request, $id, $requestData){
        try {
            $data                               = SalesOrder::findOrFail($id);
            $data->dealer_id                         = $requestData['dealer_id'];
            $data->total_amount                      = $requestData['total_amount'];
            $data->order_date                        = $requestData['order_date'];
            $data->payment_status                    = 0;
            $data->order_status                      = 0;
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return false;
        }
    }

    function getRules($id = null){
        return [
            'dealer_id'             => 'required',
            // 'mobile'                => 'required|digits:10|unique:worker_lists,mobile',
            'total_amount'                => 'required',
            'order_date'               => 'required',
        ];
    }

    public function getMessage()
    {
        return [
            'dealer_id.required' => 'डिलरको नाम  आवश्यक छ !!',
            'total_amount.required' => 'जम्मा मात्रा आवश्यक छ !!',
            'order_date.required' => 'अर्डर मिति आवश्यक छ !!',
        ];
    }

    function dealer(){
        return $this->belongsTo(Dealer::class);
    }

    public function items()
    {
        return $this->hasMany(SalesOrderItem::class, 'sales_order_id', 'id');
    }
}
