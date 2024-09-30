<?php

namespace App\Imports;

use App\Models\Quiz;
use App\Models\QuizResult;
use App\Imports\FirstSheetImport;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class QuizResultsImport implements WithMultipleSheets
{
    private $quiz;

    public function __construct(Quiz $quiz)
    {
        $this->quiz = $quiz;
    }

    public function sheets(): array
    {
        return [
            0 => new FirstSheetImport($this->quiz),
        ];
    }
}