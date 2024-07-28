<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\CS_Subject;

class CS_Subjects extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects =CS_Subject::simplePaginate(10);
        // dd($subjects->all());
        return view('admin.viewAssignedModules_Semester', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.registerModuleToSemester');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subject =$request->validate([
            'subject_name' => 'required',
            'subject_code' => 'required|unique:cs_subjects,code',
        ],
        [
            'subject_name.required' => 'Please enter the subject name*',
            'subject_code.required' => 'Please enter the subject code*',
            'subject_code.unique' => 'This module code already exists*',
        ]
    );

    CS_Subject::create([
        'name' =>$request->subject_name,
        'code' =>$request->subject_code,
        'semester' =>$request->semester
    ]);
    return redirect()->route('subjects.index')->with('subject', 'Subject assigned to semester');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subject =CS_Subject::find($id);
        return view('admin.updateAssignedModule', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subject =CS_Subject::find($id);
        $subject->name =$request->subject_name;
        $subject->code =$request->subject_code;
        $subject->semester =$request->semester;
        $subject->save();

        return redirect()->route('subjects.index')->with('subjectDetails', 'Subject details updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject =CS_Subject::find($id)->delete();
        return redirect()->route('subjects.index')->with('deleteSubject', 'Subject deleted successfully');
    }
}
