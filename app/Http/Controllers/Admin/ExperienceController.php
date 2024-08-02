<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experience;
class ExperienceController extends DM_BaseController
{
    protected $panel = 'Experience';

    protected $base_route = 'admin.experience';
    protected $view_path = 'admin.experience';
    protected $model;
    protected $table;

    public function index(){
        $data['rows'] = Experience::get();
        return view(parent::loadView($this->view_path.'.index'), compact('data'));
    }
    public function create(){
        return view(parent::loadView($this->view_path.'.create'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'title' =>'required|unique:experiences,title',
        ]);
        Experience::insert([
            'title' =>$request->title,
            'status' => $request->status,
        ]);
        session()->flash('alert-success','Experience  Successfully Created !');
        return redirect()->route($this->base_route.'.index');
    }
    public function edit($id){
        $data['rows'] = Experience::find($id);
        return view(parent::loadView($this->view_path.'.edit'), compact('data'));
    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'title' =>'required|unique:experiences,title,'.$id,
        ]);
        Experience::find($id)->update([
            'title' =>$request->title,
            'status' => $request->status,
        ]);
        session()->flash('alert-success','Season  Successfully Updated !');
        return redirect()->route($this->base_route.'.index');
    }
    public function destroy($id){
        Experience::find($id)->delete();
        session()->flash('alert-success','Season  Successfully Deleted !');
        return response()->json('success');
    }
}
