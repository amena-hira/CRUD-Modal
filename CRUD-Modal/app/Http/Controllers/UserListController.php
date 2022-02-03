<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;

class UserListController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);
        return view('CRUD.profile')->with('user',$user);
    }

    public function profile_update(Request $request,$id)
    {
        $user = User::find($id);
        $user->full_name = $request->full_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->about = $request->about;
        if( $user->password == $request->current_password && $user->password == $request->new_password ){
            if($request->new_password == $request->confirm_password ){
                $user->password = $request->new_password;
            }
            
        }
        else{
            $user->password = $user->password;
        }
        
        $user->save();
        $user = User::find($id);
        return view('CRUD.profile')->with('user',$user);
    }
}
