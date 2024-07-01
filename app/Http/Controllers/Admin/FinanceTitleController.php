<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FinanceTitle;
class FinanceTitleController extends DM_BaseController
{
    protected $panel = 'Finance Title';
    protected $base_route = 'admin.finance_titles';
    protected $view_path = 'admin.finance-title';
    protected $model;
    protected $table;
    public function __construct(FinanceTitle $model)
    {
        $this->model = $model;
        $this->middleware('permission:create FinanceTitle')->only(['index', 'show']);
        $this->middleware('permission:create FinanceTitle')->only(['cerate', 'store']);
        $this->middleware('permission:edit FinanceTitle')->only(['edit', 'update']);
        $this->middleware('permission:delete FinanceTitle')->only('destroy');
    }
    function index(){
        $data['rows'] = FinanceTitle::paginate(10);
        return view(parent::loadView($this->view_path.'.index'),compact('data'));
    }

    function create(){
        return view(parent::loadView($this->view_path.'.create'));
    }

    function store(Request $request){
        FinanceTitle::create($request->all());
        return redirect()->route($this->base_route.'.index');
    }

    function edit($id){
        $data['rows'] = FinanceTitle::findOrFail($id);
        return view(parent::loadView($this->view_path.'.edit'), compact('data'));
    }

    function update(Request $request, $id){
        $FinanceTitle = FinanceTitle::findOrFail($id);
        $FinanceTitle->update($request->all());
        return redirect()->route($this->base_route.'.index');
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
