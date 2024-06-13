<?php

namespace App\Http\Controllers\Admin;

use App\Models\LekhaSirsak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LekhaSirsakController extends DM_BaseController
{
    protected $panel = 'Lekha Sirsak';
    protected $base_route = 'admin.lekha_sirsak';
    protected $view_path = 'admin.lekha_sirsak';
    protected $model;
    public function __construct(LekhaSirsak $model)
    {
        $this->model = $model;
    }
    public function index()
    {
        $data['rows'] = $this->model->getData();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        return view(parent::loadView($this->view_path . '.create'));
    }
    public function destroy(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);
        if (!$data) {
            $request->session()->flash('success_message', $this->panel . 'doesnot exist.');
            return redirect()->route($this->base_route);
        }
        $data->destroy($id);
        return response()->json($data);
    }
}
