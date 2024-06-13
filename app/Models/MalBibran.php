<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\HttpResponseException;

class MalBibran extends DM_BaseModel
{
    use HasFactory;

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
    public function storeData(Request $request, $title, $anudaan,$status)
    {
        try {
            $data =                           new MalBibran();
            $data->title                      = $title;
            $data->anudaan                    = $anudaan;
            $data->status                     = $status;
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }


    public function updateData(Request $request, $id,$title, $anudaan,$status )
    {
        try {
            $data                             = MalBibran::findOrFail($id);
            $data->title                      = $title;
            $data->anudaan                   = $anudaan;
            $data->status                     = $status;
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }
}
