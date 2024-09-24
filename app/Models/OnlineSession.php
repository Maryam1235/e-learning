<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineSession extends Model
{
    use HasFactory;

    protected $table = 'online_sessions';

    protected $fillable = [
        'meeting_code', 
        'meeting_url', 
        'teacher_id'
    ];
}
