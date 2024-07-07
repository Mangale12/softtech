<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\User;
use App\Models\Billing;
use App\Models\BillingDetail;
use Illuminate\Http\Request;
use PDF;

class BillingController extends DM_BaseController
{
    protected $panel = 'Billing List';
    protected $base_route = 'admin.billing';
    protected $view_path = 'admin.billing';
    protected $model;
    protected $billingDetail;
    protected $table;

    public function __construct(Billing $model, BillingDetail $billingDetail)
    {
        $this->model = $model;
        $this->billingDetail = $billingDetail;
        $this->middleware('permission:view Billing', ['only' => ['index']]);
        $this->middleware('permission:create Billing', ['only' => ['create','store']]);
        $this->middleware('permission:edit Billing', ['only' => ['edit','update']]);
        $this->middleware('permission:delete Billing', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $data['rows'] =  $this->model->getData();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        $data['udhyog']        = $this->model->getUdhyog();
        $data['unit']          = $this->model->getUnit();
        $data['bill_no']       = $this->model->getBillNo();
        $currentDate           = date('Y-m-d');
        //conver English date to Nepali date   // Thaman 2078-01-01
        $data['nep_date_unicode']  = datenepUnicode($currentDate, 'nepali');
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->storeData($request, $request->bill_no, $request->date, $request->full_name, $request->address, $request->phone, $request->complete_status, $request->remarks, $request->udhyog_id, $request->product_id, $request->unit_id, $request->quantity, $request->price,$request->transaction_id, $request->discount, $request->taxable_amount, $request->total_amount)) {
            session()->flash('alert-success', 'बिलिंग बिबरण अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'बिलिंग बिबरण अध्यावधिक हुन सकेन ।');
        }
        return redirect()->route($this->base_route . '.index');
    }
    public function edit($id)
    {
        $data['udhyog']        = $this->model->getUdhyog();
        $data['unit']          = $this->model->getUnit();
        $data['bill_no']       = $this->model->getBillNo();
        $data['rows']          = $this->model::where('id', '=', $id)->firstOrFail();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }
    public function update(Request $request, $id)
    {
        // $request->validate($this->model->getRules(), $this->model->getMessage());
        $this->model = $this->model->findOrFail($id);
        $data = $request->all();
        $this->model->fill($data);
        $success =  $this->model->save();
        if ($success) {
            session()->flash('alert-success', 'आर्थिक बर्ष अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'आर्थिक बर्ष अध्यावधिक हुन सकेन ।');
        }
        return redirect()->route($this->base_route . '.index');
    }
    public function destroy(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);
        if (!$data) {
            $request->session()->flash('success_message', $this->panel . 'does not exists.');
            return redirect()->route($this->base_route);
        }
        $data->destroy($id);
        return response()->json($data);
    }

    public function view($id)
    {
        $data['rows'] = $this->model::where('id', '=', $id)->firstOrFail();
        $data['settings'] = $this->model->getSettings();
        // $data['detail'] = $this->billingDetail::where('billing_id', '=', $id)->get();
        return view(parent::loadView($this->view_path . '.view'), compact('data'));
    }
    public function viewDealer($id)
    {
        $data['rows'] = $this->model::where('id', '=', $id)->firstOrFail();
        $data['settings'] = $this->model->getSettings();
        // $data['detail'] = $this->billingDetail::where('billing_id', '=', $id)->get();
        return view(parent::loadView($this->view_path . '.view_dealer'), compact('data'));
    }

    public function downloadPDF($id)
    {
        $data['rows'] = $this->model::where('id', '=', $id)->firstOrFail();
        $data['detail'] = $this->billingDetail::where('billing_id', '=', $id)->get();
        $pdf = PDF::loadView($this->view_path . '.view', $data)
            ->setPaper('a4', 'portrait');
        return $pdf->download($this->view_path . '.view');
    }
}
