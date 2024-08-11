@extends('students.studentLayout')
  @section('title')
      Assignment
  @endsection
  @section('pageName')
      View Assignment
@endsection
@section('content')
@if (session('submitSuccess'))
<x-alert>
  <div id="error" class="tw-opacity-0 tw-z-50 tw-absolute tw-top-5 tw-right-5 tw-flex tw-items-center tw-justify-center tw-bg-white tw-shadow-md tw-border-2 tw-border-l-4 tw-border-green-600 tw-text-green-600 tw-pr-8 tw-pl-2 tw-py-4 tw-rounded-sm">
    <img src="{{ asset('images/accept.png') }}" alt="" class="tw-w-6 tw-mr-2">
    <h3>{{ session('submitSuccess') }}</h3>
  </div>
</x-alert>
@endif

<div class="tw-border tw-border-gray-400 tw-rounded-md tw-min-h-40 tw-p-6">
   @if (@isset($message))
   <div class="tw-flex tw-justify-center tw-items-center tw-mt-4">
      <img src="{{asset('images/assignment.png')}}" alt="" class="tw-w-20 tw-h-20 tw-invert-[40%] tw-mr-3">
      <p class="tw-text-blue-400 tw-font-medium tw-text-center">{{ $message }}</p>
   </div>
   @else
   <span class="tw-text-purple-500 tw-text-lg tw-font-bold">Assignments:</span>
        @foreach($assignments as $assignment)
        <div class="tw-mb-8 tw-p-4 tw-pl-0 tw-border-gray-300 tw-flex tw-justify-between tw-border-b">
            <div class="tw-flex tw-gap-2 tw-flex-col">
                <span class="tw-text-sm tw-font-semibold tw-text-gray-700 ">{{ $assignment->id }}</span>
                <span class="tw-text-sm tw-font-semibold tw-text-gray-700 ">{{ $assignment->description }}</span>
                <div class="tw-font-medium tw-text-sm tw-text-gray-500">Assigned by: 
                    <span class="tw-text-sm tw-font-semibold tw-text-gray-500">{{ $assignment->assigned_by }}</span>
                </div>  
                <div class="tw-text-gray-500 tw-font-semibold tw-inline-block">
                    <a href="{{ asset('uploads/' . $assignment->file_name) }}" 
                        class="tw-text-blue-500 tw-border tw-border-gray-400 tw-py-1 tw-font-medium tw-px-2 tw-rounded-md tw-text-sm hover:tw-text-blue-700" 
                        target="_blank">
                        {{ $assignment->file_name }}
                    </a>
                </div> 
                <div class="tw-text-gray-500 tw-font-medium tw-text-sm tw-mt-1">Assigned on: 
                    <span class="tw-text-gray-500">{{ $assignment->assigned_on }}</span>
                </div>
                <div class="tw-text-gray-500 tw-font-medium tw-text-sm tw-mt-1">Deadline: 
                    <span class="tw-text-gray-500">{{ $assignment->deadline_date }} {{ $assignment->deadline_time }}</span>
                    @if (@isset($available))      
                    <label class="tw-bg-green-100 tw-text-green-600 tw-border tw-border-green-600 tw-px-3 tw-text-sm tw-py-1 tw-ml-2 tw-rounded-full">{{$available}}</label>
                    @endif
                    @if (@isset($closed))
                    <label class="tw-bg-red-50 tw-text-red-600 tw-border tw-border-red-600 tw-px-3 tw-text-sm tw-py-1 tw-ml-2 tw-rounded-full">{{$closed}}</label>
                    @endif
                </div>
            </div>

            <div class="tw-flex tw-gap-10 tw-items-end">
                <div class="tw-relative tw-inline-block">
                    <label for="" class="tw-bg-green-600 tw-text-sm tw-absolute tw-top-[-4px] tw-right-[-5px] tw-rounded-full tw-w-5 tw-h-5 tw-text-white tw-flex tw-items-center tw-justify-center">
                        3
                    </label>

                    <button id="button" class="tw-px-2 tw-py-2 tw-rounded-lg tw-bg-purple-50 tw-text-purple-500 tw-text-sm tw-font-semibold tw-border tw-border-purple-500 tw-duration-300 hover:tw-bg-purple-600 hover:tw-text-white hover:tw-border-purple-700">Submissions</button>
                </div> 
                <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="tw-bg-purple-50 tw-text-purple-600 tw-border tw-border-purple-500 tw-px-3 tw-font-semibold tw-text-sm tw-py-2 tw-rounded-lg tw-duration-300 hover:tw-bg-purple-600 hover:tw-text-white hover:tw-border-purple-700">Submit</button>
            </div>
        </div>
    
 
 <!-- Main modal -->
 <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
     <div class="relative p-4 w-full max-w-md max-h-full">
         <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
             <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                 <h3 class="text-xl font-semibold text-gray-600">
                     Submit your assignment
                 </h3>
                 <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                     </svg>
                     <span class="sr-only">Close modal</span>
                 </button>
             </div>
             <!-- Modal body -->
             <div class="p-4 md:p-5"> 
                 <form class="space-y-4" action="{{route('submitAssignment', $assignment->id)}}" method="post">
                    @csrf
                    <span>{{$assignment->id}}</span>
                     <div>
                        <label for="file" class="text-gray-500 tw-font-semibold">File</label>
                     <div class="tw-w-full tw-h-[40px] tw-border tw-mt-1 tw-overflow-x-hidden tw-rounded-lg tw-flex tw-items-center tw-border-gray-300 tw-bg-white hover:tw-bg-gray-100 tw-shadow-sm @error('deadlineDate')
                      tw-border-red-700
                     @enderror">
                     <label for="fileInput" class="tw-cursor-pointer tw-flex tw-items-center ">
                     <span class="material-symbols-outlined tw-text-gray-500 hover:tw-text-purple-700 tw-duration-300">
                        attach_file
                     </span>
                     <span id="fileName" class="tw-ml-2 tw-text-sm tw-text-gray-700"></span>
                     <input type="file" id="fileInput" name="file" class="tw-hidden tw-py-1" multiple>
                     </div>
                     <script>
                        const fileInput = document.getElementById('fileInput');
                        const fileName = document.getElementById('fileName');
                    
                        fileInput.addEventListener('change', function() {
                           fileName.textContent = fileInput.files[0].name;
                        });
                    </script>
                     <button type="submit" class="w-full mt-6 text-white bg-purple-600 hover:bg-purple-700 focus:ring-2 focus:outline-none focus:ring-purple-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-700 focus:tw-ring-offset-2">Submit</button>
                 </form>
             </div>
         </div>
     </div>
 </div> 
 @endforeach
 @endif
</div>
@endsection
  