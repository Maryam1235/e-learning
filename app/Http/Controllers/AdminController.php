<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\TeacherSubjectClass;
use App\Models\TeacherClassSubjectPivot;

class AdminController extends Controller
{
  

    public function index(){
        $users = User::all();
        $classes = SchoolClass::all();
        $userCount = User::count();
        $classCount = SchoolClass::count();
        $teachersCount = User::where('role',  'teacher')->count();
        // $studentCount = User::where('role',  'student')->count();
        $inactiveCount = User::where('status', 'inactive')->count();
        

        // $studentsList = User::where('role', 'student')->get();
        // $teachersList = User::where('role', 'teacher')->get();
      
        return view('admin.dashboard',['stat' => [
            'users' => $users,
            'usersCount' => $userCount,
            'classCount' => $classCount,
            'inactiveCount' =>$inactiveCount,
            'teachersCount' => $teachersCount,
            // 'students' => $studentCount,
        ],
    
        // 'studentsList' => $studentsList,
        // 'teachersList' => $teachersList,
    
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



  

public function viewUser(User $user)
{
    // Get the teacher's classes and subjects using the pivot table
    $assignedClasses = DB::table('teacher_class_subject_pivots')
        ->join('school_classes', 'teacher_class_subject_pivots.class_id', '=', 'school_classes.id')
        ->join('subjects', 'teacher_class_subject_pivots.subject_id', '=', 'subjects.id')
        ->where('teacher_class_subject_pivots.user_id', $user->id)
        ->select('school_classes.id as class_id', 'school_classes.name as class_name', 'subjects.name as subject_name')
        ->get()
        ->groupBy('class_name'); // Group subjects by class name

    return view('admin.user', [
        'user' => $user,
        'assignedClasses' => $assignedClasses
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



    public function updateUserStatus(Request $request, User $user)
    {
        $user->status = $request->status;
        $user->save();

        return redirect()->back()->with('success', 'User status updated successfully.');
    }


    // reset password
    public function resetPassword($id)
    {
        $user = User::findOrFail($id);
        return view('components.reset_password', compact('user'));
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = User::findOrFail($id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.users')->with('success', 'Password reset successfully.');
    }




    public function createAdminUser()
    {
        $school_classes = SchoolClass::all();
        return view('admin.adminUsers.create',compact('school_classes'));
    }

    public function storeAdminUser(Request $request)
    {
        
       $inputData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'gender' => 'required|in:male,female',
            'password' => 'required|confirmed|min:8',
            'school'=>'required|in:jitegemee,kawawa',
            'role' => 'required|in:admin',
            'class_id' => 'required_if:role,student|exists:school_classes,id'

        ]);

        User::create($inputData);

        return redirect()->route('admin.users');
    }






    public function assignClassSubject($userId)
{
    $teacher = User::findOrFail($userId);
    $classes = SchoolClass::all();
    $subjects = Subject::all();

    return view('admin.adminUsers.assign-class-subject', compact('teacher', 'classes', 'subjects'));
}



public function storeClassSubjectAssignment(Request $request, $teacherId)
{
    $validated = $request->validate([
        'classes.*' => 'required|exists:school_classes,id',
        'subjects.*' => 'required|exists:subjects,id',
    ]);


    foreach ($validated['classes'] as $index => $classId) {
        $subjectId = $validated['subjects'][$index];
        
        // Check if this class-subject pair is already assigned to the teacher
        $existingAssignment = DB::table('teacher_class_subject_pivots')
            ->where('user_id', $teacherId)
            ->where('class_id', $classId)
            ->where('subject_id', $subjectId)
            ->first();


        if (!$existingAssignment) {
            // Only insert if the assignment does not already exist
            DB::table('teacher_class_subject_pivots')->insert([
                'user_id' => $teacherId,
                'class_id' => $classId,
                'subject_id' => $subjectId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }


    return redirect()->route('admin.users')->with('success', 'Classes and subjects assigned successfully!');
}





}

