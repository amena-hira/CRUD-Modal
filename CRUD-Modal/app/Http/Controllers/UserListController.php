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
}
