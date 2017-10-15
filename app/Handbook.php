<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Handbook extends Model
{
    protected $fillable = [
        'name', 'price', 'age_group', 'description'
    ];

    public function grades()
    {
        return $this->belongsToMany('App\Grade', 'grade_handbook')
            ->withPivot('count');
    }
}
