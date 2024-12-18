<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function index()
    {
        return view('user');
    }

    public function Form()
    {
        return view('form');
    }

    public function History()
    {
        return view('terimakasih');
    }

    public function Conclusion()
    {
        return view('ringkasan');
    }
}