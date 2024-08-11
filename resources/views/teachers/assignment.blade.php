@extends('teachers.teacherLayout')

@section('pageName')
    Give Assignment
@endsection

@section('content')
  
@if (session('assignSuccess'))
    <x-alert>
      <div id="error" class="tw-opacity-0 tw-z-50 tw-absolute tw-top-5 tw-right-5 tw-flex tw-items-center tw-justify-center tw-bg-white tw-shadow-md tw-border-2 tw-border-l-4 tw-border-green-600 tw-text-green-600 tw-pr-8 tw-pl-2 tw-py-4 tw-rounded-sm">
        <img src="{{ asset('images/accept.png') }}" alt="" class="tw-w-6 tw-mr-2">
        <h3>{{ session('assignSuccess') }}</h3>
      </div>
    </x-alert>
@endif
@if (session('deleteAssignment'))
    <x-alert>
      <div id="error" class="tw-opacity-0 tw-z-50 tw-absolute tw-top-5 tw-right-5 tw-flex tw-items-center tw-justify-center tw-bg-white tw-shadow-md tw-border-2 tw-border-l-4 tw-border-green-600 tw-text-green-600 tw-pr-8 tw-pl-2 tw-py-4 tw-rounded-sm">
        <img src="{{ asset('images/accept.png') }}" alt="" class="tw-w-6 tw-mr-2">
        <h3>{{ session('deleteAssignment') }}</h3>
      </div>
    </x-alert>
@endif
<div class="tw-mt-36 tw-flex tw-items-center tw-justify-between">
    <form action="{{route('postAssignment')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="tw-flex tw-gap-8">
            <div class="tw-rounded-md">
                <label for="group" class="tw-block tw-text-md tw-font-bold tw-text-gray-600">Group Name:</label>
                <select name="group" id="group" class="tw-mt-1 tw-block tw-w-[170px] tw-p-2 tw-border tw-border-gray-300 tw-rounded-md tw-shadow-sm focus:tw-outline-none focus:tw-ring-purple-500 focus:tw-border-purple-500 sm:tw-text-sm">
                    @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->group }}" {{ old('group') == $teacher->group ? 'selected' : '' }}>{{ $teacher->group }}</option>
                    @endforeach
                </select>
            </div>  
            <div class="tw-rounded-md">
                <label for="group" class="tw-block tw-text-md tw-font-bold tw-text-gray-600">Description:</label>
                <textarea type="text" name="description" value="{{old('description')}}" class="tw-mt-1 tw-block tw-w-[180px] tw-border tw-h-[2.4rem] tw-border-gray-300 tw-rounded-md tw-shadow-sm focus:tw-outline-none focus:tw-ring-purple-500 focus:tw-border-purple-500 sm:tw-text-sm @error('description')
                        tw-border-red-700
                    @enderror"></textarea>
                <span class="tw-text-red-700 tw-text-xs tw-mt-1 tw-font-medium">
                    @error('description')
                        {{$message}}
                    @enderror
                </span>
            </div>  
            <div class="tw-flex tw-gap-14">
               <div class="tw-rounded-md">
                  <label for="fileInput" class="tw-block tw-text-md tw-font-bold tw-text-gray-600">Choose File:</label>
                  <div class="tw-w-[300px] tw-h-[40px] tw-border tw-mt-1 tw-overflow-x-hidden tw-rounded-lg tw-flex tw-items-center tw-border-gray-300 tw-bg-white hover:tw-bg-gray-100 tw-shadow-sm @error('deadlineDate')
                    tw-border-red-700
                @enderror">
                     <label for="fileInput" class="tw-cursor-pointer tw-flex tw-items-center ">
                        <span class="material-symbols-outlined tw-text-gray-500 hover:tw-text-purple-700 tw-duration-300">
                           attach_file
                        </span>
                     </label>
                     <span id="fileName" class="tw-ml-2 tw-text-sm tw-text-gray-700"></span>
                     <input type="file" id="fileInput" name="file" class="tw-hidden tw-py-1" multiple>
                  </div>
                  <span class="tw-text-red-700 tw-text-xs tw-mt-1 tw-font-medium">
                    @error('file')
                        {{$message}}
                    @enderror
                  </span>
               </div>
           </div>
           <script>
            const fileInput = document.getElementById('fileInput');
            const fileName = document.getElementById('fileName');
        
            fileInput.addEventListener('change', function() {
               fileName.textContent = fileInput.files[0].name;
            });
        </script>
            <div class="tw-rounded-md">
               <label for="deadlineDate" name="fileName" class="tw-block tw-text-md tw-font-bold tw-text-gray-600" value="{{old('fileName')}}">Deadline Date:</label>
               <input type="date" name="deadlineDate" id="deadlineDate" class="tw-mt-1 tw-block tw-w-[150px] tw-p-2 tw-border tw-border-gray-300 tw-rounded-md tw-shadow-sm focus:tw-outline-none focus:tw-ring-purple-500 focus:tw-border-purple-500 sm:tw-text-sm  @error('deadlineDate')
                    tw-border-red-700
                @enderror">
               <span class="tw-text-red-700 tw-text-xs tw-mt-1 tw-font-medium">
                @error('deadlineDate')
                    {{$message}}
                @enderror
              </span>
           </div>
           
           <div class="tw-rounded-md">
               <label for="deadlineTime" class="tw-block tw-text-md tw-font-bold tw-text-gray-600">Time:</label>
                <form class="max-w-[8rem] mx-auto">
                    <div class="relative">
                        <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <input type="time" id="time" name="deadlineTime" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                    </div>
                </form>
                <span class="tw-text-red-700 tw-text-xs tw-mt-1 tw-font-medium">
                    @error('deadlineTime')
                        {{$message}}
                    @enderror
                  </span>
           </div>
            <div class="">
                <label class="tw-block tw-text-gray-600 tw-font-bold tw-text-md">Assign:</label>
                    <button type="submit" class="tw-mt-1 !important tw-bg-purple-600 hover:tw-bg-purple-700 tw-duration-300 tw-px-6 tw-py-2 hover:tw-shadow-lg tw-rounded-md tw-text-white duration-200 focus-within:tw-ring-2 focus-within:tw-ring-offset-2 focus-within:tw-ring-purple-600">Assign</button>
            </div>
        </div>
    </form>
</div>

<div class="tw-border tw-border-gray-300 tw-rounded-md tw-mt-10 tw-min-h-40 tw-p-6 tw-bg-white">
    @if(isset($message))
    <div class="tw-flex tw-justify-center tw-items-center tw-mt-4">
        <img src="{{asset('images/assignment.png')}}" alt="" class="tw-w-20 tw-h-20 tw-invert-[40%] tw-mr-3">
        <p class="tw-text-blue-400 tw-font-medium tw-text-center">{{ $message }}</p>
    </div>
    @else
    <span class="tw-text-purple-500 tw-text-lg tw-font-bold">Assignments:</span>
        @foreach($details as $detail)
        <div class="tw-mb-8 tw-p-4 tw-pl-0 tw-border-gray-300 tw-flex tw-justify-between tw-border-b">
            <div class="tw-flex tw-gap-2 tw-flex-col">
                <span class="tw-text-sm tw-font-semibold tw-text-gray-700 ">{{ $detail->description }}</span>
                <div class="tw-font-medium tw-text-sm tw-text-gray-500">Assigned to: 
                    <span class="tw-text-sm tw-font-semibold tw-text-gray-500">{{ $detail->group }}</span>
                </div> 
                <div class="tw-text-gray-500 tw-font-semibold tw-inline-block">
                    <a href="{{$detail->file_path}}" 
                        class="tw-text-blue-500 tw-border tw-border-gray-400 tw-py-1 tw-font-medium tw-px-2 tw-rounded-md tw-text-sm hover:tw-text-blue-700" 
                        target="_blank">
                        {{ $detail->file_name }}
                    </a>
                </div> 
                <div class="tw-text-gray-500 tw-font-medium tw-text-sm tw-mt-1">Assigned on: 
                    <span class="tw-text-gray-500">{{ $detail->assigned_on }}</span>
                </div>
                <div class="tw-text-gray-500 tw-font-medium tw-text-sm tw-mt-1">Deadline: 
                    <span class="tw-text-gray-500">{{ $detail->deadline_date }} {{ $detail->deadline_time }}</span>
                    @if (@isset($available))      
                    <label class="tw-bg-green-100 tw-text-green-600 tw-border tw-border-green-600 tw-px-3 tw-text-sm tw-py-1 tw-ml-2 tw-rounded-full">{{$available}}</label>
                    @endif
                    @if (@isset($closed))
                    <label class="tw-bg-red-50 tw-text-red-600 tw-border tw-border-red-600 tw-px-3 tw-text-sm tw-py-1 tw-ml-2 tw-rounded-full">{{$closed}}</label>
                    @endif
                </div>
            </div>

            <div class="tw-flex tw-gap-10 tw-items-end">
                    <a href="{{route('viewSubmissions', $detail->id)}}" class="tw-px-2 tw-py-2 tw-rounded-lg tw-bg-purple-50 tw-text-purple-500 tw-text-sm tw-font-semibold tw-border tw-border-purple-500 tw-duration-300 hover:tw-bg-purple-600 hover:tw-text-white hover:tw-border-purple-700">Submissions</a>
                    <button data-modal-target="popup-modal-{{$detail->id}}" data-modal-toggle="popup-modal-{{$detail->id}}" class="delete tw-bg-red-50 tw-text-red-600 tw-border tw-border-red-600 tw-px-3 tw-font-semibold tw-text-sm tw-py-2 tw-rounded-lg tw-duration-300 hover:tw-bg-red-500 hover:tw-text-white hover:tw-border-red-700">Remove</button>

                  @php
                      $id =$detail->id;
                  @endphp
                  <x-delete-modal type='deleteAssignment' :id="$id"/>
            </div>
        </div>
        @endforeach
    @endif
</div>

@endsection
