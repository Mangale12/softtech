<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeedBatchProduction extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'seed_batch_id',
        'seed_id',
    ];

    function seed(){
        return $this->belongsTo(Seed::class);
    }
}
