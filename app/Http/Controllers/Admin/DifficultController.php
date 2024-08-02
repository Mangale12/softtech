<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Defficult;

class DifficultController extends DM_BaseController
{
    protected $panel = 'Difficult';

    protected $base_route = 'admin.difficult';
    protected $view_path = 'admin.difficult';
    protected $model;
    protected $table;

    public function index(){
        $data['rows'] = Defficult::get();
        return view(parent::loadView($this->view_path.'.index'), compact('data'));
    }
    public function create(){
        return view(parent::loadView($this->view_path.'.create'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'title' =>'required|unique:seasons,title',
        ]);
        Defficult::insert([
            'title' =>$request->title,
            'status' => $request->status,
        ]);
        session()->flash('alert-success','Season  Successfully Created !');
        return redirect()->route($this->base_route.'.index');
    }
    public function edit($id){
        $data['rows'] = Defficult::find($id);
        return view(parent::loadView($this->view_path.'.edit'), compact('data'));
    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'title' =>'required|unique:seasons,title,'.$id,
        ]);
        Defficult::find($id)->update([
            'title' =>$request->title,
            'status' => $request->status,
        ]);
        session()->flash('alert-success','Season  Successfully Updated !');
        return redirect()->route($this->base_route.'.index');
    }
    public function destroy($id){
        Defficult::find($id)->delete();
        session()->flash('alert-success','Season  Successfully Deleted !');
        return response()->json('success');
    }
}
