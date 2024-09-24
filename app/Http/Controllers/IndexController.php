<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function adminLTE()
    {
        return view('index');
    }
    public function index()
    {
        return view('home');
    }

    public function selectRole(Request $request)
    {
        $role = $request->input('role');
        
        if ($role === 'teacher') {
            return redirect()->route('loginForm', ['role' => 'teacher']);
        } elseif ($role === 'student') {
            return redirect()->route('loginForm', ['role' => 'student']);
        }

        return back();
    }
}
