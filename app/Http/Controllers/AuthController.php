<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm(Request $request){
        $role = $request->query('role');
        return view('components.login', compact('role'));
    }


    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string|min:8',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user(); 
        // dd($user);
        $user->login_at = now();
        $user->save();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'teacher') {
            return redirect()->route('teacher.dashboard');
        } elseif ($user->role === 'student') {
            return redirect()->route('student.dashboard');
        }
    }

    return redirect()->back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}

    public function regForm(){
        $school_classes = SchoolClass::all();
        return view('components.register',[
            'school_classes' => $school_classes,
            
        ]);
    }
    

    public function register(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' =>'required|string|confirmed|min:8',
            'gender'=>'required|in:male,female,other',
            'school'=>'required|in:jitegemee,kawawa',
            'role' => 'required|in:teacher,student',
            'class_id' => 'required_if:role,student|exists:school_classes,id'

        ]);


        User::create([
            'name' =>$request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender'=>$request->gender,
            'school' => $request->school,
            'role' => $request->role,
            'class_id'=>$request->class_id
        ]);


        return redirect()->route('loginForm')->with('success', 'Registration successful. Please login.');
    
    }

    public function logout(Request $request){
        $user = Auth::user();
        $user->logout_at = now();
        $user->save();
        
        Auth::logout();
        return redirect('/');
    }



    
}
