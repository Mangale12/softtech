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
        return $this->belongsTo(RawMaterial::class);
    }
}
