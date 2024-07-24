<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\VoucherCategory;
use App\Models\VoucherDrCr;

class Voucher extends Model
{
    use HasFactory;

    public function getbhoucherNo()
    {
        $data = $this->orderBy('id', 'DESC')->first();
        if ($data) {
            return $data->id + 1;
        } else {
            return 1;
        }
    }

    public function getLekhaSirshak()
    {
        return DB::table('lekha_sirsaks')->get();
    }

    public function getFiscal()
    {
        return DB::table('fiscals')->orderBy('id','ASC')->where('status',1)->get();
    }

    public function getVoucherType()
    {
        return DB::table('voucher_categories')->orderBy('id','ASC')->where('status',1)->get();
    }
    public function voucherType()
    {
        return $this->belongsTo(VoucherCategory::class, 'voucher_type', 'id');
    }
    public function filscalYear()
    {
        return $this->belongsTo(Fiscal::class, 'fiscal', 'id');
    }
    public function lekhaShirsak()
    {
        return $this->belongsTo(LekhaSirsak::class, 'lekha_shirshak', 'id');
    }

    public function drcrReport()
    {
        return $this->hasMany(VoucherDrCr::class, 'voucher_id', 'id');
    }

    public function storeData($request, $date, $voucher_type, $bhoucher_no, $remarks, $status=null,$total_dr, $total_cr, $title, $dr, $cr,$udhyog=null, $description)
    {
        DB::beginTransaction();
    try {
        $udhyog = Udhyog::where('name',$udhyog)->first();
        $data = new Voucher;
        $data->date = $date;
        $data->voucher_type = $voucher_type;
        $data->remarks = $remarks;
        $data->total_dr = $total_dr;
        $data->total_cr = $total_cr;
        $data->udhyog_id = $udhyog->id;
        $data->status = $status ?? 1;

        if ($data->save()) {
            foreach ($dr as $key => $debit) {

                if ($debit > 0  && isset($title[$key])) {
                    $voucherDrCr = new VoucherDrCr();
                    $voucherDrCr->title = $title[$key];
                    $voucherDrCr->dr = $debit;
                    $voucherDrCr->cr = 0;
                    $voucherDrCr->voucher_id = $data->id;
                    $voucherDrCr->udhyog_id = $udhyog->id;
                    $voucherDrCr->voucher_type = $voucher_type;
                    $voucherDrCr->description = $description;
                    $voucherDrCr->save();
                }
            }

            foreach ($cr as $key => $credit) {
                if ($credit > 0  && isset($title[$key])) {
                    $voucherDrCr = new VoucherDrCr();
                    $voucherDrCr->dr = 0;
                    $voucherDrCr->cr = $credit;
                    $voucherDrCr->title = $title[$key];
                    $voucherDrCr->voucher_id = $data->id;
                    $voucherDrCr->udhyog_id = $udhyog->id;
                    $voucherDrCr->voucher_type = $voucher_type;
                    $voucherDrCr->description = $description;
                    $voucherDrCr->save();
                }
            }

            DB::commit();
            return true;
        } else {
            throw new Exception("Failed to save voucher.");
        }
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
            // Log the exception message
            // Log::error('Error saving voucher: ' . $e->getMessage());
            return false;
        }
    }

    public function getRules()
    {
        $rules = array(
            'date' => 'required',
            'voucher_type' => 'required',
            // 'account_type' => 'required',
            'bhoucher_name' => 'required',
            'fiscal' => 'required',
            'lekha_shirshak' => 'required',
            'total_debit' => 'required',
            'total_credit' => 'required',

        );
        return $rules;
    }

    /**
     * / Custom message for validation
     */
    public function getMessage()
    {
        $rules = array(
            'voucher_type.required'                          => 'भौचर प्रकार अनिवार्य छ ।',
            // 'account_type.required'                          => ' अनिवार्य छ ।',
            'bhoucher_name.required'                         => 'नाम अनिवार्य छ ।',
            'fiscal.required'                                => 'आर्थिक वर्ष अनिवार्य छ ।',
            'lekha_shirshak.required'                        => 'लेखा शीर्षक अनिवार्य छ ।',
            'total_debit.required'                           => 'कुल डेबिट अनिवार्य छ ।',
            'total_credit.required'                          => 'कुल क्रेडिट अनिवार्य छ ।',
        );
        return $rules;
    }

}


