<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){

        $user = Auth::user();
        return view('backend.profile.profile',compact('user'));
    }

    public function update(Request $request){

        $user = Auth::user();

        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'image' => 'nullable|image|mimes:jpg,png',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
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
            'message' =>'Profile Update Successfully ',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }



    public function changePassword()
    {
        return view('backend.profile.security');
    }



    public function updatePassword(Request $request)
    {
        $this->validate($request,[
            'current_password' => 'required|',
            'password' => 'required|confirmed',

        ]);
        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->current_password, $hashedPassword)) {
            if (!Hash::check($request->password, $hashedPassword)) {
                Auth::user()->update([
                    'password' => Hash::make($request->password)
                ]);
                Auth::logout();
                //notification
                $notification = array(
                    'message' =>'Password Successfully Changed ',
                    'alert-type' =>'success'
                );
                return redirect()->route('login')->with($notification);
            } else {
                $notification = array(
                    'message' =>'New password cannot be the same as old password.',
                    'alert-type' =>'success'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' =>'Current Password Not Matched',
                'alert-type' =>'error'
            );
            return redirect()->back()->with($notification);
        }
        return redirect()->back();
    }
}
