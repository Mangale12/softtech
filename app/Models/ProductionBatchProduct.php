<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionBatchProduct extends Model
{
    use HasFactory;
    protected $fillable = ['inventory_product_id','quantity_produced','production_batch_id'];

    function productionBatch(){
        return $this->belongsTo(ProductionBatch::class, 'production_batch_id', 'id');
    }
}
