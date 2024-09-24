<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

   
 

    public function users()
    {
        return $this->hasMany(User::class, 'class_id');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'class_id');
    }
    

}

