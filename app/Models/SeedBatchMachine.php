<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class SeedBatchMachine extends Model
{
    use HasFactory;
    protected $fillable = [
        'seed_batch_id',
        'unit_id',
        'unit_price',
        'quantity',
        'mesinari_id',
        'total_cost',
        'details',
    ];
    public static function sumTotalCostBySeedBatch($seed_batch_id)
    {
        return self::select('seed_batch_id', DB::raw('SUM(total_cost) as total_cost_sum'))
            ->where('seed_batch_id', $seed_batch_id)
            ->groupBy('seed_batch_id')
            ->first();
    }
    function seedBatch(){
        return $this->belongsTo(SeedBatch::class, 'seed_batch_id');
    }

    function unit(){
        return $this->belongsTo(Unit::class , 'unit_id');
    }

    function machine(){
        return $this->belongsTo(Mesinary::class, 'mesinari_id');
    }
}
