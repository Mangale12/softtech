<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class SeedBatchMal extends Model
{
    use HasFactory;
    protected $fillable = [
        'seed_batch_id',
        'unit_id',
        'quantity',
        'unit_price',
        'mal_id',
        'total_cost',
    ];
    public static function sumTotalCostBySeedBatch($seed_batch_id)
    {
        return self::select('seed_batch_id', DB::raw('SUM(total_cost) as total_cost_sum'))
            ->where('seed_batch_id', $seed_batch_id)
            ->groupBy('seed_batch_id')
            ->first();
    }
    function unit(){
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    function mal(){
        return $this->belongsTo(MalBibran::class, 'mal_id');
    }
}
