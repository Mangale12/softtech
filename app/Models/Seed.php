<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seed extends Model
{
    use HasFactory;
    protected $fillable = ['seed_name', 'seed_type_id', 'description', 'status', 'cost', 'unit'];
    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(5);
    }

    public function getRules()
    {
        $rules = array(
            'title'       => 'required|string|max:225|min:2',
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
            'title.required'                          => 'नाम अनिवार्य छ ।',
        );
        return $rules;
    }
    public function storeData(Request $request, $title, $anudaan, $price, $qty,$status)
    {
        try {
            $data =                           new BiuBijan();
            $data->title                      = $title;
            $data->price                      = $price;
            $data->qty                        = $qty;
            $data->anudaan                    = $anudaan;
            $data->status                     = $status;
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }


    public function updateData(Request $request, $id,$title, $anudaan, $price, $qty,$status )
    {
        try {
            $data                             = BiuBijan::findOrFail($id);
            $data->title                      = $title;
            $data->price                      = $price;
            $data->qty                        = $qty;
            $data->anudaan                   = $anudaan;
            $data->status                     = $status;
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }

    function seedType(){
        return $this->belongsTo(SeedType::class);
    }

    function unitName(){
        return $this->belongsTo(Unit::class, 'unit', 'id');
    }
}
