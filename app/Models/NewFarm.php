<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class NewFarm extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'location'];
    function getData(){
        return NewFarm::paginate(10);
    }

    function storeData($requast, $requastData){
        try {
            $data = new NewFarm();
            $prefix = 'farm_';
            $data->unique_id = $prefix . (string) Str::uuid();
            $data->name = $requastData['name'];
            $data->location = $requastData['location'];
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
            $data = NewFarm::find($id);
            $data->name = $requastData['name'];
            $data->location = $requastData['location'];
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
            'name.required'                          => 'अनिवार्य छ ।',
        );
        return $rules;
    }
}
