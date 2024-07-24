<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'head_code', 'head_name', 'parent_id', 'head_level', 'head_type',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function childrens()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function isLeaf()
    {
        return !$this->children()->exists();
    }

    public function children()
    {
        return $this->hasMany(AccountCategory::class, 'parent_id');
    }
}
