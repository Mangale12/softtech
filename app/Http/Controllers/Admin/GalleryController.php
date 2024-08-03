<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends DM_BaseController
{
    protected $panel = 'Gallery';
    protected $base_route = 'admin.gallery';
    protected $view_path = 'admin.gallery';
    protected $model;
    protected $table;
    protected $folder = 'galleries';
    protected $image_prefix_path = '/upload_file/galleries/';
    protected $image_name = 'file';

    public function __construct(Gallery $model)
    {
        $this->model = $model;
        $this->folder_path = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR .  $this->folder . DIRECTORY_SEPARATOR;

    }
    public function index()
    {
        $data['rows'] = $this->model->paginate(10);
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        return view(parent::loadView($this->view_path . '.create'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,jpg,png,gif|max:50000',
        ]);

        $file = $request->file('file');
        if($file = $request->hasFile('file')){
            $image_path = parent::uploadImage($request, $this->folder_path,$this->image_prefix_path,$this->image_name,'');
        }

        $row = $this->model;
        $row->image = $image_path;
        $row->title = 'Photo title goes here';
        $row->save();


        return redirect()->route($this->base_route . '.index');
    }

    public function edit($id)
    {

        $data['rows'] = $this->model::where('id', '=', $id)->first();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|max:225',
            'url' => 'sometimes|max:225',
            'image' => 'sometimes|mimes:jpeg,jpg,png,gif|max:50000',
        ]);

        if ($this->model->updateData($request, $id, $request->title, $request->image, $request->status)) {
            session()->flash('alert-success', $this->panel . '  Successfully Updated !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Updated');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function status(Request $request)
    {
        $row                                    = $this->fiscalYear;
        $user                                   = $row->findOrFail($request->user_id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['success' => 'Status added SuccessFully']);
    }

    public function destroy(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);
        if (!$data) {
            $request->session()->flash('success_message', $this->panel . 'does not exists.');
            return redirect()->route($this->base_route);
        }
        $data->destroy($id);
    }



    public function deletedPost()
    {
        $data['rows'] = $this->model->where('deleted_at', '!=', null)->get();
        return view(parent::loadView($this->view_path . '.deleted'), compact('data'));
    }


    public function restore($id)
    {
        $data = $this->model::where('id', '=', $id)->get();
        foreach ($data as $row) {
            $row->deleted_at = null;
            $row->save();
        }
    }

    public function permanentDelete($id)
    {
        $row = $this->model::findOrFail($id);
        $file_path = getcwd() . $row->image;
        // dd($file_path);
        if (is_file($file_path)) {
            unlink($file_path);
        }
        foreach ($row as $row) {
            $this->model::where('id', '=', $id)->delete();
        }
    }

    public function destroyFile($id)
    {
        dd('test');
        $this->tracker;
        $row = $this->file_model::findOrFail($id);
        $file_path = getcwd() . $row->file;
        if (is_file($file_path)) {
            unlink($file_path);
        }
        $data = $this->file_model::destroy($id);
    }
}
