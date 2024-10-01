<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Subject;
use App\Models\Material;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
 

    public function index(){
        $teacher = Auth::user();
        $classes = $teacher->classrooms;
        // $subjects = $teacher->subjects;
        return view('teacher.dashboard',[
            'teacher' => $teacher,
            'classes' => $classes,
            // 'subjects' => $subjects
        ]);
    }

    public function teacherClassForm(){
        $school_classes = SchoolClass::all();
        return view('teacher.classForm',[
            'school_classes' => $school_classes
        ]);
    }
  

    public function teacherClasses()
{
    $userId = Auth::id(); 
    $user = User::findOrFail($userId); 

    $schoolClasses = $user->classes->unique('id');

    return view('teacher.classes', [
        'schoolClasses' => $schoolClasses
    ]);
}


    public function teacherAddClass(Request $request) {
        $inputData = $request ->validate([
            'name' => 'required|string|max:255',

        ]);


        SchoolClass::create($inputData);
        return redirect(route('teacher.classes'));
       
    }

    // public function teacherViewClass(SchoolClass $school_class){
       
    //     $subjects = $school_class->subjects;
    //     return view ('teacher.class', [
    //         'subjects' => $subjects ,
    //         'school_class' => $school_class
    //     ]);
    // }

    public function teacherViewClass(SchoolClass $school_class)
{
    $userId = Auth::id();

    // Get subjects assigned to the teacher for the selected class
    $subjects = DB::table('teacher_class_subject_pivots')
        ->join('subjects', 'teacher_class_subject_pivots.subject_id', '=', 'subjects.id')
        ->where('teacher_class_subject_pivots.user_id', $userId)
        ->where('teacher_class_subject_pivots.class_id', $school_class->id)
        ->select('subjects.id', 'subjects.name')
        ->get();

    return view('teacher.class', [
        'subjects' => $subjects,
        'school_class' => $school_class
    ]);
}

    public function subjectForm(SchoolClass $school_class){
        return view('teacher.subjectForm' , [
        'school_class' => $school_class
        ]);
    }



    public function addSubject(Request $request, SchoolClass $school_class) {
        // dd($request->all());
        $inputData = $request ->validate([
            'name' => 'required|string|max:255',
            'school_class_id' => 'required|exists:school_classes,id',

        ]);

        Subject::create($inputData);

        
        return redirect()->route('teacher.classes');
    }

    public function destroySubject(Subject $subject)
{
    $subject->delete();
    return redirect()->back();;
}



public function viewSubject(SchoolClass $class, Subject $subject)
{
    $materials = Material::where('subject_id', $subject->id)
                            ->where('class_id', $class->id)
                            ->get();
    
    

    return view('teacher.subject', compact('materials', 'subject', 'class'));
}



public function materialForm(SchoolClass $class, Subject $subject){
    return view('teacher.materialForm',[
        'subject' => $subject,
        'class' =>  $class
    ]);
}

public function addMaterial(Request $request,  SchoolClass $class, Subject $subject)
{
 
    $request->validate([
        'title' => 'required|string|max:255',
        'type' => 'required|in:document,link,video',
        'file' => 'required_if:type,document,video|mimes:pdf,docx,doc,zip,mp4,avi,mov|max:92160', // Allow PDF for documents and MP4 for videos
        'url' => 'nullable|url',
        'class_id' => 'required|exists:school_classes,id',
        'subject_id' => 'required|exists:subjects,id'
    ]);


    $filePath = null;
    $url = null;

    if ($request->type === 'document' || $request->type === 'video') {
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('materials');
        }
    }


    if ($request->type === 'link') {
        $url = $request->url;
    }

    Material::create([
        'title' => $request->title,
        'type' => $request->type,
        'file_path' => $filePath,
        'url' => $url,
        'subject_id' => $subject->id,
        'class_id' => $class->id
    ]);
    return response()->json(['message' => 'Material uploaded successfully']);
}

public function showMaterial(Material $material)
{
    if (!Storage::exists($material->file_path)) {
        return abort(404, 'File not found.');
    }

    return response()->file(Storage::path($material->file_path));
}

public function destroyMaterial(Material $material)
{
    $material->delete();
    return redirect()->back();;
}



//blog 
public function blog()
{
    $teacher = Auth::user();
     $messages = Blog::with('user')->orderBy('created_at', 'asc')->get();  

     return view('teacher.blog.index', compact('messages','teacher'));
 
}

public function store(Request $request)
{
    //dd($request->all());
    $request->validate([
        'message' => 'required',
    ]);

    Blog::create([
        'message' => $request->message,
        'user_id'=>Auth::id(),
    ]);
    return redirect()->route('teacher.blog');
}

// user management
public function users(){
        
    $users = User::with('schoolClass')->get();
    return view ('teacher.users', [
        'users' => $users
    ]);
}
public function userForm(){
    $school_classes = SchoolClass::all();
    return view('teacher.usersForm',[
        'school_classes' => $school_classes,
    ]);
}

public function addUser(Request $request) {
    $inputData = $request ->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' =>'required|string|confirmed|min:8',
        'school'=>'required|in:jitegemee,kawawa',
        'role' => 'required|in:teacher,student',
        'class_id' => 'required_if:role,student|exists:school_classes,id'

    ]);


    User::create($inputData);
    return redirect(route('teacher.users'));
   
}



public function viewUser(User $user){
    
    return view ('teacher.user', [
        'user' => $user
    ]);

}

public function editForm(User $user){
    return view('teacher.editUser', [
        'user' =>$user]);
}

public function updatedUser(User $user, Request $request){
   // dd($request-> all());
    $formData = $request ->validate([
        'name' => 'required',
        'email' => 'required',
        'school'=>'required',
        'role' => 'required',
        'class_id'=>'required|exists:school_classes,id',
        
    ]);

    $user->update($formData);
    
    return redirect(route('teacher.users'));

}
public function destroy(User $user){
    $user->delete();
    return redirect()->back();
}



}
    

