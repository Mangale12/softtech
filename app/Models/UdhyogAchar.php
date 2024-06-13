<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UdhyogAchar extends Model
{
    use HasFactory;
    protected $fillable = [
        'land_category','irrigation_category','fuel_category','equipment_category','store_category'
    ];

    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(10);
    }

    public function getRules()
    {
        $rules = array(
            'name'       => 'required|string|max:225|min:2',
            'status'      => 'required|boolean'

        );
        return $rules;
    }

    /**
     * / Custom message for validation
     */
    public function getMessage()
    {
        $rules = array(
            'name.required'                          => 'बालीनाली प्रकार अनिवार्य छ ।',
        );
        return $rules;
    }

    public function getLandTypes()
    {
        $data = DB::table('inventory_land_categories')
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function getIrrigationTypes()
    {
        $data = DB::table('inventory_irrigation_categories')
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function getFuelTypes()
    {
        $data = DB::table('inventory_fuel_categories')
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function getEquipmentTypes()
    {
        $data = DB::table('inventory_equipment_categories')
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function getStoreTypes()
    {
        $data = DB::table('inventory_store_categories')
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function getbhoucherNo()
    {
        $data = Voucher::orderBy('id', 'DESC')->first();
        if ($data) {
            return $data->id + 1;
        } else {
            return 1;
        }
    }
    public function getLekhaSirshak()
    {
        return DB::table('lekha_sirsaks')->get();
    }

    public function getFiscal()
    {
        return DB::table('fiscals')->orderBy('id','ASC')->where('status',1)->get();
    }

    public function getVoucherType()
    {
        return DB::table('voucher_categories')->orderBy('id','ASC')->where('status',1)->get();
    }
    public function voucherType()
    {
        return $this->belongsTo(VoucherCategory::class, 'voucher_type', 'id');
    }
    public function filscalYear()
    {
        return $this->belongsTo(Fiscal::class, 'fiscal', 'id');
    }
    public function lekhaShirsak()
    {
        return $this->belongsTo(LekhaSirsak::class, 'lekha_shirshak', 'id');
    }

    public function drcrReport()
    {
        return $this->hasMany(VoucherDrCr::class, 'voucher_id', 'id');
    }
    // store
}
