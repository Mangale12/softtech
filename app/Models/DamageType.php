<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DamageType extends Model
{
    use HasFactory;
    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'production_batch';
    protected $id;
    protected $prefix_path_image = '/upload_file/production_batch/';
    protected $fillalble=[
        'type'
    ];

    public function __construct()
    {

        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }
    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(10);
    }
    public function storeData($request)
    {
        try {
            $data                               = new DamageType;
            $data->type                         = $request->type;
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return false;
        }
    }

    public function updateData($request, $id){
        try {
            $data                               = DamageType::findOrFail($id);
            $data->type                         = $request->type;
            $data->update();
            return true;
        } catch (HttpResponseException $e) {
            return false;
        }
    }

    function getRules($id = null){
        return [
            'type'             => 'required|string|max:255|unique:damage_types, type,'.$id,
        ];
    }

    public function getMessage()
    {
        return [
            'type.required' => 'यो क्षेत्र आवश्यक छ',
            'type.unique' => 'प्रकार पहिले नै लिइएको छ',

        ];
    }



}
