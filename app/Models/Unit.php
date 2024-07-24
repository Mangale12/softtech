<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'code'];


    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(5);
    }

    public function getRules($id = null)
    {
        $rules = array(
            'name'       => 'required|string|max:225|min:2|unique:units,name,' . $id,
            // 'code'      => 'required|boolean'

        );
        return $rules;
    }
    public function getMessage()
    {
        $rules = array(
            'name.required'       => 'शीर्षक आवश्यक छ',
            'name.unique' => 'नाम पहिले नै लिइसकेको छ।',

        );
        return $rules;
    }
}
