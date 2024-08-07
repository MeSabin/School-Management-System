<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\CS_Subject;
use App\Models\Admin\Group;
use App\Models\Admin\AssignSubjectToTeachers;
use App\Models\Teacher\Teacher;

class AssignSubjectToTeacher extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assignSubject = AssignSubjectToTeachers::paginate(7);
        return view('admin.viewAssignedModule_Teacher', ['subjects' =>$assignSubject]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::pluck('name');
        $modules = CS_Subject::pluck('name');
        $groups = Group::pluck('name');
    
        // dd($teachers->all());
        return view('admin.assignModule_Group_SemToTeacher', [
            'teachers' => $teachers,
            'modules' => $modules,
            'groups' => $groups
        ]);
    }
    
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        AssignSubjectToTeachers::create([
            'teacher_name' =>$request->teacher_name,
            'semester' =>$request->semester,
            'module' =>$request->module_name,
            'group' =>$request->group_name,
        ]);
        return redirect()->route('assignModuleTeacher.index')->with('moduleAssign', 'Module assigned to Teacher');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AssignSubjectToTeachers::find($id)->delete();
        return redirect()->route('assignModuleTeacher.index')->with('deletesuccess', 'Teacher removed from module');
    }
}
