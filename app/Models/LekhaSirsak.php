<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LekhaSirsak extends Model
{
    use HasFactory;

    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(5);
    }
}
