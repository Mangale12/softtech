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
    public function storeData($request, $date, $voucher_type, $lekha_shirshak, $bhoucher_no, $fiscal, $remarks, $status=null,$total_dr, $total_cr, $title, $dr, $cr,$voucher_name,$udhyog=null)
    {
        try {
            $data                               = new Voucher;
            $data->date                         = $date;
            $data->voucher_type                 = $voucher_type;
            $data->lekha_shirshak               = $lekha_shirshak;
            $data->bhoucher_no                  = $bhoucher_no;
            $data->fiscal                       = $fiscal;
            $data->remarks                      = $remarks;
            $data->total_dr                     = $total_dr;
            $data->total_cr                     = $total_cr;
            $data->lekha_shirshak	            = $lekha_shirshak;
            $data->voucher_name                 = $voucher_name;
            $data->udhyog_id                    = $udhyog;
            $data->status                       = 1;
            $voucher = $data->save();
            // dd($voucher->id);
            if ($voucher) {
                foreach($dr as $key => $debit){
                    if($debit){
                        $voucherDrCr = new VoucherDrCr();  // Create a new instance inside the loop
                        $voucherDrCr->title = $title[$key];
                        $voucherDrCr->dr = $debit;
                        $voucherDrCr->cr = 0;
                        $voucherDrCr->voucher_id = $data->id;  // Use $data->id if $data is the voucher instance
                        $voucherDrCr->save();
                    }

                }

                foreach($cr as $key => $credit){
                    if($credit > 0){
                        $voucherDrCr = new VoucherDrCr();  // Create a new instance inside the loop
                        $voucherDrCr->dr = 0;
                        $voucherDrCr->cr = $credit;
                        $voucherDrCr->title = $title[$key];
                        $voucherDrCr->voucher_id = $data->id;  // Use $data->id if $data is the voucher instance
                        $voucherDrCr->save();
                    }

                }
            } else {
                // Handle the error when the voucher save fails
                throw new Exception("Failed to save voucher.");
            }
            return true;
        } catch (HttpResponseException $e) {
            return false;
        }
    }

    public function getRules()
    {
        $rules = array(
            'date' => 'required',
            'voucher_type' => 'required',
            'account_type' => 'required',
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


