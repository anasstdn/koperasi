<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(cek_kelengkapan_data()['status']==true)
        {
            message(false,'',cek_kelengkapan_data()['pesan']);
            return redirect('/profile/edit/'.\Auth::user()->id);
        }
        else
        {
            return view('home');
        }
    }
}
