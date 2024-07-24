<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckEntityAccess
{
    protected $models = [
        'dealer' => \App\Models\Dealer::class,
        'batch' => \App\Models\ProductionBatch::class,
        'product' => \App\Models\InventoryProduct::class,
        'rawmaterial' => \App\Models\RawMaterial::class,
        'rawmaterial_name' => \App\Models\RawMaterialName::class,
        'supplier' => \App\Models\Supplier::class,
        'production_batch' => \App\Models\ProductionBatch::class,
        'fianance' => \App\Models\Voucher::class,
        'damage_record'=>\App\Models\DamageRecord::class,
        'sales_order'=>\App\Models\SalesOrder::class,

        // Add other models here
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $entityType
     * @param  string  $routeParameter
     * @return mixed
     */
    public function handle($request, Closure $next, $entityType, $routeParameter = 'id')
    {
        $user = Auth::user();
        $entityId = $request->route($routeParameter); // Get entity ID from route parameter
        if($user->hasRole('admin') || $user->role_super == 1){
            return $next($request);
        }else{
            if (isset($this->models[$entityType])) {
                $model = $this->models[$entityType];
                $entity = $model::where('id', $entityId)
                                ->where('udhyog_id', $user->udhyog_id) // Assuming the user and entity have udhyog_id field
                                ->first();

                if ($entity) {
                    return $next($request);
                }
            }
        }
        // Optionally, you can return a response or redirect if the user is not authorized
        abort(403, 'माफ गर्नुहोस्, तपाईंलाई यो कार्य गर्न अनुमति छैन।');
    }
}
