<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('backend.roles.index',compact('roles'));
    }

    public function create(){
        $modules = Module::all();
        return view('backend.roles.create',compact('modules'));
    }

    public function store(REQUEST $request){

        $request->validate([
            'name' => 'required|unique:roles|max:50',
            'permissions' => 'required',
        ]);

        Role::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ])->permissions()->sync($request->input('permissions'),[]);

        //notification
        $notification = array(
            'message' =>'Role Created',
            'alert-type' =>'success'
        );
        return redirect()->route('app.roles.index')->with($notification);

    }
    public function edit($id){

        $role = Role::find($id);
        $modules = Module::all();
        return view('backend.roles.create',compact('modules','role'));
    }

    public function update(REQUEST $request,$id){

        $role = Role::find($id);
        $role->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        $role->permissions()->sync($request->input('permissions'));
        //notification
        $notification = array(
            'message' =>'Role Updated',
            'alert-type' =>'success'
        );
        return redirect()->route('app.roles.index')->with($notification);
    }


    public function delete($id){
        $role = Role::find($id);
        if ($role->deleteable == 1){
            $role->delete();
        }
        else{
            $notification = array(
                'message' =>'Cannot delete this role',
                'alert-type' =>'error'
            );
            return back()->with($notification);
        }
        //notification
        $notification = array(
            'message' =>'Role Delete Successfully ',
            'alert-type' =>'success'
        );
        return redirect()->route('app.roles.index')->with($notification);
    }
}
