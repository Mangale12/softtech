<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khadhyanna extends Model
{
    use HasFactory;
    protected $fillable = [
        'inventory_product_id',
        'seed_batch_id',
        'unit_id',
        'quantity',
        'stock_quantity',
    ];
    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(10);
    }

    public function unit(){
        return $this->belongsTo(Unit::class);
    }
    public function seedBatch(){
        return $this->belongsTo(SeedBatch::class, 'seed_batch_id');
    }
    public function inventoryProduct(){
        return $this->belongsTo(InventoryProduct::class);
    }

    public function salesOrderItems()
    {
        return $this->hasMany(SalesOrderItem::class, 'khadhyanna_id');
    }

}
