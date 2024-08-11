@extends('teachers.teacherLayout')

@section('pageName')
    Submissions
@endsection

@section('content')

@if (@isset($assignment_status))
<div class="tw-flex tw-justify-center tw-items-center tw-min-h-40 tw-border tw-rounded-md tw-border-gray-400">
   <p class="tw-text-red-500 tw-font-semibold">{{$assignment_status}}</p>
</div>
@else  
<div class="tw-bg-white tw-mt-14 tw-p-4 tw-shadow-custom tw-rounded-md">
  <table class="tw-min-w-full tw-bg-white tw-border">
      <thead class="tw-bg-purple-600 tw-text-white">
          <tr class="tw-border">
              <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">Student Id</th>
              <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">Name</th>
              <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">Group</th>
              <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">Submitted on</th>
              <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">File</th>
              <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">Status</th>
              <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">View</th>
          </tr> 
      </thead>
      <tbody>
         @foreach ($submissions as $submission)
          <tr class="hover:tw-bg-gray-100 tw-border duration-200">
            <td class="tw-py-2 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{$submission->student_id}}</td>
            <td class="tw-py-2 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{$submission->student_name}}.</td>
            <td class="tw-py-2 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{$submission->group}}</td>
            <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{$submission->submission_date}}</td>
            <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{$submission->file_name}}</td>
            <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{$submission->status}}</td>
          </tr>
      @endforeach
      </tbody>
    </table>
   </div>
   @endif
@endsection
