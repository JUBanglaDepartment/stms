<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'programs';
    protected $primaryKey = "id";
    protected $fillable = [
        'program_title_en',
        'program_title_bn',
        'program_desc',
        'total_credit',
        'total_courses',
        'estimated_semester',
        'is_active'
    ];
    public $timestamps = TRUE;

    public function student()
    {
        return $this->hasMany('App\Model\Student','program_id','id');
    }
}
