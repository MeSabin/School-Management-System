@extends('teachers.teacherLayout')

@section('pageName')
    Your Students
@endsection

@section('content')
<div class="tw-mt-40 tw-flex tw-items-center tw-justify-start">
   
    <form action="{{route('viewStudents')}}" method="post">
        @csrf
        <div class="tw-flex tw-gap-14">
            <div class="tw-rounded-md">
                <label for="group" class="tw-block tw-text-md tw-font-bold tw-text-gray-600">Group Name:</label>
                <select name="group" id="group" class="tw-mt-1 tw-block tw-w-[170px] tw-p-2 tw-border tw-border-gray-300 tw-rounded-md tw-shadow-sm focus:tw-outline-none focus:tw-ring-purple-500 focus:tw-border-purple-500 sm:tw-text-sm">
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->group }}" {{ old('group') == $teacher->group ? 'selected' : '' }}>{{ $teacher->group }}</option>
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

@if (session()->has('teacherViewStudents'))
<div class="tw-bg-white tw-mt-14 tw-p-4 tw-shadow-custom tw-rounded-md">
  <table class="tw-min-w-full tw-bg-white tw-border">
      <thead class="tw-bg-purple-600 tw-text-white">
          <tr class="tw-border">
              <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">ID</th>
              <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">Roll</th>
              <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">Name</th>
              <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">Semester</th>
              <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">Group</th>
              <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">Email</th>
          </tr> 
      </thead>
      <tbody>
@endif
      @foreach(session('teacherViewStudents', []) as $student)
          <tr class="hover:tw-bg-gray-100 tw-border duration-200">
            <td class="tw-py-2 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{$student->id}}</td>
            <td class="tw-py-2 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{$student->roll}}.</td>
            <td class="tw-py-2 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{$student->name}}</td>
            <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{$student->semester}}</td>
            <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{$student->group}}</td>
            <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{$student->email}}</td>
          </tr>
      @endforeach
      </tbody>
    </table>
</div>
@endsection
