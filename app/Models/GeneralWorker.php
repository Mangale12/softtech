<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralWorker extends Model
{
    use HasFactory;
    protected $fillable = ['unique_id', 'general_parent_id', 'user_id', 'full_name','mobile','gender','	worker_types','	time','salary_type','salary'];

}
