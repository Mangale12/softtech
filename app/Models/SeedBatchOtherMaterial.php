<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeedBatchOtherMaterial extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'supplier_id',
        'unit_id',
        'seed_batch_id',
        'unit_price',
        'total_cost',
        'quantity',
        'material_id'
    ];
    public function productionBatch()
    {
        return $this->belongsTo(SeedBatch::class);
    }

    function unit(){
        return  $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    function supplier(){
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
}
