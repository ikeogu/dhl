<?php

namespace App\Http\Controllers;

use App\Mail\NewSignIn;
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
    }

    public function createAdmin(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $pwd = \Str::random(8);
        $user->password = Hash::make($pwd);
        $user->role = $request->role;
        if ($user->save()) {
            $data = [
                'email' => $request->email,
                'subject' => "Account has been created.",

                'url' => URL::signedRoute('login'),
                'name' => $user->name,
                'password' => $pwd
            ];

            Mail::to($request->email)->send(new NewSignIn($data));
        }
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
        return back()->with('success', 'Admin deleted.');
    }
    public function unsuspendAdmin($id)
    {
        $u = User::findOrFail($id);
        $u->status = 1;
        $u->save();
        return back()->with('success', 'Admin deleted.');
    }
}