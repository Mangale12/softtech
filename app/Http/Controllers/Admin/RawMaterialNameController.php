<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\RawMaterialName;
use App\Models\Udhyog;
use Unicodeveloper\NepaliNumbers\Facades\NepaliNumbers;
use Illuminate\Support\Str;
use App\Models\Inventory;
use App\Models\Unit;


class RawMaterialNameController extends DM_BaseController
{
    protected $panel = 'Raw Material Name';
    protected $base_route = 'admin.inventory.raw_material_name';
    protected $view_path = 'admin.raw_material_name';
    protected $model;
    protected $table;
    protected $unit;
    public function __construct(RawMaterialName $model, Unit $unit)
    {
        $this->model = $model;
        $this->unit = $unit;
        $this->middleware('permission:view Raw Material')->only(['index', 'show']);
        $this->middleware('permission:create Raw Material')->only(['create', 'store']);
        $this->middleware('permission:edit Raw Material')->only(['edit', 'update']);
        $this->middleware('permission:delete Raw Material')->only('destroy');
    }
    public function index(Request $request)
    {
        $data['udhyog'] = null;
        $data['rows'] =  $this->model->getData();
        if($request->has('udhyog')){
            $udhyogName = $request->udhyog;
            $udhyog = Udhyog::where('name', $udhyogName)->first();
            if($udhyog){
                $data['udhyog'] = $udhyog;
                $this->base_route = 'admin.udhyog.'.Str::lower(Str::replace(' ', '', $udhyog->name)).'.inventory.raw_material_name';
                $data['rows'] =  $this->model->where('udhyog_id', $udhyog->id)->paginate(10);
            }else{
                session()->flash('alert-success', 'उद्योग फेला परेन ।');
            }
        }
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }

    public function create()
    {
        $data['units'] = $this->unit->get();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));

    }

    public function store(Request $request)
    {
        $request->validate($this->model->getRules(), $this->model->getMessage());

        $data = new RawMaterialName();
        $data->name = $request->name;
        $data->unit_id = $request->unit_id;
        if($request->udhyog != null){

            $udhyogDetails = Udhyog::where('name', $request->udhyog)->first();
            if($udhyogDetails){
                $data->udhyog_id = $udhyogDetails->id;
            }else{

                return redirect()->back();
            }
        }
        $data->save();
        if($request->has('udhyog')){
            if($request->input('udhyog')!=null){
                $udhyogDetails = Udhyog::where('name',$request->input('udhyog'))->first();
                if($udhyogDetails!=null){
                    $redirectUrl = 'admin/udhyog/'.Str::lower(Str::replace(' ', '', $udhyogDetails->name)).'/inventory/raw-material-name?udhyog='.$udhyogDetails->name;
                    return redirect($redirectUrl);
                }


            }
        }
        return redirect()->route($this->base_route.'.index');
    }

    public function show(RawMaterial $rawMaterial)
    {
        return view('raw_materials.show', compact('rawMaterial'));
    }

    public function edit($id)
    {
        $data['row'] = $this->model->findOrFail($id);
        $data['units'] = $this->unit->get();
        return view(parent::loadView($this->view_path.'.edit'),compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->model->getRules(), $this->model->getMessage());
        $data = $this->model->findOrFail($id);
        $data->name = $request->name;
        $data->unit_id = $request->unit_id;
        $data->save();

        if($request->has('udhyog')){
            if($request->input('udhyog')!=null){
                $udhyogDetails = Udhyog::where('id',$request->input('udhyog'))->first();
                $redirectUrl = 'admin/udhyog/'.Str::lower(Str::replace(' ', '', $udhyogDetails->name)).'/inventory/raw-material-name?udhyog='.$udhyogDetails->name;
                return redirect($redirectUrl);

            }
        }
        return redirect()->route($this->base_route.'.index');
    }

    public function destroy($id)
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


    public function convertToNepali()
    {
        $englishNumber = 1234; // This can be any English number
        $nepaliNumber = NepaliNumbers::translate($englishNumber);

        dd($nepaliNumber); // This will return the Nepali representation of the number
    }
}
