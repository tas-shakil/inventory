<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator;

class UserController extends Controller
{
    public function view(){
        $data['allData'] = User::all();
        return view('user.view-user', $data);
    }

    public function add(){
      
        return view('user.add-user');
    }

    public function store(Request $request){
        // form validation
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'usertype'=>'required',
            'password'=>'required',
        ]);
      $data = new User();
      $data->name = $request->name;
      $data->email = $request->email;
      $data->usertype = $request->usertype;
      $data->password = bcrypt($request->password);
      $data->save();
      return redirect()->route('users.view')->with('success','Data inserted successfully');
    }

    public function edit($id){
       $editData = User::find($id);
        return view('user.edit-user',compact('editData'));
    }

    public function update(Request $request, $id){
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->usertype = $request->usertype;
        $data->save();
        return redirect()->route('users.view')->with('success','Data Updated Successfully');
      
    }

    public function delete($id){
        $user = User::find($id);

        // unlink image from folder
        if(file-exists('public/upload/users_images'.$user->image) AND ! empty($user->image)){
            unlink('public/upload/users_images/' .$user->image);
        }
        $user->delete();
        return redirect()->route('users.view')->with('success','User deleted Successfully');
         
     }
}
