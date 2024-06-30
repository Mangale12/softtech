<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class SeedBatchWorker extends Model
{
    use HasFactory;
    protected $fillable = [
        'seed_batch_id',
        'worker_id',
        'worked_day',
        'worked_hour',
        'wages_per_hour',
        'total_wages',
    ];
    public static function sumTotalCostBySeedBatch($seed_batch_id)
    {
        return self::select('seed_batch_id', DB::raw('SUM(total_wages) as total_cost_sum'))
            ->where('seed_batch_id', $seed_batch_id)
            ->groupBy('seed_batch_id')
            ->first();
    }
    function seedBatch(){
        return $this->belongsTo(SeedBatch::class, 'seed_batch_id');
    }

    function workerDetails(){
        return $this->belongsTo(WorkerList::class, 'worker_id');
    }
}
