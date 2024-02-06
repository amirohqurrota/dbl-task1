<?php

namespace App\Http\Controllers;

use App\Models\StudentHasCourse;
// use App\Models\StudentHasCourse as ModelsStudentHasCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentHasCourseController extends Controller
{
    //

    public function store(Request $request)
    {

        // $studentHasCourse = new StudentHasCourse;
        // $studentHasCourse->course_id = $request->courseId;
        // $studentHasCourse->student_id = $request->studentId;
        // $studentHasCourse->save();
        DB::table('student_has_course')->insert(
            [
                'course_id' => $request->courseId,
                'student_id' => $request->studentId,
            ]
        );
        // $studentHasCourse->save();
        return redirect('/courses')->with('status', "Insert successfully");
    }
}
