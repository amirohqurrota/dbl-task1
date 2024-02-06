<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentHasCourse extends Model
{
    use HasFactory;
    public $table = "student_has_course";

    public function course(): BelongsTo
    {

        return $this->belongsTo(Student::class);
    }
}
