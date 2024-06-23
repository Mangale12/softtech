<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Payment extends Model
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
        'transaction_id',
        'amount',
        'payment_method',
        'payment_date',
        'check_clearance_date',
    ];

    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(10);
    }
    public function storeData($request, $requestData)
    {
        try {
            DB::beginTransaction();
            $data                               = new Payment;
            $data->transaction_id                   = $requestData['transaction_id'];
            $data->amount                           = $requestData['amount'];
            $data->payment_method                   = $requestData['payment_method'];
            $data->payment_date                     = $requestData['payment_date'];
            $data->check_clearance_date             = $requestData['check_clearance_date'];
            $data->save();
            $transaction = Transaction::where('id', $requestData['transaction_id'])->first();
            if($transaction){
                $transaction->remaining_amount -= $requestData['amount'];
                $transaction->paid_amount += $requestData['amount'];
                $transaction->save();
                DB::commit();
            }else{
                DB::rollback();
                return false;
            }
            return true;
        } catch (HttpResponseException $e) {
            DB::rollback();
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
            'payment_method'            => 'required',
            'amount'              => 'required|numeric',
            'payment_date' =>'required',
        ];
    }

    public function getMessage()
    {
        return [
            'payment_method.required' => 'यो क्षेत्र अनिवार्य छ !!',
            'amount.required' => 'यो क्षेत्र अनिवार्य छ !!',
            'payment_date.required' => 'यो क्षेत्र अनिवार्य छ !!',
        ];
    }
}
