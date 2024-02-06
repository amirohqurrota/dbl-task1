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
        // $nameOfStudents = [];
        $course = DB::table('courses')->find($request->id);
        // $studentHasCourses = DB::table('student_has_course')->where('course_id',$request->id)->get();
        $studentHasCourses = DB::table('student_has_course')->where('course_id', $request->id)->pluck('student_id');
        // $coursesParticipant = [];
        // foreach ($studentHasCourses as $studentHasCourse) {
        //     // dd($studentHasCourses);
        //     $studentsName = DB::table('students')->find($studentHasCourse->student_id);
        //     array_push($nameOfStudents, $studentsName);
        // }
        $coursesParticipant = DB::table('students')->whereIn('id', $studentHasCourses)->get();

        // dd($nameOfStudents);
        $studentsNotParticipant = DB::table('students')->whereNotIn('id', $studentHasCourses)->get();
        // dd($studentsNotParticipant);
        // $students = Product::whereNotIn('id', $excludedProducts)->get()

        return view('course', ['course' => $course, 'nameOfStudents' => $coursesParticipant, 'students' => $studentsNotParticipant]);
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

    public function delete(Request $request)
    {
        DB::table('courses')->where('id', $request->id)->delete();
        return redirect('/courses');
    }

    public function update(Request $request)
    {
        $course = Course::findOrFail($request->id);
        $course->update([
            'name'     => $request->name,
            'description'     => $request->description,
        ]);

        // $student->name = $request->name;
        // $student->gender = $request->gender;
        // $student->date_of_birth = $request->birthdate;
        // $student->save();

        // return view('courses');
        return redirect('/courses');
    }
}
