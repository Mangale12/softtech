<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionBatchWorkerList extends Model
{
    use HasFactory;
    protected $fillable = ['production_batch_id', 'worker_list_id', 'hours_worked', 'days_worked'];

    function workerDetails(){
        return $this->belongsTo(WorkerList::class, 'worker_list_id', 'id');
    }
}
