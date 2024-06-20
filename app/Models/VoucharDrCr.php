<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucharDrCr extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'voucher_id', 'dr', 'cr'];

    public function financeTitle()
    {
        return $this->belongsTo(FinanceTitle::class, 'title', 'id');
    }
}
