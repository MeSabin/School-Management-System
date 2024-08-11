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

        foreach($details as $detail){
            $deadline = $detail->deadline_date. ' '. $detail->deadline_time;
            if(now()->greaterThan($deadline)){
                $closed ='closed';
                    return view('teachers.assignment', compact('details', 'teachers',  'closed'));
            }
            else{
                $available ='Available';
                return view('teachers.assignment', compact('details', 'teachers',  'available'));
            }
        }
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

    public function viewSubmissions(string $id){
        $submissions = SubmitAssignment::where('assignment_id', $id)->get();

        if($submissions->isNotEmpty()){
            return view('teachers.viewSubmissions', compact('submissions'));
        }
        else{
            $assignment_status = "No one has submitted the assignment yet!";
            return view('teachers.viewSubmissions', compact('submissions', 'assignment_status'));
        }

    }
}
