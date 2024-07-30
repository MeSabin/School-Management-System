@extends('admin.adminLayout')

@section('pageName')
    List of Students
@endsection
@section('studentReg_li')
<ul class="pl-4">
    <div class="flex justify-start">
      <li class="mr-4 border-b-4 {{Route::is('students*')? 'border-purple-600' : ''}} ">Manual Registration</li>
      <li class="border-b-4">Bulk Registration</li>
    </div>
</ul>
@endsection
@section('content')
    {{-- cdn link of tippy js for tooltip --}}
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
@if (session('addStudent'))
<x-alert>
  <div id="error" class="opacity-0 absolute top-5 right-5 flex items-center justify-center bg-white shadow-md border-2 border-l-4 border-green-500 text-green-500 pr-8 pl-2 py-4 rounded-sm">
    <img src="{{ asset('images/accept.png') }}" alt="" class="w-6 mr-2">
    <h3>{{ session('addStudent') }}</h3>
  </div>
</x-alert>
@endif
@if (session('updateStudent'))
<x-alert>
  <div id="error" class="opacity-0 absolute top-5 right-5 flex items-center justify-center bg-white shadow-md border-2 border-l-4 border-green-500 text-green-500 pr-8 pl-2 py-4 rounded-sm">
    <img src="{{ asset('images/accept.png') }}" alt="" class="w-6 mr-2">
    <h3>{{ session('updateStudent') }}</h3>
  </div>
</x-alert>
@endif
@if (session('delStudent'))
<x-alert>
  <div id="error" class="opacity-0 absolute top-5 right-5 flex items-center justify-center bg-white shadow-md border-2 border-l-4 border-green-500 text-green-500 pr-8 pl-2 py-4 rounded-sm">
    <img src="{{ asset('images/accept.png') }}" alt="" class="w-6 mr-2">
    <h3>{{ session('delStudent') }}</h3>
  </div>
</x-alert>
@endif
<div class=" mt-44">
    <a href="{{ route('students.create') }}" class="bg-purple-600 hover:bg-purple-600 duration-300 text-white text-md font-medium rounded px-3 py-2">+ Register</a>
    <div class="bg-white px-2 pt-4 pb-2 rounded-lg mt-6"> 
      <h2 class="text-xl font-bold text-gray-600 mb-4">All Students Data</h2>
      <div id= "tableContainer" class="overflow-x-auto">
         
      </div>
   <table class="min-w-full bg-white border">
      <thead class="bg-purple-600 text-white">
          <tr class="border">
              <th class="py-2 px-4 font-semibold text-md text-start">Roll</th>
              <th class="py-2 px-4 font-semibold text-md text-start">Name</th>
              <th class="py-2 px-4 font-semibold text-md text-start">Semester</th>
              <th class="py-2 px-4 font-semibold text-md text-start">Group</th>
              <th class="py-2 px-4 font-semibold text-md text-start">Phone</th>
              <th class="py-2 px-4 font-semibold text-md text-start">Email</th>
              <th class="py-2 px-4 font-semibold text-md text-start">Date of Birth</th>
              <th class="py-2 px-4 font-semibold text-md text-start">Action</th>
          </tr> 
      </thead>
      <tbody>
      @foreach ($students as $student)
          <tr class="hover:bg-gray-100 border duration-200">
            <td class="py-2 px-4 font-medium text-sm text-gray-600 text-start">{{$student->roll}}.</td>
            <td class="py-1 px-4 font-medium text-sm text-gray-600 text-start">{{$student->name}}</td>
            <td class="py-1 px-4 font-medium text-sm text-gray-600 text-start">{{$student->semester}}</td>
            <td class="py-1 px-4 font-medium text-sm text-gray-600 text-start">{{$student->group}}</td>
            <td class="py-1 px-4 font-medium text-sm text-gray-600 text-start">{{$student->phone}}</td>
            <td class="py-1 px-4 font-medium text-sm text-gray-600 text-start">{{$student->email}}</td>
            <td class="py-1 px-4 font-medium text-sm text-gray-600 text-start">{{$student->dob}}</td>
            <td class="py-1 px-4">
              <div class="flex">
                {{-- <div> --}}
                <a href="{{route('students.edit', $student->id)}}" id="edit">
                  <span class="material-symbols-outlined text-gray-500 hover:text-gray-800 duration-500 mr-4">
                    edit_square
                  </span>
                </a>
                  <form action="{{route('students.destroy', $student->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type ="submit" id="delete">
                      <span class="material-symbols-outlined text-red-400 hover:text-red-700 duration-500">
                        delete
                      </span>
                    </button>
                  </form>

              </div>
              </td>
          </tr>
          @endforeach()
        </tbody>
          </table>
          {{-- <div class="flex justify-end mt-4">
            <p class="">{{ $teachers->links() }}</p>
          </div> --}}
        </div>
      </div>
        <script>
          document.addEventListener('DOMContentLoaded', function(){
            tippy('#edit', {
              content: "Edit",
              placement: 'top',
        });
          tippy('#delete', {
            content: "Delete",
            placement: 'top'
        });
        });
            
        </script>
@endsection
