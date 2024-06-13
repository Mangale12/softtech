<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\HttpResponseException;


class Sangrachana extends DM_BaseModel
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
    public function storeData(Request $request, $types, $bottom, $length, $width, $area, $made_date, $type_of_makeup, $use_of, $user, $remarks, $status)
    {
        try {
            $data =                           new Sangrachana();
            $data->types                      = $types;
            $data->bottom                     = $bottom;
            $data->length                     = $length;
            $data->width                      = $width;
            $data->area                       = $area;
            $data->made_date                  = $made_date;
            $data->type_of_makeup             = $type_of_makeup;
            $data->use_of                     = $use_of;
            $data->user                       = $user;
            $data->remarks                    = $remarks;
            $data->status                     = $status;
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }


    public function updateData(Request $request, $id,$types, $bottom, $length, $width, $area, $made_date, $type_of_makeup, $use_of, $user, $remarks, $status)
    {
        try {
            $data                             = Sangrachana::findOrFail($id);
            $data->types                      = $types;
            $data->bottom                     = $bottom;
            $data->length                     = $length;
            $data->width                      = $width;
            $data->area                       = $area;
            $data->made_date                  = $made_date;
            $data->type_of_makeup             = $type_of_makeup;
            $data->use_of                     = $use_of;
            $data->user                       = $user;
            $data->remarks                    = $remarks;
            $data->status                     = $status;            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }
}
