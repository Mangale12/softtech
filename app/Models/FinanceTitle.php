<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinanceTitle extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status'];
    public function voucharDrCrs()
    {
        return $this->hasMany(VoucherDrCr::class, 'title', 'id');
    }
}
