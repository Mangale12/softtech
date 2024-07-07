<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerOrganization extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
        'description',
        'status',
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
            $data                               = new PartnerOrganization;
            $data->name                         = $requestData['name'];
            $data->address                      = $requestData['address'];
            $data->email                        = $requestData['email'];
            $data->phone                   = $requestData['phone'];
            $data->description                  = $requestData['description'];
            $data->status                       = $requestData['status'];
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return false;
        }
    }

    public function updateData($request, $id, $requestData){
        try {
            $data                               = PartnerOrganization::findOrFail($id);
            $data->name                         = $requestData['name'];
            $data->address                      = $requestData['address'];
            $data->email                        = $requestData['email'];
            $data->phone                   = $requestData['phone'];
            $data->description                  = $requestData['description'];
            $data->status                       = $requestData['status'];
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return false;
        }
    }
}
