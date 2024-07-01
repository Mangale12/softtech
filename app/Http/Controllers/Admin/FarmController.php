<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\User;
use App\Models\BiuBijan;
use App\Models\Farm;
use App\Models\File;
use App\Models\GeneralProfile;
use App\Models\GeneralWorker;
use App\Models\Models\WorkingShedule;
use App\Models\KaryatalikaBibran;
use App\Models\NewFarm;
use App\Models\OtherMaterial;
use App\Models\Expenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Models\FarmAmdani;
use Illuminate\Support\Str;
use function PHPSTORM_META\type;

class FarmController extends DM_BaseController
{
    protected $panel = 'Farm';
    protected $base_route = 'admin.farm';
    protected $view_path = 'admin.farm';
    protected $model;
    protected $table;
    protected $folder = 'farm';
    protected $image_prefix_path = '/upload_file/farm/';
    protected $image_name = 'file';
    protected $folder_path;
    protected $folder_path_image;
    protected $prefix_path_image;
    protected $image;
    protected $karyatalikaBibran;
    protected $expenses;



    public function __construct(Farm $model, KaryatalikaBibran $karyatalikaBibran, Expenses $expenses)
    {
        $this->model = $model;
        $this->karyatalikaBibran = $karyatalikaBibran;
        $this->expenses = $expenses;
        $this->folder_path = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR .  $this->folder . DIRECTORY_SEPARATOR;


    }
    public function index($unique_id)
    {
        // Fetch the NewFarm record by unique_id
        $farm = NewFarm::where('unique_id', $unique_id)->firstOrFail();

        // Fetch related rows and paginate
        $data['rows'] = $this->model->where('new_farm_id', $farm->id)->paginate(10);
        foreach ($data['rows'] as $row) {
            $row->karyatalika = KaryatalikaBibran::where('farm_id', $row->id)->get();
            $row->expenses = Expenses::where('farm_id', $row->id)->get();
        }
        $data['karyatalika'] = KaryatalikaBibran::get();
        $data['farm'] = $farm;
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }


    public function create($unique_id)
    {
        $data['other_material'] = OtherMaterial::get();
        $data['farm'] = NewFarm::where('unique_id', $unique_id)->firstOrFail();
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
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }

    // public function store(Request $request)
    // {
    //     // dd($request->all());
    //     try {
    //         if (!empty(($request->animal_type) || ($request->animal_name) || ($request->animal_unit) || ($request->animal_unit_price) || ($request->animal_quantity || $request->animal_total_cost))) {
    //             $animal_type                 = array_filter($request->animal_type);
    //             $animal_name                 = array_filter($request->animal_name);
    //             $animal_unit                 = array_filter($request->animal_unit);
    //             $animal_unit_price           = array_filter($request->animal_unit_price);
    //             $animal_quantity             = array_filter($request->animal_quantity);
    //             $animal_total_cost           = array_filter($request->animal_total_cost);
    //             $animal_details              = array_filter($request->animal_details);
    //             $animal_sum                 = array_sum($animal_total_cost);
    //             $animal_data                 = array_map(null, $animal_type, $animal_name, $animal_unit, $animal_unit_price, $animal_quantity, $animal_total_cost, $animal_details);
    //         }
    //         if (!empty(($request->mesinary_name) || ($request->mesinery_unit) || ($request->mesinary_amount) || ($request->mesinary_quantity) || ($request->mesinary_total_cost) || ($request->mesinary_5))) {
    //             $mesinary_name                 = array_filter($request->mesinary_name);
    //             $mesinery_unit                 = array_filter($request->mesinery_unit);
    //             $mesinary_amount                 = array_filter($request->mesinary_amount);
    //             $mesinary_quantity                 = array_filter($request->mesinary_quantity);
    //             $mesinary_total_cost                 = array_filter($request->mesinary_total_cost);
    //             $mesinary_5                         = array_filter($request->mesinary_5);
    //             $total_mesinary_amount      = array_sum($mesinary_total_cost);
    //             $mesinary_data               = array_map(null, $mesinary_name, $mesinery_unit, $mesinary_amount, $mesinary_quantity, $mesinary_total_cost, $mesinary_5);
    //         }
    //         if (!empty(($request->anya_bibran_name) || ($request->anya_bibran_unit) || ($request->anya_bibran_unit_price) || ($request->anya_bibran_quantity) || ($request->anya_bibran_total) || ($request->anya_bibran_details))) {
    //             $anya_bibran_name               = array_filter($request->anya_bibran_name);
    //             $anya_bibran_unit               = array_filter($request->anya_bibran_unit);
    //             $anya_bibran_unit_price               = array_filter($request->anya_bibran_unit_price);
    //             $anya_bibran_quantity               = array_filter($request->anya_bibran_quantity);
    //             $anya_bibran_total               = array_filter($request->anya_bibran_total);
    //             $anya_bibran_details         = array_filter($request->anya_bibran_details);
    //             $total_anya_bibran_amount    = array_sum($anya_bibran_total);
    //             $anya_bibran_data             = array_map(null, $anya_bibran_name, $anya_bibran_unit, $anya_bibran_unit_price, $anya_bibran_quantity, $anya_bibran_total, $anya_bibran_details);
    //         }
    //         if (!empty(($request->worker_name) || ($request->worked_day) || ($request->worked_hour) || ($request->wages_per_hour) || ($request->total_wages) || ($request->worker_details ))) {

    //             $schedule_1                 = array_filter($request->worker_name);
    //             $schedule_2                 = array_filter($request->worked_day);
    //             $schedule_3                 = array_filter($request->worked_hour);
    //             $schedule_4                 = array_filter($request->wages_per_hour);
    //             $schedule_5                 = array_filter($request->total_wages);
    //             $schedule_6                 = array_filter($request->worker_details);
    //             $total_wages_amount         = array_sum($schedule_5);
    //             $schedule_detail            = array_map(null, $schedule_1, $schedule_2, $schedule_3, $schedule_4, $schedule_5, $schedule_6);
    //         }
    //         $data =                                          new Farm();
    //         $data->user_id                                  = Auth::user()->id;
    //         $data->added_by                                 = Auth::user()->id;
    //         $data->unique_id                                = $request->unique_id;
    //         $data->full_name                                = $request->full_name;
    //         $data->mobile                                   = $request->mobile;
    //         $data->land_id                                  = $request->land_id;
    //         $data->fiscal_year                              = $request->fiscal_year;
    //         $data->block_id                                 = $request->block_id;
    //         $data->baali_cat                                = $request->baali_cat;
    //         $data->baali                                    = $request->baali;
    //         $data->start_month_id                           = $request->start_month_id;
    //         $data->end_month_id                             = $request->end_month_id;
    //         $data->start_date                               = $request->start_date;
    //         $data->end_date                                 = $request->end_date;
    //         $data->biubijan_detail                          = isset($animal_data) ? json_encode($animal_data) : NULL; //json_encode($biubijan_detail);
    //         $data->total_biubijan_amount                    = isset($animal_sum) ? $animal_sum : NULL;
    //         $data->mesinary_detail                          = isset($mesinary_data) ? json_encode($mesinary_data) : NULL; //json_encode($mesinary_detail);
    //         $data->total_mesinary_amount                    = isset($total_mesinary_amount) ? $total_mesinary_amount : NULL;
    //         $data->mal_bibran_detail                        = isset($mal_bibran_detail) ? json_encode($mal_bibran_detail) : NULL; //json_encode($mal_bibran_detail);
    //         $data->total_mal_bibran_amount                  = isset($total_mal_bibran_amount) ? $total_mal_bibran_amount : NULL;
    //         $data->schedule_detail                            = isset($schedule_detail) ? json_encode($schedule_detail) : NULL; //json_encode($worker_detail);
    //         $data->schedule_detail                          = isset($schedule_detail) ? json_encode($schedule_detail) : NULL; //json_encode($schedule_detail);
    //         $data->total_worker_amount                              = isset($total_wages_amount) ? $total_wages_amount : NULL ;
    //         $data->other_details                             = isset($anya_bibran_data) ? $anya_bibran_data : NULL;
    //         $data->total_other_amount                 = isset($total_anya_bibran_amount) ? $total_anya_bibran_amount : NULL;
    //         $check                                          = $data->save();
    //         session()->flash('alert-success', 'खेत बिबरण अध्यावधिक भयो ।');
    //     } catch (\Throwable $th) {
    //         dd($th);
    //         session()->flash('alert-danger', 'खेत बिबरण अध्यावधिक हुन सकेन ।');
    //     }
    //     return redirect()->route($this->base_route . '.index');
    // }

    public function store(Request $request)
{
    // dd($request->all());
    try {
        $animal_data = [];
        $mesinary_data = [];
        $anya_bibran_data = [];
        $schedule_detail = [];
        $total_wages_amount = 0;
        $total_mesinary_amount = 0;
        $total_anya_bibran_amount = 0;

        if (!empty($request->animal_type || $request->animal_name || $request->animal_unit || $request->animal_unit_price || $request->animal_quantity || $request->animal_total_cost)) {
            $animal_type = array_filter($request->animal_type);
            $animal_name = array_filter($request->animal_name);
            $animal_unit = array_filter($request->animal_unit);
            $animal_unit_price = array_filter($request->animal_unit_price);
            $animal_quantity = array_filter($request->animal_quantity);
            $animal_total_cost = array_filter($request->animal_total_cost);
            $animal_details = array_filter($request->animal_details);
            $animal_sum = array_sum($animal_total_cost);
            $animal_data = array_map(function($type, $name, $unit, $unit_price, $quantity, $total_cost, $details) {
                return [
                    'id' => Str::uuid()->toString(),
                    'animal_type' => $type,
                    'animal_name' => $name,
                    'animal_unit' => $unit,
                    'animal_unit_price' => $unit_price,
                    'animal_quantity' => $quantity,
                    'animal_total_cost' => $total_cost,
                    'animal_details' => $details
                ];
            }, $animal_type, $animal_name, $animal_unit, $animal_unit_price, $animal_quantity, $animal_total_cost, $animal_details);
        }

        if (!empty($request->mesinary_name || $request->mesinery_unit || $request->mesinary_amount || $request->mesinary_quantity || $request->mesinary_total_cost || $request->mesinary_5)) {
            $mesinary_name = array_filter($request->mesinary_name);
            $mesinery_unit = array_filter($request->mesinery_unit);
            $mesinary_amount = array_filter($request->mesinary_amount);
            $mesinary_quantity = array_filter($request->mesinary_quantity);
            $mesinary_total_cost = array_filter($request->mesinary_total_cost);
            $mesinary_5 = array_filter($request->mesinary_5);
            $total_mesinary_amount = array_sum($mesinary_total_cost);
            $mesinary_data = array_map(function($name, $unit, $amount, $quantity, $total_cost, $mesinary_5) {
                return [
                    'id' => Str::uuid()->toString(),
                    'mesinary_name' => $name,
                    'mesinery_unit' => $unit,
                    'mesinary_amount' => $amount,
                    'mesinary_quantity' => $quantity,
                    'mesinary_total_cost' => $total_cost,
                    'mesinary_5' => $mesinary_5
                ];
            }, $mesinary_name, $mesinery_unit, $mesinary_amount, $mesinary_quantity, $mesinary_total_cost, $mesinary_5);
        }

        if (!empty($request->anya_bibran_name || $request->anya_bibran_unit || $request->anya_bibran_unit_price || $request->anya_bibran_quantity || $request->anya_bibran_total || $request->anya_bibran_details)) {
            $anya_bibran_name = array_filter($request->anya_bibran_name);
            $anya_bibran_unit = array_filter($request->anya_bibran_unit);
            $anya_bibran_unit_price = array_filter($request->anya_bibran_unit_price);
            $anya_bibran_quantity = array_filter($request->anya_bibran_quantity);
            $anya_bibran_total = array_filter($request->anya_bibran_total);
            $anya_bibran_details = array_filter($request->anya_bibran_details);
            $total_anya_bibran_amount = array_sum($anya_bibran_total);
            $anya_bibran_data = array_map(function($name, $unit, $unit_price, $quantity, $total, $details) {
                return [
                    'id' => Str::uuid()->toString(),
                    'anya_bibran_name' => $name,
                    'anya_bibran_unit' => $unit,
                    'anya_bibran_unit_price' => $unit_price,
                    'anya_bibran_quantity' => $quantity,
                    'anya_bibran_total' => $total,
                    'anya_bibran_details' => $details
                ];
            }, $anya_bibran_name, $anya_bibran_unit, $anya_bibran_unit_price, $anya_bibran_quantity, $anya_bibran_total, $anya_bibran_details);
        }

        if (!empty($request->worker_name || $request->worked_day || $request->worked_hour || $request->wages_per_hour || $request->total_wages || $request->worker_details)) {
            $worker_name = array_filter($request->worker_name);
            $worked_day = array_filter($request->worked_day);
            $worked_hour = array_filter($request->worked_hour);
            $wages_per_hour = array_filter($request->wages_per_hour);
            $total_wages = array_filter($request->total_wages);
            $worker_details = array_filter($request->worker_details);
            $total_wages_amount = array_sum($total_wages);
            $schedule_detail = array_map(function($name, $day, $hour, $wages_per_hour, $total_wages, $details) {
                return [
                    'id' => Str::uuid()->toString(),
                    'worker_name' => $name,
                    'worked_day' => $day,
                    'worked_hour' => $hour,
                    'wages_per_hour' => $wages_per_hour,
                    'total_wages' => $total_wages,
                    'worker_details' => $details
                ];
            }, $worker_name, $worked_day, $worked_hour, $wages_per_hour, $total_wages, $worker_details);
        }

        $data = new Farm();
        $data->user_id = Auth::user()->id;
        $data->added_by = Auth::user()->id;
        $data->unique_id = $request->unique_id;
        $data->full_name = $request->full_name;
        $data->mobile = $request->mobile;
        $data->land_id = $request->land_id;
        $data->fiscal_year = $request->fiscal_year;
        $data->block_id = $request->block_id;
        $data->baali_cat = $request->baali_cat;
        $data->baali = $request->baali;
        $data->start_month_id = $request->start_month_id;
        $data->end_month_id = $request->end_month_id;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;

        $data->biubijan_detail = !empty($animal_data) ? json_encode( $animal_data) : null;
        $data->total_biubijan_amount = !empty($animal_sum) ? $animal_sum : null;

        $data->mesinary_detail = !empty($mesinary_data) ? json_encode($mesinary_data) : null;
        $data->total_mesinary_amount = !empty($total_mesinary_amount) ? $total_mesinary_amount : null;

        $data->mal_bibran_detail = !empty($anya_bibran_data) ? json_encode($anya_bibran_data) : null;
        $data->total_mal_bibran_amount = !empty($total_anya_bibran_amount) ? $total_anya_bibran_amount : null;

        $data->schedule_detail = !empty($schedule_detail) ? json_encode($schedule_detail) : null;
        $data->total_worker_amount = !empty($total_wages_amount) ? $total_wages_amount : null;

        $data->other_details = !empty($anya_bibran_data) ? json_encode($anya_bibran_data) : null;
        $data->total_other_amount = !empty($total_anya_bibran_amount) ? $total_anya_bibran_amount : null;
        $data->new_farm_id        = $request->farm_id;
        $data->save();
        $farm = NewFarm::find($request->farm_id);
        session()->flash('alert-success', 'खेत बिबरण अध्यावधिक भयो ।');
    } catch (\Throwable $th) {
        // dd($th);
        session()->flash('alert-danger', 'खेत बिबरण अध्यावधिक हुन सकेन ।');
    }

    return redirect('/admin/new-farm/show/'. $farm->unique_id);
}



    public function edit($id)
    {
        $data['rows'] = $this->model::where('id', '=', $id)->firstOrFail();
        $data['category'] = $this->model->getAnudaanCategory();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->updateData($request, $id, $request->category_id, $request->title, $request->amount, $request->bibran, $request->times, $request->criteria, $request->status)) {
            session()->flash('alert-success', 'अनुदान अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'अनुदान अध्यावधिक हुन सकेन ।');
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
    public function applicantid(Request $request)
    {
        $data = DB::table('general_workers')->where('unique_id', $request->applicant_id)->get();
        return response()->json(['data' => $data]);
    }

    public function view($id)
    {
        $data['rows'] = $this->model::where('id', '=', $id)->firstOrFail();
        $data['karyatalika'] = KaryatalikaBibran::where('farm_id', $id)->get();
        $data['expenses'] = Expenses::where('farm_id', $id)->get();
        $data['total_expenses'] = Expenses::where('farm_id', $id)->where('types', 1)->sum('amount');
        $data['total_income'] = Expenses::where('farm_id', $id)->where('types', 0)->sum('amount');
        $data['total'] = $data['total_income'] - $data['total_expenses'];
        return view(parent::loadView($this->view_path . '.view'), compact('data'));
    }


    public function view_report($id){
        $data = [];
        $farm = $this->model::where('id', '=', $id)->firstOrFail();
        $data['row'] = $farm;
        // $data['animal_details'] = json_decode($farm->biubijan_detail, true);
        // $data['mesinary_detail'] = json_decode($farm->mesinary_detail);
        // $data['other_details'] = json_decode($farm->mal_bibran_detail);
        // $data['worker_details'] = json_decode($farm->schedule_detail);

           // Decode biubijan_detail
        $data['animal_details'] = !empty($farm->biubijan_detail) ? json_decode($farm->biubijan_detail, true) : [];

        // Decode mesinary_detail
        $data['mesinary_details'] = !empty($farm->mesinary_detail) ? json_decode($farm->mesinary_detail, true) : [];

        // Decode mal_bibran_detail
        $data['anya_bibran_details'] = !empty($farm->mal_bibran_detail) ? json_decode($farm->mal_bibran_detail, true) : [];

        // Decode schedule_detail
        $data['worker_details'] = !empty($farm->schedule_detail) ? json_decode($farm->schedule_detail, true) : [];
        $data['amdani_details'] = !empty($farm->amdani_details) ? json_decode($farm->amdani_details, true) : [];
        // dd($data['worker_details']);
        // Decode other_details
        $data['other_details'] = !empty($farm->other_details) ? json_decode($farm->other_details, true) : [];
        $data['other_material'] = OtherMaterial::get();
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
        $data['amdani']        = FarmAmdani::where('new_farm_id', $farm->new_farm_id)
                                ->orWhereNull('new_farm_id')
                                ->get();
        return view(parent::loadView($this->view_path . '.report'), compact('data'));
    }
    public function karyatalika(Request $request)
    {
        // $request->validate($this->model->getRules(), $this->model->getMessage());
        try {
            $data                                     = new KaryatalikaBibran();
            $data->farm_id                            = $request->farm_id;
            $data->title                              = $request->title;
            $data->start_date                         = $request->start_date;
            $data->end_date                           = $request->end_date;
            $data->complete_status                    = $request->complete_status;
            $data->working_team                       = $request->working_team;
            $data->save();
            if ($request->hasFile('image')) {
                $file_path = getcwd() . $data->image;
                if (is_file($file_path)) {
                    unlink($file_path);
                }
                $data->image = parent::uploadImage($request, $this->folder_path, $this->image_prefix_path, 'image', '', '');
            }
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
        $check                                    = $data->save();

        if ($check) {
            session()->flash('alert-success', 'कार्यतालिका अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'कार्यतालिका अध्यावधिक हुन सकेन ।');
        }
        return redirect()->back();
    }

    public function destroy_karyatalika(Request $request, $id)
    {
        try {
            $data = $this->karyatalikaBibran->findOrFail($id);
            if (!$data) {
                $request->session()->flash('success_message', $this->panel . 'does not exists.');
                return redirect()->route($this->base_route);
            } else {
                $data->destroy($id);
                $file_path = getcwd() . $data->image;
                if (is_file($file_path)) {
                    unlink($file_path);
                }
                return response()->json($data);
            }
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }

    public function expenses(Request $request)
    {
        // $request->validate($this->model->getRules(), $this->model->getMessage());
        try {
            $data                                      = new Expenses();
            $data->farm_id                             = $request->farm_id;
            $data->types                               = $request->types;
            $data->purpose                             = $request->purpose;
            $data->date                                = $request->date;
            $data->amount                              = $request->amount;
            $data->remarks                             = $request->remarks;
            $data->save();
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
        $check                                    = $data->save();
        if ($check) {
            session()->flash('alert-success', 'खर्च तथा आम्दानी बिबरण अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'खर्च तथा आम्दानी बिबरण  अध्यावधिक हुन सकेन ।');
        }
        return redirect()->back();
    }

    public function destroy_expenses(Request $request, $id)
    {
        try {
            $data = $this->expenses->findOrFail($id);
            if (!$data) {
                $request->session()->flash('success_message', $this->panel . 'does not exists.');
                return redirect()->route($this->base_route);
            } else {
                $data->destroy($id);
                return response()->json($data);
            }
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }

    public function shedules(Request $request)
    {
        $row                                    = $this->karyatalikaBibran;
        $row->farm_id                           = $request->farm_id;
        $row->title                             = $request->title;
        $row->start_date                        = $request->start_date;
        $row->end_date                          = $request->end_date;
        $row->complete_status                   = $request->complete_status;
        $row->working_team                      = $request->working_team;
        $row->remarks                           = $request->remarks;
        $row->save();
        return response()->json(['success' => 'कार्यतालिका बिबरण सुरक्षित् भयो !']);
    }

    function add_mesinary(Request $request, $id){
        try {
            //code...
            $farm = Farm::findOrFail($id);
            $mesinary_details = json_decode($farm->mesinary_detail, true);

            $new_mesinary_data = [
                'id' => Str::uuid()->toString(),
                'mesinary_name' => $request->mesinary_name,
                'mesinery_unit' => $request->mesinery_unit,
                'mesinary_amount' => $request->mesinary_amount,
                'mesinary_quantity' => $request->mesinary_quantity,
                'mesinary_total_cost' => $request->mesinary_total_cost,
            ];
            $mesinary_details[] = $new_mesinary_data;
            $farm->mesinary_detail = json_encode($mesinary_details);
            $farm->total_mesinary_amount += $request->mesinary_total_cost;
            $farm->save();
        session()->flash('alert-success', 'खर्च तथा आम्दानी बिबरण अध्यावधिक भयो ।');
        } catch (\Throwable $th) {
            session()->flash('alert-danger', 'खर्च तथा आम्दानी बिबरण  अध्यावधिक हुन सकेन ।');
        }
        return back();
    }

    function add_worker(Request $request, $id){
        try {
            //code...

            $farm = Farm::findOrFail($id);
            $worker_details = json_decode($farm->schedule_detail, true);
            $new_worker_data = [
                'id' => Str::uuid()->toString(),
                'worker_name' => $request->worker_name,
                'worked_day' => $request->worked_day,
                'worked_hour' => $request->worked_hour,
                'wages_per_hour' => $request->wages_per_hour,
                'total_wages' => $request->total_wages,
            ];
            $worker_details[] = $new_worker_data;
            $farm->schedule_detail = json_encode($worker_details);
            $farm->total_worker_amount += $request->total_wages;
            $farm->save();
            session()->flash('alert-success', 'खर्च तथा आम्दानी बिबरण अध्यावधिक भयो ।');
        } catch (\Throwable $th) {
            session()->flash('alert-danger', 'खर्च तथा आम्दानी बिबरण  अध्यावधिक हुन सकेन ।');
        }
        return back();
    }

    function add_anya(Request $request, $id){
        try {
            //code...
            $farm = Farm::findOrFail($id);
            $anya_details = json_decode($farm->other_details, true);
            $new_anya_details = [
                'id' => Str::uuid()->toString(),
                'anya_bibran_name' => $request->anya_bibran_name,
                'anya_bibran_unit' => $request->anya_bibran_unit,
                'anya_bibran_unit_price' => $request->anya_bibran_unit_price,
                'anya_bibran_quantity' => $request->anya_bibran_quantity,
                'anya_bibran_total' => $request->anya_bibran_total,
            ];
            $anya_details[] = $new_anya_details;
            $farm->other_details = json_encode($anya_details);
            $farm->total_other_amount += $request->anya_bibran_total;
            $farm->save();
            session()->flash('alert-success', 'खर्च तथा आम्दानी बिबरण अध्यावधिक भयो ।');
        } catch (\Throwable $th) {
            session()->flash('alert-danger', 'खर्च तथा आम्दानी बिबरण  अध्यावधिक हुन सकेन ।');
        }
        return back();
    }

    function add_mal(Request $request, $id){
        $data->mal_bibran_detail = !empty($anya_bibran_data) ? json_encode($anya_bibran_data) : null;
        $data->total_mal_bibran_amount = !empty($total_anya_bibran_amount) ? $total_anya_bibran_amount : null;
        $farm = Farm::findOrFail($id);
        $anya_details = json_decode($farm->other_details, true);
        $new_anya_details = [
            'id' => Str::uuid()->toString(),
            'anya_bibran_name' => $request->anya_bibran_name,
            'anya_bibran_unit' => $request->anya_bibran_unit,
            'anya_bibran_unit_price' => $request->anya_bibran_unit,
            'anya_bibran_quantity' => $request->anya_bibran_unit,
            'anya_bibran_total' => $request->anya_bibran_total,
        ];
        $anya_details[] = $new_anya_details;
        $farm->other_details = json_encode($anya_details);
        $farm->total_other_amount += $request->anya_bibran_total;
        $farm->save();
        return back();
    }

    function add_amdani(Request $request, $id){
        // dd($request->all());
        try {
            $farm = Farm::findOrFail($id);
            $amdani_details = json_decode($farm->amdani_details, true);
            $new_amdani_details = [
                'id' => Str::uuid()->toString(),
                'amdani_sirshak' => $request->amdani_sirshak,
                'amdani_unit' => $request->amdani_unit,
                'amdani_unit_price' => $request->amdani_unit_price,
                'amdani_quantity' => $request->amdani_quantity,
                'amdani_total' => $request->amdani_total,
            ];
            $amdani_details[] = $new_amdani_details;
            $farm->amdani_details = json_encode($amdani_details);
            $farm->total_amdani_amount += $request->amdani_total;
            $farm->save();
            session()->flash('alert-success', 'खर्च तथा आम्दानी बिबरण अध्यावधिक भयो ।');
        } catch (\Throwable $th) {
            session()->flash('alert-danger', 'खर्च तथा आम्दानी बिबरण  अध्यावधिक हुन सकेन ।');
        }

        return back();
    }


    public function delete_mesinary(Request $request, $id)
    {
        try {
            // Retrieve the Farm instance
            $farm = Farm::findOrFail($id);

            // Decode the existing mesinary_detail JSON data
            $mesinary_details = json_decode($farm->mesinary_detail, true);

            // Identify the row to delete (e.g., by index or a unique identifier)
            $mesinary_name_to_delete = $request->id; // Assuming you pass the mesinary_name to delete
            $mesinary_total_cost_to_delete = 0;

            // Remove the specific row
            $mesinary_details = array_filter($mesinary_details, function($mesinary) use ($mesinary_name_to_delete, &$mesinary_total_cost_to_delete) {
                if ($mesinary['id'] == $mesinary_name_to_delete) {
                    $mesinary_total_cost_to_delete = $mesinary['mesinary_total_cost'];
                    return false;
                }
                return true;
            });

            // Re-encode the updated mesinary_details
            $farm->mesinary_detail = json_encode($mesinary_details);

            // Update the total_mesinary_amount
            $farm->total_mesinary_amount -= $mesinary_total_cost_to_delete;

            // Save the updated Farm instance
            $farm->save();

            // Flash success message
            session()->flash('alert-success', 'मेसिनरी विवरण सफलतापूर्वक हटाइयो ।');
        } catch (\Throwable $th) {
            // Flash error message
            session()->flash('alert-danger', 'मेसिनरी विवरण हटाउन असफल भयो ।');
        }

        return response()->json(true);
    }
    public function delete_worker(Request $request, $id)
    {
        try {
            // Retrieve the Farm instance
            $farm = Farm::findOrFail($id);

            // Decode the existing mesinary_detail JSON data
            $worker_details = json_decode($farm->schedule_detail, true);

            // Identify the row to delete (e.g., by index or a unique identifier)
            $worker_name_to_delete = $request->id; // Assuming you pass the mesinary_name to delete
            $worker_total_cost_to_delete = 0;

            // Remove the specific row
            $worker_details = array_filter($worker_details, function($worker) use ($worker_name_to_delete, &$worker_total_cost_to_delete) {
                if ($worker['id'] == $worker_name_to_delete) {
                    $worker_total_cost_to_delete = $worker_details['total_wages'];
                    return false;
                }
                return true;
            });

            // Re-encode the updated mesinary_details
            $farm->schedule_detail = json_encode($worker_details);

            // Update the total_mesinary_amount
            $farm->total_worker_amount -= $worker_total_cost_to_delete;

            // Save the updated Farm instance
            $farm->save();

            // Flash success message
            session()->flash('alert-success', 'मेसिनरी विवरण सफलतापूर्वक हटाइयो ।');
        } catch (\Throwable $th) {
            // Flash error message
            session()->flash('alert-danger', 'मेसिनरी विवरण हटाउन असफल भयो ।');
        }

        return response()->json(true);
    }

}
