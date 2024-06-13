<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Udhyog extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','status'
    ];

    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(10);
    }

    public function getRules()
    {
        $rules = array(
            'name'       => 'required|string|max:225|min:2',
            'status'      => 'required|boolean'

        );
        return $rules;
    }

    /**
     * / Custom message for validation
     */
    public function getMessage()
    {
        $rules = array(
            'name.required'                          => 'बालीनाली प्रकार अनिवार्य छ ।',
        );
        return $rules;
    }


}
