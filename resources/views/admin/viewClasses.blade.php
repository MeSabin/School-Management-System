@extends('admin.adminLayout')
@section('pageName')
    View Classes
@endsection
@section('content')
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
<script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
@if (session('addGroup'))
<x-alert>
  <div id="error" class="opacity-0 absolute top-5 right-5 flex items-center justify-center bg-white shadow-md border-2 border-l-4 border-green-600 text-green-600 pr-8 pl-2 py-4 rounded-sm">
    <img src="{{ asset('images/accept.png') }}" alt="" class="w-6 mr-2">
    <h3>{{ session('addGroup') }}</h3>
  </div>
</x-alert>
@endif
@if (session('deleteGroups'))
<x-alert>
  <div id="error" class="opacity-0 absolute top-5 right-5 flex items-center justify-center bg-white shadow-md border-2 border-l-4 border-green-600 text-green-600 pr-8 pl-2 py-4 rounded-sm">
    <img src="{{ asset('images/accept.png') }}" alt="" class="w-6 mr-2">
    <h3>{{ session('deleteGroups') }}</h3>
  </div>
</x-alert>
@endif
<div class="mt-44">
   <a href="{{ route('adminAddClass') }}" class="bg-purple-600 hover:bg-purple-600 duration-300 text-white text-md font-medium rounded px-3 py-2 mb-10">+ Register Group</a>
   <div class="bg-white px-2 mt-10 pb-2 rounded-lg"> 
     <h2 class="text-xl font-bold text-gray-600 mb-4">All Groups Data</h2>
     <div id= "tableContainer" class="overflow-x-auto">
     </div>
<div class="bg-white">
   <table class="w-full bg-white border">
      <thead class="bg-purple-600 text-white">
          <tr class="border">
              <th class="py-2 px-4 font-semibold text-md text-start">ID</th>
              <th class="py-2 px-4 font-semibold text-md text-start">Group Name</th>
              <th class="py-2 px-4 font-semibold text-md text-start">Semester</th>
              <th class="py-2 px-4 font-semibold text-md text-start">Action</th>
          </tr> 
      </thead>
      <tbody>
      @foreach ($groups as $group)  
          <tr class="hover:bg-gray-100 border duration-200">
            <td class="py-2 px-4 font-medium text-sm text-gray-600 text-start">{{$group->id}}.</td>
            <td class="py-1 px-4 font-medium text-sm text-gray-600 text-start">{{$group->name}}</td>
            <td class="py-1 px-4 font-medium text-sm text-gray-600 text-start">{{$group->semester}}</td>
            <td class="py-1 px-4">
              <div class="flex">
                {{-- <div> --}}
                <a href="" id="edit">
                  <span class="material-symbols-outlined text-gray-500 hover:text-gray-800 duration-500 mr-4">
                    edit_square
                  </span>
                </a>
                  <form action="{{route('deleteClassDetails', $group->id)}}" method="POST">
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
     <div class="flex justify-end mt-4">
      <h2>{{$groups->links()}}</h2>
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