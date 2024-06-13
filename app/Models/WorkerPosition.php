<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkerPosition extends Model
{
    use HasFactory;
    public $fillable = ['worker_id', 'salary', 'position', 'bhatta','udhyog_id'];

    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(10);
    }

    public function getWorkerTypes()
    {
        $data = DB::table('worker_types')->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }

    // Relation with WorkerType
    public function WorkerTypes()
    {
        return $this->belongsTo(WorkerTypes::class, 'worker_id', 'id');
    }

    public function getRules()
    {
        $rules = array(
            'position'       => 'required|string|max:225|min:2',

        );
        return $rules;
    }

    /**
     * / Custom message for validation
     */
    public function getMessage()
    {
        $rules = array(
            'worker_id.required'                          => 'कामदार पद अनिवार्य छ ।',
        );
        return $rules;
    }
    public function storeData(Request $request, $addmore, $udhyog_id=null)
    {
        try {
            $data =                       new WorkerPosition;
            foreach ($request->addmore as $key => $value) {
                $value['udhyog_id']=$udhyog_id;
                // dd($value);
                WorkerPosition::create($value);
            }
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }

    public function updateData(Request $request, $id, $worker_id, $positioin, $salary, $bhatta)
    {
        try {
            $data                           = WorkerPosition::findOrFail($id);
            $data->worker_id                = $worker_id;
            $data->position                 = $positioin;
            $data->salary                   = $salary;
            $data->bhatta                   = $bhatta;
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }
}
