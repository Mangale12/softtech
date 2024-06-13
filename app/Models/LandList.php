<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandList extends Model
{
    use HasFactory;

    public function getProvince()
    {
        return $this->belongsTo('App\Models\Provinces', 'permanent_state', 'id');
    }
    public function getDistrict()
    {
        return $this->belongsTo('App\Models\District', 'permanent_district', 'id');
    }
    public function getPalika()
    {
        return $this->belongsTo('App\Models\Palika', 'permanent_palika', 'id');
    }
}
