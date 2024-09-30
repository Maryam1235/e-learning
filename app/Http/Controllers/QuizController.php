<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Subject;
use App\Models\QuizResult;
use App\Models\UserAnswer;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Imports\QuizResultsImport;
use Maatwebsite\Excel\Facades\Excel;


class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();
        return view('teacher.quiz.index', compact('quizzes'));
    }
    public function adminIndex()
    {
        $quizzes = Quiz::all();
        return view('admin.quiz.index', compact('quizzes'));
    }

    public function studentIndex()
    {

    $student =Auth::user(); 

    $classId = $student->class_id; 
    $quizzes = Quiz::where('class_id', $classId)->get(); 

    return view('student.quiz.index', compact('quizzes'));
    }

    public function showQuiz(Quiz $quiz)
    {
        $quiz->load('questions'); 
    return view('teacher.quiz.show', compact('quiz'));
    }

    public function adminShowQuiz(Quiz $quiz)
    {
        $quiz->load('questions'); 
    return view('admin.quiz.show', compact('quiz'));
    }

    public function createQuiz(){
        $classes = SchoolClass::all();
        $subjects = Subject::all();
        return view ('teacher.quiz.quizForm', compact('classes','subjects'));
    }

    public function adminCreateQuiz(){
        $classes = SchoolClass::all();
        $subjects = Subject::all();
        return view ('admin.quiz.quizForm', compact('classes','subjects'));
    }


public function getSubjectsByClass($classId)
{
    $subjects = Subject::where('school_class_id', $classId)->get();
   

    return response()->json($subjects);
}
    public function storeQuiz(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'class_id' => 'required|exists:school_classes,id',
            'subject_id' => 'required|exists:subjects,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'duration' => 'required|integer|min:1',
            'questions.*.question_text' => 'required|string',
            'questions.*.option1' => 'required|string',
            'questions.*.option2' => 'required|string',
            'questions.*.option3' => 'required|string',
            'questions.*.option4' => 'required|string',
            'questions.*.correct_option' => 'required|string|in:option1,option2,option3,option4',
        ]);
    
        // Create the quiz with the class and subject associated
        $quiz = Quiz::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'class_id' => $validatedData['class_id'],
            'subject_id' => $validatedData['subject_id'],
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'duration' => $request->duration,
        ]);
    
        foreach ($request->input('questions') as $questionData) {
            $quiz->questions()->create([
                'question_text' => $questionData['question_text'],
                'option1' => $questionData['option1'],
                'option2' => $questionData['option2'],
                'option3' => $questionData['option3'],
                'option4' => $questionData['option4'],
                'correct_option' => $questionData['correct_option'],
            ]);
        }
    
        return redirect()->route('quizzes.index')->with('success', 'Quiz created successfully.');
    }

    public function adminStoreQuiz(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'class_id' => 'required|exists:school_classes,id',
            'subject_id' => 'required|exists:subjects,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'duration' => 'required|integer|min:1',
            'questions.*.question_text' => 'required|string',
            'questions.*.option1' => 'required|string',
            'questions.*.option2' => 'required|string',
            'questions.*.option3' => 'required|string',
            'questions.*.option4' => 'required|string',
            'questions.*.correct_option' => 'required|string|in:option1,option2,option3,option4',
        ]);
    
        // Create the quiz with the class and subject associated
        $quiz = Quiz::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'class_id' => $validatedData['class_id'],
            'subject_id' => $validatedData['subject_id'],
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'duration' => $request->duration,
        ]);
    
        foreach ($request->input('questions') as $questionData) {
            $quiz->questions()->create([
                'question_text' => $questionData['question_text'],
                'option1' => $questionData['option1'],
                'option2' => $questionData['option2'],
                'option3' => $questionData['option3'],
                'option4' => $questionData['option4'],
                'correct_option' => $questionData['correct_option'],
            ]);
        }
    
        return redirect()->route('admin.quizzes.index')->with('success', 'Quiz created successfully.');
    }
    

public function editQuiz(Quiz $quiz)
{
    $quiz->load('questions');
    $classes = SchoolClass::all();   
    $subjects = Subject::all();  
    $selectedSubjectId = $quiz->subject_id;    
    return view('teacher.quiz.edit', compact('quiz', 'classes', 'subjects','selectedSubjectId'));
}

public function adminEditQuiz(Quiz $quiz)
{
    $quiz->load('questions');
    $classes = SchoolClass::all();   
    $subjects = Subject::all();  
    $selectedSubjectId = $quiz->subject_id;      
    return view('admin.quiz.edit', compact('quiz', 'classes', 'subjects', 'selectedSubjectId'));
}

public function updateQuiz(Request $request, Quiz $quiz)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:500',
        'class_id' => 'required|integer|exists:school_classes,id',
        'subject_id' => 'required|integer|exists:subjects,id',
        'start_time' => 'required|date',
        'end_time' => 'required|date|after:start_time',
        'duration' => 'required|integer|min:1',
        'questions.*.question_text' => 'required|string',
        'questions.*.option1' => 'required|string',
        'questions.*.option2' => 'required|string',
        'questions.*.option3' => 'required|string',
        'questions.*.option4' => 'required|string',
        'questions.*.correct_option' => 'required|string|in:option1,option2,option3,option4',
    ]);

    $quiz->update([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'class_id' => $request->input('class_id'),
        'subject_id' => $request->input('subject_id'),
        'start_time' => $request->input('start_time'),
        'end_time' => $request->input('end_time'),
        'duration' => $request->input('duration'),
    ]);

   
    $quiz->questions()->delete();

    foreach ($request->input('questions') as $questionData) {
        $quiz->questions()->create([
            'question_text' => $questionData['question_text'],
            'option1' => $questionData['option1'],
            'option2' => $questionData['option2'],
            'option3' => $questionData['option3'],
            'option4' => $questionData['option4'],
            'correct_option' => $questionData['correct_option'],
        ]);
    }

    return redirect()->route('quizzes.index')->with('success', 'Quiz updated successfully.');
}

public function adminUpdateQuiz(Request $request, Quiz $quiz)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:500',
        'class_id' => 'required|integer|exists:school_classes,id',
        'subject_id' => 'required|integer|exists:subjects,id',
        'start_time' => 'required|date',
        'end_time' => 'required|date|after:start_time',
        'duration' => 'required|integer|min:1',
        'questions.*.question_text' => 'required|string',
        'questions.*.option1' => 'required|string',
        'questions.*.option2' => 'required|string',
        'questions.*.option3' => 'required|string',
        'questions.*.option4' => 'required|string',
        'questions.*.correct_option' => 'required|string|in:option1,option2,option3,option4',
    ]);

    // Update the quiz
    $quiz->update([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'class_id' => $request->input('class_id'),
        'subject_id' => $request->input('subject_id'),
        'start_time' => $request->input('start_time'),
        'end_time' => $request->input('end_time'),
        'duration' => $request->input('duration'),
    ]);
    $quiz->questions()->delete();

    // Update or create questions
    foreach ($request->input('questions') as $key => $questionData) {
        if (isset($questionData['id'])) {
            // Update existing question
            $quiz->questions()->where('id', $questionData['id'])->update([
                'question_text' => $questionData['question_text'],
                'option1' => $questionData['option1'],
                'option2' => $questionData['option2'],
                'option3' => $questionData['option3'],
                'option4' => $questionData['option4'],
                'correct_option' => $questionData['correct_option'],
            ]);
        } else {
            // Create new question
            $quiz->questions()->create([
                'question_text' => $questionData['question_text'],
                'option1' => $questionData['option1'],
                'option2' => $questionData['option2'],
                'option3' => $questionData['option3'],
                'option4' => $questionData['option4'],
                'correct_option' => $questionData['correct_option'],
            ]);
        }
    }

    return redirect()->route('admin.quizzes.index')->with('success', 'Quiz updated successfully.');
}

public function destroyQuiz(Quiz $quiz)
{
    $quiz->questions()->delete(); 
    $quiz->delete();              
    return redirect()->route('quizzes.index')->with('success', 'Quiz deleted successfully.');
}

public function adminDestroyQuiz(Quiz $quiz)
{
    $quiz->questions()->delete(); 
    $quiz->delete();              
    return redirect()->route('admin.quizzes.index')->with('success', 'Quiz deleted successfully.');
}


public function startQuiz(Quiz $quiz)
{
    // Retrieve the quiz questions along with options
    $questions = $quiz->questions;

    // Pass the quiz and questions to the view
    return view('student.quizzes.start', compact('quiz', 'questions'));
}



public function takeQuiz(Quiz $quiz)
{
    if (now()->greaterThan($quiz->end_time)) {

        return redirect()->back()->with('error', 'The deadline for this quiz has passed. You cannot start it.');
    }

    $questions = $quiz->questions;

    return view('student.quiz.start', compact('quiz', 'questions'));
}

    

public function submitQuiz(Request $request, Quiz $quiz)
{
    $studentId = auth()->user()->id;
    $submittedAnswers = $request->input('answers'); // Array of question_id => selected_option

    $score = 0;
    $totalQuestions = $quiz->questions->count();

    foreach ($quiz->questions as $question) {
        if (isset($submittedAnswers[$question->id])) {
            $submittedAnswer = $submittedAnswers[$question->id];

            // Store student's answer in UserAnswer table
            UserAnswer::create([
                'user_id' => $studentId,
                'quiz_id' => $quiz->id,
                'question_id' => $question->id,
                'selected_option' => $submittedAnswer,
            ]);

         
            if (strtolower($submittedAnswer) == strtolower($question->correct_option)) {
                $score++;
            }
        }
    }

    // Calculate percentage score
    $percentageScore = ($score / $totalQuestions) * 100;

    // Save the result in QuizResult table
    QuizResult::updateOrCreate(
        [
            'quiz_id' => $quiz->id,
            'student_id' => $studentId
        ],
        [
            'score' => $score,
            'total_questions' => $totalQuestions,
            'percentage' => $percentageScore,
        ]
    );

    // Redirect to results page with success message
    return redirect()->route('quizzes.results', $quiz->id)
                     ->with('success', 'Quiz submitted successfully! Your score is ' . round($percentageScore, 2) . '%.');
}


    public function showQuizResults(Quiz $quiz)
    {
        // Retrieve the quiz result for the logged-in student
        $studentId = auth()->user()->id;
        $quizResult = QuizResult::where('quiz_id', $quiz->id)
                                ->where('student_id', $studentId)
                                ->firstOrFail();
    
        // Pass the result to the view
        return view('student.quiz.results', compact('quizResult'));
    }
    

    public function viewQuizResults(Quiz $quiz)
    {
        $quizResults = QuizResult::where('quiz_id', $quiz->id)
        ->distinct('student_id')
        ->get();
    
        return view('teacher.quiz.results', compact('quiz', 'quizResults'));
    }

    public function adminViewQuizResults(Quiz $quiz)
    {
        $quizResults = QuizResult::where('quiz_id', $quiz->id)
        ->distinct('student_id')
        ->get();
    
        return view('admin.quiz.results', compact('quiz', 'quizResults'));
    }

    public function uploadQuizResults(Request $request, Quiz $quiz)
    {
        $excel = Excel::load($request->file('results'));
    
        $data = $excel->toArray();
    
        foreach ($data as $row) {
            $studentName = $row['Student Name'];
            $score = $row['Score'];
    
            QuizResult::create([
                'student_name' => $studentName,
                'score' => $score,
                'quiz_id' => $quiz->id,
            ]);
        }
    
        return redirect()->route('quizzes.results', $quiz->id);
    }


    public function adminUploadQuizResults(Request $request, Quiz $quiz)
{
    Excel::import(new QuizResultsImport($quiz), $request->file('results'));

    return redirect()->route('admin.quizzes.results', $quiz->id);
}
    public function uploadQuizResultsForm(Quiz $quiz)
{
    return view('quizzes.upload-results', compact('quiz'));
}

public function adminUploadQuizResultsForm(Quiz $quiz)
{
    return view('admin.quiz.resultForm', compact('quiz'));
}


public function uploadForm()
{
    $classes = SchoolClass::all();
    $subjects = Subject::all();
    return view('quizzes.upload', compact('classes','subjects'));
}
public function adminUploadForm()
{
    $classes = SchoolClass::all();
    $subjects = Subject::all();
    return view('admin.quiz.quizUpload', compact('classes','subjects'));
}
public function uploadQuiz(Request $request)
{
    // Validate the request
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'class_id' => 'required',
        'subject_id' => 'required',
        'start_time' => 'required|date',
        'end_time' => 'required|date|after:start_time',
        'duration' => 'required|integer',
        'quiz_file' => 'required|mimes:pdf,doc,docx|max:2048',
    ]);

    // Store the uploaded file
    $quizFile = $request->file('quiz_file');
    $quizFile->storeAs('quizzes', $quizFile->getClientOriginalName(), 'public');

    // Create a new quiz record
    $quiz = new Quiz();
    $quiz->title = $request->input('title');
    $quiz->description = $request->input('description');
    $quiz->class_id = $request->input('class_id');
    $quiz->subject_id = $request->input('subject_id');
    $quiz->start_time = $request->input('start_time');
    $quiz->end_time = $request->input('end_time');
    $quiz->duration = $request->input('duration');
    $quiz->quiz_file = $quizFile->getClientOriginalName();
    $quiz->save();

    // Redirect to the quiz list page
    return redirect()->route('teacher.quiz.index');
}

public function adminUploadQuiz(Request $request)
{
    // Validate the request
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'class_id' => 'required',
        'subject_id' => 'required',
        'start_time' => 'required|date',
        'end_time' => 'required|date|after:start_time',
        'duration' => 'required|integer',
        'quiz_file' => 'required|mimes:pdf,doc,docx|max:2048',
    ]);

    // Store the uploaded file
    $quizFile = $request->file('quiz_file');
    $quizFile->storeAs('quizzes', $quizFile->getClientOriginalName(), 'public');

    // Create a new quiz record
    $quiz = new Quiz();
    $quiz->title = $request->input('title');
    $quiz->description = $request->input('description');
    $quiz->class_id = $request->input('class_id');
    $quiz->subject_id = $request->input('subject_id');
    $quiz->start_time = $request->input('start_time');
    $quiz->end_time = $request->input('end_time');
    $quiz->duration = $request->input('duration');
    $quiz->file_path = $quizFile->getClientOriginalName();
    $quiz->save();

    // Redirect to the quiz list page
    return redirect()->route('admin.quiz.index');
}
// public function adminUploadQuiz(Request $request)
// {
//     // Validate the request
//     $request->validate([
//         'quiz_file' => 'required|mimes:pdf,doc,docx|max:2048',
//     ]);

//     // Store the uploaded file
//     $quizFile = $request->file('quiz_file');
//     $quizFile->storeAs('quizzes', $quizFile->getClientOriginalName(), 'public');

//     // Create a new quiz record
//     $quiz = new Quiz();
//     $quiz->name = $request->input('name');
//     $quiz->description = $request->input('description');
//     $quiz->file_path = $quizFile->getClientOriginalName();
//     $quiz->save();

//     // Redirect to the quiz list page
//     return redirect()->route('admin.quizzes.index');
// }

}
