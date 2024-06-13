<?php

namespace App\Models;

use App\Http\Controllers\Admin\DM_BaseController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Report extends DM_BaseController
{
    use HasFactory;

    /**
     * /  fetch all Data
     */
    public function getData()
    {
        return $this->orderBy('id', 'DESC')->where('deleted_at', '=', null)->paginate(10);
    }

    public function getAnudaanCategory()
    {
        $data = DB::table('anudaan_categories')->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }

    public function AnudaanCategory()
    {
        return $this->belongsTo(AnudaanCategory::class, 'category_id');
    }

    public function getAnimalCategory()
    {
        $data = DB::table('animal_categories')->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }

    public function getagriculturalCategory()
    {
        $data = DB::table('agricultures')->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }


    public function fiscalYear()
    {
        return $this->belongsTo(Fiscal::class, 'fiscal_year');
    }
}
