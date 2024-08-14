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
<div class="tw-bg-white tw-mt-40 tw-p-4 tw-shadow-custom tw-rounded-md">
  <label for="" class="tw-text-gray-600 tw-font-semibold tw-text-lg">Submissions: {{$submission_count}}</label>
  <table class="tw-min-w-full tw-bg-white tw-border tw-rounded-lg tw-overflow-hidden tw-mt-4">
      <thead class="tw-bg-purple-600 tw-text-white">
          <tr class="tw-border">
              <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-sm tw-text-start">Student Id</th>
              <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-sm tw-text-start">Name</th>
              <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-sm tw-text-start">Group</th>
              <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-sm tw-text-center">Status</th>
              <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-sm tw-text-center">View</th>
          </tr> 
      </thead>
      <tbody>
         @foreach ($submissions as $submission)
          <tr class="hover:tw-bg-gray-100 tw-border duration-200">
            <td class="tw-py-2 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{$submission['students']->id}}.</td>
            <td class="tw-py-2 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{$submission['students']->name}}</td>
            <td class="tw-py-2 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{$submission['students']->group}}</td>
            @if (@isset($submission['submission_status']))
              <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-center">
               <label for="" class="tw-bg-green-200 py-1 px-2 tw-rounded-full tw-border-green-700 tw-border tw-text-green-700"> {{$submission['submission_status'] ?? 'Pending'}}</label> 
              </td>
              @else
              <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-center">
                <label for="" class="tw-bg-yellow-100 tw-text-yellow-700 tw-border-yellow-700 tw-border py-1 px-4 tw-rounded-full">{{$submission['submission_status'] ?? 'Pending'}}</label>
              </td>
              @endif
            <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-center ">
              <button data-modal-target="authentication-modal-{{$submission['students']->id}}" data-modal-toggle="authentication-modal-{{$submission['students']->id}}" class="tw-bg-purple-100 tw-text-purple-600 tw-border-purple-600 tw-border tw-font-semibold tw-rounded-md hover:tw-bg-purple-600 hover:tw-text-white tw-duration-300 tw-py-1 tw-px-2">View</button>
            </td>
          </tr>

           <!-- Main modal -->
 <div id="authentication-modal-{{$submission['students']->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
              <h3 class="text-xl font-semibold text-gray-600">
                  Submission Details
              </h3>
              <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal-{{$submission['students']->id}}">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                  <span class="sr-only">Close modal</span>
              </button>
          </div>
          <!-- Modal body -->
          <div class="p-4 md:p-5"> 
            @if (@isset($submission['submission_status']))
              <div>
                <div class="tw-mb-6">
                  <label for="" class="tw-font-semibold tw-text-gray-500">File:</label>
                  <a href="{{asset('uploads/'. $submission['submission_details']->file_name)}}" class="tw-text-blue-500 tw-border tw-border-gray-400 tw-py-1 tw-font-medium tw-px-2 tw-rounded-md tw-text-sm hover:tw-text-blue-700" 
                    target="_blank">{{$submission['submission_details']->file_name}}</a>
                </div>
                <div>
                  <label for="" class="tw-font-semibold tw-text-gray-500">Submitted on:</label>
                  <label for="" class="tw-text-gray-600">{{$submission['submission_details']->submitted_on}}</label>
                </div> 
              </div>
              @else
                <div class="tw-bg-red-400 tw-min-h-14 tw-flex tw-justify-center tw-items-center tw-rounded-md">
                  <label for="" class="tw-text-white">Assignment not submitted yet!</label>
                </div>
              @endif 
          </div>
      </div>
  </div>
</div> 
      @endforeach
      </tbody>
    </table>
   </div>
   @endif
@endsection
