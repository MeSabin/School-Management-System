<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Students;
use App\Models\Teacher\Assignment;
use Illuminate\Support\Facades\Auth;
use App\Models\Student\SubmitAssignment;
use Illuminate\Support\Carbon;


class StudentPagesController extends Controller
{
    public function viewStudents(){
        $students = Auth::guard('student')->user();
        $group = $students->group;

        $students = Students::where('group', $group)->paginate(3);
        return view('students.viewStudents', compact('students', 'group'));
    }

    public function viewAssignment(){
        $students = Auth::guard('student')->user();
        $group = $students->group;

        $assignments = Assignment::where('group', $group)->get();

        if($assignments->isEmpty()){
            $message = "Assignment has not been posted yet!!";
            return view('students.assignments', compact('message'));
        }

        foreach($assignments as $assignment){
            $deadline = $assignment->deadline_date. ' '. $assignment->deadline_time;
            if(now()->greaterThan($deadline)){
                $closed ='closed';
                return view('students.assignments', compact('assignments', 'closed'));
            }
            else{
                $available ='Available';
                return view('students.assignments', compact('assignments', 'available'));
            }
        }
    }

    public function submitAssignment(Request $request, string $id){

        $request->validate([
            'file' => 'required|mimes:pdf,docx'
        ], [
            'file.required' => 'Please select a file*',
            'file.mimes' => 'Only pdf and word files are allowed*'
        ]);

        // File store
        $file = $request->file;
        $fileName = time(). '_' . $file->getClientOriginalName();
        $path = $file->move(public_path('uploads'), $fileName);

        $student = Auth::guard('student')->user();
        $name = $student->name;
        $student_id = $student->id;
        $group_name =$student->group;

        $group = Assignment::where('group', $group_name)->get();

        $assignmentId = $id;

        $timezone =Carbon::now('Asia/Kathmandu');
        $time =$timezone->format('H:i:s');

        SubmitAssignment::create([
            'assignment_id' =>$assignmentId,
            'student_id' => $student_id,
            'student_name' => $name,
            'group' => $group, 
            'submitted_on' => $time,
            'file_name' => $fileName,
            'file_path' =>'uploads/'. $path
        ]);
        return redirect()->back()->with('submitSuccess', 'Assignment Submitted successfully');
    }
}
