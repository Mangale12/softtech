<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\HttpResponseException;

class AnimalCategory extends DM_BaseModel
{
    use HasFactory;

    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(15);
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
            'title.required'                          => 'पशुपन्छी प्रकार अनिवार्य छ ।',
        );
        return $rules;
    }
    public function storeData(Request $request, $title, $status)
    {
        // dd($ritu,$status);
        try {
            $data =                      new AnimalCategory;
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
            $data                        = AnimalCategory::findOrFail($id);
            $data->title                 = $title;
            $data->status                = $status;
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }
}
