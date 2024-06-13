<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anudann;
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



    public function __construct(Request $request, User $user, Anudann $anudann, Talim $talim, GeneralProfile $profile, Farm $farm, InventoryLandCategory $inventoryLandCategory, InventoryStoreCategory $inventoryStoreCategory, InventoryEquipmentCategory $inventoryEquipmentCategory, InventoryIrrigationCategory $inventoryIrrigationCategory, InventoryFuelCategory $inventoryFuelCategory, Udhyog $udhyog)
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

        $data['udhyog'] = $this->udhyog->count();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
}
