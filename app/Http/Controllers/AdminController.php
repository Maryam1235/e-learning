<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
<<<<<<< Updated upstream
use Illuminate\Support\Facades\Hash;
=======
use Illuminate\Support\Facades\DB;
use App\Models\TeacherSubjectClass;
use App\Models\TeacherClassSubjectPivot;
>>>>>>> Stashed changes

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



    // public function viewUser(User $user){
        
    //     return view ('admin.user', [
    //         'user' => $user
    //     ]);

    // }

    public function viewUser(User $user) {

        $user->load('classes'); 
        foreach ($user->classes as $class) {
            $class->subjects = Subject::whereIn('id', $class->pivot->pluck('subject_id'))->get();
        }
        return view('admin.user', [
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

    // update status

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


    // public function assignClassSubject(User $user)
    // {
    //     $teacher = $user;
    //     // dd($teacher); 
    //     if (strtolower($teacher->role) !== 'teacher') {
    //         abort(403);
    //     }
    //     $classes = SchoolClass::all();
        
    //     return view('admin.adminUsers.assign-class-subject', compact( 'teacher','classes'));
    // }

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
        if (!empty($validated['subjects'][$index])) {
            DB::table('teacher_class_subject_pivots')->insert([
                'user_id' => $teacherId,
                'class_id' => $classId,
                'subject_id' => $validated['subjects'][$index],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    return redirect()->route('admin.users')->with('success', 'Classes and subjects assigned successfully!');
}


    // public function storeClassSubjectAssignment(Request $request, User $user)
    // {
    //     if (strtolower($user->role) !== 'teacher') {
    //         abort(403);
    //     }
    //     $request->validate([
    //         'class_id' => 'required|exists:school_classes,id',
    //         'subject_id' => 'required|exists:subjects,id',
    //     ]);
    

    //     // $teacher->classes()->attach($request->input('class_id'));
    //     TeacherClassSubjectPivot::create([
    //         'user_id' => $user->id, 
    //         'class_id' => $request->input('class_id'),
    //         'subject_id' => $request->input('subject_id'), 
    //         'created_at' => now(),
    //         'updated_at' => now(),
    //     ]);

    //     return redirect()->route('admin.users');
    // }

}
