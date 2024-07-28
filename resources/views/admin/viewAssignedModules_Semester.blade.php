
@extends('admin.adminLayout')
@section('pageName')
    View assigned module
@endsection
@section('content')
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
<script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
@if (session('subject'))
<x-alert>
  <div id="error" class="opacity-0 absolute top-5 right-5 flex items-center justify-center bg-white shadow-md border-2 border-l-4 border-green-600 text-green-600 pr-8 pl-2 py-4 rounded-sm">
    <img src="{{ asset('images/accept.png') }}" alt="" class="w-6 mr-2">
    <h3>{{ session('subject') }}</h3>
  </div>
</x-alert>
@endif
@if (session('subjectDetails'))
<x-alert>
  <div id="error" class="opacity-0 absolute top-5 right-5 flex items-center justify-center bg-white shadow-md border-2 border-l-4 border-green-600 text-green-600 pr-8 pl-2 py-4 rounded-sm">
    <img src="{{ asset('images/accept.png') }}" alt="" class="w-6 mr-2">
    <h3>{{ session('subjectDetails') }}</h3>
  </div>
</x-alert>
@endif
@if (session('deleteSubject'))
<x-alert>
  <div id="error" class="opacity-0 absolute top-5 right-5 flex items-center justify-center bg-white shadow-md border-2 border-l-4 border-red-500 text-red-500 pr-8 pl-2 py-4 rounded-sm">
    <img src="{{ asset('images/error.png') }}" alt="" class="w-6 mr-2">
    <h3>{{ session('deleteSubject') }}</h3>
  </div>
</x-alert>
@endif

<div class="bg-white rounded-md shadow-custom fixed left-[256px] ml-6 right-[1.5rem] top-28 z-10">
   <ul class="flex">
       <li class="py-4 border-b-4 border-purple-500">
           <a href=""  class="text-gray-600 px-2 rounded-lg cursor-pointer transition duration-300">Computer Science</a>  
       </li>
       <li class="py-4">
           <a href="" class="text-gray-600 px-2 rounded-lg cursor-pointer transition duration-300">Software Engineering</a>
           
       </li>
       <li class="py-4">
           <a href="" class="text-gray-600 px-2 rounded-lg cursor-pointer transition duration-300">BIBM</a>
       </li>
   </ul>
</div>
<div class="mt-56">
<a href="{{ route('subjects.create') }}" class="bg-purple-600 hover:bg-purple-600 duration-300 text-white text-md font-medium rounded px-3 py-2 mb-10">+ Register/Assign Subject</a>
<div class="bg-white px-2 mt-10 pb-2 rounded-lg"> 
  <h2 class="text-xl font-bold text-gray-600 mb-4">All Subjects Data</h2>
  <div id= "tableContainer" class="overflow-x-auto">
  </div>
      <table class="w-full bg-white border">
          <thead class="bg-purple-600 text-white">
              <tr class="border">
                  <th class="py-2 px-4 font-semibold text-md text-start">ID</th>
                  <th class="py-2 px-4 font-semibold text-md text-start">Module Name</th>
                  <th class="py-2 px-4 font-semibold text-md text-start">Module Code</th>
                  <th class="py-2 px-4 font-semibold text-md text-start">Semester</th>
                  <th class="py-2 px-4 font-semibold text-md text-start">Action</th>
              </tr> 
          </thead>
          <tbody>
          @foreach ($subjects as $subject)
              <tr class="hover:bg-gray-100 border duration-200">
                <td class="py-2 px-4 font-medium text-sm text-gray-600 text-start">{{$subject->id}}.</td>
                <td class="py-1 px-4 font-medium text-sm text-gray-600 text-start">{{$subject->name}}</td>
                <td class="py-1 px-4 font-medium text-sm text-gray-600 text-start">{{$subject->code}}</td>
                <td class="py-1 px-4 font-medium text-sm text-gray-600 text-start">{{$subject->semester}}</td>
                <td class="py-1 px-4">
                  <div class="flex">
                    {{-- <div> --}}
                    <a href="{{ route('subjects.edit', $subject->id) }}" id="edit">
                      <span class="material-symbols-outlined text-gray-500 hover:text-gray-800 duration-500 mr-4">
                        edit_square
                      </span>
                    </a>
                      <form action="{{ route('subjects.destroy', $subject->id)}}" method="POST">
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
         <div>
            {{$subjects->links()}}
         </div>
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
