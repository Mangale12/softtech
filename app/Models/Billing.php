<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    public function AddebBy()
    {
        return $this->belongsTo(User::class, 'added_by', 'id');
    }
    public function getBillNo()
    {
        $data = $this->orderBy('id', 'DESC')->first();
        if ($data) {
            return $data->id + 1;
        } else {
            return 1;
        }
    }

    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(10);
    }

    public function getUnit()
    {
        return Unit::get();
    }

    public function getRules()
    {
        $rules = array(
            'full_name'       => 'required|string|max:225|min:2',

        );
        return $rules;
    }

    public function getUdhyog()
    {
        return Udhyog::where('status', '=', 1)->get();
    }

    /**
     * / Custom message for validation
     */
    public function getMessage()
    {
        $rules = array(
            'full_name.required'                          => 'पुरा नाम अनिवार्य छ ।',
        );
        return $rules;
    }

    public function getUnitCategory()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
    public function storeData($request, $bill_no, $date, $full_name, $address, $phone, $complete_status, $remarks, $udhyog_id, $product_id, $unit_id, $quantity, $price, $transaction_id, $discount, $taxable_amount, $total_amount)
    {
        $model                  = new Billing();
        $model->bill_no         = $bill_no;
        $model->date            = $date;
        $model->full_name       = $full_name;
        $model->address         = $address;
        $model->phone           = $phone;
        $model->complete_status = $complete_status;
        $model->remarks         = $remarks;
        $model->added_by        = auth()->user()->id;
        $model->transaction_id  = $transaction_id;
        $model->discount        = $discount;
        $model->taxable_amount  = $taxable_amount;
        $model->total_amount    = $total_amount;
        $model->save();

        // $this->storeBillingDetails($request, $model->id, $udhyog_id, $product_id, $unit_id, $quantity, $price);
        return $model;
    }

    public function storeBillingDetails($request, $billing_id, $udhyog_id, $product_id, $unit_id, $quantity, $price)
    {
        for ($i = 0; $i < count($udhyog_id); $i++) {
            $billingDetail                      = new BillingDetail();
            $billingDetail->billing_id          = $billing_id;
            $billingDetail->udhyog_id           = $udhyog_id[$i];
            $billingDetail->product_id          = $product_id[$i];
            $billingDetail->unit_id             = $unit_id[$i];
            $billingDetail->quantity            = $quantity[$i];
            $billingDetail->price               = $price[$i];
            $billingDetail->total               = $quantity[$i] * $price[$i];
            $billingDetail->save();
        }
    }

    public function transaction(){
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }

    public function getSettings(){
        return Setting::first();
    }
}
