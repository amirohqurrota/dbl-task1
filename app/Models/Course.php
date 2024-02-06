<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';
    public $timestamps = true;
    protected $fillable = [
        'name', 'description', 'status',
    ];

    const ACTIVE = 'active';
    const NOT_ACTIVE = 'not_active';

    const STATUS = [
        self::ACTIVE                          => self::ACTIVE,
        self::NOT_ACTIVE                      => self::NOT_ACTIVE,
    ];

    // public function studentHasCourse(): HasMany
    // {
    //     return $this->hasMany(StudentHasCourse::class, 'course_id');
    // }

    public function students(): BelongsToMany
    {

        return $this->belongsToMany(
            'App\Models\Student',
            'student_has_course',
            'course_id',
            'student_id',
        );
    }

    protected $cascadeDeletes = [
        'student_has_course',
    ];
}
