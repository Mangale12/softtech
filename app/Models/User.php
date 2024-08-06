<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\ResetPassword;
use DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Mail\NoticeMember;
use Mail;
use Hash;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Auth\Notifications\ResetPassword as NotificationsResetPassword;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $prefix_path_image = '/upload_file/member/';
    protected $prefix_path_file = '/upload_file/memer/file/';
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'member';
    protected $file   = 'file';

    function __construct(){
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
        $this->folder_path_file = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR . $this->file . DIRECTORY_SEPARATOR;
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
        'is_verified',
        'avatar',
       'status',
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

    public function member(){
        return $this->hasOne('App\Models\Member', 'user_id');
    }

    public function storeData($request){
        try {
            $settings = Setting::first();
            DB::beginTransaction();

            $user = new User();
            $member = new Member();
            $legal_documents = [];
            $company_details = [];
            $social = [];

            $legal_documents['pan']['pan_no'] = $request->pan_no;
            $legal_documents['company']['register_no'] = $request->register_no;
            if($request->hasFile('pan')){
                $legal_documents['pan']['image'] = $this->uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'pan');
            }else{
                $legal_documents['pan']['image'] = '';
            }
            if($request->hasFile('register_file')){
                $legal_documents['company']['register_file'] = $this->uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'register_file');
            }else{
                $legal_documents['company']['register_file'] = '';
            }
            if($request->hasFile('tax_clearance')){
                $legal_documents['tax_clearance'] = $this->uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'tax_clearance');
            }else{
                $legal_documents['tax_clearance'] = '';
            }

            if($request->hasFile('company_logo')){
                $company_details['company_logo'] = $this->uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'company_logo');
            }else{
                $company_details['company_logo'] = null;
            }
            $company_details['company_name'] = $request->company_name;
            $company_details['company_founded_year'] = $request->company_founded_year;
            $company_details['company_website'] = $request->company_website;
            $social['facebook'] = $request->facebook;
            $social['twitter'] = $request->twitter;
            $social['instagram'] = $request->instagram;
            $social['youtube'] = $request->youtube;
            $social['linked_id'] = $request->linked;

            // insert iuser data
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->mobile = $request->mobile;
            $user->is_verified = 0;
            if($request->hasFile('avatar')) {
                $user->avatar = $this->uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'avatar');
            }
            $user->save();

            $member->member_id = $this->generateUniqueId();
            $member->user_id = $user->id;
            $member->member_type_id = $request->member_type_id;
            $member->legal_documents = json_encode($legal_documents);
            $member->company = json_encode($company_details);
            $member->social = json_encode($social);
            $member->member_post = $request->member_post;
            $member->save();
            $details = [
                'name' => $request->name,
                'member_id' => $member->member_id,
                'subject' => $settings->member_notice_mail_subject,
                'message' => $settings->member_notice_mail,
                'password' => $request->password,
                'email' => $request->email,
            ];
            // try {
            //     Mail::to($request->email)->send(new NoticeMember($details));
            //     $member->is_mail_send = 1;
            //     $member->save();
            //     Log::channel('email_notifications')->info('Notice email sent to member', ['member_id' => $member->id, 'email' => $request->email]);
            // } catch (\Exception $e) {
            //     Log::channel('email_notifications')->error('Failed to send notice email', ['member_id' => $member->id, 'error' => $e->getMessage()]);
            // }

            DB::commit();
            // $user->assignRole($request->input('roles'));
            session()->flash('alert-success','User  Successfully Added !');

            return true;

        } catch (\Throwable $th) {
            Log::channel('email_notifications')->error('Failed to send notice email', ['error' => $th->getMessage()]);
            DB::rollback();
            session()->flash('alert-danger','User  can not be Added');
            return false;
        }
    }

    public function updateData($request, $id){
        try {
            DB::beginTransaction();
            $user = User::findOrFail($id);
            $member = Member::where('user_id', $user->id)->firstOrFail();

            // Debugging output to ensure `legal_documents` is decoded correctly
            $legal_documents = json_decode($member->legal_documents, true) ?? [];
            $company = json_decode($member->company, true) ?? [];
            $social = json_decode($member->social, true) ?? [];
            // Update PAN and company registration numbers
            if($request->has($request->pan_no)){
                $legal_documents['pan']['pan_no'] = $request->pan_no;
            }
            if($request->has($request->register_no)){
                $legal_documents['company']['register_no'] = $request->register_no;
            }
            $company['company_name'] = $request->company_name;
            $company['company_founded_year'] = $request->company_founded_year;
            $company['company_website'] = $request->company_website;

            $social['facebook'] = $request->facebook;
            $social['twiter'] = $request->twiter;
            $social['instagram'] = $request->instagram;
            $social['youtube'] = $request->youtube;
            $social['linked_id'] = $request->linked;

            if ($request->hasFile('company_logo')) {
                // Unlink the old file if it exists
                if (!empty($legal_documents['company_logo']) && file_exists(public_path($legal_documents['company_logo']))) {
                    File::delete(public_path($legal_documents['company_logo']));
                }
                // Upload the new file
                $company['company_logo'] = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'company_logo');

            }

            // Handle PAN file
            if ($request->hasFile('pan')) {
                // Unlink the old file if it exists
                if (!empty($legal_documents['pan']['image']) && file_exists(public_path($legal_documents['pan']['image']))) {
                    File::delete(public_path($legal_documents['pan']['image']));
                }
                // Upload the new file
                $legal_documents['pan']['image'] = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'pan');
            }

            // Handle register file
            if ($request->hasFile('register_file')) {
                // Unlink the old file if it exists
                if (!empty($legal_documents['company']['register_file']) && file_exists(public_path($legal_documents['company']['register_file']))) {
                    File::delete(public_path($legal_documents['company']['register_file']));
                }
                // Upload the new file
                $legal_documents['company']['register_file'] = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'register_file');
            }

            // Handle tax clearance file
            if ($request->hasFile('tax_clearance')) {
                // Unlink the old file if it exists
                if (!empty($legal_documents['tax_clearance']) && file_exists(public_path($legal_documents['tax_clearance']))) {
                    File::delete(public_path($legal_documents['tax_clearance']));
                }
                // Upload the new file
                $legal_documents['tax_clearance'] = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'tax_clearance');
            }

            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->mobile       = $request->mobile;
            $user->is_verified  = 0;
            $user->is_member    = 1;
            if($request->hasFile('avatar')) {
                if($user->avatar != null){
                    if(file_exists($user->avatar)){
                        unlink(public_path($user->avatar));
                    }
                }
                $user->avatar = $this->uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'avatar');
            }
            $user->save();


            // Save updated legal documents and company name
            $member->legal_documents = json_encode($legal_documents);
            $member->company = json_encode($company);
            $member->social = json_encode($social);
            $member->member_type_id = $request->member_type_id;
            $member->member_post = $request->member_post;
            $member->save();

            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollback();
            Log::channel('email_notifications')->error('Failed to send notice email', ['error' => $th->getMessage()]);
            return false;
        }
    }

    protected function uploadImage($request, $folder_path_image, $prefix_path_image, $title, $image_width = '', $image_height = '')
    {
        if ($request->hasFile($title)) {

            $this->createFolder($folder_path_image);
            $file = $request->file($title);
            $file_name = time() . '_' . rand() . '_' . $file->getClientOriginalName();
           // dd($file_name);
            //    $file_extension = $file->getClientOriginalExtension();
            if (isset($image_height) && isset($image_width)) {
                $file_resize = Image::make($file->getRealPath());
                $file_resize->resize($image_width, $image_height);
                $file_resize->save($folder_path_image . $file_name);
            } else {
                $file->move($folder_path_image, $file_name);
            }
            $file_path = $prefix_path_image . $file_name;
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

     // function to generate member unique identifier
     protected function generateUniqueId()
     {
         do {
             // Get the current timestamp
             $timestamp = Carbon::now()->timestamp;

             // Generate a random number
             $randomNumber = mt_rand(100, 999);

             // Combine the timestamp and random number to form a unique ID
             $uniqueId = substr($timestamp . $randomNumber, -10);

         } while (Member::where('member_id', $uniqueId)->exists());

         return $uniqueId;
     }
}
