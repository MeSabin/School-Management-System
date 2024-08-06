@extends('admin.adminLayout')

@section('pageName')
    Bulk Students
@endsection

@section('content')
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
<script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
 {{-- CDN path for delete modal popup --}}
 <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
<div class="tw-mt-40 tw-flex tw-items-center tw-justify-between">
    <div class="">
        <label class="tw-block tw-text-gray-600 tw-font-bold tw-text-md">Add Bulk Students:</label>
        <div class="">
            <a href="{{route('showBulkAddForm')}}" class="tw-mt-1 tw-font-medium tw-flex tw-items-center tw-justify-evenly tw-bg-green-600 hover:tw-bg-green-700 tw-duration-300 tw-px-4 tw-py-2 hover:tw-shadow-lg tw-rounded-md tw-text-white duration-200 focus-within:tw-ring-2 focus-within:tw-ring-offset-2 focus-within:tw-ring-green-500">
                <span class="material-symbols-outlined tw-mr-2">
                  group_add
                </span>
                Register Students
            </a>
        </div>
    </div>
    <form action="{{route('bulkStudentsTable')}}" method="post">
        @csrf
        <div class="tw-flex tw-gap-14">
            <div class="tw-rounded-md">
                <label for="semester" class="tw-block tw-text-md tw-font-bold tw-text-gray-600">Semester:</label>
                <select name="semester" id="semester" class="tw-mt-1 tw-block tw-w-[170px] tw-p-2 tw-border tw-border-gray-300 tw-rounded-md tw-shadow-sm focus:tw-outline-none focus:tw-ring-purple-500 focus:tw-border-purple-500 sm:tw-text-sm">
                    <option value="Semester 1" {{ old('semester') == 'Semester 1' ? 'selected' : '' }}>Semester 1</option>
                    <option value="Semester 2" {{ old('semester') == 'Semester 2' ? 'selected' : '' }}>Semester 2</option>
                    <option value="Semester 3" {{ old('semester') == 'Semester 3' ? 'selected' : '' }}>Semester 3</option>
                    <option value="Semester 4" {{ old('semester') == 'Semester 4' ? 'selected' : '' }}>Semester 4</option>
                    <option value="Semester 5" {{ old('semester') == 'Semester 5' ? 'selected' : '' }}>Semester 5</option>
                    <option value="Semester 6" {{ old('semester') == 'Semester 6' ? 'selected' : '' }}>Semester 6</option>
                    <option value="Semester 7" {{ old('semester') == 'Semester 7' ? 'selected' : '' }}>Semester 7</option>
                    <option value="Semester 8" {{ old('semester') == 'Semester 8' ? 'selected' : '' }}>Semester 8</option>
                </select>
            </div>
            
            <div class="tw-rounded-md">
                <label for="group" class="tw-block tw-text-md tw-font-bold tw-text-gray-600">Group Name:</label>
                <select name="group" id="group" class="tw-mt-1 tw-block tw-w-[170px] tw-p-2 tw-border tw-border-gray-300 tw-rounded-md tw-shadow-sm focus:tw-outline-none focus:tw-ring-purple-500 focus:tw-border-purple-500 sm:tw-text-sm">
                    @foreach ($groups as $group)
                        <option value="{{ $group }}" {{ old('group') == $group ? 'selected' : '' }}>{{ $group }}</option>
                    @endforeach
                </select>
            </div>  

            <div class="">
                <label class="tw-block tw-text-gray-600 tw-font-bold tw-text-md">View:</label>
                <div class="tw-mt-1 tw-flex tw-items-center tw-justify-evenly tw-bg-green-600 hover:tw-bg-green-700 tw-duration-300 tw-px-4 tw-py-2 hover:tw-shadow-lg tw-rounded-md tw-text-white duration-200 focus-within:tw-ring-2 focus-within:tw-ring-offset-2 focus-within:tw-ring-green-500">
                    <span class="material-symbols-outlined">
                        view_list
                    </span>
                    <button type="submit" class="tw-ml-2">View Students</button>
                </div>
            </div>
        </div>
    </form>
</div>

@if (session('emptyRecord'))
  <div class="tw-text-gray-700 tw-bg-red-400 tw-font-semibold tw-text-center tw-py-2 tw-mt-8 tw-h-10 tw-rounded-md">
    {{session('emptyRecord')}}
  </div>
@else
@if (session()->has('bulkStudents'))
<div class="tw-bg-white tw-mt-14 tw-p-4 tw-shadow-custom tw-rounded-md">
  <table class="tw-min-w-full tw-bg-white tw-border">
      <thead class="tw-bg-purple-600 tw-text-white">
          <tr class="tw-border">
              <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">Roll</th>
              <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">Name</th>
              <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">Semester</th>
              <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">Group</th>
              <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">Phone</th>
              <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">Email</th>
              <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">Date of Birth</th>
              <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">Action</th>
          </tr> 
      </thead>
      <tbody>
@endif
      @foreach(session('bulkStudents', []) as $student)
          <tr class="hover:tw-bg-gray-100 tw-border duration-200">
            <td class="tw-py-2 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{$student->roll}}.</td>
            <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{$student->name}}</td>
            <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{$student->semester}}</td>
            <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{$student->group}}</td>
            <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{$student->phone}}</td>
            <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{$student->email}}</td>
            <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{$student->dob}}</td>
            <td class="tw-py-1 tw-px-4">
              <div class="tw-flex">
                <a href="{{route('students.edit', $student->id)}}" class="edit">
                  <span class="material-symbols-outlined tw-text-gray-500 hover:tw-text-gray-800 duration-500 tw-mr-4">
                    edit_square
                  </span>
                </a>
                <button data-modal-target="popup-modal-{{$student->id}}" class="delete" data-modal-toggle="popup-modal-{{$student->id}}">
                  <span class="material-symbols-outlined tw-text-red-400 hover:tw-text-red-700 duration-500">
                    delete
                  </span>
                </button>
                @php
                    $id =$student->id;
                @endphp
                <x-delete-modal type='students.destroy' :id="$id"/>
              </div>
            </td>
          </tr>
      @endforeach
      </tbody>
    </table>
</div>
@endif
<script>
  document.addEventListener('DOMContentLoaded', function(){
    tippy('.edit', {
      content: "Edit",
      placement: 'top',
});
  tippy('.delete', {
    content: "Delete",
    placement: 'top'
});
});
    
</script>
@endsection
