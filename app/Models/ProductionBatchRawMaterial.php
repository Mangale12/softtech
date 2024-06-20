<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionBatchRawMaterial extends Model
{
    use HasFactory;

    public function productionBatch()
    {
        return $this->belongsTo(ProductionBatch::class);
    }

    public function rawMaterial()
    {
        return $this->belongsTo(RawMaterialName::class, 'raw_material_id', 'id');
    }

    function unit(){
        return  $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    function supplier(){
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
}
