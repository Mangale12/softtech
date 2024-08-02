<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cultural;
class CulturalController extends DM_BaseController
{
    protected $panel = 'Cultural';

    protected $base_route = 'admin.cultural';
    protected $view_path = 'admin.cultural';
    protected $model;
    protected $table;

    public function index(){
        $data['rows'] = Cultural::get();
        return view(parent::loadView($this->view_path.'.index'), compact('data'));
    }
    public function create(){
        return view(parent::loadView($this->view_path.'.create'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'title' =>'required|unique:culturals,title',
        ]);
        Cultural::insert([
            'title' =>$request->title,
            'status' => $request->status,
        ]);
        session()->flash('alert-success','Cultural  Successfully Created !');
        return redirect()->route($this->base_route.'.index');
    }
    public function edit($id){
        $data['rows'] = Cultural::find($id);
        return view(parent::loadView($this->view_path.'.edit'), compact('data'));
    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'title' =>'required|unique:culturals,title,'.$id,
        ]);
        Cultural::find($id)->update([
            'title' =>$request->title,
            'status' => $request->status,
        ]);
        session()->flash('alert-success','Cultural  Successfully Updated !');
        return redirect()->route($this->base_route.'.index');
    }
    public function destroy($id){
        Cultural::find($id)->delete();
        session()->flash('alert-success','Cultural  Successfully Deleted !');
        return response()->json('success');
    }
}
