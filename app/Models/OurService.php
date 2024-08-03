<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurService extends DM_BaseModel
{
    use HasFactory;
    protected $fillable = [
        'title', 'icon', 'status', 'order', 'main_description'
    ];

    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'our_services';
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'our_services';
    protected $prefix_path_image = '/upload_file/our_services/';

    public function __construct(){
        $this->folder_path_image = getcwd(). DIRECTORY_SEPARATOR. 'upload_file'. DIRECTORY_SEPARATOR. $this->folder. DIRECTORY_SEPARATOR;
    }
    public function getData(){
        return $this->orderBy('order', 'ASC')->where('status', '=', 1)->get();
    }

    public function getRules(){
        $rules = array(
            'title' =>'required|string|max:225|min:5',
            'description' =>'required',
            'icon' =>'required|image',
        );
        return $rules;
    }

    public function storeData($request, $title, $description, $icon, $status, $order){
        $ourService = new OurService;
        $ourService->title = $title;
        $ourService->description = $description;
        $ourService->icon = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'icon', '', '');
        $ourService->status = $status;
        $ourService->order = 1;
        $ourService->save();
        return true;
    }
    public function updateData($request, $id, $title, $description, $icon, $status, $order){
        $ourService = OurService::findOrFail($id);
        $ourService->title = $title;
        $ourService->description = $description;
        if($request->hasFile('icon')){
            $file_path = getcwd(). $ourService->icon;
            if(is_file($file_path)){
                unlink($file_path);
            }
            $ourService->icon = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'icon', '', '');
        }
        $ourService->status = $status;
        $ourService->order = $order;
        // $ourService->main_description = $main_description;
        $ourService->save();
        return true;
    }

    public function deleteData($id){
        $ourService = OurService::findOrFail($id);
        $file_path = getcwd(). $ourService->icon;
        if(is_file($file_path)){
            unlink($file_path);
        }
        $ourService->delete();
        return true;
    }



}