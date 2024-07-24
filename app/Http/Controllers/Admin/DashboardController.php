<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anudann;
use Carbon\Carbon;
use App\Models\Farm;
use App\Models\GeneralProfile;
use App\Models\InventoryEquipmentCategory;
use App\Models\InventoryFuelCategory;
use App\Models\InventoryIrrigationCategory;
use App\Models\InventoryLandCategory;
use App\Models\InventoryStoreCategory;
use App\Models\Talim;
use App\Models\Udhyog;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\PartnerOrganization;
use App\Models\Transaction;
use App\Models\InventoryProduct;
use App\Models\ProductionBatch;
class DashboardController extends DM_BaseController
{
    protected $panel = 'Dashboard';
    protected $base_route = '';
    protected $view_path = 'admin.';
    protected $user;
    protected $anudann;
    protected $talim;
    protected $profile;
    protected $farm;
    protected $inventoryLandCategory;
    protected $inventoryStoreCategory;
    protected $inventoryEquipmentCategory;
    protected $inventoryIrrigationCategory;
    protected $inventoryFuelCategory;
    protected $udhyog;
    protected $program;
    protected $parter_organization;



    public function __construct(Request $request, User $user, Anudann $anudann, Talim $talim, GeneralProfile $profile, Farm $farm, InventoryLandCategory $inventoryLandCategory, InventoryStoreCategory $inventoryStoreCategory, InventoryEquipmentCategory $inventoryEquipmentCategory, InventoryIrrigationCategory $inventoryIrrigationCategory, InventoryFuelCategory $inventoryFuelCategory, Udhyog $udhyog, Event $program, PartnerOrganization $parter_organization)
    {
        $this->user = $user;
        $this->anudann = $anudann;
        $this->talim = $talim;
        $this->profile = $profile;
        $this->farm = $farm;

        $this->inventoryLandCategory = $inventoryLandCategory;
        $this->inventoryStoreCategory = $inventoryStoreCategory;
        $this->inventoryEquipmentCategory = $inventoryEquipmentCategory;
        $this->inventoryIrrigationCategory = $inventoryIrrigationCategory;
        $this->inventoryFuelCategory = $inventoryFuelCategory;
        $this->udhyog = $udhyog;
        $this->program = $program;
        $this->parter_organization;

    }

    public function index()
    {
        // dd("dashboard");
        $data['count_user'] = $this->user->where('role', 'user')->count();
        $data['count_admin'] = $this->user->where('role', 'admin')->count();
        $data['count_anudann'] = $this->anudann->count();
        $data['total_talim'] = $this->talim->count();
        $data['profile'] = $this->profile->count();
        $data['farm']  = $this->farm->count();

        $data['inventoryLandCategory'] = $this->inventoryLandCategory->count();
        $data['inventoryStoreCategory'] = $this->inventoryStoreCategory->count();
        $data['inventoryEquipmentCategory'] = $this->inventoryEquipmentCategory->count();
        $data['inventoryIrrigationCategory'] = $this->inventoryIrrigationCategory->count();
        $data['inventoryFuelCategory'] = $this->inventoryFuelCategory->count();
        $data['udhyog'] = $this->udhyog->count();
        $data['program'] = $this->program->count();
        // dd(PartnerOrganization::get());
        $data['parter_organization'] = PartnerOrganization::count();
        $currentYear = Carbon::now()->year;
        $currentYear = getCurrentYear(Carbon::createFromDate($currentYear), 'nepali');
        $startOfYear = $currentYear.'/01/01';
        $endOfYear   = $currentYear.'/12/31';

        $data['transaction'] = Transaction::where('type', 'sales')
                                // ->whereRaw("STR_TO_DATE(`transaction_date`, '%Y/%m/%d') BETWEEN ? AND ?", ['2081/01/01', '2081/12/31'])
                                ->where(function ($query) {
                                    $query->whereRaw("STR_TO_DATE(`transaction_date`, '%Y-%m-%d') BETWEEN ? AND ?", ['2081-01-01', '2081-12-31'])
                                          ->orWhereRaw("STR_TO_DATE(`transaction_date`, '%Y/%m/%d') BETWEEN ? AND ?", ['2081/01/01', '2081/12/31']);
                                })
                                 ->groupBy('udhyog_id')
                                ->selectRaw('udhyog_id, SUM(total_amount) as total_amount, COUNT(*) as total_transactions') // Customize the aggregation as needed
                                ->get();
        // dd($data['transaction']);
        $productQuery = InventoryProduct::where('stock_quantity', '<=', 10);
        if(!(auth()->user()->hasRole('admin')) && auth()->user()->udhyog_id != null){
            $productQuery = $productQuery->where('udhyog_id', auth()->user()->udhyog_id);
        }
        $data['products'] = $productQuery->get();


        //get expiring prodcut
        $currentDate = Carbon::today();
        $nepaliDate = getNepToEng(datenepUnicode($currentDate->format('Y-m-d'), 'nepali'));
        // dd($nepaliDate);
        $productionBatchesQuery = ProductionBatch::with('inventoryProduct')
                                ->where('stock_quantity', '>', 0)
                                ->where(function ($query) use ($nepaliDate) {
                                    $query->whereRaw("STR_TO_DATE(`expiry_date`, '%Y-%m-%d') > ?", [$nepaliDate])
                                        ->orWhereRaw("STR_TO_DATE(`expiry_date`, '%Y/%m/%d') > ?", [$nepaliDate]);
                                });


        if (!(auth()->user()->hasRole('admin'))) {
            $productionBatchesQuery->where('udhyog_id',auth()->user()->udhyog_id);
        }

        $productionBatches = $productionBatchesQuery->get();
        $expiringProducts = [];

        foreach ($productionBatches as $batch) {
            $productionDate = Carbon::parse(dateeng(str_replace('/', '-', $batch->production_date)));
            $expiryDate = Carbon::parse(dateeng(str_replace('/', '-', $batch->expiry_date)));
            $alertDate = $productionDate->addDays($batch->inventoryProduct->alert_days);
            $daysToExpire = $currentDate->diffInDays(Carbon::parse(dateeng(str_replace('/','-',$batch->expiry_date))));
            if ($alertDate->greaterThanOrEqualTo($currentDate)) {
                $expiringProducts[] = [
                    'product_name' => $batch->inventoryProduct->name,
                    'batch_number' => $batch->batch_no,
                    'expiration_date' => $batch->expiry_date,
                    'stock_quantity' => $batch->stock_quantity,
                    'production_date' => $batch->production_date,
                    'days_to_expiry' => $daysToExpire,
                ];
            }
        }

        $data['expiring_product'] = $expiringProducts;
        // dd($data['expiring_product']);
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
}
