<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    use HasFactory;

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'quiz_id',     
        'student_id',      
        'score',       
        'total_questions',
        'percentage',
        // 'submitted_at', // Timestamp for when the quiz was submitted
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function question()
    {
        return $this->hasMany(Question::class);
    }
}


