<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class WorkerTypes extends DM_BaseModel
{
    use HasFactory;
    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'worker_types';
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'worker_types';
    protected $prefix_path_image = '/upload_file/worker_types/';
    public function __construct()
    {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }

    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(10);
    }

    public function getRules()
    {
        $rules = array(
            'types'       => 'required|string|max:225|min:2',
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
            'types.required'                          => 'कामदार प्रकार अनिवार्य छ ।',
        );
        return $rules;
    }
    public function storeData(Request $request, $types, $status,$udhyog)
    {
        try {
            $data =                      new WorkerTypes;
            $data->types               = $types;
            $data->status              = $status;
            $data->udhyog_id           = $udhyog;
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }

    public function updateData(Request $request, $id, $types,  $status)
    {
        try {
            $data                        = WorkerTypes::findOrFail($id);
            $data->types                 = $types;
            $data->status              = $status;
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }
}
