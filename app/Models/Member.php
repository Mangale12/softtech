<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Member extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->member_id = self::generateUniqueMemberId();
        });
    }

    private static function generateUniqueMemberId()
    {
        do {
            // Generate a random 8-digit number
            $id = str_pad(mt_rand(0, 99999999), 10, '0', STR_PAD_LEFT);
        } while (self::where('member_id', $id)->exists());

        return $id;
    }
    function user(){
        return $this->belongsTo(User::class);
    }
}
