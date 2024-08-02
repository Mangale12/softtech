<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hashtag;
class HashtagController extends DM_BaseController
{
    protected $panel = 'Hashtag';

    protected $base_route = 'admin.hashtag';
    protected $view_path = 'admin.hashtag';
    protected $model;
    protected $table;

    public function index(){
        $data['rows'] = Hashtag::get();
        return view(parent::loadView($this->view_path.'.index'), compact('data'));
    }
    public function create(){
        return view(parent::loadView($this->view_path.'.create'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'title' =>'required|unique:hashtags,title',
        ]);
        Hashtag::insert([
            'title' =>$request->title,
            'status' => $request->status,
        ]);
        session()->flash('alert-success','Hashtags  Successfully Created !');
        return redirect()->route($this->base_route.'.index');
    }
    public function edit($id){
        $data['rows'] = Hashtag::find($id);
        return view(parent::loadView($this->view_path.'.edit'), compact('data'));
    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'title' =>'required|unique:hashtags,title,'.$id,
        ]);
        Hashtag::find($id)->update([
            'title' =>$request->title,
            'status' => $request->status,
        ]);
        session()->flash('alert-success','Hashtags  Successfully Updated !');
        return redirect()->route($this->base_route.'.index');
    }
    public function destroy($id){
        Hashtag::find($id)->delete();
        session()->flash('alert-success','Hashtags  Successfully Deleted !');
        return response()->json('success');
    }
}
