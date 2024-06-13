<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Http\Controllers\Controller;
use App\Models\DatriNikai;
use Illuminate\Http\Request;

class DatriNikaiController extends DM_BaseController
{
    protected $panel = 'Datri Nikai';
    protected $base_route = 'admin.datrinikai';
    protected $view_path = 'admin.datrinikai';
    protected $model;
    protected $table;

    public function __construct(DatriNikai $model)
    {
        $this->model = $model;
    }
    public function index()
    {
        $data['rows'] =  $this->model->getData();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function getData(Request $request)
    {

        $draw                 =         $request->get('draw'); // Internal use
        $start                 =         $request->get("start"); // where to start next records for pagination
        $rowPerPage         =         $request->get("length"); // How many recods needed per page for pagination

        $orderArray        =         $request->get('order');
        $columnNameArray     =         $request->get('columns'); // It will give us columns array

        $searchArray         =         $request->get('search');
        $columnIndex         =         $orderArray[0]['column'];  // This will let us know,
        // which column index should be sorted 
        // 0 = id, 1 = name, 2 = email , 3 = created_at

        $columnName         =         $columnNameArray[$columnIndex]['data']; // Here we will get column name, 
        // Base on the index we get

        $columnSortOrder     =         $orderArray[0]['dir']; // This will get us order direction(ASC/DESC)
        $searchValue         =         $searchArray['value']; // This is search value 


        $users = \DB::table('datri_nikais');
        $total = $users->count();

        $totalFilter = \DB::table('datri_nikais');
        if (!empty($searchValue)) {
            $totalFilter = $totalFilter->where('name', 'like', '%' . $searchValue . '%');
            $totalFilter = $totalFilter->orWhere('email', 'like', '%' . $searchValue . '%');
        }
        $totalFilter = $totalFilter->count();


        $arrData = \DB::table('datri_nikais');
        $arrData = $arrData->skip($start)->take($rowPerPage);
        $arrData = $arrData->orderBy($columnName, $columnSortOrder);

        if (!empty($searchValue)) {
            $arrData = $arrData->where('name', 'like', '%' . $searchValue . '%');
            $arrData = $arrData->orWhere('email', 'like', '%' . $searchValue . '%');
        }

        $arrData = $arrData->get();

        $response = array(
            "draw" => intval($draw),
            "recordsTotal" => $total,
            "recordsFiltered" => $totalFilter,
            "data" => $arrData,
        );

        return response()->json($response);
    }
    public function create()
    {
        return view(parent::loadView($this->view_path . '.create'));
    }

    public function store(Request $request)
    {
        // $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->storeData($request, $request->name, $request->address, $request->phone, $request->amounts, $request->help, $request->product, $request->quantity, $request->status)) {
            session()->flash('alert-success', 'दात्रिनिकाय सहयोग अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'दात्रिनिकाय सहयोग अध्यावधिक हुन सकेन ।');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function edit($id)
    {
        $data['rows'] = $this->model::where('id', '=', $id)->firstOrFail();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->updateData($request, $id, $request->name, $request->address, $request->phone, $request->amounts, $request->help, $request->product, $request->quantity, $request->status)) {
            session()->flash('alert-success', 'दात्रिनिकाय सहयोग  अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'दात्रिनिकाय सहयोग अध्यावधिक हुन सकेन ।');
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
}
