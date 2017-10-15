<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
        'name', 'class_count', 'student_count', 'description'
    ];

    public function khanakList()
    {
        return $this->belongsTo(KhanakList::class);
    }

    public function books()
    {
        return $this->belongsToMany('App\Book', 'grade_book')->withPivot('count');
    }

    public function handbooks()
    {
        return $this->belongsToMany('App\Handbook', 'grade_handbook')->withPivot('count');
    }

    public function activities()
    {
        return $this->belongsToMany('App\Activity', 'grade_activity')->withPivot('count');
    }

    public function educationalTools()
    {
        return $this->belongsToMany('App\EducationalTool', 'grade_educational_tool')->withPivot('count');
    }

    public function educationalPacks()
    {
        return $this->belongsToMany('App\EducationalPack', 'grade_educational_pack')->withPivot('count');
    }
}
