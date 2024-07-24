<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeedBatch;
use App\Models\Unit;
use App\Models\Seed;
use App\Models\Season;
use Illuminate\Support\Facades\DB;

use App\Http\Middleware\User;
use App\Models\BiuBijan;
use App\Models\SeedType;
use App\Models\Farm;
use App\Models\File;
use App\Models\GeneralProfile;
use App\Models\GeneralWorker;
use App\Models\Models\WorkingShedule;
use App\Models\KaryatalikaBibran;
use App\Models\SeedBatchProduction;
use Illuminate\Support\Facades\Auth;
use App\Models\SeedBatchMal;
use App\Models\SeedBatchWorker;
use App\Models\SeedBatchMachine;
use App\Models\SalesOrderItem;
use App\Models\Udhyog;
use App\Models\InventoryProduct;
use App\Models\Supplier;
use App\Models\SeedJaat;
use App\Models\SeedBatchOtherMaterial;
use App\Models\OtherMaterial;
class SeedBatchController extends DM_BaseController
{
    protected $panel = 'Seed Batch';
    protected $base_route = 'admin.inventory.seed_batch';
    protected $view_path = 'admin.seed-batch';
    protected $model;
    protected $table;

    public function __construct(SeedBatch $model)
    {
        $this->model = $model;
        $this->middleware('permission:view SeedBatch')->only(['index', 'show']);
        $this->middleware('permission:create SeedBatch')->only(['create', 'store']);
        $this->middleware('permission:edit SeedBatch')->only(['edit', 'update']);
        $this->middleware('permission:delete SeedBatch')->only('destroy');
    }

    public function index(){
        $data['rows'] = $this->model->getData();
        $this->base_route = 'admin.udhyog.hybridbiu.inventory.seed_batch';
        return view(parent::loadView($this->view_path.'.index'),compact('data'));
    }

    public function create(){
        $udhyog = Udhyog::where('name', 'hybrid biu')->first();
        $currentDate = date('Y-m-d');
        $data['seed_type'] = SeedType::get();
        $data['units'] = Unit::get();
        $data['product_seeds'] = InventoryProduct::where('udhyog_id', $udhyog->id)->get();
        $data['seeds'] = Seed::where('status', 1)->get();
        $data['seasons'] = Season::get();
        $data['nep_date_unicode']  = datenepUnicode($currentDate, 'nepali');
        $data['fiscal']        = $this->model->getFiscal();
        $data['biubijan']      = $this->model->getBiubijan();
        $data['worker']        = $this->model->getWorker();
        // $data['applicant']     = $this->model->getApplicant();
        // $data['applicant']     = GeneralProfile::where('status', '=', 1)->get();
        $data['unit']          = $this->model->getUnit();
        $data['block']         = $this->model->getBlock();
        $data['user']          = DB::table('users')->where('role', '=', 'user')->get();
        $data['worker-types']  = $this->model->workerTypes();
        $data['mesinary']      = $this->model->Mesinary();
        $data['agri-category'] = $this->model->getAgriCategory();
        $data['mal']           = $this->model->getMal();
        $data['mal']           = $this->model->getMal();
        $data['agriculture']   =  DB::table('agricultures')->where('status', 1)->orderBy('id', 'DESC')->get();
        $data['month']         =  DB::table('months')->orderBy('id', 'ASC')->get();
        $data['seed_jaat']     =  DB::table('seed_jaats')->orderBy('id')->get();
        return view(parent::loadView($this->view_path.'.create'), compact('data', 'currentDate'));
    }

    function store(Request $request){
        // dd($request->all());
        $request->validate($this->model->getRules(), $this->model->getMessage());

        DB::beginTransaction();
        try {
            $this->base_route = "admin.udhyog.hybridbiu.inventory.seed_batch.index";
            // $batchType = $item['batch_type']; // 'production' or 'seed'
            $batch = null;


            $batch = SeedBatch::create([
                'batch_no'=>$request->batch_no,
                'seed_id'=>$request->seed_id,
                'unit_id'=>$request->batch_unit_id,
                'unit_price'=>$request->batch_unit_price,
                'quantity_produced'=>$request->quantity_produced,
                'manufacturing_date'=>$request->manufacturing_date,
                'expiry_date'=>$request->expiry_date,
                'season_id'=>$request->season_id,
                'land_area'=>$request->land_area,
                'stock_quantity'=>$request->quantity_produced,
            ]);
            $product = InventoryProduct::where('id', $request->seed_id)->first();
            if($product){
                $product->stock_quantity += $request->quantity_produced;
                $product->save();
            }
            // $seedIdsInRequest = [];

            // foreach($request->seed_ids as $key=>$seed){
            //     if($seed!= null && $request->quantity[$key] != null && !in_array($seed, $seedIdsInRequest)){
            //         SeedBatchProduction::create([
            //             'seed_batch_id' => $batch->id,
            //             'seed_id'=>$seed,
            //             'seed_type_id' => $request->seed_type[$key],
            //             'unit_id' => $request->unit_id[$key],
            //             'unit_price' => $request->unit_price[$key],
            //             'quantity'=>$request->quantity[$key],
            //             'total_cost' => $request->total_cost[$key],
            //         ]);
            //     }
            //     $seedIdsInRequest [] = $seed;
            // }
            session()->flash('alert-success', 'सफलतापूर्वक सिर्जना गरियो ।');
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            session()->flash('alert-danger', 'निर्माण गर्न असफल भयो');
            return back();
        }
        return redirect()->route('admin.udhyog.hybridbiu.inventory.seed_batch.index');
    }

    function edit($id){

        $data['row'] = SeedBatch::findOrFail($id);
        $data['seeds'] = Seed::where('status', 1)->get();
        $data['seasons'] = Season::get();
        $data['units'] = Unit::get();
        $data['seed_jaat']     =  DB::table('seed_jaats')->orderBy('id')->get();
        $currentDate = date('Y-m-d');
        $data['nep_date_unicode']  = datenepUnicode($currentDate, 'nepali');
        return view(parent::loadView($this->view_path.'.edit'), compact('data','currentDate'));
    }

    function update(Request $request, $id){
        $request->validate($this->model->getRules($id), $this->model->getMessage());
        // dd($request->all());
        DB::beginTransaction();

        try {
            // Update the seed batch
            $batch = SeedBatch::findOrFail($id);
            $product = InventoryProduct::where('id', $request->seed_id)->first();
            $preQuantity = $batch->quantity_produced;
            $requestQuantity = $request->quantity_produced;
            $difference = $preQuantity - $requestQuantity;
            if($difference > 0){
                $batch->stock_quantity -= $difference;
                $product->stock_quantity -= $difference;
                $product->save();

            }elseif($difference < 0){
                $batch->stock_quantity += abs($difference);
                $product->stock_quantity += abs($difference);
                $product->save();
            }
            $batch->batch_no = $request->batch_no;
            $batch->seed_id = $request->seed_id;
            $batch->unit_id = $request->unit_id;
            $batch->unit_price = $request->unit_price;
            $batch->manufacturing_date = $request->manufacturing_date;
            $batch->expiry_date = $request->expiry_date;
            $batch->quantity_produced = $request->quantity_produced;
            $batch->season_id = $request->season_id;
            $batch->land_area = $request->land_area;
            $batch->update();
            session()->flash('alert-success', 'Batch updated successfully.');
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            // Log the exception for debugging
            session()->flash('alert-danger', 'Failed to update batch.');
            return back();
        }

        return redirect()->route($this->base_route . '.index');
    }

    function view($id){
        $currentDate = date('Y-m-d');
        $data['seed_type'] = SeedType::get();
        $data['units'] = Unit::get();
        $data['seeds'] = Seed::where('status', 1)->get();
        $data['seasons'] = Season::get();
        $data['jaat'] = SeedJaat::get();
        $data['nep_date_unicode']  = datenepUnicode($currentDate, 'nepali');
        $data['fiscal']        = $this->model->getFiscal();
        $data['biubijan']      = $this->model->getBiubijan();
        $data['worker']        = $this->model->getWorker();
        // dd($data['worker']);
        // $data['applicant']     = $this->model->getApplicant();
        // $data['applicant']     = GeneralProfile::where('status', '=', 1)->get();
        $data['unit']          = $this->model->getUnit();
        $data['block']         = $this->model->getBlock();
        $data['user']          = DB::table('users')->where('role', '=', 'user')->get();
        $data['worker-types']  = $this->model->workerTypes();
        $data['mesinary']      = $this->model->Mesinary();
        $data['agri-category'] = $this->model->getAgriCategory();
        $data['mal']           = $this->model->getMal();
        $data['mal']           = $this->model->getMal();
        $data['agriculture']   =  DB::table('agricultures')->where('status', 1)->orderBy('id', 'DESC')->get();
        $data['month']         =  DB::table('months')->orderBy('id', 'ASC')->get();
        $data['total_biu_cost']= SeedBatchProduction::sumTotalCostBySeedBatch($id);
        $data['total_mal_cost']= SeedBatchMal::sumTotalCostBySeedBatch($id);
        $data['total_worker_cost']= SeedBatchWorker::sumTotalCostBySeedBatch($id);
        $data['total_machinery_cost']= SeedBatchMachine::sumTotalCostBySeedBatch($id);

        $data['grant_total_cost'] =
        ($data['total_biu_cost'] != null ? $data['total_biu_cost']['total_cost_sum'] : 0) +
        ($data['total_mal_cost'] != null ? $data['total_mal_cost']['total_cost_sum'] : 0) +
        ($data['total_worker_cost'] != null ? $data['total_worker_cost']['total_cost_sum'] : 0) +
        ($data['total_machinery_cost'] != null ? $data['total_machinery_cost']['total_cost_sum'] : 0);

        $data['suppliers'] = Supplier::get();
        $data['grant_total_income'] = SalesOrderItem::sumTotalCostBySeedBatch($id);
        $data['rows'] = SeedBatch::with(['khadhyanna.salesOrderItems'])->findOrFail($id);
        $data['total_cost'] = $data['rows']->khadhyanna->map(function ($khadhyanna) {
            return [
                'khadhyanna_id' => $khadhyanna->id,
                'total_cost' => $khadhyanna->salesOrderItems->sum('total_cost'),
                'total_quantity' => $khadhyanna->salesOrderItems->sum('quantity'),
            ];
        });
        // $data['mal_bibaran'] = json_decode($data['rows']->farm->mal_bibran_detail);
        $data['other_bibran'] = OtherMaterial::get();
        return view(parent::loadView($this->view_path.".view"),compact('data'));
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

    function add_seed(Request $request){
        $request->validate([
            'seed_id'=>'required',
            'seed_type'=>'required',
            'quantity'=>'required',
            'unit_id'=>'required',
            'unit_price'=>'required',
        ]);
        try {
            SeedBatchProduction::create([
                'seed_batch_id' => $request->seed_batch_id,
                'seed_id'=>$request->seed_id,
                'seed_type_id' => $request->seed_type,
                'unit_id' => $request->unit_id,
                'unit_price' => $request->unit_price,
                'quantity'=>$request->quantity,
                'total_cost' => $request->total_cost,
                'seed_jaat_id' => $request->seed_jaat_id,
            ]);
            session()->flash('alert-success', 'उद्योग फेला परेन ।');
            return redirect()->back();
        } catch (\Throwable $th) {
            session()->flash('alert-danger', 'उद्योग फेला परेन ।');
            return back();
        }
    }

    function add_mal(Request $request){
        $request->validate([
            'mal_id' => 'required',
            'unit_id' => 'required',
            'unit_price' => 'required',
            'quantity' => 'required',
        ]);
        try {
            SeedBatchMal::create([
                'mal_id'=>$request->mal_id,
                'unit_id' => $request->unit_id,
                'unit_price' => $request->unit_price,
                'quantity' => $request->quantity,
                'seed_batch_id' => $request->seed_batch_id,
                'total_cost' => $request->total_cost,
            ]);
            session()->flash('alert-success', 'उद्योग फेला परेन ।');
            return redirect()->back();
        } catch (\Throwable $th) {
            session()->flash('alert-warning', 'उद्योग फेला परेन ।');
            return back();
        }

    }

    function add_worker(Request $request){
        $request->validate([
            'seed_batch_id' => 'required',
            'worker_id' => 'required',
            'worked_hour' => 'required',
            'worked_day' => 'required',
            'wages_per_hour' => 'required',
        ]);
        try {
            SeedBatchWorker::create([
                'seed_batch_id' => $request->seed_batch_id,
                'worker_id' => $request->worker_id,
                'worked_hour' => $request->worked_hour,
                'worked_day' => $request->worked_day,
                'wages_per_hour' => $request->wages_per_hour,
                'total_wages' => $request->total_wages,
            ]);
            session()->flash('alert-success', 'उद्योग फेला परेन ।');
            return redirect()->back();
        } catch (\Throwable $th) {

            session()->flash('alert-warning', 'उद्योग फेला परेन ।');
            return back();
        }

    }

    function add_machinery(Request $request){
        $request->validate([
            'mesinari_id' => 'required',
            'unit_id' => 'required',
            'unit_price' => 'required',
            'quantity' => 'required',
        ]);
        try {
            SeedBatchMachine::create([
                'mesinari_id'=>$request->mesinari_id,
                'unit_id' => $request->unit_id,
                'unit_price' => $request->unit_price,
                'quantity' => $request->quantity,
                'seed_batch_id' => $request->seed_batch_id,
                'total_cost' => $request->total_cost,
            ]);
            session()->flash('alert-success', 'उद्योग फेला परेन ।');
            return redirect()->back();
        } catch (\Throwable $th) {
            session()->flash('alert-warning', 'उद्योग फेला परेन ।');
            return back();
        }
    }

    function add_other_material(Request $request){
        // dd($request->all());
        $request->validate([
            'batch_id' => 'required',
            'material_id' => 'required',
            'unit_id' => 'required',
            'unit_price' => 'required',
            'quantity' => 'required',
        ]);
        try {
            // dd($request->all());
            DB::table('seed_batch_other_materials')->insert([
                'seed_batch_id' => $request->batch_id,
                'unit_id' => $request->unit_id,
                'supplier_id' => $request->supplier_id,
                'unit_price' => $request->unit_price,
                'total_cost' => $request->total_cost,
                'quantity'=>$request->quantity,
                'material_id'=>$request->material_id,
            ]);
            session()->flash('alert-success', 'उद्योग फेला परेन ।');
            return redirect()->back();
        } catch (\Throwable $th) {
            session()->flash('alert-warning', 'उद्योग फेला परेन ।');
            return back();
        }

    }

    function delete_seed_batch(Request $request, $id){
        try {
            $seed = SeedBatchProduction::where('id', $id)->first();
            $seed->delete();
            return response()->json(true);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(false);
        }
    }
    function delete_mal(Request $request, $id) {
        try {
            $mal = SeedBatchMal::where('id', $id)->first();
            $mal->delete();
            return response()->json(true);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th);
        }
    }
    function delete_worker(Request $request, $id) {
        try {
            $worker = SeedBatchWorker::find($id);
            $worker->delete();
            return response()->json(true);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th);
        }
    }

    function delete_mesinery(Request $request, $id){
        try {
            $mesinari = SeedBatchMachine::find($id);
            $mesinari->delete();
            return response()->json(true);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th);
        }
    }

    function delete_other_material(Request $request, $id){
        try {
            $other_material = SeedBatchOtherMaterial::find($id);
            $other_material->delete();
            return response()->json(true);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th);
        }
    }
    function check_production_batch(Request $request){
        $batch_no = $request->production_batch;
        $seed = null;
        $seedBatch = SeedBatch::where('batch_no', $batch_no)->first();
        $bool = false;
        if($seedBatch){
            $bool = true;
            $seed = $seedBatch->product;
        }
        return response()->json(['bool' => $bool, 'batch'=>$seed, 'production_batch'=>$seedBatch]);
    }

    function check_stock_quantity(Request $request){
        $batch_no = $request->id;
        $batch = SeedBatchProduction::where('seed_id', $batch_no)->first();
        return response()->json($batch);

    }

    function inventory(){
        $data['rows'] = SeedBatch::where('stock_quantity', '>', 0)->get();
        return view(parent::loadView($this->view_path.'.inventory'), compact('data'));
    }
}
