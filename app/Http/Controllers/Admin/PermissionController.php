<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
class PermissionController extends DM_BaseController
{
    protected $panel = 'Permission';
    protected $base_route = 'admin.permissions';
    protected $view_path = 'admin.permissions';
    protected $model;
    protected $table;
    protected $folder = 'document';

    public function index(Request $request)
    {
        $_panel = 'Permission';
        $data['rows'] = Permission::orderBy('id','DESC')->get();
        return view(parent::loadView($this->view_path . '.index'), compact('data','_panel'));
    }
    public function create(Request $request){
        return view(parent::loadView($this->view_path . '.create'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
        ]);

        $role = Permission::create(['name' => $request->input('name')]);
        if(!empty(auth()->user()->role_super )){
            if(auth()->user()->role_super == 1){
            $permissions = Permission::all();
            // Assign all permissions to the user
            auth()->user()->syncPermissions($permissions);
            }
        }
        // $role->syncPermissions($request->input('permission'));
        session()->flash('alert-success','Role created successfully !');
        return redirect()->route('admin.permissions.index')
                        ->with('success','Role created successfully');
    }

    public function edit($id)
    {
        $data['permission'] = Permission::find($id);
        // dd($data['permission']['id']);
        return view(parent::loadView($this->view_path . '.edit'),compact('data'));
        // return view(($this->view_path . '.edit'), compact('data'));

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('permissions')->ignore($id),
            ],
        ]);

        $permission = Permission::find($id);
        $permission->name = $request->input('name');
        $permission->save();
        session()->flash('alert-success','User  Role updated successfully !');
        return redirect()->route('admin.permissions.index')
                        ->with('success','Role updated successfully');
    }

    public function delete($id)
    {
        $data = DB::table("permissions")->where('id',$id)->delete();
        session()->flash('alert-success','User  Permission deleted successfully !');
        return response()->json($data);
        // return redirect()->route('admin.permission.index')
                        // ->with('success','Permission deleted successfully');
    }
}
