<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SemesterCourseFaculty extends Model
{
    protected $table = 'semester_course_faculty';
    protected $primaryKey = "id";
    protected $fillable = [
        'semester_id',
        'course_id',
        'faculty_id'
    ];
    public $timestamps = FALSE;
}
