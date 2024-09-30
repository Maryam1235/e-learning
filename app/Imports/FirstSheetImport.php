<?php

namespace App\Imports;

use App\Models\Quiz;
use App\Models\User;
use App\Models\QuizResult;
use Maatwebsite\Excel\Concerns\ToModel;

class FirstSheetImport implements ToModel
{
    private $quiz;

    public function __construct(Quiz $quiz)
    {
        $this->quiz = $quiz;
    }

public function model(array $row)
{
    if ($row[0] == 'Student Name') {
        return null;
    }

    $student = User::where('name','ilike', $row[0])->first();
    
    if ($student) {
    return new QuizResult([
        // 'student_name' => $row[0],
        'student_id' => $student->id,
        'percentage' => $row[1],
        'quiz_id' => $this->quiz->id,
    ]);
} else {
    throw new \Exception("Student not found: " . $row[0]);

}
}

}