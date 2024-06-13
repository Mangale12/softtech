<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\DB;

class Farm extends Model
{
    use HasFactory;

    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(10);
    }
    public function getUseridName($user_id)
    {
        dd($user_id);
    }
    public function getUnit()
    {
        $data = DB::table('units')
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function getBlock()
    {
        $data = DB::table('blocks')
            ->orderBy('id', 'DESC')->where('status', 1)
            ->get();
        return $data;
    }

    public function getFiscal()
    {
        $data = DB::table('fiscals')->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function getBiubijan()
    {
        $data = DB::table('biu_bijans')->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function getWorker()
    {
        $data = DB::table('worker_lists')
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function getApplicant()
    {
        $data = DB::table('users')
            ->where('status', 1)
            ->where('role', 'user')
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function workerTypes()
    {
        $data = DB::table('worker_types')
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function Mesinary()
    {
        $data = DB::table('mesinaries')
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function getRitu()
    {
        $data = DB::table('ritus')
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function getMonth()
    {
        $data = DB::table('state_months')
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function getMal()
    {
        $data = DB::table('mal_bibrans')
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function getAgriCategory()
    {
        $data = DB::table('agriculture_categories')
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function AnudaanCategory()
    {
        return $this->belongsTo(AnudaanCategory::class, 'category_id');
    }

    public function getBlockId()
    {
        return $this->belongsTo(Block::class, 'block_id');
    }

    public function fiscalYear()
    {
        return $this->belongsTo(Fiscal::class, 'fiscal_year');
    }
    public function generalProfile()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    public function getLand()
    {
        return $this->belongsTo(LandList::class, 'land_id');
    }
    public function landDetail()
    {
        return $this->belongsTo(GeneralLand::class, 'land_id');
    }
    public function rituType()
    {
        return $this->belongsTo(Ritu::class, 'ritu_id');
    }
    public function startMonth()
    {
        return $this->belongsTo(Month::class, 'start_month_id');
    }
    public function endMonth()
    {
        return $this->belongsTo(Month::class, 'end_month_id');
    }
    public function baaliName()
    {
        return $this->belongsTo(Agriculture::class, 'baali');
    }
    public function baaliCategory()
    {
        return $this->belongsTo(AgricultureCategory::class, 'baali_cat');
    }

    public function getAddedBy()
    {
        return $this->belongsTo(User::class, 'added_by');
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
    public function storeData(Request $request, $category_id, $title, $amount, $bibran, $times, $criteria, $status)
    {
        try {
            $data =                            new Anudann();
            $data->category_id                  = $category_id;
            $data->title                        = $title;
            $data->amount                       = $amount;
            $data->bibran                       = $bibran;
            $data->times                        = $times;
            $data->criteria                     = $criteria;
            $data->status                       = $status;
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }

    public function updateData(Request $request, $id, $category_id, $title, $amount, $bibran, $times, $criteria, $status)
    {
        try {
            $data                               = Anudann::findOrFail($id);
            $data->category_id                  = $category_id;
            $data->title                        = $title;
            $data->amount                       = $amount;
            $data->bibran                       = $bibran;
            $data->times                        = $times;
            $data->criteria                     = $criteria;
            $data->status                       = $status;
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }
}
