<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function course(): BelongsToMany
    {

        return $this->belongsToMany(
            'App\Models\Course',
            'student_has_course',
            'student_id',
            'course_id'
        );
    }
}
