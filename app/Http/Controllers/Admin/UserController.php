<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\File;
use App\Models\Member;
use App\Models\MemberType;
use DB;
use Hash;
use App\Mail\NoticeMember;
use Mail;
use App\Models\Setting;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;
use Carbon\Carbon;


class UserController extends DM_BaseController
{
    protected $panel = 'User';
    protected $base_route = 'admin.users';
    protected $view_path = 'admin.users';
    protected $model;
    protected $table;
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

    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(50);
        return view(parent::loadView($this->view_path . '.index'), compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        $member_types = MemberType::where('status', '1')->get();
        return view(parent::loadView($this->view_path . '.create'), compact('roles', 'member_types'));
    }

    // function to generate member unique identifier
    public function generateUniqueId()
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

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'mobile' => 'required',
            'member_type' => 'required',
            'company_name' => ['required', function($attribute, $value, $fail) {
                if (Member::whereJsonContains('company->company_name', $value)->exists()) {
                    $fail('The Company name has already been taken.');
                }
            }],
            'pan_no' => ['required', function($attribute, $value, $fail) {
                if (Member::whereJsonContains('legal_documents->pan->pan_no', $value)->exists()) {
                    $fail('The PAN number has already been taken.');
                }
            }],

            'register_no' => ['required', function($attribute, $value, $fail) {
                if (Member::whereJsonContains('legal_documents->company->register_no', $value)->exists()) {
                    $fail('The Registration No number has already been taken.');
                }
            }],
            'tax_clearance' => 'required|image',
            'register_file' => 'required|image',
            'pan' => 'required|image',
        ]);

        // dd($request->all());
        try {
            $settings = Setting::first();
            DB::beginTransaction();
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $user = User::create($input);
            $member = new Member();
            $legal_documents = [];
            $legal_documents['pan']['pan_no'] = $request->pan_no;
            $legal_documents['company']['register_no'] = $request->register_no;
            if($request->hasFile('pan')){
                $legal_documents['pan']['image'] = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'pan');
            }
            if($request->hasFile('register_file')){
                $legal_documents['company']['register_file'] = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'register_file');
            }
            if($request->hasFile('tax_clearance')){
                $legal_documents['tax_clearance'] = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'tax_clearance');
            }
            $member->member_id = $this->generateUniqueId();
            $member->user_id = $user->id;
            $member->member_type_id = $request->member_type_id;
            $member->legal_documents = json_encode($legal_documents);
            $member->company = json_encode(['company_name' => $request->company_name]);
            $member->save();
            $details = [
                'name' => $request->name,
                'member_id' => $member->member_id,
                'subject' => $settings->member_notice_mail_subject,
                'message' => $settings->member_notice_mail,
                'password' => $request->password,
                'email' => $request->email,
            ];
            try {
                Mail::to($request->email)->send(new NoticeMember($details));
                $member->is_mail_send = 1;
                $member->save();
                Log::channel('email_notifications')->info('Notice email sent to member', ['member_id' => $member->id, 'email' => $request->email]);
            } catch (\Exception $e) {
                Log::channel('email_notifications')->error('Failed to send notice email', ['member_id' => $member->id, 'error' => $e->getMessage()]);
            }

            DB::commit();
            // $user->assignRole($request->input('roles'));
            session()->flash('alert-success','User  Successfully Added !');

            return redirect()->route('admin.users.index')
                    ->with('success', 'User created successfully');

        } catch (\Throwable $th) {
            //throw $th;
            Log::channel('email_notifications')->error('Failed to send notice email', ['error' => $th->getMessage()]);
            DB::rollback();
            session()->flash('alert-danger','User  can not be Added');
            dd($th);
            return redirect()->route('admin.users.index')
                    ->with('success', 'User created failed');
        }

    }

    public function show($id)
    {
        $user = User::find($id);
        return view(parent::loadView($this->view_path . '.view'), compact('user'));

    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view(parent::loadView($this->view_path . '.edit'), compact('user', 'roles', 'userRole'));
    }

    public function updateold(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $member = Member::where('user_id', $user->id)->firstOrFail();
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required',
            'company_name' => ['required', function($attribute, $value, $fail) use ($member) {
                if (Member::where('id', '!=', $member->id)->whereJsonContains('company->company_name', $value)->exists()) {
                    $fail('The Company name has already been taken.');
                }
            }],
            'pan_no' => ['required', function($attribute, $value, $fail) use ($member) {
                if (Member::where('id', '!=', $member->id)->whereJsonContains('legal_documents->pan->pan_no', $value)->exists()) {
                    $fail('The PAN number has already been taken.');
                }
            }],
            'register_no' => ['required', function($attribute, $value, $fail) use ($member) {
                if (Member::where('id', '!=', $member->id)->whereJsonContains('legal_documents->company->register_no', $value)->exists()) {
                    $fail('The Registration No number has already been taken.');
                }
            }],

        ]);
        try {
            DB::beginTransaction();
            $input = $request->all();
            // if (!empty($input['password'])) {
            //     $input['password'] = Hash::make($input['password']);
            // } else {
            //     $input = Arr::except($input, array('password'));
            // }


            $user->update($input);
            // DB::table('model_has_roles')->where('model_id', $id)->delete();
            // $user->assignRole($request->input('roles'));

            $member = Member::where('member_id', $user->id)->first();
            $legal_documents = json_decode($member->legal_documents, true) ?? [];
            // Ensure the nested keys existl
            // Ensure $legal_documents is an array
            if (!is_array($legal_documents)) {
                $legal_documents = [];
            }

            // Ensure the nested keys exist
            if (!isset($legal_documents['pan'])) {
                $legal_documents['pan'] = [];
            }
            if (!isset($legal_documents['company'])) {
                $legal_documents['company'] = [];
            }
            $legal_documents['pan'] = $legal_documents['pan'] ?? [];
            $legal_documents['company'] = $legal_documents['company'] ?? [];

            // Update PAN and company registration numbers
            $legal_documents['pan']['pan_no'] = $request->pan_no;
            $legal_documents['company']['register_no'] = $request->register_no;
            // Handle PAN file
            if ($request->hasFile('pan')) {
                // Unlink the old file if it exists
                if (!empty($legal_documents['pan']['image'])) {
                    if(file_exists(public_path($legal_documents['pan']['image']))) {
                        File::delete(public_path($legal_documents['pan']['image']));
                    }
                }
                // Upload the new file
                $legal_documents['pan']['image'] = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'pan');
            }

            // Handle register file
            if ($request->hasFile('register_file')) {
                // Unlink the old file if it exists
                if (!empty($legal_documents['company']['register_file'])) {
                    if(file_exists(public_path($legal_documents['company']['register_file']))) {
                        File::delete(public_path($legal_documents['company']['register_file']));
                    }
                }
                // Upload the new file
                $legal_documents['company']['register_file'] = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'register_file');
            }

            // Handle tax clearance file
            if ($request->hasFile('tax_clearance')) {
                // Unlink the old file if it exists
                if (!empty($legal_documents['tax_clearance'])) {
                    if(file_exists(public_path($legal_documents['tax_clearance']))) {
                        File::delete(public_path($legal_documents['tax_clearance']));
                    }
                }
                // Upload the new file
                $legal_documents['tax_clearance'] = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'tax_clearance');
            }

            $member->legal_documents = json_encode($legal_documents);
            $member->company = json_encode(['company_name' => $request->company_name]);

            $member->save();
            DB::commit();
            session()->flash('alert-success','User  Successfully Updated !');

            return redirect()->route('admin.users.index')
                ->with('success', 'User updated successfully');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            session()->flash('alert-danger','User  can not be Updated');
            dd($th);
            return redirect()->back();
        }

    }
    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $member = Member::where('user_id', $user->id)->firstOrFail();
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'tax_clearance' => 'image',
            'register_file' => 'image',
            'pan' => 'image',
            // 'member_type' => 'required',
            'company_name' => ['required', function($attribute, $value, $fail) use ($member) {
                if (Member::where('id', '!=', $member->id)->whereJsonContains('company->company_name', $value)->exists()) {
                    $fail('The Company name has already been taken.');
                }
            }],
            'pan_no' => ['required', function($attribute, $value, $fail) use ($member) {
                if (Member::where('id', '!=', $member->id)->whereJsonContains('legal_documents->pan->pan_no', $value)->exists()) {
                    $fail('The PAN number has already been taken.');
                }
            }],
            'register_no' => ['required', function($attribute, $value, $fail) use ($member) {
                if (Member::where('id', '!=', $member->id)->whereJsonContains('legal_documents->company->register_no', $value)->exists()) {
                    $fail('The Registration No number has already been taken.');
                }
            }],

        ]);

        try {
            DB::beginTransaction();

            $input = $request->all();
            $user->update($input);

            // Debugging output to ensure `legal_documents` is decoded correctly
            $legal_documents = json_decode($member->legal_documents, true) ?? [];
            // Update PAN and company registration numbers
            $legal_documents['pan']['pan_no'] = 'lling';
            $legal_documents['company']['register_no'] = $input['register_no'];

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

            // Save updated legal documents and company name
            $member->legal_documents = json_encode($legal_documents);
            $member->company = json_encode(['company_name' => $request->company_name]);
            $member->save();

            DB::commit();

            session()->flash('alert-success', 'User successfully updated!');
            return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
        } catch (\Throwable $th) {
            DB::rollback();
            session()->flash('alert-danger', 'User cannot be updated');
            dd($th);
            return redirect()->back()->with('error', 'User update failed: ' . $th->getMessage());
        }
    }



    public function deleteOld($id)
    {
        User::find($id)->delete();
        session()->flash('alert-success','User  Successfully Deleted !');
        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully');
    }

    public function delete($id)
    {
        $member = Member::where('user_id', $id)->first();
        if ($member) {
            // Decode legal documents JSON
            $legal_documents = json_decode($member->legal_documents, true);

            // Delete each file associated with the member
            if (!empty($legal_documents['pan']['image'])) {
                File::delete(public_path($legal_documents['pan']['image']));
            }
            if (!empty($legal_documents['register_file'])) {
                File::delete(public_path($legal_documents['company']['register_file']));
            }
            if (!empty($legal_documents['tax_clearance'])) {
                File::delete(public_path($legal_documents['tax_clearance']));
            }
            $member->delete();
            // Optionally delete the user record
            $user = User::find($id);
            if ($user) {
                $user->delete();
            }

            session()->flash('alert-success','User  Successfully Deleted !');
            return redirect()->route('admin.users.index')
                            ->with('success', 'User deleted successfully');
        } else {
            session()->flash('alert-danger','User not found');
            return redirect()->route('admin.users.index')
                            ->with('error', 'User not found');
        }
    }

    function verified($id){
        $user = User::findOrFail($id);
        if($user){
            $user->is_verified = 1;
            $user->save();
            return response()->json(array('success' => true));
        }else{
            return response()->json(array('success' => false));
        }
    }


    public function panNopasses($attribute, $value)
    {
        return !Member::whereJsonContains('legal_documents->pan->pan_no', $value)->exists();
    }

    public function panNomessage()
    {
        return 'The PAN number has already been taken.';
    }

}
