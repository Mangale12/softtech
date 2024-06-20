<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['sales_order_id', 'inventory_product_id', 'quantity'];

    public function salesOrder()
    {
        return $this->belongsTo(SalesOrder::class,'sales_order_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(InventoryProduct::class, 'inventory_product_id', 'id');
    }
    public function unit(){
        return $this->belongsTo(Unit::class);
    }
}
