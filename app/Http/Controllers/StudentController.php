<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Subject;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index(){
      

        $student = User::with('schoolClass')->find(Auth::id());

        return view('student.dashboard',[
            'student' => $student,
            
        ]);
    }


    public function subjects()
{
    $student = User::with('schoolClass.adminSubjects')->find(Auth::id());
    $subjects = $student->schoolClass ? $student->schoolClass->adminSubjects : collect();

    return view('student.class', [
        'student' => $student,
        'subjects' => $subjects,
    ]);
}

    public function showMaterials(Subject $subject)
    {
        $materials = $subject->materials;

        return view('student.materials', [
            'subject' => $subject,
            'materials' => $materials,
        ]);
    }

    public function materialDownload(Material $material)
    {
        return Storage::download($material->file_path);
    }

    public function viewMaterial(Material $material)
    {
        if (!Storage::exists($material->file_path)) {
            return abort(404, 'File not found.');
        }
    
        return response()->file(Storage::path($material->file_path));
    }

    //blog 
public function blog()
{
    $student = Auth::user();
     $messages = Blog::with('user')->orderBy('created_at', 'asc')->get();  

     return view('student.blog.index', compact('messages','student'));
 
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
    return redirect()->route('student.blog');
}

}
