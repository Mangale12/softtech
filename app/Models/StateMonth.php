<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StateMonth extends DM_BaseModel
{
    use HasFactory;

    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(10);
    }

    public function getRules()
    {
        $rules = array(
            'state'          => 'required|string|max:225|min:2',
            // 'district'       => 'required|string|max:225|min:1',
            // 'month'          => 'required|string|max:225|min:2',
            // 'ritu_id'        => 'required|string|max:225|min:1',
            // 'status'         => 'required|boolean'

        );
        return $rules;
    }

    public function getCategory()
    {
        $data = DB::table('ritus')->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }

    /**
     * / Custom message for validation
     */
    public function getMessage()
    {
        $rules = array(
            'state.required'                          => 'प्रदेश  अनिवार्य छ ।',
        );
        return $rules;
    }
    public function storeData(Request $request, $category_id, $month, $status)
    {
    //    dd($category_id, $month, $status);
        try {
            $data =                         new StateMonth();
            $data->category_id              = $category_id;
            $data->month                    = $month;
            $data->status                   = $status;
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }

    public function updateData(Request $request, $id, $category_id, $month, $status)
    {
        try {
            $data                           = StateMonth::findOrFail($id);
            $data->category_id              = $category_id;
            $data->month                    = $month;
            $data->status                   = $status;
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }
}
