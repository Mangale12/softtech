<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'start_date',
        'end_date'
    ];
    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(10);
    }

    function getRules($id = null){
        return [
            'name'                      => 'required',
            'start_date'                => 'required',
            'end_date'                  => 'required',
        ];
    }

    public function getMessage()
    {
        return [
            'name.required' => 'नाम आवश्यक छ !!',
            'start_date.required' => 'मिति आवश्यक छ !!',
            'end_date.required' => 'मिति आवश्यक छ !!',
        ];
    }

}
