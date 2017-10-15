<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name', 'author', 'illustrator', 'translator', 'publisher', 'publishing_year', 'price', 'age_group', 'educational_stage', 'type', 'illustration', 'priority', 'has_handbook', 'has_activity', 'reading_aloud', 'description'
    ];

    public function grades()
    {
        return $this->belongsToMany('App\Grade', 'grade_book')
            ->withPivot('count');
    }
}


