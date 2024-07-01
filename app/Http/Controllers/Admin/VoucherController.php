<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\VoucherDrCr;

class VoucherController extends DM_BaseController
{
    protected $panel = 'Voucher';
    protected $base_route = 'admin.voucher';
    protected $view_path = 'admin.voucher';
    protected $model;
    public function __construct(Voucher $model)
    {
        $this->model = $model;
        $this->middleware('permission:view Voucher')->only(['index', 'show']);
        $this->middleware('permission:create Voucher')->only(['index', 'show']);
        $this->middleware('permission:edit Voucher')->only(['edit', 'update']);
        $this->middleware('permission:delete Voucher')->only('destroy');
    }
    public function index()
    {
        $data['vouchers'] = Voucher::with('voucherType')->get();
        $data['lekha_shirsak'] = Voucher::with('lekhaShirsak')->get();
        return view(parent::loadView($this->view_path . '.index'),compact('data'));
    }

    public function create()
    {
        $currentDate = date('Y-m-d');
        //conver English date to Nepali date   // Thaman 2078-01-01
        $data['nep_date_unicode']  = datenepUnicode($currentDate, 'nepali');
        $data['get_sirshak']       = $this->model->getLekhaSirshak();
        $data['bhoucher_no']       = $this->model->getbhoucherNo();
        $data['fiscal']            = $this->model->getFiscal();
        $data['voucher_type']      = $this->model->getVoucherType();
        $data['lekha_shirshak']    = $this->model->getLekhaSirshak();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }

    public function store(Request $request)
    {
        // $request->validate($this->model->getRules(),$this->model->getMessage());

        // dd($request->all());
        $this->model->storeData($request, $request->date, $request->voucher_type, $request->lekha_shirshak, $request->bhoucher_no, $request->fiscal, $request->remarks, $request->status,$request->total_debit,$request->total_credit,$request->title, $request->dr, $request->cr, $request->bhoucher_name);
        return redirect()->route($this->base_route . '.index')->with('success', 'Voucher created successfully');
    }

    public function viewReport($id){
        $voucher = Voucher::findOrFail($id);
         // Retrieve the debit and credit details with financeTitle relationship
         $data['dr_cr_details'] = VoucherDrCr::where('voucher_id', $voucher->id)
                                            ->with('financeTitle')
                                            ->get();

        // Calculate the sum of debits and credits for the specific voucher
        $data['dr_cr_sum'] = VoucherDrCr::where('voucher_id', $voucher->id)
        ->select(
        'voucher_id',
        DB::raw('SUM(dr) as dr_total'),
        DB::raw('SUM(cr) as cr_total')
        )
        ->groupBy('voucher_id')
        ->first();
        $data['voucher'] = $voucher;
        // dd($data['dr_cr_details'][0]->financeTitle);
        return view(parent::loadView($this->view_path . '.report'), compact('data'));

    }

    public function destroy($id)
    {
        $data = $this->model->findOrFail($id);
        if (!$data) {
            $request->session()->flash('success_message', $this->panel . 'does not exists.');
            return redirect()->route($this->base_route);
        }
        $data->destroy($id);
        // return redirect()->back()->with('success_message', 'Worker Deleted Successfully !!');
        return response()->json($data);
    }
}
