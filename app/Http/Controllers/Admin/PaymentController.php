<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Transaction;
class PaymentController extends DM_BaseController
{
    protected $panel = 'Payment';
    protected $base_route = 'admin.payment';
    protected $view_path = 'admin.payment';
    protected $model;
    protected $table;

    public function __construct(Payment $model)
    {
        $this->model = $model;
        // $this->middleware('permission:view worker')->only(['index', 'show']);
        // $this->middleware('permission:create worker')->only(['create', 'store']);
        // $this->middleware('permission:edit worker')->only(['edit', 'update']);
        // $this->middleware('permission:delete worker')->only('destroy');
    }

    public function index($transaction_key){
        // dd($transaction_key);
        // $transaction = Transaction::where('transaction_key', $transaction_key)->firstOrFail();
        $transaction = Transaction::where('transaction_key', $transaction_key)->firstOrFail();
        // dd($transaction);
        $data['rows'] = $transaction->payment;
        // dd($data);
        $data['transaction'] = $transaction;
        return view(parent::loadView($this->view_path.'.index'),compact('data', 'transaction'));
    }

    public function create($transaction_key){
        $transaction = Transaction::where('transaction_key',$transaction_key)->firstOrFail();
        return view(parent::loadView($this->view_path.'.create'), compact('transaction'));
    }

    public function store(Request $request){
        $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->storeData($request, $request->all())) {
            session()->flash('alert-success', 'अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'अध्यावधिक हुन सकेन ।');
        }

        return redirect()->back();
    }

    public function edit($id){
        $data['row'] = $this->model::findOrFail($id);
        return view(parent::loadView($this->view_path.'.edit'), compact('data'));
    }

    public function update(Request $request, $id){
        $data = $this->model->findOrFail($id);
        if ($this->model->updateData($request, $id, $request->all())) {
            session()->flash('alert-success', 'अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'अध्यावधिक हुन सकेन ।');
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


}
