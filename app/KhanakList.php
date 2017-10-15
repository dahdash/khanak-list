<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhanakList extends Model
{
    protected $fillable = [
        'name', 'budget', 'description'
    ];

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
