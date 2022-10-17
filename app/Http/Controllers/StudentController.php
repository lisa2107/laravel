<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    public function get_all_student(){
        $students = Student::all();
        return view('student_manager', compact('students'));
    }

    public function get_student_by_id(Student $student){
        return view('student_edit', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {   
        return view('student_edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update([
            'fullname' => $request->fullname,
            'birthday' => $request->birthday,
            'address' => $request->address
        ]);
        return redirect()->back();
    }
}
