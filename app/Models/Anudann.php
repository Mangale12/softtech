<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\DB;

class Anudann extends DM_BaseModel
{
    use HasFactory;

    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(5);
    }

    public function getAnudaanCategory()
    {
        $data = DB::table('anudaan_categories')->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function AnudaanCategory()
    {
        return $this->belongsTo(AnudaanCategory::class, 'category_id');
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
    public function storeData(Request $request, $category_id, $title, $amount, $bibran, $times, $criteria, $daatrinikay_sahayog, $status)
    {

        try {
            $data =                            new Anudann();
            $data->category_id                  = $category_id;
            $data->title                        = $title;
            $data->amount                       = $amount;
            $data->bibran                       = $bibran;
            $data->times                        = $times;
            $data->criteria                     = $criteria;
            $data->daatrinikay_sahayog          = $daatrinikay_sahayog;
            $data->status                       = $status;
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }

    public function updateData(Request $request, $id, $category_id, $title, $amount, $bibran, $times, $criteria, $daatrinikay_sahayog, $status)
    {
        try {
            $data                               = Anudann::findOrFail($id);
            $data->category_id                  = $category_id;
            $data->title                        = $title;
            $data->amount                       = $amount;
            $data->bibran                       = $bibran;
            $data->times                        = $times;
            $data->criteria                     = $criteria;
            $data->daatrinikay_sahayog          = $daatrinikay_sahayog;
            $data->status                       = $status;
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }
}
