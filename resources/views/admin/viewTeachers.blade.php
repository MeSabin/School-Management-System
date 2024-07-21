@extends('admin.adminLayout')

@section('content')
    <h2 class="pt-6 pb-12">Teachers</h2>
    <a href="{{ route('teachers.create') }}" class="bg-purple-500 hover:bg-purple-600 duration-300 text-white rounded-md px-3 py-2">+Register</a>
    <div class="bg-white p-6 mt-6"> 
        <h2 class="text-xl font-bold mb-4">All Teachers Data</h2>
        <div id= "tableContainer" class="overflow-x-auto">
           
        </div>
    </div>
   <table class="min-w-full bg-white border texgt-sm">
                <thead class="bg-purple-50">
                    <tr class="border">
                        <th class="py-2 px-4">ID</th>
                        <th class="py-2 px-4">Image</th>
                        <th class="py-2 px-4">Name</th>
                        <th class="py-2 px-4">Phone</th>
                        <th class="py-2 px-4">Email</th>
                        <th class="py-2 px-4">Role</th>
                        <th class="py-2 px-4">Action</th>
                    </tr> 
                    </thead>
                   <tbody>
                    @foreach ($teachers as $teacher)
                        <tr class="hover:bg-gray-100 border duration-200">
                            <td class="py-2 px-4">{{$teacher->id}}</td>
                            <td class="py-2 px-4 flex items-center justify-center">
                                <img src="{{asset('/uploads/'. $teacher->image)}}" class="w-10 rounded-lg border" alt="Image"/>
                            </td>
                            <td class="py-1 px-4 ">{{$teacher->name}}</td>
                            <td class="py-1 px-4 ">{{$teacher->phone}}</td>
                            <td class="py-1 px-4 ">{{$teacher->email}}</td>
                            <td class="py-1 px-4 ">{{$teacher->role}}</td>
                            <td class="py-1 px-4 flex items-center">
                                <div>
                                    <a href="{{ route('teachers.edit', $teacher->id) }}" class="bg-blue-500 text-white py-1 px-2 rounded hover:bg-blue-700 duration-300 mr-4">Update</a>
                                </div>
                                <div>
                                    <form action="{{ route('teachers.destroy', $teacher->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type ="submit" class="bg-red-500 px-3 py-1 rounded text-white">Delete</button>
                                    </form>
                                </div> 
                            </td>
                        </tr>
                        @endforeach()
                </tbody>
          </table>
@endsection
