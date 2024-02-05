<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Models\Course;
use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        $courses = DB::table('courses')->get();
        return view('courses', ['courses' => $courses]);
    }

    // public function insertForm(Request $request){
    //     dd($request);
    // }

    public function show(Request $request)
    {
        $nameOfStudents = [];
        $course = DB::table('courses')->find($request->id);
        $studentHasCourses = DB::table('student_has_course')->get();
        // dd($studentHasCourses[0]);
        foreach ($studentHasCourses as $studentHasCourse) {
            // dd($studentHasCourses);
            $studentsName = DB::table('students')->find($studentHasCourse->student_id);
            // $studentsNamee = DB::table('students')->find(1);
            // dd($studentsName);
            array_push($nameOfStudents, $studentsName);
            // studentsName= Student::where('');
        }

        // dd($nameOfStudents);

        return view('course', ['course' => $course, 'nameOfStudents' => $nameOfStudents]);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:3|max:255',
            'status' => 'nullable|string'
        ];
        // $validator = Validator::make($request->all(), $rules);
        // if ($validator->fails()) {
        //     return redirect('classes')
        //         ->withInput()
        //         ->withErrors($validator);
        // } else {
        //     $data = $request->input();
        //     Course::create($request->all());
        //     try {
        //         $course = new Course;
        //         $course->name = $data['name'];
        //         $course->description = $data['description'];
        //         $course->status = $data['status'];

        //         return redirect('classes')->with('status', "Insert successfully");
        //     } catch (Exception $e) {
        //         return redirect('classes')->with('failed', "operation failed");
        //     }
        // }
        // $data = $request->input();
        // dd($request);
        // Course::create($request->all());
        $course = new Course;
        $course->name = $request->name;
        $course->description = $request->description;
        $course->status = 'active';
        $course->save();
        return redirect('courses')->with('status', "Insert successfully");
    }
}
