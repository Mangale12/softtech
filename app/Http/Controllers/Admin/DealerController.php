<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dealer;
use App\Models\Udhyog;
use Illuminate\Support\Str;
use App\Models\InventoryProduct;
use App\Models\Unit;
use App\Models\Billing;
use App\Models\Transaction;
use App\Models\ProductionBatch;
use Carbon\Carbon;
use DB;
class DealerController extends DM_BaseController
{
    protected $panel = 'Dealer';
    protected $base_route = 'admin.inventory.dealers';
    protected $view_path = 'admin.dealers';
    protected $model;
    protected $table;
    protected $billing;

    public function __construct(Dealer $model,Billing $billing)
    {
        $this->model = $model;
        $this->billing = $billing;
        $this->middleware('permission:view Dealer')->only(['index', 'show']);
        $this->middleware('permission:create Dealer')->only(['create', 'store']);
        $this->middleware('permission:edit Dealer')->only(['edit', 'update']);
        $this->middleware('permission:delete Dealer')->only('destroy');
    }

    public function index(Request $request)
    {
        if($request->has('udhyog')){
            $udhyogName = $request->udhyog;
            $udhyog = Udhyog::where('name', $udhyogName)->first();
            if($udhyog){
                $data['udhyog'] = $udhyog;
                $this->base_route = 'admin.udhyog.'.Str::lower(Str::replace(' ', '', $udhyog->name)).'.inventory.dealers';
                return view(parent::loadView($this->view_path . '.index'), compact('data'));

            }else{
                session()->flash('alert-warning', 'उद्योग फेला परेन ।');
                return back();
            }
        }else{
            session()->flash('alert-warning', 'उद्योग फेला परेन ।');
            return back();
        }
    }

    public function datatables(Request $request)
    {
        $udhyogName = $request->udhyog; // Fetch parameter from request

        $query = $this->model::with('udhyog'); // Ensure the udhyog relationship is loaded

        // Apply filtering based on udhyogName if provided
        if (!empty($udhyogName)) {
            $query->whereHas('udhyog', function($q) use ($udhyogName) {
                $q->where('name', $udhyogName);
            });
        }
        $udhyogName = Str::lower(Str::replace(' ', '', $udhyogName));
        $_base_route = 'admin.udhyog.'.$udhyogName.'.inventory.dealers';
        return datatables()->of($query)
            ->addColumn('action', function ($row) use ($_base_route, $udhyogName) {
                return view('admin.dealers.action_buttons', compact('row', '_base_route', 'udhyogName'))->render();
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    public function create()
    {
        return view(parent::loadView($this->view_path . '.create'));
    }

    public function store(Request $request)
    {
        $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->storeData($request, $request->all())) {
            session()->flash('alert-success', 'डिलर सिर्जना गरियो ।');
        } else {
            session()->flash('alert-danger', 'डिलर सिर्जना हुन सकेन ।');
        }
        if($request->has('udhyog')){
            if($request->input('udhyog')!=null){
                $udhyogDetails = Udhyog::where('name',$request->input('udhyog'))->first();
                if($udhyogDetails!=null){
                    $redirectUrl = 'admin/udhyog/'.Str::lower(Str::replace(' ', '', $udhyogDetails->name)).'/inventory/dealers?udhyog='.$udhyogDetails->name;
                    return redirect($redirectUrl);
                }


            }
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function edit($id)
    {
        $data['row'] = $this->model::where('id', '=', $id)->firstOrFail();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->model->getRules($id), $this->model->getMessage());
        if ($this->model->updateData($request, $id, $request->all())) {
            session()->flash('alert-success', 'डिलर अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'डिलर अध्यावधिक हुन सकेन ।');
        }
        if($request->has('udhyog')){
            if($request->input('udhyog')!=null){
                $udhyogDetails = Udhyog::where('id',$request->input('udhyog'))->first();
                $redirectUrl = 'admin/udhyog/'.Str::lower(Str::replace(' ', '', $udhyogDetails->name)).'/inventory/dealers?udhyog='.$udhyogDetails->name;
                return redirect($redirectUrl);

            }
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function view($id){
        $this->base_route  = 'admin.transactions';
        $dealer = Dealer::findOrFail($id);
        $data['rows'] = $dealer->account;
        // dd($data);
        $data['dealer'] = $dealer;
        return view(parent::loadView($this->view_path.".view"), compact('data'));
    }

    function orders(Request $request, $id){
        // dd($id);
        $data['dealer'] = Dealer::findOrFail($id);
        // dd($data);
        $data['products'] = null;
        $data['units'] = Unit::get();
        if($request->has('udhyog')){
            $udhyogName = $request->udhyog;
            $udhyog = Udhyog::where('name', $udhyogName)->first();
            if($udhyog){
                $data['udhyog'] = $udhyog;
                // $this->base_route = 'admin.udhyog.achar.inventory.sales_orders';
                $data['products'] = InventoryProduct::where('udhyog_id', $udhyog->id)->get();
                $data['dealers'] = Dealer::where('udhyog_id', $udhyog->id)->get();
                $currentDate = date('Y-m-d');
                //conver English date to Nepali date   // Thaman 2078-01-01
                $today = Carbon::today()->toDateString(); // Get today's date
                $nepaliCurentDate = getNepToEng(datenepUnicode($today, 'nepali'));
                $data['production_batch'] = ProductionBatch::where(function($query) use ($nepaliCurentDate) {
                                            $query->where(DB::raw("STR_TO_DATE(expiry_date, '%Y/%m/%d')"), '>', str_replace('/', '-', $nepaliCurentDate))
                                                ->orWhere(DB::raw("STR_TO_DATE(expiry_date, '%Y-%m-%d')"), '>', $nepaliCurentDate);
                                        })
                                        ->whereNotNull('inventory_product_id')->with('inventoryProduct')
                                        ->where('stock_quantity', '>', 0)
                                        ->where('udhyog_id', $udhyog->id)
                                        ->get();
                $data['nep_date_unicode']  = datenepUnicode($currentDate, 'nepali');
                return view(parent::loadView($this->view_path.'.orders'),compact('data'));
            }else{
                session()->flash('alert-success', 'उद्योग फेला परेन ।');
                return back();
            }
        }

    }
    public function destroy(Request $request, $id)
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

    function bill($transaction_key){
        $data['row'] = Transaction::where('transaction_key', $transaction_key)
                         ->with(['rawMaterials','supplier','dealer'])
                        ->firstOrFail();
        // dd($data['row']->rawMaterials);

        $data['udhyog']        = $this->billing->getUdhyog();
        $data['unit']          = $this->billing->getUnit();
        $data['bill_no']       = $this->billing->getBillNo();
        $currentDate           = date('Y-m-d');
        //conver English date to Nepali date   // Thaman 2078-01-01
        $data['nep_date_unicode']  = datenepUnicode($currentDate, 'nepali');
        return view(parent::loadView('admin.account.bill_dealer'), compact('data', 'currentDate'));

    }
}
