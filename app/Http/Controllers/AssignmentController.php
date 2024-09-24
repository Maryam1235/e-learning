<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Subject;
use App\Models\Assignment;
use App\Models\Submission;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    public function assignmentForm(){
        $classes = SchoolClass::all(); 
        $subjects = Subject::all(); 
        return view('teacher.assignments.assignmentForm',[
            'classes' => $classes,
            'subjects' => $subjects
        ]);
    }


    public function addAssignment(Request $request)
    {
        
        $request->validate([
            'class_id' => 'required|exists:school_classes,id',
            'subject_id' => 'required|exists:subjects,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|mimes:pdf,doc,docx|max:2048',
            'submission_deadline' => 'required|date'
        ]);

        $submissionDeadline = Carbon::parse($request->submission_deadline);

        $filePath = $request->file('file')->store('assignments');

        Assignment::create([
            'teacher_id' => Auth::id(),
            'class_id' => $request->class_id,
            'subject_id' => $request->subject_id,
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
            'submission_deadline' => $submissionDeadline,
        ]);
      

        return redirect()->route('teacher.assignments');
    }

    public function assignments()
{
    $assignments = Assignment::where('teacher_id', Auth::id())
        ->with('schoolClass', 'subject', 'teacher')
        ->get();
    return view('teacher.assignments.index', [
        'assignments' => $assignments
    ]);
}

public function showAssignment($id)
{
    $assignment = Assignment::with('schoolClass', 'subject', 'teacher')->findOrFail($id);
    return view('teacher.assignments.showAssignment', compact('assignment'));
}



    public function destroy(Assignment $assignment){
        $assignment->delete();
        return redirect()->back();
    }

    public function viewAssignment(Assignment $assignment)
    {
        if (!Storage::exists($assignment->file_path)) {
            return abort(404, 'File not found.');
        }

        return response()->file(Storage::path($assignment->file_path));
    }


public function reviewSubmissions()
{
    // Get the authenticated teacher's ID
    $teacherId = Auth::id();

    // Retrieve all assignments created by the teacher
    $assignments = Assignment::where('teacher_id', $teacherId)->get();

    // Retrieve submissions for each assignment
    $assignmentsWithSubmissions = $assignments->map(function($assignment) {
        $assignment->submissions = Submission::with('student') // Eager load the student relationship
            ->where('assignment_id', $assignment->id)
            ->get();
        return $assignment;
    });

    // Pass the data to the view
    return view('teacher.assignments.reviewAllSubmissions', compact('assignmentsWithSubmissions'));
}



    //student part assignments

    public function listAssignments()
    {
        $student = Auth::user();
        
        $assignments = Assignment::where('class_id', $student->class_id)->get();
        return view('student.assignments', [
            'assignments' => $assignments
        ]);
    }


    public function downloadAssignment($assignmentId)
{
    $assignment = Assignment::find($assignmentId);

    if (!$assignment) {
        abort(404, 'Assignment not found');
    }


    return Storage::download($assignment->file_path);
}

    public function assignmentSubmissionForm(Assignment $assignment){

        return view('student.submissionForm', compact('assignment'));

    }

    public function submitAssignment(Request $request, Assignment $assignment)
{
    $student = Auth::user();

    if ($assignment->class_id != $student->class_id) {
        return redirect()->route('student.dashboard')->with('error', 'Unauthorized access to this assignment');
    }

    if (now()->greaterThan($assignment->submission_deadline)) {
        return redirect()->back()->with('error', 'You have missed the submission deadline');
    }

    $existingSubmission = Submission::where('assignment_id', $assignment->id)
    ->where('student_id', $student->id)
    ->first();

    if ($existingSubmission) {
        return redirect()->back()->with('error', 'You have already submitted this assignment');
    }

    $request->validate([
        'file' => 'required|file|mimes:pdf,doc,docx',
    ]);

    $filePath = $request->file('file')->store('submissions');

    Submission::create([
        'assignment_id' => $assignment->id,
        'student_id' => $student->id,
        'file_path' => $filePath,
        'submitted_at' => now(),
    ]);

    return redirect()->route('student.dashboard')->with('success', 'Assignment submitted successfully');
}

public function assignmentDetails($id)
{
    $assignment = Assignment::with('schoolClass', 'subject', 'teacher')->findOrFail($id);
    return view('student.showAssignment', compact('assignment'));
}


}
