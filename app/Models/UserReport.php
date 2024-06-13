<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserReport extends Model
{
    use HasFactory;

    public function getFiscalyear()
    {
        return DB::table('fiscals')->where('status', 1)->get();
    }

    public function getLand()
    {
        return DB::table('general_lands')->get();
    }

    public function getBaali()
    {
        return DB::table('agricultures')->where('status', 1)->get();
    }
}
