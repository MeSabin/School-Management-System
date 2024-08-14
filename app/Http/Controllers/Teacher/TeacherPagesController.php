<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Students;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\AssignSubjectToTeachers;
use App\Models\Teacher\Assignment;
use App\Models\Student\SubmitAssignment;

class TeacherPagesController extends Controller
{
    public function getTeacherModules_Groups(){
        $teacher =Auth::guard('web')->user();
        $teacherId =$teacher->id;

        $teachers= AssignSubjectToTeachers::where('teacher_id', $teacherId)->get();
        return view('teachers.viewStudents', compact('teachers'));

    }

    public function getAssignedStudents(Request $request){

        $group = $request->group;
        $assignedStudents = Students::where([
            'group' =>$group,
        ])->get();
                            

        session(['teacherViewStudents' => $assignedStudents]);
        return redirect()->route('studentsSection')->withInput();
        
    } 

    public function assignments(){
        $teacher =Auth::guard('web')->user();
        $teacherId =$teacher->id;

        $teachers= AssignSubjectToTeachers::where('teacher_id', $teacherId)->get();
        $details = Assignment::all();

     
        if ($details->isEmpty()) {
            $message = 'Assignment has not been posted yet!!';
            return view('teachers.assignment', compact('message', 'teachers'));
        }

        else if($details->isNotEmpty()){
        // $assignmentDetails = [];
        foreach($details as $detail){
            $deadline = $detail->deadline_date. ' '. $detail->deadline_time;
            $status = now()->greaterThan($deadline) ? 'Closed' : 'Available';

            $assignmentDetails[] = [
                'assignment' => $detail,
                'status' => $status,
            ];
          
        }
        return view('teachers.assignment', compact('assignmentDetails', 'teachers'));
        }
    }

    public function storeAssignmentDetails(Request $request){
        $request->validate([
            'file' =>'required|mimes:pdf,docx,xlsx,xls,csv',
            'deadlineDate' => 'required|after_or_equal:today',
            'deadlineTime' => 'required',
            'description' => 'required|max:100',
        ],
    [
        'file.required' => 'Please select a file*',
        'file.mimes' => "Only pdf, word and excel files are allowed*",
        'deadlineDate.required' => 'Please select a date*',
        'deadlineDate.after_or_equal' => 'Deadline date cannot be in the past*',
        'deadlineTime.required' => 'Please select the time*',
        'description.max' => 'Description must not exceed 100 characters*'
    ]);

        $pdfFile = $request->file;
        $originalfileName = $pdfFile->getClientOriginalName();
        $fileName =time() .'_' . $originalfileName;
        $path = $pdfFile->move(public_path('uploads'), $fileName);

        $teacher = Auth::guard('web')->user();
        $teacherName = $teacher->name;
        $teacherId = $teacher->id;
        
        Assignment::create([
            'group' => $request->group,
            'file_name' =>$fileName,
            'file_path' =>'uploads/'.$fileName,
            'deadline_date' => $request->deadlineDate,
            'deadline_time' => $request->deadlineTime,
            'description' => $request->description,
            'assigned_on' => now(),
            'assigned_by' => $teacherName,
            'teacher_id' => $teacherId
        ]);

        return redirect()->back()->with('assignSuccess', 'Assignment upload successful');
    }

    public function deleteAssignment(string $id){
        Assignment::find($id)->delete();
        return redirect()->route('assignments')->with('deleteAssignment', 'Assignment has been deleted');
    }

    public function viewSubmissions($group, $assignment_id){
        $students = Students::where('group', $group)->get();

        $submission_count =0;
        $submissions= [];
        foreach($students as $student){
            $submission_status = SubmitAssignment::where('student_id', $student->id)->where('assignment_id', $assignment_id)->pluck('status')->first();
            $submission_details = SubmitAssignment::where('student_id', $student->id)->where('assignment_id', $assignment_id)->first();

            if($submission_status === "Submitted"){
                $submission_count ++;
            }
            $submissions [] =[
                'students' => $student,
                'submission_status' => $submission_status,
                'submission_details' => $submission_details
            ];
            
        }
        return view('teachers.viewSubmissions', compact('submissions', 'submission_count'));  
    }
}
