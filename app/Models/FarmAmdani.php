<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmAmdani extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'mew_farm_id'];

    function getData(){
        return FarmAmdani::paginate(10);
    }

    function storeData($requast, $requastData){
        try {
            $data = new FarmAmdani();
            $data->title = $requastData['title'];
            $data->new_farm_id = !empty($requastData['new_farm_id']) ? $requastData['new_farm_id'] : null;
            $data->save();
            return true;
        } catch (\Throwable $th) {
            dd($th);
            return false;
        }
    }

    function updateData($requast, $id, $requastData){
        try {
            // dd($requastData);
            $data = FarmAmdani::find($id);
            $data->title = $requastData['title'];
            $data->new_farm_id = $requastData['new_farm_id'];
            $data->save();
            return true;
        } catch (\Throwable $th) {
            dd($th);
            return false;
        }
    }

    public function getRules()
    {
        $rules = array(
            'title'       => 'required|string|max:225|min:2',
            // ''      => 'required|boolean'

        );
        return $rules;
    }

    /**
     * / Custom message for validation
     */
    public function getMessage()
    {
        $rules = array(
            'title.required'                          => 'अनिवार्य छ ।',
        );
        return $rules;
    }

    function farm(){
        return $this->belongsTo(NewFarm::class, 'new_farm_id');
    }

}
