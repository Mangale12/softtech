<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatriNikai extends DM_BaseModel
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
            'title.required'                          => 'बालीनाली प्रकार अनिवार्य छ ।',
        );
        return $rules;
    }
    public function storeData(Request $request, $name, $address, $phone, $amounts, $help, $product, $quantity, $status)
    {
        try {
            $data =                      new DatriNikai();
            $data->name                  = $name;
            $data->address               = $address;
            $data->phone                 = $phone;
            $data->amounts               = $amounts;
            $data->help                  = $help;
            $data->product               = $product;
            $data->quantity              = $quantity;
            $data->status                = $status;
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }

    public function updateData(Request $request, $id, $name, $address, $phone, $amounts, $help, $product, $quantity, $status)
    {
        try {
            $data                        = DatriNikai::findOrFail($id);
            $data->name                  = $name;
            $data->address               = $address;
            $data->phone                 = $phone;
            $data->amounts               = $amounts;
            $data->help                  = $help;
            $data->product               = $product;
            $data->quantity              = $quantity;
            $data->status                = $status;
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }
}

