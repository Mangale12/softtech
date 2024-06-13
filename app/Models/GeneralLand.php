<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralLand extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'unique_id', 'general_parent_id', 'kita_no', 'permanent_state', 'permanent_district', 'permanent_palika', 'permanent_ward', 'ekai_id', 'totalbigaha', 'totalkattha', 'totaldhur', 'totalropani', 'totalaana', 'totalpaisa', 'totaldam'];

}
