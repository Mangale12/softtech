<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GeneralProfile extends DM_BaseModel
{
    use HasFactory;
    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'general_profiles';
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'general_profiles';
    protected $prefix_path_image = '/upload_file/general_profiles/';

    /**
     * /  Fillable properties
     */
    protected $fillable = ['user_id', 'unique_id', 'full_name', 'email', 'mobile', 'occupation', 'blood_group', 'gender', 'marital_status', 'dob', 'permanent_state', 'permanent_district', 'permanent_palika', 'permanent_ward', 'image', 'status', 'added_by'];

    public function __construct()
    {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }
    /**
     * /  fetch all Data
     */
    public function getData()
    {
        return $this->orderBy('id', 'DESC')->where('deleted_at', '=', null)->paginate(10);
    }
    /**
     * /  Get single user
     */
    public function getSingleUser()
    {
        return $this->where('user_id', '=', Auth::user()->id)->where('deleted_at', '=', null)->first();
    }

    /**
     * /  fetch all Users
     */
    public function getUsers()
    {
        return DB::table('users')
            ->where('deleted_at', '=', null)
            ->where('status', '=', '1')
            ->where('role', '=', 'user')
            ->orderBy('id', 'DESC')
            ->get();
    }
    /**
     * /  for validation
     */
    public function getRules()
    {
        $rules = array(
            'full_name'                 => 'required|string|max:225|min:3',
            'email'                     => 'nullable|string|email|max:225|min:5',
            // 'mobile'                    => 'nullable|string|max:10|min:5',
            'occupation'                => 'nullable|string|max:20|min:2',
            // 'blood_group'               => 'nullable|string|max:10|min:1',
            'gender'                    => 'nullable|string|max:10|min:1',
            'marital_status'            => 'nullable|string|max:10|min:1',
            'dob'                       => 'nullable|string|max:10|min:2',
            // 'image'                     => 'nullable|mimes:jpeg,jpg,png,gif|max:1024',
        );
        return $rules;
    }
    /**
     * / Custom message for validation
     */
    public function getMessage()
    {
        $rules = array(
            'full_name.required'                          => 'पुरा नाम अनिवार्य छ',
            'username.required'                           => 'प्रोफाइल नाम अनिवार्य छ',
            'email.required'                              => 'इमेल अनिवार्य छ',
            'mobile.required'                             => 'मोबाइल नम्बर अनिवार्य छ',
            'occupation.required'                         => 'पेशा अनिवार्य छ',
            'blood_group.required'                        => 'ब्लड ग्रुप नम्बर अनिवार्य छ',
            'gender.required'                             => 'लिंग अनिवार्य छ',
            'marital_status.required'                     => 'वैवाहिक स्थिति अनिवार्य छ',
            'dob.required'                                => 'जन्म मिति नम्बरअनिवार्य छ',
            'image.required'                              => 'फोटा नम्बरअनिवार्य छ',
        );
        return $rules;
    }
    /**
     * / Store Data 
     */
    public function storeData(Request $request, $full_name, $email, $mobile, $occupation, $blood_group, $gender, $marital_status, $dob, $permanent_state, $permanent_district, $permanent_palika, $permanent_ward, $image)
    {
        // dd($full_name, $email, $mobile, $occupation, $blood_group, $gender, $marital_status, $dob,$permanent_state,$permanent_district, $permanent_palika, $permanent_ward, $image);
        try {
            $data =                                     new GeneralProfile;
            $data->user_id                            = Auth::user()->id;
            $data->unique_id                          = env("APPLICATION_SERIAL", 2080) . "" . date("dHis") . rand(0000, 9999);
            $data->added_by                           = Auth::user()->name;
            $data->full_name                          = $full_name;
            $data->email                              = $email;
            $data->mobile                             = $mobile;
            $data->occupation                         = $occupation;
            $data->blood_group                        = $blood_group;
            $data->gender                             = $gender;
            $data->marital_status                     = $marital_status;
            $data->dob                                = $dob;
            $data->permanent_state                    = $permanent_state;
            $data->permanent_district                 = $permanent_district;
            $data->permanent_palika                   = $permanent_palika;
            $data->permanent_ward                     = $permanent_ward;
            if ($request->hasFile('image')) {
                $data->image = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image', '', '');
            }
            $check                                    = $data->save();
            // /dd($check);
            $unique_id                                = $data->unique_id;
            $general_parent_id                        = $data->id;
            $user_id                                  = $data->user_id;
            if (isset($check)) {
                $row_1                                = new GeneralFamily;
                $row_1->unique_id                     = $unique_id;
                $row_1->general_parent_id             = $general_parent_id;
                $row_1->user_id                       = $user_id;
                $row_1->save();
            }
            return true;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }
}
