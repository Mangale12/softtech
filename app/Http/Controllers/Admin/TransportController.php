<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transport;
class TransportController extends DM_BaseController
{
    protected $panel = 'Transport';

    protected $base_route = 'admin.transport';
    protected $view_path = 'admin.transport';
    protected $model;
    protected $table;

    public function index(){
        $data['rows'] = Transport::get();
        return view(parent::loadView($this->view_path.'.index'), compact('data'));
    }
    public function create(){
        return view(parent::loadView($this->view_path.'.create'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'title' =>'required|unique:transports,title',
        ]);
        Transport::insert([
            'title' =>$request->title,
            'status' => $request->status,
        ]);
        session()->flash('alert-success','Transport  Successfully Created !');
        return redirect()->route($this->base_route.'.index');
    }
    public function edit($id){
        $data['rows'] = Transport::find($id);
        return view(parent::loadView($this->view_path.'.edit'), compact('data'));
    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'title' =>'required|unique:transports,title,'.$id,
        ]);
        Transport::find($id)->update([
            'title' =>$request->title,
            'status' => $request->status,
        ]);
        session()->flash('alert-success','Transport  Successfully Updated !');
        return redirect()->route($this->base_route.'.index');
    }
    public function destroy($id){
        Transport::find($id)->delete();
        session()->flash('alert-success','Transport  Successfully Deleted !');
        return response()->json('success');
    }
}
