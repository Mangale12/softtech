<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Udhyog;
use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Models\Billing;
class SupplierController extends DM_BaseController
{
    protected $panel = 'Supplier';
    protected $base_route = 'admin.inventory.suppliers';
    protected $view_path = 'admin.suppliers';
    protected $model;
    protected $table;
    protected $billing;


    public function __construct(Supplier $model, Billing $billing)
    {
        $this->model = $model;
        $this->billing = $billing;
        $this->middleware('permission:view Supplier')->only(['index', 'show']);
        $this->middleware('permission:create Supplier')->only(['create', 'store']);
        $this->middleware('permission:edit Supplier')->only(['edit', 'update']);
        $this->middleware('permission:delete Supplier')->only('destroy');
    }

    public function index(Request $request)
    {
        $data['rows'] =  $this->model->getData();
        if($request->has('udhyog')){
            $udhyogName = $request->udhyog;
            $udhyog = Udhyog::where('name', $udhyogName)->first();
            if($udhyog){
                $data['udhyog'] = $udhyog;
                $this->base_route = 'admin.udhyog.'.strtolower(str_replace(' ', '', $udhyog->name)).'.inventory.suppliers';
                return view(parent::loadView($this->view_path . '.index'),compact('data'));
            }else{
                session()->flash('alert-warning', 'उद्योग फेला परेन ।');
                return back();
            }
        }

    }

    public function datatables(Request $request)
    {
        $udhyogName = $request->udhyog; // Fetch parameter from request

        $query = Supplier::with('udhyog'); // Ensure the udhyog relationship is loaded

        // Apply filtering based on udhyogName if provided
        if (!empty($udhyogName)) {
            $query->whereHas('udhyog', function($q) use ($udhyogName) {
                $q->where('name', $udhyogName);
            });
        }

        $_base_route = 'admin.udhyog.'.strtolower(str_replace(' ', '', $udhyogName)).'.inventory.suppliers';
        return datatables()->of($query)
            ->addColumn('action', function ($row) use ($_base_route, $udhyogName) {
                return view('admin.section.buttons.action-buttons', compact('row', '_base_route', 'udhyogName'))->render();
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    public function create(Request $request)
    {
        $udhyogName = $request->udhyog;
        $udhyog = Udhyog::where('name', $udhyogName)->firstOrFail();
        return view(parent::loadView($this->view_path . '.create'), compact('udhyog'));
    }

    public function store(Request $request)
    {
        $request->validate($this->model->getRules(), $this->model->getMessage());

        if($request->has('udhyog')){
            if($request->input('udhyog')!=null){
                $udhyogDetails = Udhyog::where('name',$request->input('udhyog'))->first();
                if($udhyogDetails!=null){
                    if ($this->model->storeData($request, $request->name, $request->phone, $request->email, $request->address, $request->contactor_name, $request->contactor_phone, $request->udhyog)) {
                        session()->flash('alert-success', 'कामदार पद अध्यावधिक भयो ।');
                    } else {
                        session()->flash('alert-danger', 'कामदार पद अध्यावधिक हुन सकेन ।');
                    }
                    $redirectUrl = 'admin/udhyog/'.Str::lower(Str::replace(' ', '', $udhyogDetails->name)).'/inventory/suppliers?udhyog='.$udhyogDetails->name;
                    return redirect($redirectUrl);
                }
            }else{
                session()->flash('alert-warning', 'उद्योग फेला परेन ।');
                return back();
            }
        }else{
            session()->flash('alert-warning', 'उद्योग फेला परेन ।');
            return back();
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
        if ($this->model->updateData($request, $id, $request->name, $request->phone, $request->email, $request->address,$request->contactor_name, $request->contactor_phone)) {
            session()->flash('alert-success', 'अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'कामदार अध्यावधिक हुन सकेन ।');
        }
        if($request->has('udhyog')){
            if($request->input('udhyog')!=null){
                $udhyogDetails = Udhyog::where('id',$request->input('udhyog'))->first();
                $redirectUrl = 'admin/udhyog/'.Str::lower(Str::replace(' ', '', $udhyogDetails->name)).'/inventory/suppliers?udhyog='.$udhyogDetails->name;
                return redirect($redirectUrl);

            }else{
                session()->flash('alert-warning', 'उद्योग फेला परेन ।');
                return back();
            }
        }else{
            session()->flash('alert-warning', 'उद्योग फेला परेन ।');
            return back();
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function view($id){
        $supplier = $this->model->findOrFail($id);
        $data['row'] = $supplier->account;
        $data['supplier'] = $supplier;
        // dd($data['row']);
        $this->base_route = 'admin.transactions';
        return view(parent::loadView($this->view_path.'.view'), compact('data'));
    }
    public function view_details($id){
        $data['row'] = $this->model->findOrFail($id);
        return view(parent::loadView($this->view_path.'.view_details'), compact('data'));
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
        return view(parent::loadView('admin.account.bill'), compact('data', 'currentDate'));

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
}
