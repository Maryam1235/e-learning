<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmissionController extends Controller
{
    public function store(Request $request, Assignment $assignment)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $filePath = $request->file('file')->store('submissions');

        Submission::create([
            'assignment_id' => $assignment->id,
            'student_id' => Auth::id(),
            'file_path' => $filePath,
            'submitted_at' => now(),
        ]);

        return redirect()->route('teacher.assignments.show', $assignment);
    }

    public function index()
    {
        $submissions = Submission::where('student_id', Auth::user())->get();
        return view('teacher.submissions.index', [
            'submissions' => $submissions
        ]);
    }
}
