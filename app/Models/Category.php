<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\HttpResponseException;

class Category extends DM_BaseModel
{
    use HasFactory;
    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'categories';
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'category';
    protected $prefix_path_image = '/upload_file/category/';
    public function __construct()
    {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }

    public function created_by()
    {
        return $this->hasOne('App\Models\User', 'id', 'added_by');
    }
    public function parent_info()
    {

        return $this->hasOne('App\Models\Category', 'id', 'parent_id');
    }

    //Get All Data
    public function getData()
    {
        return $this->orderBy('id', 'DESC')->paginate(5);
    }
    //Get Self Category
    public function getCategory()
    {
        return $this->where('parent_id', null)->orderBy('id', 'DESC')->get();
    }
    // Validate Rules Set
    public function getRules()
    {
        $rules = array(
            'title'       => 'required|string|max:225|min:2',
            'status'      => 'required|boolean'

        );
        return $rules;
    }
    /**
     * / Custom message for validation
     */
    public function getMessage()
    {
        $rules = array(
            'title.required'                          => 'उत्पादन प्रकार अनिवार्य छ ।',
        );
        return $rules;
    }
    /**
     * / Custom SLug get
     */
    public function getSlug($str)
    {
        $slug = \Str::slug($str);
        if ($this->where('slug', $slug)->count() > 0) {
            $slug .= date("Ymdhis") . rand(0, 999);
        }
        return $slug;
    }
    //Store All Data
    public function storeData(Request $request, $title, $is_parent, $parent_id, $summary, $status,  $image)
    {
        // dd($title, $is_parent, $parent_id, $summary, $status, $image);
        try {
            $data =                              new Category();
            $data->title                        = $title;
            $data->parent_id                    = $parent_id;
            $data->summary                      = $summary;
            $data->added_by                     =  $request->user()->id;
            $data->slug                         = $this->getSlug($title);
            $data->status                       = $status;
            if ($request->hasFile('image')) {
                $data->image = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image', '', '');
            }
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }

    //Update All Data
    public function updateData(Request $request, $id, $title, $is_parent, $parent_id, $summary, $status,  $image)
    {
        try {
            $data                             = Category::findOrFail($id);
            $data->title                        = $title;
            $data->parent_id                    = $parent_id;
            $data->summary                      = $summary;
            $data->slug                         = $this->getSlug($title);
            $data->status                       = $status;
            if ($request->hasFile('image')) {
                $file_path = getcwd() . $data->image;
                if (is_file($file_path)) {
                    unlink($file_path);
                }
                $data->image = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image', '', '');
            }
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }
}
