<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fiscal extends DM_BaseModel
{
    use HasFactory;
    protected $fillable = ['fiscal_np','fiscal_en','status','added_by'];


    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(5);
    }

    public function getRules()
    {
        $rules = array(
            'fiscal_np'       => 'required|string|max:225|min:2',
            'fiscal_en'       => 'required|string|max:225|min:2',
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
            'title.required'                          => 'बालीनाली प्रकार अनिवार्य छ ।',
        );
        return $rules;
    }
    public function storeData(Request $request, $title, $status)
    {
        // dd($ritu,$status);
        try {
            $data =                      new AgricultureCategory;
            $data->title                 = $title;
            $data->status                = $status;
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }

    public function updateData(Request $request, $id, $title,  $status)
    {
        try {
            $data                        = AgricultureCategory::findOrFail($id);
            $data->title                 = $title;
            $data->status                = $status;
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }
}
