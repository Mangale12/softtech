<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Ekai;
use App\Models\GeneralFamily;
use App\Models\GeneralLand;
use App\Models\GeneralProfile;
use App\Models\GeneralWorker;
use App\Models\LandList;
use App\Models\LocalLevel;
use App\Models\Palika;
use App\Models\Provinces;
use App\Models\WorkerList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\DB;

class GeneralProfilesController extends DM_BaseController
{
    protected $panel = 'General Profile';
    protected $base_route = 'admin.general';
    protected $view_path = 'admin.general';
    protected $model;
    protected $table;
    protected $local_level;
    protected $folder = 'general-profile';
    protected $image_prefix_path = '/upload_file/general-profile/';
    protected $image_name = 'file';
    protected $total_land;
    protected $folder_path;
    protected $total_worker;

    public function __construct(LocalLevel $local_level, GeneralProfile $model, LandList $total_land, WorkerList $total_worker)
    {
        $this->local_level = $local_level;
        $this->model = $model;
        $this->total_land = $total_land;
        $this->total_worker = $total_worker;
        $this->folder_path = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR .  $this->folder . DIRECTORY_SEPARATOR;
    }
    public function index()
    {
        $data['rows'] =  $this->model->getData();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        $data['province'] = Provinces::get();
        $data['district'] = District::get();
        $data['palika']  = Palika::get();
        $data['users']   = $this->model->getUsers();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate($this->model->getRules(), $this->model->getMessage());
        try {
            $data =                                     new GeneralProfile;
            $data->user_id                            = $request->user_id;
            $data->unique_id                          = env("APPLICATION_SERIAL", 2080) . "" . date("dHis") . rand(0000, 9999);
            $data->added_by                           = Auth::user()->id;
            $data->full_name                          = $request->full_name;
            $data->email                              = $request->email;
            $data->mobile                             = $request->mobile;
            $data->occupation                         = $request->occupation;
            $data->blood_group                        = $request->blood_group;
            $data->gender                             = $request->gender;
            $data->marital_status                     = $request->marital_status;
            $data->dob                                = $request->dob;
            $data->permanent_state                    = $request->permanent_state;
            $data->permanent_district                 = $request->permanent_district;
            $data->permanent_palika                   = $request->permanent_palika;
            $data->permanent_ward                     = $request->permanent_ward;

            $check                                    = $data->save();
            $unique_id                                = $data->unique_id;
            $general_parent_id                        = $data->id;
            $user_id                                  =  Auth::user()->id;
            if (isset($check)) {
                $row_1                                = new GeneralFamily;
                $row_1->unique_id                     = $unique_id;
                $row_1->general_parent_id             = $general_parent_id;
                $row_1->user_id                       = $user_id;
                $row_1->save();

                $row_2                                = new GeneralLand;
                $row_2->unique_id                     = $unique_id;
                $row_2->general_parent_id             = $general_parent_id;
                $row_2->user_id                       = $user_id;
                $row_2->save();

                $row_3                                = new GeneralWorker;
                $row_3->unique_id                     = $unique_id;
                $row_3->general_parent_id             = $general_parent_id;
                $row_3->user_id                       = $user_id;
                $row_3->save();
            }
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }

        if ($check) {
            session()->flash('alert-success', 'नयाँ किसान प्रोफाइल अध्यावधिक भयो ।');
            return redirect()->route($this->view_path . '.family-edit', ['unique_id' => $unique_id]);
        } else {
            session()->flash('alert-danger', 'नयाँ किसान प्रोफाइल अध्यावधिक हुन सकेन ।');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function edit($unique_id)
    {
        $data['single'] = GeneralProfile::where('unique_id', '=', $unique_id)->first();
        $data['province'] = Provinces::get();
        $data['district'] = District::get();
        $data['palika']  = Palika::get();
        $data['unique_id'] = $unique_id;
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $unique_id)
    {
        $request->validate($this->model->getRules(), $this->model->getMessage());
        try {
            $data                                     = GeneralProfile::where('unique_id', '=', $unique_id)->first();
            $data->user_id                            = Auth::user()->id;
            $data->added_by                           = Auth::user()->name;
            $data->full_name                          = $request->full_name;
            $data->email                              = $request->email;
            $data->mobile                             = $request->mobile;
            $data->occupation                         = $request->occupation;
            $data->blood_group                        = $request->blood_group;
            $data->gender                             = $request->gender;
            $data->marital_status                     = $request->marital_status;
            $data->dob                                = $request->dob;
            $data->permanent_state                    = $request->permanent_state;
            $data->permanent_district                 = $request->permanent_district;
            $data->permanent_palika                   = $request->permanent_palika;
            $data->permanent_ward                     = $request->permanent_ward;
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
        // if ($request->hasFile('image')) {
        //     $data->image = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image', '', '');
        // }
        $check                                    = $data->save();

        if ($check) {
            session()->flash('alert-success', 'नयाँ किसान प्रोफाइल अध्यावधिक भयो ।');
            return redirect()->route($this->view_path . '.land-edit', ['unique_id' => $unique_id]);
        } else {
            session()->flash('alert-danger', 'नयाँ किसान प्रोफाइल अध्यावधिक हुन सकेन ।');
            return view(parent::loadView($this->view_path . '.index'));
        }
    }

    public function editFamily($unique_id)
    {

        $data['single'] = GeneralFamily::where('unique_id', '=', $unique_id)->first();
        $data['unique_id'] = $unique_id;
        return view(parent::loadView($this->view_path . '.family-edit'), compact('data'));
    }
    public function updateFamily(Request $request, $unique_id)
    {
        // dd($request->all());
        //$request->validate($this->model->getRules(), $this->model->getMessage());
        $full_name  = array_filter($request->full_name);
        $email      = array_filter($request->email);
        $mobile     = array_filter($request->mobile);
        $occupation = array_filter($request->occupation);
        // array-map:here-null-used-to-place-array-within-array
        $general_family = array_map(null, $full_name, $email, $mobile, $occupation);
        $data                                        =  GeneralFamily::where('unique_id', '=', $unique_id)->first();
        $data->unique_id                             = $request->unique_id;
        $data->user_id                               = Auth::user()->id;
        $data->family_detail                         = json_encode($general_family);
        $check                                       = $data->save();

        if ($check) {
            session()->flash('alert-success', ' पारिवारिक बिबरण अध्यावधिक भयो ।');
            return redirect()->route($this->view_path . '.land-edit', ['unique_id' => $unique_id]);
        } else {
            session()->flash('alert-danger', 'पारिवारिक बिबरण अध्यावधिक हुन सकेन ।');
            return redirect()->route($this->view_path . '.index');
            return view(parent::loadView($this->view_path . '.index'));
        }
    }

    public function editLand($unique_id)
    {
        $data['single']    = GeneralLand::where('unique_id', '=', $unique_id)->first();
        $data['land_list'] = LandList::where('unique_id', '=', $unique_id)->get();
        $data['province']  = Provinces::get();
        $data['district']  = District::get();
        $data['palika']    = Palika::get();
        $data['unique_id'] = $unique_id;
        return view(parent::loadView($this->view_path . '.land-edit'), compact('data'));
    }

    public function updateLand(Request $request, $unique_id)
    {
        $data                                                = GeneralLand::where('unique_id', '=', $unique_id)->first();
        $data->user_id                                       = Auth::user()->id;
        $data->unique_id                                     = $request->unique_id;
        $check                                               = $data->save();

        if ($check) {
            session()->flash('alert-success', ' जग्गा बिबरण अध्यावधिक भयो ।');
            return redirect()->route($this->view_path . '.worker-edit', ['unique_id' => $unique_id]);
        } else {
            session()->flash('alert-danger', 'जग्गा बिबरण अध्यावधिक हुन सकेन ।');
            return redirect()->route($this->view_path . '.index');
        }
    }

    public function storeLand(Request $request)
    {
        $landList                                        = new LandList();
        $landList->unique_id                             = $request->unique_id;
        $landList->land_id                               = $request->land_id;
        $landList->kita_no                               = $request->kita_no;
        $landList->permanent_state                       = $request->province_id;
        $landList->permanent_district                    = $request->district_id;
        $landList->permanent_palika                      = $request->palika_id;
        $landList->permanent_ward                        = $request->ward_id;
        $landList->ekai_id                               = $request->ekai_id;
        $landList->totalbigaha                           = $request->totalbigaha;
        $landList->totalkattha                           = $request->totalkattha;
        $landList->totaldhur                             = $request->totaldhur;
        $landList->totalropani                           = $request->totalropani;
        $landList->totalaana                             = $request->totalaana;
        $landList->totalpaisa                            = $request->totalpaisa;
        $landList->totaldam                              = $request->totaldam;
        $success                                         = $landList->save();
        if ($success) {
            return response()->json(['success' => $this->panel . ' जग्गा बिबरण अध्यावधिक भयो । !']);
        } else {
            return response()->json(['error' => $this->panel . ' जग्गा बिबरण अध्यावधिक हुन सकेन । !']);
        }
    }

    public function editWorker($unique_id)
    {

        $data['single'] = GeneralWorker::where('unique_id', '=', $unique_id)->first();
        // dd($data['single']);
        $data['worker_list'] = WorkerList::where('unique_id', '=', $unique_id)->get();
        $data['unique_id'] = $unique_id;
        return view(parent::loadView($this->view_path . '.worker-edit'), compact('data'));
    }

    public function storeWorker(Request $request)
    {
        $workerList                                        = new WorkerList();
        $workerList->unique_id                             = $request->unique_id;
        $workerList->worker_id                             = $request->worker_id;
        $workerList->full_name                             = $request->full_name;
        $workerList->mobile                                = $request->mobile;
        $workerList->gender                                = $request->gender;
        $workerList->worker_types                          = $request->worker_types;
        $workerList->times                                 = $request->times;
        $workerList->salary_type                           = $request->salary_type;
        $workerList->salary                                = $request->salary;
        $success                                           = $workerList->save();
        if ($success) {
            return response()->json(['success' => $this->panel . ' कामदार बिबरण अध्यावधिक भयो । !']);
        } else {
            return response()->json(['error' => $this->panel . ' कामदार बिबरण अध्यावधिक हुन सकेन । !']);
        }
    }
    public function updateWorker(Request $request, $unique_id)
    {
        $data = $request->all();
        // dd($data);
        $worker                   =  GeneralWorker::where('unique_id', '=', $unique_id)->first();
        $worker->full_name        = $request->full_name;
        $worker->mobile           = $request->mobile;
        $worker->gender           = $request->gender;
        $worker->worker_types     = $request->worker_types;
        $worker->times            = $request->times;
        $worker->salary_type      = $request->salary_type;
        $worker->occupation       = $request->occupation;
        for ($i = 0; $i < count($worker->full_name); $i++) {
            $datasave = [
                'full_name'     => $worker->full_name[$i],
                'mobile'        =>    $worker->mobile[$i],
                'gender'        =>   $worker->gender[$i],
                'worker_types'  => $worker->worker_types[$i],
                'time'          =>      $worker->times[$i],
                'salary_type'   => $worker->salary_type[$i],
                'occupation'    =>  $worker->occupation[$i],
                'unique_id'     =>   $unique_id,
                // 'general_parent_id' => $worker->general_parent_id,
                'user_id'       => Auth::user()->id,
            ];
            // dd($datasave);
            DB::table('general_workers')->insert($datasave);
        }
        $check                     = $datasave;
        if ($check) {
            session()->flash('alert-success', ' कामदार बिबरण अध्यावधिक भयो ।');
            return redirect()->route($this->view_path . '.index');
        } else {
            session()->flash('alert-danger', 'कामदार बिबरण अध्यावधिक हुन सकेन ।');
            return redirect()->route($this->view_path . '.worker-edit', ['unique_id' => $unique_id]);
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
        return response()->json($data);
    }

    public function deletedPost()
    {
        $data['rows'] = $this->model->where('deleted_at', '!=', null)->get();
        return view(parent::loadView($this->view_path . '.deleted'), compact('data'));
    }

    public function restore($id)
    {
        $data = $this->model::where('id', '=', $id)->get();
        foreach ($data as $row) {
            $row->deleted_at = null;
            $row->save();
        }
    }

    public function permanentDelete($id)
    {
        $row = $this->model::findOrFail($id);
        $file_path = getcwd() . $row->image;
        // dd($file_path);
        if (is_file($file_path)) {
            unlink($file_path);
        }
        foreach ($row as $row) {
            $this->model::where('id', '=', $id)->delete();
        }
    }

    public function destroyLand(Request $request, $id)
    {
        try {
            $data = $this->total_land->findOrFail($id);
            if (!$data) {
                $request->session()->flash('success_message', $this->panel . 'does not exists.');
                return redirect()->back();
            } else {
                $data->destroy($id);
                return response()->json($data);
            }
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }
    public function destroyWorker(Request $request, $id)
    {
        try {
            $data = $this->total_worker->findOrFail($id);
            if (!$data) {
                $request->session()->flash('success_message', $this->panel . 'does not exists.');
                return redirect()->back();
            } else {
                $data->destroy($id);
                return response()->json($data);
            }
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }
}
