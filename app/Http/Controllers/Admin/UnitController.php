<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\DataTables\UnitsDataTable;
use DataTables;
class UnitController extends DM_BaseController
{
    protected $panel = 'Unit';
    protected $base_route = 'admin.unit';
    protected $view_path = 'admin.unit';
    protected $model;
    protected $table;

    public function __construct(Unit $model)
    {
        $this->model = $model;
        $this->middleware('permission:view Unit')->only(['index', 'show']);
        $this->middleware('permission:create Unit')->only(['cerate', 'store']);
        $this->middleware('permission:edit Unit')->only(['edit', 'update']);
        $this->middleware('permission:delete Unit')->only('destroy');
    }
    // public function index(Request $request)
    // {
    //     $data['rows'] =  $this->model->getData();
    //     return view(parent::loadView($this->view_path . '.index'), compact('data'));
    // }
    public function index()
    {
        $_panel = $this->panel;
        return view('admin.unit.index', compact('_panel'));
    }
    public function datatables()
    {
        $_base_route = $this->base_route;
        $units = Unit::query();
        return DataTables::of($units)
        ->addColumn('action', function ($row) use ($_base_route) {
            $editButton = view('admin.section.buttons.button-edit', compact('row', '_base_route'))->render();
            $deleteButton = view('admin.section.buttons.button-delete', compact('row', '_base_route'))->render();

            // Concatenate the HTML output of each button view
            return $editButton . ' ' . $deleteButton;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function create()
    {
        return view(parent::loadView($this->view_path . '.create'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate($this->model->getRules(), $this->model->getMessage());
        $data = $request->all();
        $this->model->fill(['name' => $request->name,
                            'code' => $request->name,
                        ]);
        $success =  $this->model->save();
        if ($success) {
            session()->flash('alert-success', 'यूनिट अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'यूनिट अध्यावधिक हुन सकेन ।');
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
        $request->validate($this->model->getRules($id), $this->model->getMessage());
        $this->model = $this->model->findOrFail($id);
        $data = $request->all();
        $this->model->fill($data);
        $success =  $this->model->save();
        if ($success) {
            session()->flash('alert-success', 'यूनिट अध्यावधिक भयो ।');
        } else {
            session()->flash('alert-danger', 'यूनिट अध्यावधिक हुन सकेन ।');
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
