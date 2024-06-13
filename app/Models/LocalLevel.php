<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalLevel extends DM_BaseModel
{
    use HasFactory;
    public function district_info(){
        return $this->hasOne('App\Models\District','dist_id','dist_id');
    }
    public function get_provience(){
        return $this->hasOne('App\Models\LocalLevel','local_id','province_id');
    }

    public function getLocalLevel($dist_id){
        return $this->where('new_dist_id',$dist_id)->orderBy('new_local_id','ASC')->get();
    }

    public function getLocalLevels($dist_id){
        return $this->whereIn('dist_id',$dist_id)->orderBy('dist_id','ASC')->get();
    }
    protected $fillable=['local_level_id','govt_level_id','province_id','new_province_id','local_govt_type_id','local_id','local_name','local_name_eng','ward','dist_id'];
}
