<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Season;
class SeasonController extends DM_BaseController
{
    protected $panel = 'Season';

    protected $base_route = 'admin.season';
    protected $view_path = 'admin.season';
    protected $model;
    protected $table;

    public function index(){
        $data['rows'] = Season::get();
        return view(parent::loadView($this->view_path.'.index'), compact('data'));
    }
    public function create(){
        return view(parent::loadView($this->view_path.'.create'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'title' =>'required|unique:seasons,title',
        ]);
        Season::insert([
            'title' =>$request->title,
            'status' => $request->status,
        ]);
        session()->flash('alert-success','Season  Successfully Created !');
        return redirect()->route($this->base_route.'.index');
    }
    public function edit($id){
        $data['rows'] = Season::find($id);
        return view(parent::loadView($this->view_path.'.edit'), compact('data'));
    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'title' =>'required|unique:seasons,title,'.$id,
        ]);
        Season::find($id)->update([
            'title' =>$request->title,
            'status' => $request->status,
        ]);
        session()->flash('alert-success','Season  Successfully Updated !');
        return redirect()->route($this->base_route.'.index');
    }
    public function destroy($id){
        Season::find($id)->delete();
        session()->flash('alert-success','Season  Successfully Deleted !');
        return response()->json('success');
    }
}
