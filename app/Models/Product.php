<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'udhyog_id',
        'status'
    ];

    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(10);
    }

    public function udhyogCategory()
    {
        return $this->belongsTo(Udhyog::class, 'udhyog_id'); 
    }

    public function getUdhyog()
    {
        $data = Udhyog::orderBy('id', 'DESC')->where('status', 1)->get();
        return $data;
    }
}
