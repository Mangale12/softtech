<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
    ];

    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(5);
    }

    public function getRules()
    {
        $rules = array(
            'title'       => 'required|string|max:225|min:2',
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
            'title.required'                          => 'बालीनाली प्रकार अनिवार्य छ ।',
        );
        return $rules;
    }

    public function landCategory()
    {
        $data = DB::table('inventory_land_categories')
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }

    public function storeCategory()
    {
        $data = DB::table('inventory_store_categories')
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function equipmentCategory()
    {
        $data = DB::table('inventory_equipment_categories')
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function irrigationCategory()
    {
        $data = DB::table('inventory_irrigation_categories')
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }

    public function feulCategory()
    {
        $data = DB::table('inventory_fuel_categories')
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
}
