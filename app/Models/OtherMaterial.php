<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherMaterial extends Model
{
    use HasFactory;

    function getData(){
        return OtherMaterial::paginate(10);
    }

    function storeData($requast, $requastData){
        try {
            $data = new OtherMaterial();
            $data->name = $requastData['name'];
            $data->status = $requastData['status'];
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
            $data = OtherMaterial::find($id);
            $data->name = $requastData['name'];
            $data->status = $requastData['status'];
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
            'name'       => 'required|string|max:225|min:2',
            // 'status'      => 'required|boolean'

        );
        return $rules;
    }

    /**
     * / Custom message for validation
     */
    public function getMessage()
    {
        $rules = array(
            'name.required'                          => 'अनिवार्य छ ।',
        );
        return $rules;
    }
}
