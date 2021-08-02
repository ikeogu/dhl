<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Loan;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Log;

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
        $data['admins'] = User::latest()->take(8);
        return view('dashboard')->with($data);
    }
}