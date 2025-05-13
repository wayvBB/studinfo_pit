<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use Illuminate\Http\Request;

class EnrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrolls = Enroll::all();
        return view('enroll.index', compact('enrolls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('enroll.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|string|exists:students,student_id',
            'subject_code' => 'required|string|exists:subjects,subject_code',
            'enrollment_date' => 'required|date',
        ]);
    
        Enroll::create($validated);
    
        return redirect()->route('enrolls.index')->with('success', 'Enrollment added successfully!');
    }

    /**
     * Display the specified resource.
     */
    /*public function show(Enroll $enroll)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enroll $enroll)
    {
        return view('enroll.edit', compact('enroll'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enroll $enroll)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'enrollment_date' => 'required|date',
        ]);

        $enroll->update($validated);

        return redirect()->route('enroll.index')->with('success', 'Enrollment updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enroll $enroll)
    {
        $enroll->delete();
        return redirect()->route('enroll.index')->with('success','Enroll deleted successfully!');
    }
}
