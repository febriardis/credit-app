<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function __construct()
    {
    	$this->middleware('auth:admin');;
    }

    public function index(Request $request)
    {
    	$request->user()->authorizeRoles(['petugas 1', 'petugas 2', 'manager']); //cek role ->N:true
        
    	return view('admin.dashboard');

    }
}
