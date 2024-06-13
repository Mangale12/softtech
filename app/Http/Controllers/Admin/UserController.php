<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Models\Permission;


class UserController extends DM_BaseController
{
    protected $panel = 'Users';
    protected $base_route = 'admin.users';
    protected $view_path = 'admin.users';
    protected $model;
    protected $folder_path_image;
    protected $table;
    protected $folder = 'user_profile';
    protected $folder_img = 'user_profile';
    protected $prefix_path_image = '/upload_file/user_profile/';


    public function __construct(User $model)
    {
        $this->model = $model;
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
        $this->middleware('permission:view users', ['only' => ['index']]);
        $this->middleware('permission:create users', ['only' => ['create','store']]);
        $this->middleware('permission:edit users', ['only' => ['edit','update']]);
        $this->middleware('permission:delete users', ['only' => ['destroy']]);
    }

    public function userOnlineStatus()
    {
        $users = User::all();

        foreach ($users as $user) {

            if (Cache::has('user-is-online-' . $user->id))
                echo $user->name . " is online. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " ";
            else {
                if ($user->last_seen != null) {
                    echo $user->name . " is offline. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " ";
                } else {
                    echo $user->name . " is offline. Last seen: No data ";
                }
            }
        }
    }

    public function index()
    {
        $data['rows'] =  $this->model->getData();
        // $roles = $user->roles()->pluck('name')->toArray();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        $allRoles = Role::pluck('name', 'id')->all();
        $selectedRoles = [];
        return view(parent::loadView($this->view_path . '.create'), compact('allRoles','selectedRoles'));
    }


    public function store(Request $request)
    {
        $request->validate($this->model->getRules(), $this->model->getMessage());
        if ($this->model->storeData($request, $request->name, $request->username, $request->email, $request->mobile, $request->password, $request->avatar, $request->role)) {
            session()->flash('alert-success', $this->panel . '  Successfully Added !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Added');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        // $roles = Role::pluck('name', 'name')->all();
        // $userRole = $user->roles->pluck('name', 'name')->all();

        // $data['rows'] =  $this->model->getData();
        // return view('admin.users.edit', compact('user', 'roles', 'userRole'));
        $user = User::find($id);
        $allRoles = Role::pluck('name', 'id')->all();
        $data['permission'] = Permission::get();
        $data['rolePermissions'] = DB::table("model_has_permissions")
                                    ->where("model_id", $user->id)
                                    ->where("model_type", "App\\Models\\User")
                                    ->pluck('permission_id')
                                    ->all();
        $selectedRoles = [];
        // Get roles assigned to the user
        $userRole = $user->roles->pluck('id')->toArray();
        $_panel = 'Users';
        $_base_route = 'admin.users';

        // Fetch data from the model
        $data['rows'] =  $this->model->getData();

        // Pass all necessary variables to the view
        // return view('admin.users.edit', compact('user', 'roles', 'userRole', 'data', '_panel','_base_route'));
        return view(parent::loadView($this->view_path . '.edit'), compact('allRoles','selectedRoles','user','userRole','data'));

        // return view(parent::loadView($this->view_path . '.index'), compact('data'));

    }

    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,email,' . $id,
        //     'password' => 'same:confirm-password',
        //     // 'roles' => 'required'
        // ]);
        // dd($request->all());
        $request->validate($this->model->getRules(), $this->model->getMessage());

        $input = $request->all();
        // dd($input);
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                // Assuming 'deleteImage' is a method to delete images
                parent::deleteImage($user->avatar); // You need to implement this method
            }
            $user->avatar = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'avatar', '', '');
            $user->update();
        }
        $user->update($input);

        // DB::table('model_has_roles')->where('model_id', $id)->delete();
        // $user->roles()->detach();
        // $role = Role::find($request->input('role'));
        // Assign new roles to the user
        if ($request->has('role')) {
            $role = Role::find($request->input('role'));
            $user->syncRoles([$role]);
        }
        if ($request->has('permission')) {
            $user->syncPermissions($request->input('permission'));
        }
        // $role = $user->getRoleNames();
        // dd($user->getAllPermissions()->pluck('name'));
        session()->flash('alert-success', 'User  Successfully Updated !');
        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully');
    }

    public function destroy(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);
        if (!$data) {
            $request->session()->flash('success_message', $this->panel . 'does not exists.');
            return redirect()->route($this->base_route);
        }

        if ($data->avatar) {
            if(file_exists(public_path($data->avatar))){
                parent::deleteImage($data->avatar); // You need to implement this method
            }
        }
        $data->destroy($id);
        return response()->json($data);
    }


    public function deletedPost()
    {
        $data['rows'] = User::onlyTrashed()->paginate(10);
        return view(parent::loadView($this->view_path . '.deleted'), compact('data'));
    }

    public function restore($id)
    {
        $data = User::where('id', '=', $id)->get();
        foreach ($data as $row) {
            $row->deleted_at = null;
            $row->save();
        }
    }

    public function permanentDelete($id)
    {
        $row = User::findOrFail($id);
        $file_path = getcwd() . $row->image;
        // dd($file_path);
        if (is_file($file_path)) {
            unlink($file_path);
        }
        foreach ($row as $row) {
            User::where('id', '=', $id)->delete();
        }
    }

    //toggle Status
    public function status(Request $request)
    {
        $row                                    = $this->model;
        $user                                   = $row->findOrFail($request->id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['success' => 'SuccessFully Updated !']);
    }
}
