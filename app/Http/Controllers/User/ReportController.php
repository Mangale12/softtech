<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Http\Controllers\Controller;
use App\Models\Expenses;
use App\Models\Farm;
use App\Models\KaryatalikaBibran;
use App\Models\UserReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends DM_BaseController
{
    protected $panel = 'Report';
    protected $base_route = 'user.report';
    protected $view_path = 'user.report';
    protected $model;
    protected $table;

    public function __construct(UserReport $model, Farm $farm)
    {
        $this->model   = $model;
        $this->farm   = $farm;
    }
    // Prifle Report
    public function index()
    {
        $data['fiscal_year'] = $this->model->getFiscalyear();
        $data['lands'] = $this->model->getLand();
        $data['baali'] = $this->model->getBaali();
        $data['rows'] = NULL;
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }

    public function search(Request $request)
    {
        $data['fiscal_year'] = $request->get('fiscal_year');
        $data['land_id'] = $request->get('land_id');
        $data['baali'] = $request->get('baali');
        // dd($data);
        $data['rows'] = Farm::
        // Where('fiscal_year', 'LIKE', '%' . $data['fiscal_year'] . '%')
            // // ->where('land_id', 'LIKE', '%' . $data['land_id'] . '%')
            // ->where('baali', 'LIKE', '%' . $data['baali'] . '%')
            // ->orderBy('id', 'DESC')
            paginate(10);
            // dd($data['rows']);
        $data['fiscal_year'] = $this->model->getFiscalyear();
        $data['lands'] = $this->model->getLand();
        $data['baali'] = $this->model->getBaali();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }

    public function show($id)
    {
        $data['rows'] = Farm::findOrFail($id);
        $data['karyatalika'] = KaryatalikaBibran::where('farm_id', $id)->get();
        $data['expenses'] = Expenses::where('farm_id', $id)->get();
        return view(parent::loadView($this->view_path . '.show'), compact('data'));
    }
}
