<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 
        'description', 
        'class_id', 
        'subject_id', 
        'start_time', 
        'end_time', 
        'duration',
        'quiz_file',
    ];

        protected $casts = [
            'start_time' => 'datetime',
            'end_time' => 'datetime',
        ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function class()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
