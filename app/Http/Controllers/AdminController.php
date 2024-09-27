<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  

    public function index(){
        $users = User::all();
        $classes = SchoolClass::all();
        // dd($users);
        $userCount = User::count();
        $classCount = SchoolClass::count();
        $teacherCount = User::where('role',  'teacher')->count();
        $studentCount = User::where('role',  'student')->count();
        

        $studentsList = User::where('role', 'student')->get();
        $teachersList = User::where('role', 'teacher')->get();
      
        return view('admin.dashboard',['stat' => [
            'users' => $users,
            'usersCount' => $userCount,
            'classesCount' => $classCount,
            'teachers' => $teacherCount,
            'students' => $studentCount,
        ],
    
        'studentsList' => $studentsList,
        'teachersList' => $teachersList,
    
    ]);
    }
    public function users(){
        
        $users = User::with('schoolClass')->get();
        return view ('admin.users', [
            'users' => $users
        ]);
    }
    public function userForm(){
        $school_classes = SchoolClass::all();
        return view('admin.userForm',[
            'school_classes' => $school_classes,
        ]);
    }

    public function addUser(Request $request) {
        // dd($request->all());
        $inputData = $request ->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' =>'required|string|confirmed|min:8',
            'gender'=>'required|in:male,female,other',
            'school'=>'required|in:jitegemee,kawawa',
            'role' => 'required|in:teacher,student',
            'class_id' => 'required_if:role,student|exists:school_classes,id'

        ]);


        User::create($inputData);
        return redirect(route('admin.users'));
       
    }



    public function viewUser(User $user){
        
        return view ('admin.user', [
            'user' => $user
        ]);

    }

    public function editForm(User $user){
        return view('admin.editUser', [
            'user' =>$user]);
    }

    public function updatedUser(User $user, Request $request){
        $formData = $request ->validate([
            'name' => 'required',
            'email' => 'required',
            'gender'=>'required',
            'school'=>'required',
            'role' => 'required',
            'class'=>'required',
            
        ]);
    
        $user->update($formData);
        
        return redirect(route('admin.users'));
    
    }
    public function destroy(User $user){
        $user->delete();
        return redirect()->back();
    }



}
