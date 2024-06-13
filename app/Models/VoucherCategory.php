<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherCategory extends Model
{
    use HasFactory;

    protected $fillable = ['title','status'];

    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(5);
    }
}
