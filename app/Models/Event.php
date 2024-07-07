<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'location',
        'sponsor_details',
        'organizer_details',
        'coordination_organization',
        'price',
        'participation_details',
        'description',
    ];

    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(10);
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
            'title.required'                          => 'बालीनाली प्रकार अनिवार्य छ ।',
        );
        return $rules;
    }

    public function storeData($request, $requestData)
    {
        try {
            $data                               = new Event;
            $data->name                         =   $requestData['title'];
            $data->description                  =  $requestData['description'];
            $data->end_date                     =   $requestData['end_date'];
            $data->start_date                   =   $requestData['start_date'];
            $data->location                     =   $requestData['location'];
            $data->sponsor_details              =   $requestData['sponsor_details'];
            $data->organizer_details            =   $requestData['organizer_details'];
            $data->coordination_organization    =   $requestData['coordination_organization'];
            $data->price                        =   $requestData['price'];
            $data->participation_details        =  $requestData['participation_details'];
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return false;
        }
    }

    public function updateData($request, $id, $requestData){
        try {
            $data                               = Event::findOrFail($id);
            $data->name                         =   $requestData['title'];
            $data->description                  =  $requestData['description'];
            $data->end_date                     =   $requestData['end_date'];
            $data->start_date                   =   $requestData['start_date'];
            $data->location                     =   $requestData['location'];
            $data->sponsor_details              =   $requestData['sponsor_details'];
            $data->organizer_details            =   $requestData['organizer_details'];
            $data->coordination_organization    =   $requestData['coordination_organization'];
            $data->price                        =   $requestData['price'];
            $data->participation_details        =  $requestData['participation_details'];
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return false;
        }
    }
}
