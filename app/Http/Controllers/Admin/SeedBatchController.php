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
use App\Models\Farm;
use App\Models\File;
use App\Models\GeneralProfile;
use App\Models\GeneralWorker;
use App\Models\Models\WorkingShedule;
use App\Models\KaryatalikaBibran;
use App\Models\SeedBatchProduction;
use Illuminate\Support\Facades\Auth;

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
        // $this->middleware('permission:view worker')->only(['index', 'show']);
        // $this->middleware('permission:create worker')->only(['create', 'store']);
        // $this->middleware('permission:edit worker')->only(['edit', 'update']);
        // $this->middleware('permission:delete worker')->only('destroy');
    }

    public function index(){
        $data['rows'] = $this->model->getData();
        $this->base_route = 'admin.udhyog.hybridbiu.inventory.seed_batch';
        return view(parent::loadView($this->view_path.'.index'),compact('data'));
    }

    public function create(){
        $currentDate = date('Y-m-d');
        $data['units'] = Unit::get();
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
        $data['user'] =     DB::table('users')->where('role', '=', 'user')->get();
        $data['worker-types']  = $this->model->workerTypes();
        $data['mesinary']      = $this->model->Mesinary();
        $data['agri-category'] = $this->model->getAgriCategory();
        $data['mal']           = $this->model->getMal();
        $data['mal']           = $this->model->getMal();
        $data['agriculture']   =  DB::table('agricultures')->where('status', 1)->orderBy('id', 'DESC')->get();
        $data['month']         =  DB::table('months')->orderBy('id', 'ASC')->get();
        return view(parent::loadView($this->view_path.'.create'), compact('data', 'currentDate'));
    }

    function store(Request $request){
        $request->validate($this->model->getRules(), $this->model->getMessage());
        // dd($request->all());
        DB::beginTransaction();
        try {
            $this->base_route = "admin.udhyog.hybridbiu.inventory.seed_batch.index";
            $batch = SeedBatch::create($request->all());
            $seedIdsInRequest = [];
            foreach($request->seed_ids as $key=>$seed){
                if($seed!= null && $request->quantity[$key] != null && !in_array($seed, $seedIdsInRequest)){
                    SeedBatchProduction::create([
                        'seed_batch_id' => $batch->id,
                        'seed_id'=>$seed,
                        'quantity'=>$request->quantity[$key],
                    ]);
                }
                $seedIdsInRequest [] = $seed;
            }


            if (!empty(($request->biubijan_1) || ($request->biubijan_2) || ($request->biubijan_3) || ($request->biubijan_4) || ($request->biubijan_5))) {

                $biubijan_1                 = array_filter($request->biubijan_1);
                $biubijan_2                 = array_filter($request->biubijan_2);
                $biubijan_3                 = array_filter($request->biubijan_3);
                $biubijan_4                 = array_filter($request->biubijan_4);
                $biubijan_5                 = array_filter($request->biubijan_5);
                $total_biubijan_amount      = array_sum($biubijan_4);
                $biubijan_detail            = array_map(null, $biubijan_1, $biubijan_2, $biubijan_3, $biubijan_4, $biubijan_5);
            }
            if (!empty(($request->mesinary_1) || ($request->mesinary_2) || ($request->mesinary_3) || ($request->mesinary_4) || ($request->mesinary_5))) {
                $mesinary_1                 = array_filter($request->mesinary_1);
                $mesinary_2                 = array_filter($request->mesinary_2);
                $mesinary_3                 = array_filter($request->mesinary_3);
                $mesinary_4                 = array_filter($request->mesinary_4);
                $mesinary_5                 = array_filter($request->mesinary_5);
                $total_mesinary_amount      = array_sum($mesinary_4);
                $mesinary_detail               = array_map(null, $mesinary_1, $mesinary_2, $mesinary_3, $mesinary_4, $mesinary_5);
            }
            if (!empty(($request->mal_bibran_1) || ($request->mal_bibran_2) || ($request->mal_bibran_3) || ($request->mal_bibran_4) || ($request->mal_bibran_5))) {
                $mal_bibran_1               = array_filter($request->mal_bibran_1);
                $mal_bibran_2               = array_filter($request->mal_bibran_2);
                $mal_bibran_3               = array_filter($request->mal_bibran_3);
                $mal_bibran_4               = array_filter($request->mal_bibran_4);
                $mal_bibran_5               = array_filter($request->mal_bibran_5);
                $total_mal_bibran_amount    = array_sum($mal_bibran_4);
                $unit_5                     = array_filter($request->unit_5);
                $mal_bibran_detail          = array_map(null, $mal_bibran_1, $mal_bibran_2, $mal_bibran_3, $mal_bibran_4, $mal_bibran_5);
            }
            if (!empty(($request->schedule_1) || ($request->schedule_2) || ($request->schedule_3) || ($request->schedule_4) || ($request->schedule_5) || ($request->schedule_6 || ($request->schedule_7)))) {
                // if ($request->hasFile('schedule_7')) {
                //     $post_files = parent::uploadMultipleFiles($request, $this->folder_path, $this->image_prefix_path, 'files');

                //     if(isset($array_file)){
                //         foreach($array_file as $file_row)
                //             File::create([
                //                 'post_unique_id' => $post_unique_id,
                //                 'title'=> $file_row[0],
                //                 'file' => $file_row[1],
                //             ]);
                //     }

                // }
                $schedule_1                 = array_filter($request->schedule_1);
                $schedule_2                 = array_filter($request->schedule_2);
                $schedule_3                 = array_filter($request->schedule_3);
                $schedule_4                 = array_filter($request->schedule_4);
                $schedule_5                 = array_filter($request->schedule_5);
                $schedule_6                 = array_filter($request->schedule_6);
                $schedule_detail               = array_map(null, $schedule_1, $schedule_2, $schedule_3, $schedule_4, $schedule_5, $schedule_6);
            }
            if (!empty(($request->worker_list))) {
                $worker_name                = array_filter($request->worker_list);
                $worker_detail                 = array_map(null, $worker_name);
            }
            $data =                                          new Farm();
            $data->user_id                                  = Auth::user()->id;
            $data->added_by                                 = Auth::user()->id;
            $data->unique_id                                = $request->unique_id;
            $data->full_name                                = $request->full_name;
            $data->mobile                                   = $request->mobile;
            $data->land_id                                  = $request->land_id;
            $data->fiscal_year                              = $request->fiscal_year;
            $data->block_id                                 = $request->block_id;
            $data->baali_cat                                = $request->baali_cat;
            $data->baali                                    = $request->baali;
            $data->start_month_id                           = $request->start_month_id;
            $data->end_month_id                             = $request->end_month_id;
            $data->start_date                               = $request->start_date;
            $data->end_date                                 = $request->end_date;
            $data->biubijan_detail                          = isset($biubijan_detail) ? json_encode($biubijan_detail) : NULL; //json_encode($biubijan_detail);
            $data->total_biubijan_amount                    = isset($total_biubijan_amount) ? $total_biubijan_amount : NULL;
            $data->mesinary_detail                          = isset($mesinary_detail) ? json_encode($mesinary_detail) : NULL; //json_encode($mesinary_detail);
            $data->total_mesinary_amount                    = isset($total_mesinary_amount) ? $total_mesinary_amount : NULL;
            $data->mal_bibran_detail                        = isset($mal_bibran_detail) ? json_encode($mal_bibran_detail) : NULL; //json_encode($mal_bibran_detail);
            $data->total_mal_bibran_amount                  = isset($total_mal_bibran_amount) ? $total_mal_bibran_amount : NULL;
            $data->worker_detail                            = isset($worker_detail) ? json_encode($worker_detail) : NULL; //json_encode($worker_detail);
            $data->schedule_detail                          = isset($schedule_detail) ? json_encode($schedule_detail) : NULL; //json_encode($schedule_detail);
            $data->seed_batch_id                            = $batch->id;
            $check                                          = $data->save();
            session()->flash('alert-success', 'उद्योग फेला परेन ।');
            DB::commit();
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack();
            session()->flash('alert-success', 'उद्योग फेला परेन ।');
        }
        return redirect()->route('admin.udhyog.hybridbiu.inventory.seed_batch.indx');
    }

    function edit($id){

        $data['row'] = SeedBatch::findOrFail($id);
        $data['seeds'] = Seed::where('status', 1)->get();
        $data['seasons'] = Season::get();
        $data['units'] = Unit::get();
        $currentDate = date('Y-m-d');
        $data['nep_date_unicode']  = datenepUnicode($currentDate, 'nepali');
        return view(parent::loadView($this->view_path.'.edit'), compact('data','currentDate'));
    }

    function update(Request $request, $id){
        $request->validate($this->model->getRules(), $this->model->getMessage());

        DB::beginTransaction();

        try {
            // Update the seed batch
            $batch = SeedBatch::findOrFail($id);
            $batch->update($request->all());

            // Get existing production records keyed by seed_id
            $existingProductions = $batch->seedBatchProduct->keyBy('seed_id');

            // Track seed_ids from the request
            $seedIdsInRequest = [];

            // Handle incoming production records
            foreach ($request->seed_ids as $key => $seed_id) {
                if ($seed_id != null && $request->quantity[$key] != null && !in_array($seed_id, $seedIdsInRequest)) {
                    $quantity = $request->quantity[$key];
                    $existing = $batch->seedBatchProduct()->where('seed_id', $seed_id)->first();
                    if ($existing) {
                        // Update existing record
                        $existing->update(['quantity' => $quantity]);
                        // Remove it from the collection to mark it as processed
                    } else {
                        // Create new record
                        SeedBatchProduction::create([
                            'seed_batch_id' => $batch->id,
                            'seed_id' => $seed_id,
                            'quantity' => $quantity,
                        ]);
                    }
                }
                $seedIdsInRequest[] = $seed_id;
            }

            // Delete remaining productions that were not included in the request
            foreach ($existingProductions as $existingProduction) {
                if (!in_array($existingProduction->seed_id, $seedIdsInRequest)) {
                    // Delete the production record
                    $existingProduction->delete();
                }
            }

            session()->flash('alert-success', 'Batch updated successfully.');
            DB::commit();
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack();
            // Log the exception for debugging
            session()->flash('alert-danger', 'Failed to update batch.');
        }

        return redirect()->route($this->base_route . '.index');
    }

    function view($id){

        $data['rows'] = SeedBatch::findOrFail($id);
        $data['mal_bibaran'] = json_decode($data['rows']->farm->mal_bibran_detail);
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
}
