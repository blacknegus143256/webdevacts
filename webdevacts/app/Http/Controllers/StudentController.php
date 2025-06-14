<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('student', compact('students')); // View: resources/views/student.blade.php
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|numeric|min:1',
            'gender' => 'required|string',
            'year_level' => 'required|string',
        ]);

        Student::create($validated);

        return redirect('/students')->with('success', 'Student added successfully!');
    }
        public function edit($id)
    {
        $student  = Student::findOrFail($id);
        $students = Student::all(); // To keep the list visible while editing

        return view('student', compact('student', 'students'));
    }

    /**
     * Update the specified student in the database.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'age'        => 'required|integer|min:1',
            'gender'     => 'required|string',
            'year_level' => 'required|string',
        ]);

        $student = Student::findOrFail($id);
        $student->update($validated);

        return redirect('/students')->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified student from the database.
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect('/students')->with('success', 'Student deleted successfully!');
    }
}

