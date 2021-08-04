<?php

namespace App\Http\Controllers;

use App\Mail\NewSignIn;
use App\Models\SanitizeInput;
use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->sanitize = new SanitizeInput();
    }

    public function createAdmin(Request $request)
    {
        $validatedData = $request->validate([

            'name' => 'required',
            'email' => 'required|unique:users,email,except,id',

            'phone' => 'required|unique:users,phone',
           
        ]);
        $user = new User();
        $user->name = $this->sanitize->SanitizeInput($request->name);
        $user->email = $this->sanitize->SanitizeInput($request->email);
        $user->phone =$this->sanitize->SanitizeInput($request->phone);
        $user->status = 1;
        $pwd = \Str::random(8);
        $user->password = Hash::make($pwd);
        $user->role = $request->role;
        if ($user->save()) {
            $data = [
                'email' => $user->email,
                'subject' => "Account has been created.",

                'url' => URL::signedRoute('login'),
                'name' => $user->name,
                'password' => $pwd
            ];
            $email = str_replace("\xE2\x80\x8B", "", $request->email);
            Mail::to($email)->send(new NewSignIn($data));
        }
        return back()->with('success', 'Admin added successfuly');
    }
    public function listAdmins()
    {
        $admins = User::all();
        return view('admin.admins', ['admins' => $admins]);
    }

    public function destroyAdmin($id)
    {
        $u = User::findOrFail($id);
        $u->delete();
        return back()->with('success', 'Admin deleted.');
    }
    public function suspendAdmin($id)
    {
        $u = User::findOrFail($id);
        $u->status = 0;
        $u->save();
        return back()->with('success', 'Admin suspend.');
    }
    public function unsuspendAdmin($id)
    {
        $u = User::findOrFail($id);
        $u->status = 1;
        $u->save();
        return back()->with('success', 'Admin Activated.');
    }
}