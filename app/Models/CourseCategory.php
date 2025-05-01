<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{

    public $table = 'course_categories'; 

    // Fillable attributes
   public $fillable = ['course_name']; 

    public function studentInfos()
    {
        return $this->hasMany(StudentInfo::class, 'course_category_id');
    }
}
