<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class SeedBatchProduction extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'seed_batch_id',
        'seed_id',
        'seed_type_id',
        'unit_id',
        'unit_price',
        'total_cost',
    ];
 // Method to sum total_cost grouped by seed_batch_id
    public static function sumTotalCostBySeedBatch($seed_batch_id)
    {
        return self::select('seed_batch_id', DB::raw('SUM(total_cost) as total_cost_sum'))
            ->where('seed_batch_id', $seed_batch_id)
            ->groupBy('seed_batch_id')
            ->first();
    }

    function seed(){
        return $this->belongsTo(Seed::class);
    }

    function seedType(){
        return $this->belongsTo(SeedType::class, 'seed_type_id');
    }

    function unit(){
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
