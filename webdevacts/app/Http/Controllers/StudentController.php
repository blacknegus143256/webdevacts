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
}

