<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'supplier';
    protected $id;
    protected $fillable = [
        'supplier_id',
        'dealer_id',
        // 'transaction_type',
        'details',
        'transaction_date',
        'total_amount',
        'paid_amount',
        'remaining_amount',
        'transaction_key',
        'type',
        'udhyog_id'
    ];

    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(10);
    }
    public function storeData($request, $requestData)
    {
        try {
            $data                               = new Transaction;
            $data->supplier_id                  = $requestData['supplier_id'];
            $data->dealer_id                    = $requestData['dealer_id'];
            $data->transaction_type             = $requestData['dealer_id'];
            $data->details                      = $requestData['details'];
            $data->payment_method               = $requestData['payment_method'];
            $data->total_amount                 = $requestData['total_amount'];
            $data->paid_amount                  = $requestData['paid_amount'];
            $data->remaining_amount             = $requestData['remaining_amount'];
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return false;
        }
    }

    public function updateData($request, $id, $full_name, $mobile, $email, $address, $contactor_name, $contactor_phone){
        try {
            $data                          = Supplier::findOrFail($id);
            $data->supplier_id                  = $requestData['supplier_id'];
            $data->dealer_id                    = $requestData['dealer_id'];
            $data->transaction_type             = $requestData['dealer_id'];
            $data->details                      = $requestData['details'];
            $data->payment_method               = $requestData['payment_method'];
            $data->total_amount                 = $requestData['total_amount'];
            $data->paid_amount                  = $requestData['paid_amount'];
            $data->remaining_amount             = $requestData['remaining_amount'];
            $data->update();
            return true;
        } catch (HttpResponseException $e) {
            return false;
        }
    }

    function getRules($id = null){
        return [
            'transaction_type'          => 'required',
            'payment_method'            => 'required',
            'total_amount'              => 'required|float',
        ];
    }

    public function getMessage()
{
    return [
        'transaction_type.required' => 'यो क्षेत्र अनिवार्य छ !!',
        'total_amount.required' => 'यो क्षेत्र अनिवार्य छ !!',
        'payment_method.required' => 'यो क्षेत्र अनिवार्य छ !!',
    ];
}

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
    public function dealer(){
        return $this->belongsTo(Dealer::class, 'dealer_id');
    }
    public function rawMaterials(){
        return $this->hasMany(RawMaterial::class, 'transaction_id');
    }

    function sales_order(){
        return $this->hasMany(SalesOrderItem::class, 'transaction_id');
    }

    public function payment(){
        return $this->hasMany(Payment::class, 'transaction_id');
    }

}
