<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();
        return view('student_manager', ['students' => $students]);
    }
    public function show(Student $id){
        return view('student_edit', [
            'id' => $id,
        ]);
    }
    
    
     
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        $student=Student::create([

            'fullname'=>$request->fullname,
            'birthday'=>$request->birthday,
            'address'=>$request->address
            

        ]);
        return redirect()->back();
    }

   
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)

    {
        dd($student);
        // $newPost = Student::create([
        //     'id' => $request->id,
        //     'fullname' => $request->fullname,
        //     'birthday' => $request->bidthday,
        //     'address' => $request->address
        // ]);
        
        return view('student_edit');
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
            'id' => $request->id,
            'fullname' => $request->fullname,
            'birthday' => $request->birthday,
            'address' => $request->address
        ]);
        
        return redirect('student/' . $student->id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
