<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends DM_BaseModel
{
    use HasFactory;
    protected $fillable=['dist_id','dist_name','dist_name_eng','province_id','new_dist_id','new_province_id'];

    public function getDistrict($prov_id)
    {
        return $this->where('new_province_id', $prov_id)->orderBy('new_dist_id', 'ASC')->get();
    }

}
