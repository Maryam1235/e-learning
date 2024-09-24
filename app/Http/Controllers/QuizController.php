<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Subject;
use App\Models\UserAnswer;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();
        return view('teacher.quiz.index', compact('quizzes'));
    }

    public function showQuiz(Quiz $quiz)
    {
        $quiz->load('questions'); 
    return view('teacher.quiz.show', compact('quiz'));
    }

    public function createQuiz(){
        $classes = SchoolClass::all();
        $subjects = Subject::all();
        return view ('teacher.quiz.quizForm', compact('classes','subjects'));
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
    

public function editQuiz(Quiz $quiz)
{
    $quiz->load('questions');
    $classes = SchoolClass::all();   
    $subjects = Subject::all();      
    return view('teacher.quiz.edit', compact('quiz', 'classes', 'subjects'));
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

    return redirect()->route('quizzes.index')->with('success', 'Quiz updated successfully.');
}

public function destroyQuiz(Quiz $quiz)
{
    $quiz->questions()->delete(); 
    $quiz->delete();              
    return redirect()->route('quizzes.index')->with('success', 'Quiz deleted successfully.');
}



    public function takeQuiz(Quiz $quiz)
    {
        return view('quizzes.take', compact('quiz'));
    }

    public function submitQuiz(Request $request, Quiz $quiz)
    {
        foreach ($request->input('questions') as $question_id => $selected_option) {
            UserAnswer::create([
                'user_id' => auth()->id(),
                'quiz_id' => $quiz->id,
                'question_id' => $question_id,
                'selected_option' => $selected_option
            ]);
        }

        return redirect()->route('quizzes.index')->with('message', 'Quiz submitted!');
    }


}
