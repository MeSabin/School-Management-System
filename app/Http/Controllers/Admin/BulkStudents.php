<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Students;
use App\Models\Admin\Group;
use App\Mail\studentCredentials;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
class BulkStudents extends Controller
{
    public function viewBulkStudents()
{
    $groups = Group::pluck('name');
    return view('admin.viewBulkStudents', compact('groups'));
}

public function bulkStudentsTable(Request $request)
{
    $semester = $request->semester;
    $group = $request->group;

    $bulkStudents = Students::where([
        'semester' => $semester,
        'group' => $group,
    ])->get();

    if ($bulkStudents->isEmpty()) {
        return redirect()->route('viewBulkStudents')->withInput()->with('emptyRecord', 'Student record is not present');
    }

    session(['bulkStudents' => $bulkStudents]);
    return redirect()->route('viewBulkStudents')->withInput();
}


    public function showBulkAddForm()
    {
        $groups =Group::pluck('name');
        return view('admin.addBulkStudents', compact('groups'));
    }
    
    public function storeBulkStudents(Request $request){
        $bulkStudents = $request->validate([
            'file'=> 'required|mimes:csv'
        ],[
            'file.required' => 'Please select a csv file*',
            'file.mimes' => 'Please select csv file only*',
            
        ]);


        $file =$request->file;
        $fileContents = file($file->getPathname());
        $header =true;
        foreach ($fileContents as $line) {
            if ($header) {
                $header = false;
                continue;
            }
            $data = str_getcsv($line);
    
            Students::create([
                'name' => $data[0],
                'roll' => $data[1],
                'phone' => $data[2],
                'dob' => date('Y-m-d', strtotime($data[3])),
                'email' => $data[4],
                'password' => Hash::make($data[5]),
                'semester' => $request->semester,
                'group' => $request->group
            ]);

            $email = $data[4];
            $studentName = $data[0];
            $password = $data[5];

            Mail::to($email)->send(new studentCredentials($email, $studentName, $password));
        }

        return redirect()->route('students.index')->with('bulkSuccess', 'Bulk students added');

    }
}
