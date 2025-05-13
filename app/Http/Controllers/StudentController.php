<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $students = Student::when($search, function ($query, $search) {
            return $query->where('firstname', 'like', "%{$search}%")
                        ->orWhere('lastname', 'like', "%{$search}%")
                        ->orWhere('student_id', 'like', "%{$search}%");
        })->orderBy('id', 'asc')->paginate(10); // Pagination

        return view('students.index', compact('students', 'search'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|unique:students',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:students',
            'address' => 'nullable',
            'contact_number' => 'nullable',
            'gender' => 'required',
            'birthdate' => 'required|date',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'student_id' => 'required|unique:students,student_id,' . $student->id,
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'address' => 'nullable',
            'contact_number' => 'nullable',
            'gender' => 'required',
            'birthdate' => 'required|date',
        ]);

        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }

    public function exportPDF()
    {
        $students = Student::all();
        $pdf = Pdf::loadView('students.pdf', compact('students'));
        return $pdf->download('students-list.pdf');
    }
}
