<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DestinationController extends DM_BaseController
{
    protected $panel = 'Destination';
    protected $base_route = 'admin.destination';
    protected $view_path = 'admin.destination';
    protected $model;
    protected $table;
    protected $prefix_path_image = '/upload_file/destination/';
    protected $prefix_path_file = '/upload_file/destination/file/';
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'destination/';
    protected $file   = 'file';

    public function __construct(Destination $model)
    {
        $this->model = $model;
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
        $this->folder_path_file = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR . $this->file . DIRECTORY_SEPARATOR;
    }
    public function index()
    {
        $data['category'] = $this->model->get();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        return view(parent::loadView($this->view_path . '.create'));
    }

    public function store(Request $request)
    {
        $model                        = $this->model;
        if($request->hasFile('image')){
            $model->image = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image');
        }
        $model->title                 = $request->title;
        $model->description           = $request->description;
        $model->status                = $request->status;
        $success                      = $model->save();
        if ($success) {
            session()->flash('alert-success', $this->panel . '  Successfully Added !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Added');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function edit($id)
    {
        $data['rows'] = $this->model::where('id', '=', $id)->first();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $model                               = $this->model::where('id', '=', $id)->first();
        if ($request->hasFile('image')) {
            // Unlink the old file if it exists
            if ($model->image != null) {
                if(file_exists(public_path($model->image))) {
                    File::delete(public_path($model->image));
                }
            }
            // Upload the new file
            $model->image = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image');
        }
        $model->title                        = $request->title;
        $model->description                  = $request->description;
        $model->status                       = $request->status;
        $success                             = $model->update();
        if ($success) {
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
}
