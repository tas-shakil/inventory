<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;

class ProfileController extends Controller
{
    public function view(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('profile/view-profile',compact('user'));

    }
    public function edit(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('profile/edit-profile',compact('editData'));

    }

    public function update(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->gender = $request->gender;
        $data->mobile = $request->mobile;
        $data->address = $request->address;

        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),  $filename);
            $data['image'] = $filename;
        }

        $data->save();
        return redirect()->route('profiles.view')->with('success','Profile Updated successfully');

    }

    public function passwordView(){
        return view('profile/password-change');
    }


    public function passwordUpdate(Request $request){
        if(Auth::attempt(['id'=>Auth::user()->id,'password'=>$request->current_password])){
            $user= User::find(Auth::user()->id);
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->route('profiles.view')->with('success','Password successfully changed');
        }else{
           return redirect()->back()->with('error','Sorry! Your current password doen not match');
        }
    }
}
