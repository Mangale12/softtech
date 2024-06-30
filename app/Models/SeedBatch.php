<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Validation\Rule;

class SeedBatch extends Model
{
    use HasFactory;
    protected $fillable = [
        'batch_no',
        'seed_id',
        'unit_id',
        'quantity_produced',
        'manufacturing_date',
        'expiry_date',
        'season_id',
        'land_area',
        'stock_quantity',
        'unit_price',
        // 'unit_price',
    ];

    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(10);
    }

    function getRules($id = null){
        $uniqueRule = Rule::unique($this->getTable());

        if ($id) {
            $uniqueRule->ignore($id);
        }
        return [
            'batch_no'             => [
                                        'required',
                                        $uniqueRule,
                                    ],
            // 'mobile'                => 'required|digits:10|unique:worker_lists,mobile',
            'seed_id'                => 'required',
            'unit_id'               => 'required',
            'quantity_produced'     => 'required|numeric',
            'manufacturing_date'  => 'required',
            'expiry_date'   =>  'required',
            'season_id' => 'required',
            'land_area'  => 'required',

        ];
    }

    public function getMessage()
    {
        return [
            // 'name.required' => 'आवश्यक छ'
            // 'name.'
            'seed_id.required' => 'बिउ नाम आवश्यक छ !!',
            'unit_id.required' => 'एकाइ आवश्यक छ !!',
            'quantity_produced.required' => 'मात्रा आवश्यक छ !!',
            'manufacturing_date.required' => 'निर्माण मिति आवश्यक छ !!',
            'expiry_date.required' => 'म्याद सकिने मिति आवश्यक छ !!',
            'season_id.required' => 'सिजन आवश्यक छ !!',
            'land_area.required'  => 'भूमि क्षेत्र आवश्यक छ !!',
        ];
    }

    function seed(){
        return $this->belongsTo(Seed::class, 'seed_id', 'id');
    }
    function salesOrderItem(){
        return $this->hasMany(SalesOrderItem::class, 'seed_batch_id');
    }
    function unit(){
        return $this->belongsTo(Unit::class);
    }
    function seedBatchProduct(){
        return $this->hasMany(SeedBatchProduction::class, 'seed_batch_id', 'id');
    }
    function seedBatchMal(){
        return $this->hasMany(SeedBatchMal::class, 'seed_batch_id');
    }

    function seedBatchWorker(){
        return $this->hasMany(SeedBatchWorker::class, 'seed_batch_id');
    }

    function seedBatchMachinery(){
        return $this->hasMany(SeedBatchMachine::class, 'seed_batch_id');
    }
    function product(){
        return $this->belongsTo(InventoryProduct::class, 'seed_id');
    }
    function inventoryProduct(){
        return $this->belongsTo(InventoryProduct::class, 'seed_id');
    }

    function sellItem(){
        return $this->hasMany(SalesOrderItem::class, 'seed_batch_id');
    }
    public function khadhyanna()
    {
        return $this->hasMany(Khadhyanna::class, 'seed_batch_id');
    }
    public function getUseridName($user_id)
    {
        dd($user_id);
    }
    public function getUnit()
    {
        $data = DB::table('units')
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function getBlock()
    {
        $data = DB::table('blocks')
            ->orderBy('id', 'DESC')->where('status', 1)
            ->get();
        return $data;
    }

    public function getFiscal()
    {
        $data = DB::table('fiscals')->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function getBiubijan()
    {
        $data = DB::table('biu_bijans')->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function getWorker()
    {
        $udhyog = Udhyog::where('name', 'hybrid biu')->first();
        $data = DB::table('worker_lists')
            ->orderBy('id', 'DESC')
            ->where('udhyog_id', $udhyog->id)
            ->get();
        return $data;
    }
    public function getApplicant()
    {
        $data = DB::table('users')
            ->where('status', 1)
            ->where('role', 'user')
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function workerTypes()
    {
        $data = DB::table('worker_types')
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function Mesinary()
    {
        $data = DB::table('mesinaries')
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function getRitu()
    {
        $data = DB::table('ritus')
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function getMonth()
    {
        $data = DB::table('state_months')
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function getMal()
    {
        $data = DB::table('mal_bibrans')
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function getAgriCategory()
    {
        $data = DB::table('agriculture_categories')
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function AnudaanCategory()
    {
        return $this->belongsTo(AnudaanCategory::class, 'category_id');
    }

    public function getBlockId()
    {
        return $this->belongsTo(Block::class, 'block_id');
    }

    public function fiscalYear()
    {
        return $this->belongsTo(Fiscal::class, 'fiscal_year');
    }
    public function generalProfile()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    public function getLand()
    {
        return $this->belongsTo(LandList::class, 'land_id');
    }
    public function landDetail()
    {
        return $this->belongsTo(GeneralLand::class, 'land_id');
    }
    public function rituType()
    {
        return $this->belongsTo(Ritu::class, 'ritu_id');
    }
    public function startMonth()
    {
        return $this->belongsTo(Month::class, 'start_month_id');
    }
    public function endMonth()
    {
        return $this->belongsTo(Month::class, 'end_month_id');
    }
    public function baaliName()
    {
        return $this->belongsTo(Agriculture::class, 'baali');
    }
    public function baaliCategory()
    {
        return $this->belongsTo(AgricultureCategory::class, 'baali_cat');
    }

    public function getAddedBy()
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    public function farm(){
        return $this->hasOne(Farm::class, 'seed_batch_id','id');
    }

    public function otherMaterial(){
        return $this->hasMany(SeedBatchOtherMaterial::class, 'seed_batch_id');
    }
    /**
     * / Custom message for validation
     */
}
