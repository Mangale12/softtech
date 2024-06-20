<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UdhyogAchar;
use App\Models\Voucher;
use App\Models\Udhyog;
use App\Models\VoucherDrCr;
use Illuminate\Support\Facades\DB;
use App\Models\WorkerList;
use App\Models\WorkerPosition;
use App\Models\WorkerTypes;
use App\Models\FinanceTitle;
// use App\Http\Controllers\VoucherController;

class UdhyogAcharController extends DM_BaseController
{
    protected $panel = 'Udhyog Achar';
    protected $base_route = 'admin.udhyog.achar.fianance';
    protected $view_path = 'admin.voucher';
    protected $view_path_inventory = 'admin.inventory';
    protected $view_path_worker_types = 'admin.worker-types';
    protected $view_path_worker_position = 'admin.worker-position';
    protected $view_path_worker_list = 'admin.worker-list';
    protected $model;
    protected $table;

    public function __construct(UdhyogAchar $model)
    {
        $this->model = $model;
    }
    public function index(Request $request)
    {
        $data['rows'] =  $this->model->getData();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        // dd("create");
        $data['land'] = $this->model->getLandTypes();
        $data['irrigation'] = $this->model->getIrrigationTypes();
        $data['store'] = $this->model->getStoreTypes();
        $data['fuel'] = $this->model->getFuelTypes();
        $data['equipment'] = $this->model->getEquipmentTypes();
        $data['titles'] = $this->mode->getFinanceTitles();
        return view(parent::loadView($this->view_path . '.create'),compact('data'));
    }

    // public function store(Request $request)
    // {
    //     // $request->validate($this->model->getRules(), $this->model->getMessage());
    //     $success =  $this->model->create($request->all());
    //     if ($success) {
    //         session()->flash('alert-success', 'उद्योग बिबरण अध्यावधिक भयो ।');
    //     } else {
    //         session()->flash('alert-danger', 'उद्योग बिबरण अध्यावधिक हुन सकेन ।');
    //     }
    //     return redirect()->route($this->base_route . '.index');
    // }

    public function edit($id)
    {
        $data['rows'] = $this->model::where('id', '=', $id)->firstOrFail();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);
        $success =  $data->update($request->all());
        if ($success) {
            session()->flash('alert-success', 'उद्योग बिबरण अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'उद्योग बिबरण अध्यावधिक हुन सकेन ।');
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

    function fianance(){
        $data['vouchers'] = [];
        $data['udhyog_voucher'] = [];
            $udhyog = Udhyog::where('name', 'Achar')->first();
            $data['vouchers'] = Voucher::with('voucherType')->where('udhyog_id',$udhyog->id)->get();
            $data['udhyog_voucher'] = 'अचार';

        $data['lekha_shirsak'] = Voucher::with('lekhaShirsak')->get();
        return view(parent::loadView($this->view_path . '.index'),compact('data'));
    }

    function fianance_create(){
            $data['udhyog'] = Udhyog::where('name', 'Achar')->first();
            $data['path'] = 'अचार';
            // $data['vouchers'] = Voucher::with('voucherType')->where('udhyog_id',$udhyog->id)->get();

        $currentDate = date('Y-m-d');
        //conver English date to Nepali date   // Thaman 2078-01-01
        $data['nep_date_unicode']  = datenepUnicode($currentDate, 'nepali');
        $data['get_sirshak']       = $this->model->getLekhaSirshak();
        $data['bhoucher_no']       = $this->model->getbhoucherNo();
        $data['fiscal']            = $this->model->getFiscal();
        $data['voucher_type']      = $this->model->getVoucherType();
        $data['lekha_shirshak']    = $this->model->getLekhaSirshak();
        $data['titles']            = FinanceTitle::where('status', 1)->get();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }


    function workersType(){
        try {
                $this->panel = 'Udhyog Achar Workers Type';
                $this->base_route = 'admin.udhyog.achar.workers';
                $udhyog = Udhyog::where('name', 'Achar')->first();
                $data['rows'] = WorkerTypes::orderBy('id', 'ASC')->where('udhyog_id',$udhyog->id)->paginate(10);
                return view(parent::loadView($this->view_path_worker_types . '.index'), compact('udhyog','data'));
            //code...
        } catch (\Throwable $th) {
            dd($th);
            return response()->json(['message' => 'Udhyog Not Found'], 404);
        }
    }
    function workersTypeCreate(){
        try{
            if (request()->is('admin/udhyog/achar/workers/workers-type/create')) {
                $_panel = 'Udhyog Achar Workers';
                $this->panel = 'Udhyog Achar Workers';
                $udhyog = Udhyog::where('name', 'Achar')->first();
                $this->base_route = 'admin.udhyog.achar.workers.workerstype';
                return view(parent::loadView($this->view_path_worker_types . '.create'), compact('udhyog','_panel'));
            }
        } catch (\Throwable $th) {
            dd($th);
            return response()->json(['message' => 'Udhyog Not Found'], 404);
        }
    }
    function workersTypeStore(Request $request){
        $workerType = new WorkerTypes();
        $request->validate([$workerType->getRules()]);
        $workerType->storeData($request, $request->types, $request->status, $request->udhyog_id);
        return redirect()->route('admin.udhyog.achar.workers.workerstype.index')->with('success','Worker added successfully');
    }

    function workersPosition(){
        try {
            if (request()->is('admin/udhyog/achar/workers/workers-position')) {
                $this->panel = 'Udhyog Achar Workers Position';
                $this->base_route = 'admin.udhyog.achar.workers';
                $udhyog = Udhyog::where('name', 'Achar')->first();
                $data['rows'] = WorkerPosition::orderBy('id', 'ASC')->where('udhyog_id',$udhyog->id)->paginate(10);
                return view(parent::loadView($this->view_path_worker_position . '.index'), compact('udhyog','data'));
            }
            //code...
        } catch (\Throwable $th) {
            dd($th);
            return response()->json(['message' => 'Udhyog Not Found'], 404);
        }
    }
    function workersPositionCreate(){
        try{
            if (request()->is('admin/udhyog/achar/workers/workers-position/create')) {
                $this->panel = 'Udhyog Achar Workers';
                $udhyog = Udhyog::where('name', 'Achar')->first();
                $this->base_route = 'admin.udhyog.achar.workers.workersposition';
                $data['rows'] = WorkerTypes::where('udhyog_id',$udhyog->id)->get();
                return view(parent::loadView($this->view_path_worker_position . '.create'), compact('udhyog','data'));
            }
        } catch (\Throwable $th) {
            dd($th);
            return response()->json(['message' => 'Udhyog Not Found'], 404);
        }
    }
    function workersPositionStore(Request $request){
        $workerPosition = new WorkerPosition();
        // $request->validate($workerPosition->getRules(), $workerPosition->getMessage());
        $workerPosition->storeData($request, $request->addmore, $request->udhyog_id);
        return redirect()->route('admin.udhyog.achar.workers.workersposition.index')->with('success','Worker added successfully');
    }

    function workersList(){
        try {
            if (request()->is('admin/udhyog/achar/workers/workers-list')) {
                // dd("test");
                $this->panel = 'Udhyog Achar Workers List';
                $this->base_route = 'admin.udhyog.achar.workers';
                $udhyog = Udhyog::where('name', 'Achar')->first();
                $data['rows'] = WorkerList::orderBy('id', 'ASC')->where('udhyog_id',$udhyog->id)->paginate(10);
                return view(parent::loadView($this->view_path_worker_list . '.index'), compact('udhyog','data'));
            }
            //code...
        } catch (\Throwable $th) {
            dd($th);
            return response()->json(['message' => 'Udhyog Not Found'], 404);
        }
    }
    function workersListCreate(){
        try{
            if (request()->is('admin/udhyog/achar/workers/workers-list/create')) {
                $_panel = 'Udhyog Achar Workers';
                $this->panel = 'Udhyog Achar Workers';
                $udhyog = Udhyog::where('name', 'Achar')->first();
                $data['work_type'] = WorkerTypes::get();
                // dd($data['work_type']);
                $data['rows'] = WorkerPosition::where('udhyog_id', $udhyog->id)->get();
                $this->base_route = 'admin.udhyog.achar.workers.workerslist';
                return view(parent::loadView($this->view_path_worker_list . '.create'), compact('udhyog','_panel','data'));
            }
        } catch (\Throwable $th) {
            dd($th);
            return response()->json(['message' => 'Udhyog Not Found'], 404);
        }
    }
    function workersListStore(Request $request){
        $workerList = new WorkerList();
        // $this->base_route =
        $request->validate($workerList->getRules(), $workerList->getMessage());
        if ($workerList->storeData($request, $request->full_name, $request->mobile, $request->gender, $request->address, $request->day_of_joining, $request->worker_position_id, $request->salary, $request->bhatta, $request->image,$request->udhyog_id)) {
            session()->flash('alert-success', 'कामदार पद अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'कामदार पद अध्यावधिक हुन सकेन ।');
        }
        return redirect()->route('admin.udhyog.achar.workers.workerslist.index');
    }

    // function workersList(){

    //     if (request()->is('admin/udhyog/achar/workers/workers-list')) {
    //         try {
    //             $data['rows'] = WorkerList::all();
    //             // $data['worker_type'] = WorkerTypes::all();
    //             // $data['worker_position']= WorkerPosition::all();
    //             $_panel = 'Udhyog Achar Workers';
    //             $udhyog = Udhyog::where('name', 'Achar')->first();

    //             return view(parent::loadView($this->view_path_worker . '.index'), compact('udhyog','_panel','data'));
    //         } catch (\Throwable $th) {
    //             return response()->json(['message' => 'Udhyog Not Found'], 404);
    //         }

    //     }else{
    //         return response()->json(['message' => 'Udhyog Not Found'], 404);
    //     }

    // }
    function workers_create(){
        if (request()->is('admin/udhyog/achar/workers/cerate')) {
            try {
                $_panel = 'Udhyog Workers Create';
                $udhyog = Udhyog::where('name', 'Achar')->first();
                return view(parent::loadView($this->view_path . '.create'), compact('udhyog','_panel'));
            } catch (\Throwable $th) {
                dd($th);
                return response()->json(['message' => 'Udhyog Not Found'], 404);
            }

        }else{
            return response()->json(['message' => 'Udhyog Not Found'], 404);
        }
    }

    function store(Request $request){
        $request->validate([
            'date' => 'required',
            'voucher_type' => 'required',
            // 'account_type' => 'required',
            // 'voucher_name' => 'required',
            // 'amount' => 'required',
            // 'description' => 'required',
        ]);
        $voucher = new Voucher();
        // dd($request->all());
        $voucher->storeData($request, $request->date, $request->voucher_type, $request->lekha_shirshak, $request->bhoucher_no, $request->fiscal, $request->remarks, $request->status,$request->total_debit,$request->total_credit,$request->title, $request->dr, $request->cr, $request->bhoucher_name,$request->udhyog);
        return redirect()->route($this->base_route . '.index')->with('success', 'Voucher created successfully');
    }

    function view_report($id){
        $voucher = Voucher::findOrFail($id);
        $data['dr_cr_details'] = VoucherDrCr::where('voucher_id', $voucher->id)->get();
        $sums = VoucherDrCr::select(
            'voucher_id',
            DB::raw('SUM(dr) as dr_total'),
            DB::raw('SUM(cr) as cr_total')
        )
        ->groupBy('voucher_id')
        ->get();
        foreach($sums as $sum){
            if($sum['voucher_id'] == $id){
                $data['dr_cr_sum'] = $sum;
            }
        }

        $data['voucher'] = $voucher;
        return view(parent::loadView($this->view_path . '.report'), compact('data'));
    }


}
