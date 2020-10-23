<?php

namespace App\Http\Controllers;

use App\Http\Middleware\isAdmin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $users = User::all();
        return view('UserManagement',['users'=>$users]);
    }

    public function deleteUser(Request $request , $email)
    {
        if (Auth::user()->email == $email)
        {
            return redirect()->back()->with("error","Can't delete your own account");
        }
        else
        {
            User::where('email',$email)->delete();
            return redirect()->back()->with("success","User deleted successfully");
        }
    }

    public function findUser(Request $request , $email)
    {
        $users = User::where('email',$email)->get();
        return view('UserManagement',['users'=>$users]);
    }



}
