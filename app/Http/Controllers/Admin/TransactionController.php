<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
class TransactionController extends DM_BaseController
{
    protected $panel = 'Transaction';
    protected $base_route = 'admin.transactions';
    protected $view_path = 'admin.account';
    protected $model;
    protected $table;

    public function __construct(Transaction $model)
    {
        $this->model = $model;
        $this->middleware('permission:view Transaction')->only(['index', 'show']);
        $this->middleware('permission:create Transaction')->only(['create', 'store']);
        $this->middleware('permission:edit Transaction')->only(['edit', 'update']);
        $this->middleware('permission:delete Transaction')->only('destroy');
    }
    public function index(){
        $data['rows'] = $this->model->getData();
        return view(parent::loadView($this->view_path.'.index'), compact('data'));
    }

    public function create(){
        return view(parent::loadView($this->view_path.'.create'));
    }

    public function store(Request $request){
        $request->validate($this->model->getRules(), $this->getMessage);
        if ($this->model->storeData($request, $request->all())) {
            session()->flash('alert-success', 'अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'अध्यावधिक हुन सकेन ।');
        }
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

    public function view_payment($transaction_key){
        $transaction = Transaction::where('transaction_key', $transaction_key)->firstOrFail();
        // dd($transaction);
        $data['rows'] = $transaction->payment;
        // dd($data);
        $data['transaction'] = $transaction;
        return view(parent::loadView('admin.payment.index'),compact('data', 'transaction'));
    }

    public function view_details($transaction_key){
        $data['row'] = Transaction::where('transaction_key', $transaction_key)
        ->with(['rawMaterials','supplier','dealer'])
        ->firstOrFail();
        return view(parent::loadView($this->view_path.'.index'), compact('data'));
    }

    function sales_order_detail($transaction_key){
        $data['row'] = Transaction::where('transaction_key', $transaction_key)
                    ->with(['sales_order', 'dealer'])
                    ->firstOrFail();
        return view(parent::loadView($this->view_path.'.sale_order_detail'), compact('data'));
    }
}
