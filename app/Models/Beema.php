<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\HttpResponseException;

class Beema extends DM_BaseModel
{
    use HasFactory;

    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(5);
    }

    public function getBeemaCategory()
    {
        return BeemaCategory::where('status', '=', '1')->get();
    }

    public function BeemaCategory()
    {
        return $this->belongsTo(BeemaCategory::class, 'beema_id', 'id');
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
            'title.required'                          => 'बीमा नाम अनिवार्य छ ।',
        );
        return $rules;
    }
    public function storeData(Request $request, $beema_id, $title, $anudaan, $duration, $total_cost, $area,  $start_date, $end_date, $status)
    {
        // dd($title, $anudaan, $duration, $total_cost, $area, $start_date, $end_date, $status);
        try {
            $data =                           new Beema;
            $data->beema_id                   = $beema_id;
            $data->title                      = $title;
            $data->anudaan                    = $anudaan;
            $data->duration                   = $duration;
            $data->total_cost                 = $total_cost;
            $data->area                       = $area;
            $data->start_date                 = $start_date;
            $data->end_date                   = $end_date;
            $data->status                     = $status;
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }

    public function updateData(Request $request, $id, $beema_id, $title, $anudaan, $duration, $total_cost, $area,  $start_date, $end_date, $status)
    {
        try {
            $data                             = Beema::findOrFail($id);
            $data->beema_id                   = $beema_id;
            $data->title                      = $title;
            $data->anudaan                    = $anudaan;
            $data->duration                   = $duration;
            $data->total_cost                 = $total_cost;
            $data->area                       = $area;
            $data->start_date                 = $start_date;
            $data->end_date                   = $end_date;
            $data->status                     = $status;
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }
}
