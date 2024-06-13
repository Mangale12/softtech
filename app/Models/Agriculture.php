<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\DB;

class Agriculture extends Model
{
    use HasFactory;

    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(5);
    }
    public function getAgricultureCategory()
    {
        $data = DB::table('agriculture_categories')->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }

    public function postCategory()
    {
        return $this->belongsTo(AgricultureCategory::class, 'agricultural_id');
    }

    public function getRules()
    {
        $rules = array(
            'agricultural_id'       => 'required|string|max:225|min:1',
            // 'title'          => 'required|string|max:225|min:2',
            'status'         => 'required|boolean'

        );
        return $rules;
    }

    /**
     * / Custom message for validation
     */
    public function getMessage()
    {
        $rules = array(
            'agricultural_id.required'                          => 'बालीनाली प्रकार अनिवार्य छ ।',
        );
        return $rules;
    }
    public function storeData(Request $request, $agricultural_id, $title, $status)
    {
        // dd($agricultural_id, $title, $status);
        try {
            $data =                                 new Agriculture;
            $data->agricultural_id                 = $agricultural_id;
            $data->title                           = $title;
            $data->status                          = $status;
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }

    public function updateData(Request $request, $id, $title,  $status)
    {
        try {
            $data                        = Animal::findOrFail($id);
            $data->title                 = $title;
            $data->status                = $status;
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }
}
