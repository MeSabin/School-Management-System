<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Group;

class AdminPagesController extends Controller
{
    public function addClass(){
        return view('admin.addClass');
    }

    public function storeClassDetails(Request $request){
        $group =$request->validate([
            'group_name' =>'required',
        ],
    [
        'group_name.required' =>'This field is required*'
    ]);

    Group::create([
        'name' =>$request->group_name,
        'semester' =>$request->semester
    ]);
    return redirect()->route('viewGroups')->with('addGroup', 'New group has been added');
    }

    public function viewGroups(){
        $groups =Group::simplePaginate(7);
        return view('admin.viewClasses', compact('groups'));
    }
    public function deleteClass(string $id){
        Group::find($id)->delete();
        return redirect()->route('viewGroups')->with('deleteGroups', 'Group details has been deleted');
    }
}
