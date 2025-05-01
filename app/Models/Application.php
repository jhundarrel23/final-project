<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'student_info_id',
        'monthly_income',
        'address',
        'school_year',
        'status',
        'remarks'
    ];

    public function studentInfo()
    {
        return $this->belongsTo(StudentInfo::class);
    }

    public function guardians()
    {
        return $this->hasMany(Guardian::class);
    }
}
