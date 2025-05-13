<?php

namespace App\Http\Controllers;

use App\Models\Load;
use Illuminate\Http\Request;

class LoadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loads = Load::all();
        return view("loads.index", compact("loads"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $instructors = \App\Models\Instructor::all(); // or use a specific order if needed
        $subjects = \App\Models\Subject::all();       // if you need subjects too

        return view('loads.create', compact('instructors', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'instructor_id' => 'required|exists:instructors,id',
            'subject_id' => 'required|exists:subjects,id',
            'semester' => 'required|string|max:50',
            'school_year' => 'required|string|max:50',
        ]);

        Load::create($validated);
        return redirect()->route('loads.index')->with('success','Load added successfully!');
    }

    /**
     * Display the specified resource.
     */
    /*public function show(Load $load)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Load $load)
    {
        return view('loads.edit', compact('load'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Load $load)
    {
        $validated = $request->validate([
            'instructor_id' => 'required|exists:instructors,id',
            'subject_id' => 'required|exists:subjects,id',
            'semester' => 'required|string|max:50',
            'school_year' => 'required|string|max:50',
        ]);

        $load->update($validated);

        return redirect()->route('loads.index')->with('success', 'Load updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Load $load)
    {
        $load->delete();
        return redirect()->route('loads.index')->with('success','Load successfully deleted!');
    }
}
