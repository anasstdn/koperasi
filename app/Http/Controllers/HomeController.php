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
        $pesan='';
        $pesan.='Pengguna '.strtoupper(strtolower (Auth::user()->name)).'';
        $pesan.='<br>Anda melakukan login ke sistem pada '.date('d-m-Y H:i:s');

        message(true,$pesan,'');

        return view('home');
    }
}
