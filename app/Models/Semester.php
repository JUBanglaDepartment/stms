<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $table = 'semesters';
    protected $primaryKey = "id";
    protected $fillable = [
        'semester_code',
        'semester_title',
        'semester_desc',
        'year',
        'duration_months',
        'start_month',
        'end_month',
        'is_active'
    ];
    public $timestamps = TRUE;
}
