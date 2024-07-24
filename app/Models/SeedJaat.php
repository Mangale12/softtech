<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeedJaat extends Model
{
    use HasFactory;
    protected $fillable = [
        'jaat',
        'status',
    ];

    function getData() {
        return SeedJaat::paginate(10);
    }
}
