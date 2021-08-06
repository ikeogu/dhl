<?php

namespace App\Http\Controllers;


use App\Models\Item;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data['admins'] = User::latest()->take(8)->get();
        $data['items'] = Item::latest()->take(8)->get();
        return view('dashboard')->with($data);
    }
}