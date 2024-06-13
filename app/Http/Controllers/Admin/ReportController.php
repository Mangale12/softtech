<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Http\Controllers\Controller;
use App\Models\Agriculture;
use App\Models\Animal;
use App\Models\Anudann;
use App\Models\Beema;
use App\Models\BiuBijan;
use App\Models\DatriNikai;
use App\Models\Farm;
use App\Models\GeneralProfile;
use App\Models\Mesinary;
use App\Models\Report;
use App\Models\Sangrachana;
use App\Models\Talim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends DM_BaseController
{
    protected $panel = 'Profile Report';
    protected $base_route = 'admin.report';
    protected $view_path = 'admin.report';
    protected $model;
    protected $table;

    public function __construct(Report $model, Anudann $anudaan, Farm $farm)
    {
        $this->model   = $model;
        $this->anudaan = $anudaan;
        $this->farm    = $farm;
        $this->middleware('permission:view report');
        // $this->middleware('permission:edit main setup')->only(['edit', 'update']);
        // $this->middleware('permission:delete main setup')->only('destroy');
    }
    // Prifle Report
    public function index()
    {
        $data['rows'] = NULL;
        return view(parent::loadView($this->view_path . '.general-report'), compact('data'));
    }

    public function search(Request $request)
    {
        $data['full_name'] = $request->get('full_name');
        $data['mobile'] = $request->get('mobile');
        $data['dob'] = $request->get('dob');
        $data['email'] = $request->get('email');
        // dd($data);
        $data['rows'] = DB::table('general_profiles')
            ->Where('full_name', 'LIKE', '%' . $data['full_name'] . '%')
            ->where('mobile', 'LIKE', '%' . $data['mobile'] . '%')
            ->where('email', 'LIKE', '%' . $data['email'] . '%')
            ->orderBy('id', 'DESC')
            ->paginate(10);
        return view(parent::loadView($this->view_path . '.general-report'), compact('data'));
    }

    public function show(Request $request, $unique_id)
    {
        $data['unique_id'] = $unique_id;
        $data['general']   = DB::table('general_profiles')->where('unique_id', '=', $unique_id)->first();
        $data['family']    = DB::table('general_families')->where('unique_id', '=', $unique_id)->first();
        $data['worker']    = DB::table('general_workers')->where('unique_id', '=', $unique_id)->first();
        // $data['farm']      = DB::table('farms')->where('unique_id', '=', $unique_id)->first();


        if (!$data) {
            $request->session()->flash('success_message', $this->panel . 'does not exists.');
            return redirect()->route($this->base_route);
        }
        return view(parent::loadView($this->view_path . '.show'), compact('data'));
    }
    //Farm Index

    public function Farm_index()
    {
        $this->panel = 'Farm Report';
        $data['rows'] = $this->farm->orderBy('id', 'DESC')->paginate(10);
        return view(parent::loadView($this->view_path . '.farm-report'), compact('data'));
    }
    public function showFarm(Request $request, $id)
    {
        $this->panel = 'Farm Report';
        $data['rows'] = $this->farm->where('id', '=', $id)->first();
        return view(parent::loadView($this->view_path . '.show-farm'), compact('data'));
    }



    // ANudaan Report
    public function Anudaan_index()
    {
        $this->panel = 'Anudaan Report';
        $data['category'] = $this->model->getAnudaanCategory();
        $data['rows'] = NULL;
        return view(parent::loadView($this->view_path . '.anudaan-report'), compact('data'));
    }
    public function Anudaan_search(Request $request)
    {
        $this->panel = 'Anudaan Report';
        $data['category'] = $this->model->getAnudaanCategory();
        $data['category_id'] = $request->get('category_id');
        $data['title'] = $request->get('title');
        $data['amount'] = $request->get('amount');
        $data['bibran'] = $request->get('bibran');
        $data['rows'] = Anudann::where('category_id', 'LIKE', '%' . $data['category_id'] . '%')
            ->Where('title', 'LIKE', '%' . $data['title'] . '%')
            ->Where('amount', 'LIKE', '%' . $data['amount'] . '%')
            ->Where('bibran', 'LIKE', '%' . $data['bibran'] . '%')
            ->paginate(10);
        return view(parent::loadView($this->view_path . '.anudaan-report'), compact('data'));
    }
    public function showAnudaan(Request $request, $id)
    {
        $this->panel   = 'Anudaan Report';
        $data['id']    = $id;
        $data['row']   = $this->anudaan::where('id', '=', $id)->first();
        if (!$data) {
            $request->session()->flash('success_message', $this->panel . 'does not exists.');
            return redirect()->route($this->base_route);
        }
        return view(parent::loadView($this->view_path . '.show-anudaan'), compact('data'));
    }

    // Talim Report
    public function Talim_index()
    {
        $this->panel = 'Talim Report';
        $data['category'] = $this->model->getAnudaanCategory();
        $data['rows'] = NULL;
        return view(parent::loadView($this->view_path . '.talim-report'), compact('data'));
    }
    public function Talim_search(Request $request)
    {
        $this->panel = 'Talim Report';
        $data['title'] = $request->get('title');
        $data['duration'] = $request->get('duration');
        $data['rows'] = Talim::where('title', 'LIKE', '%' . $data['title'] . '%')
            ->Where('duration', 'LIKE', '%' . $data['duration'] . '%')
            ->paginate(10);
        return view(parent::loadView($this->view_path . '.talim-report'), compact('data'));
    }
    public function showTalim(Request $request, $id)
    {
        $this->panel = 'Talim Report';
        $data['id']    = $id;
        $data['row']   = DB::table('talims')->where('id', '=', $id)->first();
        if (!$data) {
            $request->session()->flash('success_message', $this->panel . 'does not exists.');
            return redirect()->route($this->base_route);
        }
        return view(parent::loadView($this->view_path . '.show-talim'), compact('data'));
    }

    // Datrinikai Report
    public function Datrinikai_index()
    {
        $this->panel = 'Datrinikai Report';
        $data['rows'] = NULL;
        return view(parent::loadView($this->view_path . '.datrinikai-report'), compact('data'));
    }
    public function Datrinikai_search(Request $request)
    {
        $this->panel = 'Datrinikai Report';
        $data['name'] = $request->get('name');
        $data['phone'] = $request->get('phone');
        $data['address'] = $request->get('address');
        $data['rows'] = DatriNikai::where('name', 'LIKE', '%' . $data['name'] . '%')
            ->Where('phone', 'LIKE', '%' . $data['phone'] . '%')
            ->Where('address', 'LIKE', '%' . $data['address'] . '%')
            ->paginate(10);
        return view(parent::loadView($this->view_path . '.datrinikai-report'), compact('data'));
    }
    public function showDatrinikai(Request $request, $id)
    {
        $this->panel = 'Datrinikai Report';
        $data['id']    = $id;
        $data['row']   = DB::table('datri_nikais')->where('id', '=', $id)->first();
        if (!$data) {
            $request->session()->flash('success_message', $this->panel . 'does not exists.');
            return redirect()->route($this->base_route);
        }
        return view(parent::loadView($this->view_path . '.show-datrinikai'), compact('data'));
    }

    // Beema Report
    public function Beema_index()
    {
        $this->panel = 'Beema Report';
        $data['rows'] = NULL;
        return view(parent::loadView($this->view_path . '.beema-report'), compact('data'));
    }
    public function Beema_search(Request $request)
    {
        $this->panel = 'Beema Report';
        $data['title'] = $request->get('title');
        $data['start_date'] = $request->get('start_date');
        $data['end_date'] = $request->get('end_date');
        $data['rows'] = Beema::where('title', 'LIKE', '%' . $data['title'] . '%')
            ->Where('start_date', 'LIKE', '%' . $data['start_date'] . '%')
            ->Where('end_date', 'LIKE', '%' . $data['end_date'] . '%')
            ->paginate(10);
        return view(parent::loadView($this->view_path . '.beema-report'), compact('data'));
    }
    public function showBeema(Request $request, $id)
    {
        $this->panel = 'Beema Report';
        $data['id']    = $id;
        $data['row']   = DB::table('beemas')->where('id', '=', $id)->first();
        if (!$data) {
            $request->session()->flash('success_message', $this->panel . 'does not exists.');
            return redirect()->route($this->base_route);
        }
        return view(parent::loadView($this->view_path . '.show-beema'), compact('data'));
    }

    // sangrachana Report
    public function Sangrachana_index()
    {
        $this->panel = 'Sangrachana Report';
        $data['rows'] = NULL;
        return view(parent::loadView($this->view_path . '.sangrachana-report'), compact('data'));
    }
    public function Sangrachana_search(Request $request)
    {
        $this->panel = 'Sangrachana Report';
        $data['types'] = $request->get('types');
        $data['made_date'] = $request->get('made_date');
        $data['rows'] = Sangrachana::where('types', 'LIKE', '%' . $data['types'] . '%')
            ->Where('made_date', 'LIKE', '%' . $data['made_date'] . '%')
            ->paginate(10);
        return view(parent::loadView($this->view_path . '.sangrachana-report'), compact('data'));
    }
    public function showSangrachana(Request $request, $id)
    {
        $this->panel = 'Sangrachana Report';
        $data['id']    = $id;
        $data['row']   = DB::table('sangrachanas')->where('id', '=', $id)->first();
        if (!$data) {
            $request->session()->flash('success_message', $this->panel . 'does not exists.');
            return redirect()->route($this->base_route);
        }
        return view(parent::loadView($this->view_path . '.show-sangrachana'), compact('data'));
    }

    // Mesinary Report
    public function Mesinary_index()
    {
        $this->panel = 'Mesinary Report';
        $data['rows'] = NULL;
        return view(parent::loadView($this->view_path . '.mesinary-report'), compact('data'));
    }
    public function Mesinary_search(Request $request)
    {
        $this->panel = 'Mesinary Report';
        $data['purpose'] = $request->get('purpose');
        $data['ekai'] = $request->get('ekai');
        $data['rows'] = Mesinary::where('purpose', 'LIKE', '%' . $data['purpose'] . '%')
            ->Where('ekai', 'LIKE', '%' . $data['ekai'] . '%')
            ->paginate(10);
        return view(parent::loadView($this->view_path . '.mesinary-report'), compact('data'));
    }
    public function showMesinary(Request $request, $id)
    {
        $this->panel = 'Mesinary Report';
        $data['id']    = $id;
        $data['row']   = DB::table('mesinaries')->where('id', '=', $id)->first();
        if (!$data) {
            $request->session()->flash('success_message', $this->panel . 'does not exists.');
            return redirect()->route($this->base_route);
        }
        return view(parent::loadView($this->view_path . '.show-mesinary'), compact('data'));
    }
    // Biu-bijan Report
    public function BiuBijan_index()
    {
        $this->panel = 'Biu Bijan Report';
        $data['rows'] = NULL;
        return view(parent::loadView($this->view_path . '.biubijan-report'), compact('data'));
    }
    public function BiuBijan_search(Request $request)
    {
        $this->panel = 'Biu Bijan Report';
        $data['title'] = $request->get('title');
        $data['rows'] = BiuBijan::where('title', 'LIKE', '%' . $data['title'] . '%')
            ->paginate(10);
        return view(parent::loadView($this->view_path . '.biubijan-report'), compact('data'));
    }
    public function showBiuBijan(Request $request, $id)
    {
        $this->panel = 'Biu Bijan Report';
        $data['id']    = $id;
        $data['row']   = DB::table('biu_bijans')->where('id', '=', $id)->first();
        if (!$data) {
            $request->session()->flash('success_message', $this->panel . 'does not exists.');
            return redirect()->route($this->base_route);
        }
        return view(parent::loadView($this->view_path . '.show-biubijan'), compact('data'));
    }

    // Animal Report
    public function Animal_index()
    {
        $this->panel = 'Animal Report';
        $data['category'] = $this->model->getAnimalCategory();
        $data['rows'] = NULL;
        return view(parent::loadView($this->view_path . '.animal-report'), compact('data'));
    }
    public function Animal_search(Request $request)
    {
        $this->panel = 'Animal Report';
        $data['category'] = $this->model->getAnimalCategory();
        $data['title'] = $request->get('title');
        $data['animal_id'] = $request->get('animal_id');
        $data['rows'] = Animal::where('title', 'LIKE', '%' . $data['title'] . '%')
            ->where('animal_id', 'LIKE', '%' . $data['animal_id'] . '%')
            ->paginate(10);
        return view(parent::loadView($this->view_path . '.animal-report'), compact('data'));
    }
    public function showAnimal(Request $request, $id)
    {
        $this->panel = 'Animal Report';
        $data['id']    = $id;
        $data['row']   = DB::table('animals')->where('id', '=', $id)->first();
        if (!$data) {
            $request->session()->flash('success_message', $this->panel . 'does not exists.');
            return redirect()->route($this->base_route);
        }
        return view(parent::loadView($this->view_path . '.show-animal'), compact('data'));
    }

    // Agriculture Report
    public function Agriculture_index()
    {
        $this->panel = 'Agriculture Report';
        $data['category'] = $this->model->getagriculturalCategory();
        $data['rows'] = NULL;
        return view(parent::loadView($this->view_path . '.agriculture-report'), compact('data'));
    }
    public function Agriculture_search(Request $request)
    {
        $this->panel = 'Agriculture Report';
        $data['category'] = $this->model->getagriculturalCategory();
        $data['title'] = $request->get('title');
        $data['agricultural_id'] = $request->get('agricultural_id');
        $data['rows'] = Agriculture::where('title', 'LIKE', '%' . $data['title'] . '%')
            ->where('agricultural_id', 'LIKE', '%' . $data['agricultural_id'] . '%')
            ->paginate(10);
        return view(parent::loadView($this->view_path . '.agriculture-report'), compact('data'));
    }
    public function showAgriculture(Request $request, $id)
    {
        $this->panel = 'Agriculture Report';
        $data['id']    = $id;
        $data['row']   = DB::table('animals')->where('id', '=', $id)->first();
        if (!$data) {
            $request->session()->flash('success_message', $this->panel . 'does not exists.');
            return redirect()->route($this->base_route);
        }
        return view(parent::loadView($this->view_path . '.show-agriculture'), compact('data'));
    }
}
