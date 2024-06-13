<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\Request;
use DB;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\ResetPassword as NotificationsResetPassword;
use Illuminate\Http\Exceptions\HttpResponseException;
use Intervention\Image\Facades\Image as Image;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;
    protected $panel = 'Users';
    protected $base_route = 'admin.users';
    protected $view_path = 'admin.users';
    protected $model;
    protected $folder_path_image;
    protected $table;
    protected $folder = 'user_profile';
    protected $folder_img = 'user_profile';
    protected $prefix_path_image = '/upload_file/user_profile/';

    public function __construct()
    {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;

    }
    public function getData()
    {
        return $this->orderBy('id', 'DESC')->where('deleted_at', '=', null)->paginate(10);
    }

    public function getRules()
    {
        $rules = array(
            // 'name'           => 'required|string|max:225|min:3',
            // 'username'       => 'required|string|max:225|min:3',
            // 'email'          => 'required|string|email|max:225|min:5',
            // 'avatar'         => 'nullable|mimes:jpeg,jpg,png,gif|max:1024',
            // 'mobile'         => 'required|string|max:10|min:5',
            // 'password'       => 'required|confirmed|min:6|max:20',
            // 'password_confirmation'       => 'required|min:6',
        );
        return $rules;
    }
    public function getMessage()
    {
        $rules = array(
            // 'name.required'                    => 'पुरा नाम अनिवार्य छ',
            // 'username.required'                => 'प्रोफाइल नाम अनिवार्य छ',
            // 'email.required'                   => 'इमेल अनिवार्य छ',
            // 'mobile.required'                  => 'मोबाइल नम्बरअनिवार्य छ',
            // 'password.required'                => 'पासवर्ड अनिवार्य छ',
            // 'password_confirmation.required'   => 'पासवर्ड पुन:  अनिवार्य छ',
        );
        return $rules;
    }
    public function editRules()
    {
        $rules = array(
            // 'name'           => 'required|string|max:225|min:3',
            // 'username'       => 'required|string|max:225|min:3',
            // 'email'          => 'required|string|email|max:225|min:5',
            // 'avatar'         => 'nullable|mimes:jpeg,jpg,png,gif|max:1024',
            // 'mobile'         => 'required|string|max:10|min:6',
            // 'password'       => 'required|same:confirmed|min:6|max:20',
            // 'password_confirmation'       => 'required|min:6',

        );
        return $rules;
    }
    public function storeData(Request $request, $name, $username, $email, $mobile, $password, $avatar, $role)
    {
        $selectedRoles = $request->input('role');
        //dd($name, $username, $email, $mobile, $password, $avatar );
        try {
            $data =                        new User;
            $data->name                    = $name;
            $data->username                = $username;
            $data->email                   = $email;
            $data->mobile                  = $mobile;
            $data->password                = bcrypt($password);
            $data->unique_id               = date("dHis");
            $data->save();
            if ($request->has('role')) {
                $role = Role::find($request->input('role'));
                if ($role) {
                    $data->assignRole($role);
                }
            }
            if($data->hasRole('admin')){
                $role = Role::where('name', 'admin')->first();
                $permissions = \Spatie\Permission\Models\Permission::all();
                $role->syncPermissions($permissions);
            }

            $data->status = 1;
            if ($request->hasFile('avatar')) {
                $data->avatar = $this->uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'avatar', '', '');
            }
            $check         =                   $data->save();

            if (isset($check)) {

                $row_0                                = new GeneralProfile;
                $row_0->unique_id                     = $data->unique_id;
                $row_0->full_name                     = $data->username;
                $row_0->user_id                       = $data->id;
                $row_0->email                         = $data->email;
                $row_0->mobile                        = $data->mobile;
                $row_0->save();

                $row_1                                = new GeneralFamily();
                $row_1->unique_id                     = $data->unique_id;
                $row_1->user_id                       = $data->id;
                $row_1->save();

                $row_2                                = new GeneralLand();
                $row_2->unique_id                     = $data->unique_id;
                $row_2->user_id                       = $data->id;
                $row_2->save();

                $row_3                                = new GeneralWorker();
                $row_3->unique_id                     = $data->unique_id;
                $row_3->user_id                       = $data->id;
                $row_3->save();
            }
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'last_login_at', 'last_login_ip'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new NotificationsResetPassword($token));
    }

    protected function uploadImage(Request $request, $folder_path_image, $prefix_path_image, $name, $image_width = '', $image_height = '') {
        if($request->hasFile($name)){
            $this->createFolder($folder_path_image);
                $file = $request->file($name);
                $file_name = time().'_'.rand().'_'.$file->getClientOriginalName();
            //    $file_extension = $file->getClientOriginalExtension();
                if(isset($image_height) && isset($image_width)){
                    $file_resize = Image::make($file->getRealPath());
                    $file_resize->resize($image_width, $image_height);
                    $file_resize->save($folder_path_image.$file_name);
                }
                else{
                    $file->move($folder_path_image, $file_name);
                }
                $file_path = $prefix_path_image.$file_name;
               return $file_path;
           }
        return false;
    }
    protected function createFolder($path)
    {
        if (!file_exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }
    }

}
