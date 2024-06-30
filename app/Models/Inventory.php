<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = ['raw_material_id', 'seed_id', 'stock_quantity', 'last_updated'];

    public function rawMaterial()
    {
        return $this->belongsTo(RawMaterialName::class);
    }

    function seed(){
        return $this->belongsTo(Seed::class, 'seed_id');
    }
}
