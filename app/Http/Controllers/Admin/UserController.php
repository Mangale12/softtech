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
    protected $prefix_path_file = '/upload_file/member/file/';
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'member';
    protected $file   = 'file';
    function __construct(User $model){
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
        $this->folder_path_file = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR . $this->file . DIRECTORY_SEPARATOR;
        $this->model = $model;
    }

    public function index(Request $request)
    {
        $this->panel = "Membership";
        $data = User::where('is_member', 1)->orderBy('id','DESC')->paginate(50);
        return view(parent::loadView($this->view_path . '.index'), compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        $this->panel = "Membership";
        $roles = Role::pluck('name', 'name')->all();
        $member_types = MemberType::where('status', '1')->get();
        return view(parent::loadView($this->view_path . '.create'), compact('roles', 'member_types'));
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'mobile' => 'required',
            'member_type_id' => 'required',
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
        if($this->model->storeData($request)) {
            session()->flash('alert-success', $this->panel.' Successfully Added!');
            return redirect()->route('admin.users.index')
                    ->with('success', 'User created successfully');
        } else {
            session()->flash('alert-danger', $this->panel.' can not be Added');
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $this->panel = "Membership";
        $user = User::find($id);
        return view(parent::loadView($this->view_path . '.view'), compact('user'));

    }

    public function edit($id)
    {
        $this->panel = "Membership";
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        $member_types = MemberType::where('status', '1')->get();
        return view(parent::loadView($this->view_path . '.edit'), compact('user', 'roles', 'userRole', 'member_types'));
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

        if($this->model->updateData($request, $id)) {
            session()->flash('alert-success', $this->panel.' Successfully Updated!');
            return redirect()->route('admin.users.index')
                    ->with('success', 'User Updated successfully');
        } else {
            session()->flash('alert-danger', $this->panel.' can not be Updated');
            return redirect()->back();
        }

    }

    public function indexAdmin(Request $request)
    {
        $this->panel = "Admin User";
        $this->base_route = 'admin.admin_users';
        $this->view_path = 'admin.admin_users';
        $data = User::where('is_member', 0)->orderBy('id','DESC')->paginate(50);
        return view(parent::loadView($this->view_path . '.index'), compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function createAdmin()
    {
        $this->base_route = 'admin.admin_users';
        $this->view_path = 'admin.admin_users';
        $this->panel = "Membership";
        $roles = Role::pluck('name', 'name')->all();
        $member_types = MemberType::where('status', '1')->get();
        return view(parent::loadView($this->view_path . '.create'), compact('roles', 'member_types'));
    }



    public function storeAdmin(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'mobile' => 'required',
            ]);
        $this->base_route = 'admin.admin_users';
        $this->view_path = 'admin.admin_users';
        if($this->model->storeAdminData($request)) {
            session()->flash('alert-success', $this->panel.' Successfully Added!');
            return redirect()->route('admin.admin_users.index')
                    ->with('success', 'User created successfully');
        } else {
            session()->flash('alert-danger', $this->panel.' can not be Added');
            return redirect()->back();
        }
    }

    public function showAdmin($id)
    {
        $this->base_route = 'admin.admin_users';
        $this->view_path = 'admin.admin_users';
        $this->panel = "Admin User";
        $user = User::find($id);
        return view(parent::loadView($this->view_path . '.view'), compact('user'));

    }

    public function editAdmin($id)
    {
        $this->base_route = 'admin.admin_users';
        $this->view_path = 'admin.admin_users';
        $this->panel = "Admin User";
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view(parent::loadView($this->view_path . '.edit'), compact('user', 'roles', 'userRole'));
    }


    public function updateAdmin(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'sometimes|nullable|min:6|confirmed',
            'confirm_password' => 'sometimes|nullable|same:password',
            'mobile' => 'required',
        ]);
        $this->base_route = 'admin.admin_users';
        $this->view_path = 'admin.admin_users';
        $this->panel = "Admin User";
        if($this->model->updateAdminData($request, $id)) {
            session()->flash('alert-success', $this->panel.' Successfully Updated!');
            return redirect()->route('admin.admin_users.index')
                    ->with('success', 'User Updated successfully');
        } else {
            session()->flash('alert-danger', $this->panel.' can not be Updated');
            return redirect()->back();
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
            $company = json_decode($member->company, true);
            // Delete each file associated with the member
            if (!empty($legal_documents['pan']['image'])) {
                File::delete(public_path($legal_documents['pan']['image']));
            }
            if (!empty($legal_documents['company']['register_file'])) {
                File::delete(public_path($legal_documents['company']['register_file']));
            }
            if (!empty($legal_documents['tax_clearance'])) {
                File::delete(public_path($legal_documents['tax_clearance']));
            }
            if(!empty($company['company_logo'])){
                File::delete(public_path($company['company_logo']));
            }
            $member->delete();
            // Optionally delete the user record
            $user = User::find($id);
            if($user->avatar != null){
                File::delete(public_path($user->avatar));
            }
            if ($user) {
                $user->delete();
            }


            session()->flash('alert-success','User  Successfully Deleted !');
            return redirect()->route('admin.users.index')
                            ->with('success', 'User deleted successfully');
        } else {
            $user = User::find($id);
            if ($user) {
                if($user->avatar != null){
                    File::delete(public_path($user->avatar));
                }
                $user->delete();
                session()->flash('alert-success','User  Successfully Deleted !');
                return redirect()->route('admin.users.index')
                            ->with('error', 'User not found');
            }else {

                session()->flash('alert-danger','User not found');
                return redirect()->route('admin.users.index')
                                ->with('error', 'User not found');
            }
        }
    }

    function verified(Request $request , $id){
        $user = User::findOrFail($id);
        if($user){
            $user->is_verified = $request->is_verified;
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

    public function reset(Request $request, $id){
        $data = User::findOrFail($id);
        $this->base_route = 'admin.admin_users';
        $this->view_path = 'admin.admin_users';
        $this->panel = "Admin User";
        return view(parent::loadView($this->view_path.'.reset'), compact('data'));
    }
    public function resetMember($id){
        $data = Member::findOrFail($id);
        $this->base_route = 'admin.admin_users';
        $this->view_path = 'admin.admin_users';
        $this->panel = "Member";
        return view(parent::loadView($this->view_path.'.reset'), compact('data'));
    }

    public function updateReset(Request $request, $id){
        $this->validate($request, [
            'password' => 'required|min:6',
        ]);

        $user = User::find($id);
        $user->password =  Hash::make($request->password);
        $user->save();
        session()->flash('alert-success', 'Password Successfully Updated!');
        if($user->is_member == 1){
            return redirect()->route('admin.users.index')
                    ->with('success', 'Password Updated successfully');
        }else{
            return redirect()->route('admin.admin_users.index')
            ->with('success', 'Password Updated successfully');
        }

    }
}
