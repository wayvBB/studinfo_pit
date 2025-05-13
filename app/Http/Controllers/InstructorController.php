<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $search = $request->input('search');
        
        $instructors = Instructor::when($search, function ($query, $search) {
            return $query->where('instructor_id', 'like', "%$search%")
                         ->orWhere('firstname', 'like', "%$search%")
                         ->orWhere('lastname', 'like', "%$search%")
                         ->orWhere('email', 'like', "%$search%")
                         ->orWhere('department', 'like', "%$search%");
        })->paginate(10); // 10 items per page

        return view('instructors.index', compact('instructors', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('instructors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:instructors,email',
            'department' => 'required|string|max:100',
        ]);

        Instructor::create($validated);

        return redirect()->route('instructors.index')->with('success', 'Instructor added successfully!');
    }

    /**
     * Display the specified resource.
     */
    /*public function show(Instructor $instructor)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instructor $instructor)
    {
        return view ('instructors.edit', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instructor $instructor)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:instructors,email,' . $instructor->id,
            'department' => 'required|string|max:100',
        ]);

        $instructor->update($validated);

        return redirect()->route('instructors.index')->with('success', 'Instructor updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructor $instructor)
    {
        $instructor->delete();
        return redirect()->route('instructors.index')->with('success','Instructor deleted successfully!');
    }

    public function exportPDF()
    {
        $instructors = Instructor::orderBy('lastname')->orderBy('firstname')->get();
        $pdf = Pdf::loadView('instructors.pdf', compact('instructors'));
        return $pdf->download('instructors-list.pdf');
    }
}
