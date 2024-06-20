<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Queue\WorkerOptions;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class WorkerList extends DM_BaseModel
{
    use HasFactory;
    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'worker_lists';
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'worker_list';
    protected $id;
    protected $prefix_path_image = '/upload_file/worker_list/';
    public function __construct()
    {

        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }
    //get Data
    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(10);
    }
    // get Worker Position
    public function getWorkerPosition()
    {
        return DB::table('worker_positions')->get();
    }
    //Get WOrker Position name
    public function WorkerPosition()
    {
        return $this->belongsTo(WorkerPosition::class, 'worker_position_id');
    }

    // Store Data
    public function storeData($request, $full_name, $mobile, $gender, $address, $day_of_joining, $worker_position_id, $salary, $bhatta, $image,$udhyog_id = null)
    {
        try {
            $data                               = new WorkerList;
            $data->full_name                    = $full_name;
            $data->mobile                       = $mobile;
            $data->gender                       = $gender;
            $data->address                      = $address;
            $data->day_of_joining               = $day_of_joining;
            $data->worker_position_id           = $worker_position_id;
            $data->salary                       = $salary;
            $data->bhatta                       = $bhatta;
            $data->udhyog_id                    = $udhyog_id;
            if ($request->hasFile('image')) {
                $data->image = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image', '', '');
            }
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return false;
        }
    }

    public function updateData($request, $id, $full_name, $mobile, $gender, $address, $day_of_joining, $worker_position_id, $salary, $bhatta, $image){
        try {
            $data                               = WorkerList::findOrFail($id);
            $data->full_name                    = $full_name;
            $data->mobile                       = $mobile;
            $data->gender                       = $gender;
            $data->address                      = $address;
            $data->day_of_joining               = $day_of_joining;
            $data->worker_position_id           = $worker_position_id;
            $data->salary                       = $salary;
            $data->bhatta                       = $bhatta;
            if ($request->hasFile('image')) {
                if ($data->image) {
                    // Assuming 'deleteImage' is a method to delete images
                    parent::deleteImage($data->image); // You need to implement this method
                }
                $data->image = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image', '', '');
            }
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return false;
        }
    }

    function getRules($id = null){
        $uniqueRule = Rule::unique($this->getTable());

        if ($id) {
            $uniqueRule->ignore($id);
        }
        return [
            'full_name'             => 'required|string|max:255',
            'mobile'                => [
                                'required',
                                'digits:10',
                                $uniqueRule,
                            ],
            // 'mobile'                => 'required|digits:10|unique:worker_lists,mobile',
            'gender'                => 'required',
            'address'               => 'required|string',
            'day_of_joining'        => 'required',
            // 'worker_position_id'    => 'required',
            'salary'                => 'required|numeric',
            'bhatta'                => 'required|numeric',

            // Add other validation rules as needed
        ];
    }

    public function getMessage()
    {
        return [
            'full_name.required' => 'The full name field is required.',
            'full_name.string' => 'The full name must be a string.',
            'full_name.max' => 'The full name may not be greater than 255 characters.',
            'mobile.required' => 'The mobile field is required.',
            'mobile.digits' => 'The mobile must be exactly 10 digits.',
            'mobile.unique' => 'The mobile number has already been taken.',
            'gender.required' => 'The gender field is required.',
            'address.address' => 'The address is invalid.', // Assuming you have a custom address validation rule
            'day_of_joining.required' => 'The day of joining field is required.',
            'worker_position_id.required' => 'The worker position ID field is required.',
            'salary.required' => 'The salary field is required.',
            'salary.numeric' => 'The salary must be a number.',
            'bhatta.required' => 'The bhatta field is required.',
            'bhatta.numeric' => 'The bhatta must be a number.',
        ];
    }

    public function batches()
    {
        return $this->belongsToMany(ProductionBatch::class)->withPivot('hours_worked', 'days_worked')->withTimestamps();
    }
}
