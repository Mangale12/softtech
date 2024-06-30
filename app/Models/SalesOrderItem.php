<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class SalesOrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'sales_order_id',
        'inventory_product_id',
        'quantity',
        'quantity',
        'unit_price',
        'is_complete',
        'unit_id',
        'production_batch_id',
        'total_cost',
        'transaction_id',
        'seed_batch_id',
        'khadhyanna_id',
    ];
    public static function sumTotalCostBySeedBatch($batch_id)
    {
        return self::select('production_batch_id', DB::raw('SUM(total_cost) as total_cost_sum'))
            ->where('production_batch_id', $batch_id)
            ->groupBy('production_batch_id')
            ->first();
    }
    public function salesOrder()
    {
        return $this->belongsTo(SalesOrder::class,'sales_order_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(InventoryProduct::class, 'inventory_product_id', 'id');
    }
    public function unit(){
        return $this->belongsTo(Unit::class);
    }
    function productionBatch(){
        return $this->belongsTo(ProductionBatch::class, 'production_batch_id');
    }
    function seedBatch(){
        return $this->belongsTo(SeedBatch::class, 'seed_batch_id');
    }

    function khadhyanna(){
        return $this->belongsTo(Khadhyanna::class, 'khadhyanna_id');
    }
}
