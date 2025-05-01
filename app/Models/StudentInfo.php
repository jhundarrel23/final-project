<?php

namespace App\Models;

// app/Models/StudentInfo.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    use HasFactory;

    protected $table = 'student_info';

    protected $fillable = [
        'user_id', 
        'first_name', 
        'middle_name', 
        'last_name', 
        'student_id', 
        'course_category_id', 
        'year_level', 
        'dob', 
        'address', 
        'gender', 
        'civil_status'
    ];

    /**
     * Get the user that owns the student info.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the course category associated with the student info.
     */
    public function courseCategory()
    {
        return $this->belongsTo(CourseCategory::class);
    }
}
