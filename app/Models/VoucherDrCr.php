<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherDrCr extends Model
{
    use HasFactory;
    protected $fillable = ['dr', 'cr','voecher_id'];
    // function voucher(){
    //     return $this->hasMany(Voucher::class, 'lekhashirshak', 'id');
    // }

    public static function sumDr()
    {
        return self::sum('dr');
    }

    // Define a method to get the sum of 'cr' column
    public static function sumCr()
    {
        return self::sum('cr');
    }
}
