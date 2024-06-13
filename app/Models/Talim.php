<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\HttpResponseException;

class Talim extends DM_BaseModel
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
    public function storeData(Request $request, $title, $duration, $total_cost, $start_date, $end_date,  $status, $description, $full_name, $position, $subject, $phone, $email, $organization_name)
    {
        // dd( $title, $duration, $total_cost, $start_date, $end_date,  $status, $description, $full_name, $position, $phone, $email, $organization_name);
        // array-filter:filter-null/boolean-etc
        $full_name = array_filter($request->full_name);
        $position = array_filter($request->position);
        $subject = array_filter($request->subject);
        $phone = array_filter($request->phone);
        $email = array_filter($request->email);
        $organization_name = array_filter($request->organization_name);
        // // array-map:here-null-used-to-place-array-within-array
        $resourceArray = array_map(null, $full_name, $position, $subject, $phone, $email, $organization_name);
        // dd($resourceArray);

        try {
            $data =                           new Talim;
            $data->title                      = $title;
            $data->duration                   = $duration;
            $data->total_cost                 = $total_cost;
            $data->start_date                 = $start_date;
            $data->end_date                   = $end_date;
            $data->status                     = $status;
            $data->description                = $description;
            $data->trainer                    = json_encode($resourceArray);
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }


    public function updateData(Request $request, $id, $title, $duration, $total_cost, $start_date, $end_date,  $status, $description, $full_name, $position, $subject, $phone, $email, $organization_name)
    {
        $full_name = array_filter($request->full_name);
        $position = array_filter($request->position);
        $subject = array_filter($request->subject);
        $phone = array_filter($request->phone);
        $email = array_filter($request->email);
        $organization_name = array_filter($request->organization_name);
        // // array-map:here-null-used-to-place-array-within-array
        $resourceArray = array_map(null, $full_name, $position, $subject, $phone, $email, $organization_name);
        try {
            $data                             = Talim::findOrFail($id);
            $data->title                      = $title;
            $data->duration                   = $duration;
            $data->total_cost                 = $total_cost;
            $data->start_date                 = $start_date;
            $data->end_date                   = $end_date;
            $data->status                     = $status;
            $data->description                = $description;
            $data->trainer                    = json_encode($resourceArray);
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }

    // public function persons()
    // {
    //     return $this->belongsToMany(TrainingPerson::class, 'person_training');
    // }

    public function persons()
    {
        return $this->belongsToMany(TrainingPerson::class, 'person_training')
                    ->withPivot('training_phase_id')
                    ->withTimestamps();
    }

    public function phases()
    {
        return $this->hasMany(TrainingPhase::class);
    }

}
