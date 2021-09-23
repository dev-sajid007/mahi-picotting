<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        Gate::authorize('app.users.index');
        $users = User::latest('id')->get();
        return view('backend.users.index',compact('users'));
    }

    public function create(){
        Gate::authorize('app.users.create');
        $roles = Role::all();
        return view('backend.users.create',compact('roles'));
    }

    public function store(REQUEST $request){
        Gate::authorize('app.users.create');
        //return $request;
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role_id' => 'required',
            'password' => 'required|confirmed|string|min:8',
            'image' => 'required|image|mimes:jpg,png',
        ]);


        $user = new User();
        $user->role_id = $request->role_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = $request->filled('status');
        //Image Upload
        $img = $request->file('image');
        if($img){
            $imgName = date('YmsHi').$request->name.$img->getClientOriginalName();
            $img->move('ImageUpload/UserImage/',$imgName);
            $user->image =$imgName;
        }
        $user->save();

        //notification
        $notification = array(
            'message' =>'User Create Successfully ',
            'alert-type' =>'success'
        );
        return redirect()->route('app.users.index')->with($notification);
    }


    public function show($id){
        $user = User::find($id);
        return view('backend.users.show',compact('user'));
    }
    public function edit($id){
        Gate::authorize('app.users.edit');
        $user = User::find($id);
        $roles = Role::all();
        return view('backend.users.create',compact('user','roles'));
    }

    public function update(REQUEST $request,$id){
        Gate::authorize('app.users.edit');
        $user = User::find($id);
        //return $request;
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'role_id' => 'required',
            'password' => 'nullable|confirmed|string|min:8',
            'image' => 'nullable|image|mimes:jpg,png',
        ]);

        $user->role_id = $request->role_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = isset($request->password)? Hash::make($request->password) : $user->password;
        $user->status = $request->filled('status');
        //Image Update
        $img = $request->file('image');
        if($img){
            $imgName = date('YmsHi').$img->getClientOriginalName();
            $img->move('ImageUpload/UserImage/',$imgName);
            if(file_exists('ImageUpload/UserImage/'.$user->image) AND !empty($user->image))
            {
                unlink('ImageUpload/UserImage/'.$user->image);
            }
            $user->image =$imgName;
        }else{
            $user->image =$user->image;
        }
        $user->update();

        //notification
        $notification = array(
            'message' =>'User Update Successfully ',
            'alert-type' =>'success'
        );
        return redirect()->route('app.users.index')->with($notification);
    }

    public function delete($id){
        Gate::authorize('app.users.delete');
        $user = User::find($id);

        if($user->deleteable == 1){
            if(file_exists('ImageUpload/UserImage/'.$user->image) AND !empty($user->image))
            {
                unlink('ImageUpload/UserImage/'.$user->image);
            }
            $user->delete();
        }else{
            $notification = array(
                'message' =>'Cannot delete super-admin',
                'alert-type' =>'error'
            );
            return back()->with($notification);
        }


        //notification
        $notification = array(
            'message' =>'User Delete Successfully ',
            'alert-type' =>'success'
        );
        return redirect()->route('app.users.index')->with($notification);
    }
}
