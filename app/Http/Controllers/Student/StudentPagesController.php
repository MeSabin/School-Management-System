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
        $student_id =$students->id;

        $assignments = Assignment::where('group', $group)->get();

        if($assignments->isEmpty()){
            $message = "Assignment has not been posted yet!!";
            return view('students.assignments', compact('message'));
        }
        $assignmentDetails = [];
        foreach($assignments as $assignment){
            $deadline = $assignment->deadline_date. ' '. $assignment->deadline_time;
            $status = now()->greaterThan($deadline)? 'Closed' :'Available';
            $submission_status = SubmitAssignment::where('student_id', $student_id)->where('assignment_id', $assignment->id)->pluck('status')->first();
            $file = SubmitAssignment::where('student_id', $student_id)->where('assignment_id', $assignment->id)->pluck('file_name')->first();
            $assignmentDetails[] = [
                'assignment' => $assignment,
                'status' => $status,
                'submission_status' =>$submission_status,
                'file' =>$file
            ];
        }
        return view('students.assignments', compact('assignmentDetails'));
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

        $assignmentId = $id;

        $timezone =Carbon::now('Asia/Kathmandu');
        $time =$timezone->toDateTimeString();

       $submit = SubmitAssignment::create([
            'assignment_id' =>$assignmentId,
            'student_id' => $student_id,
            'student_name' => $name,
            'group' => $group_name, 
            'submitted_on' => $time,
            'file_name' =>$fileName,
            'file_path' =>'uploads/'. $fileName,
            'status' =>'Submitted'
        ]);

        return redirect()->back()->with('submitSuccess', 'Assignment Submitted successfully');
    }

    public function resubmitAssignment(Request $request, string $id){
        $request->validate([
            'file' => 'required|mimes:pdf,docx'
        ], [
            'file.required' => 'Please select a file*',
            'file.mimes' => 'Only pdf and word files are allowed*'
        ]);

        $file = $request->file;
        $fileName = time(). '_' . $file->getClientOriginalName();
        $path = $file->move(public_path('uploads'), $fileName);

        $student = Auth::guard('student')->user();
        $name = $student->name;
        $student_id = $student->id;
        $group_name =$student->group;

        $assignmentId =$id;
        $timezone =Carbon::now('Asia/Kathmandu');
        $time =$timezone->toDateTimeString();

        $resubmit = SubmitAssignment::where('assignment_id', $id)
                                    ->where('student_id', $student_id)
                                    ->first();
        
        $resubmit->assignment_id = $id;
        $resubmit->student_id =$student_id;
        $resubmit->student_name =$name;
        $resubmit->group =$group_name;
        $resubmit->submitted_on =$time;
        $resubmit->file_name =$fileName;
        $resubmit->file_path ='uploads/'. $fileName;
        $resubmit->status ='Submitted';

        $resubmit->save();

        
        return redirect()->back()->with('resubmitSuccess', 'Assignment Resubmitted successfully');

    }
    
}
