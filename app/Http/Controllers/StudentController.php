<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        // $student = Student::findOrFail(4);
        // $coursesCount = $student->courses;
        // dd($coursesCount);
        $students = Student::get();
        return view('students', ['students' => $students]);
    }

    public function show(Request $request)
    {
        $student = Student::findOrFail($request->id);
        // $coursesCount = $student->courses;
        // dd($coursesCount);
        // $courses = Course::where($request->id)();
        return view('student', ['student' => $student]);
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
        $student = new Student;
        $student->name = $request->name;
        $student->gender = $request->gender;
        $student->date_of_birth = $request->birthdate;
        $student->telp = $request->phone;
        $student->save();
        return redirect('students')->with('status', "Insert successfully");
    }

    public function delete(Request $request)
    {
        DB::table('students')->where('id', $request->id)->delete();
        DB::table('student_has_course')->where('course_id', $request->id)->delete();
        return redirect('/students');
    }

    public function update(Request $request)
    {
        $student = Student::findOrFail($request->id);
        // $student->update([
        //     'name'     => $request->name,
        //     'gender'     => $request->gender,
        //     'date_of_birth'   => $request->birthdate,
        //     'telp'   => $request->phone,
        // ]);

        $student->name = $request->name;
        $student->gender = $request->gender;
        $student->date_of_birth = $request->birthdate;
        $student->save();
        return redirect('/students');
    }

    public function edit(Request $request)
    {
        $student = Student::findOrFail($request->id);
        return view('student-edit', ['student' => $student]);
    }
}
