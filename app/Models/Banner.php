<?php

namespace App\Models;

use App\Models\DM_BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use DB;

class Banner extends DM_BaseModel
{
    use HasFactory, SoftDeletes;
    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'banners';
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'banner';
    protected $prefix_path_image = '/upload_file/banner/';
    public function __construct()
    {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }

    public function getData()
    {
        return $this->orderBy('id', 'ASC')->where('deleted_at', '=', null)->get();
    }

    public function getRules()
    {
        $rules = array(
            'title' => 'required|string|max:225|min:5',
            'description' => 'required',
            'image' => 'image',
            // 'marque' => 'required',
        );
        return $rules;
    }

    public function storeData(Request $request, $title, $description, $image, $status, $rows)
    {
        // dd($title, $description, $url, $video, $status, $rows);
        $banner =                    new Banner;
        $banner->title               = $title;
        $banner->description         = $description;
        // $banner->url                 = $url;
        $banner->status              = 1;
        if ($request->hasFile('image')) {
            $banner->image = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image', '', '');
        }
        $banner->save();
        return true;
    }

    public function updateData(Request $request, $id, $title, $description,$image, $status )
    {
        // dd($title, $description, $status);
        $banner = Banner::findOrFail($id);
        $banner->title           = $title;
        $banner->description     = $description;
        $banner->status          = $status;
        if ($request->hasFile('image')) {
            $file_path = getcwd() . $banner->image;
            if (is_file($file_path)) {
                unlink($file_path);
            }
            $banner->image = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image', '', '');
        }
        $banner->save();
        return true;
    }
}
