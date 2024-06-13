<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Http\Controllers\Controller;
use App\Models\Expenses;
use App\Models\Farm;
use App\Models\GeneralProfile;
use App\Models\KaryatalikaBibran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FarmController extends DM_BaseController
{
    protected $panel = 'Farm';
    protected $base_route = 'user.farm';
    protected $view_path = 'user.farm';
    protected $model;
    protected $table;
    protected $folder = 'farm';
    protected $image_prefix_path = '/upload_file/farm/';
    protected $image_name = 'file';


    public function __construct(Farm $model, KaryatalikaBibran $karyatalikaBibran, Expenses $expenses)
    {
        $this->model = $model;
        $this->karyatalikaBibran = $karyatalikaBibran;
        $this->expenses = $expenses;
        $this->folder_path = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR .  $this->folder . DIRECTORY_SEPARATOR;
    }
    public function index()
    {

        $data['rows'] =  $this->model->getData();
        $data['karyatalika'] = KaryatalikaBibran::get();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }


    public function create()
    {
        $data['fiscal']        = $this->model->getFiscal();
        $data['biubijan']      = $this->model->getBiubijan();
        $data['applicant']     = GeneralProfile::where('status', '=', 1)->where('user_id', '=', Auth::user()->id)->first();
        $data['worker-types']  = $this->model->workerTypes();
        $data['mesinary']      = $this->model->Mesinary();
        // $data['ritu']       = $this->model->getRitu();
        // $data['month']      = $this->model->getMonth();
        $data['mal']           = $this->model->getMal();
        $data['mal']           = $this->model->getMal();
        $data['worker']        = NULL;
        $data['agri-category'] = $this->model->getAgriCategory();
        $data['agriculture']   =  DB::table('agricultures')->where('status', 1)->orderBy('id', 'DESC')->get();
        $data['month']         =  DB::table('months')->orderBy('id', 'ASC')->get();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }

    public function store(Request $request)
    {
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
            $mal_bibran_detail             = array_map(null, $mal_bibran_1, $mal_bibran_2, $mal_bibran_3, $mal_bibran_4, $mal_bibran_5);
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
        if (!empty(($request->worker_id))) {
            $worker_name                   = array_filter($request->worker_id);
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
        $check                                          = $data->save();
        if ($check) {
            session()->flash('alert-success', 'खेत बिबरण अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'खेत बिबरण अध्यावधिक हुन सकेन ।');
        }
        return redirect()->route($this->base_route . '.index');
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
    public function expenses(Request $request)
    {
        $row                                    = $this->expenses;
        $row->farm_id                           = $request->farm_id;
        $row->purpose                           = $request->purpose;
        $row->date                              = $request->date;
        $row->amount                            = $request->amount;
        $row->remarks                           = $request->remark;
        $row->save();
        return response()->json(['success' => 'खर्च बिबरण सुरक्षित् भयो !']);
    }
}
