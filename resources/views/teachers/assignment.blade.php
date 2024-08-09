@extends('teachers.teacherLayout')

@section('pageName')
    Give Assignment
@endsection

@section('content')
@if (session('assignSuccess'))
    <x-alert>
      <div id="error" class="tw-opacity-0 tw-absolute tw-top-5 tw-right-5 tw-flex tw-items-center tw-justify-center tw-bg-white tw-shadow-md tw-border-2 tw-border-l-4 tw-border-green-600 tw-text-green-600 tw-pr-8 tw-pl-2 tw-py-4 tw-rounded-sm">
        <img src="{{ asset('images/accept.png') }}" alt="" class="tw-w-6 tw-mr-2">
        <h3>{{ session('assignSuccess') }}</h3>
      </div>
    </x-alert>
  @endif
<div class="tw-mt-40 tw-flex tw-items-center tw-justify-between">
    <form action="{{route('postAssignment')}}" method="post" enctype="multipart/form-data">
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
           
           <div class="tw-rounded-md tw-ml-4">
               <label for="deadlineTime" class="tw-block tw-text-md tw-font-bold tw-text-gray-600">Deadline Time:</label>
               <input type="time" name="deadlineTime" id="deadlineTime" class="tw-mt-1 tw-block tw-w-[150px] tw-p-2 tw-border tw-border-gray-300 tw-rounded-md tw-shadow-sm focus:tw-outline-none focus:tw-ring-purple-500 focus:tw-border-purple-500 sm:tw-text-sm  @error('deadlineTime')
                    tw-border-red-700
                @enderror">
                <span class="tw-text-red-700 tw-text-xs tw-mt-1 tw-font-medium">
                    @error('deadlineTime')
                        {{$message}}
                    @enderror
                  </span>
           </div>
           
            <div class="">
                <label class="tw-block tw-text-gray-600 tw-font-bold tw-text-md">Assign:</label>
                <div class="tw-mt-1 tw-flex tw-items-center tw-justify-evenly tw-bg-green-600 hover:tw-bg-green-700 tw-duration-300 tw-px-4 tw-py-2 hover:tw-shadow-lg tw-rounded-md tw-text-white duration-200 focus-within:tw-ring-2 focus-within:tw-ring-offset-2 focus-within:tw-ring-green-500">
                    <span class="material-symbols-outlined">
                        view_list
                    </span>
                    <button type="submit" class="tw-ml-2">Give Assignment</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="tw-border tw-border-gray-300 tw-rounded-md tw-mt-10 tw-min-h-40 tw-p-6 tw-bg-white">
    @if(isset($message))
        <p class="tw-text-red-500 tw-font-semibold tw-text-center">{{ $message }}</p>
    @else
        @foreach($details as $detail)
        <span class="tw-text-purple-500 tw-text-lg tw-font-bold">Assignment Details:</span>
        <div class="tw-mb-8 tw-p-4 tw-border-gray-300 ">
            <div class="tw-font-semibold tw-text-md tw-text-gray-500">Assigned to: 
                <span class="tw-text-sm tw-font-medium">{{ $detail->group }}</span>
            </div> 
            <div class="tw-text-gray-500 tw-font-semibold">File: 
                <a href="{{ asset('uploads/' . $detail->file_name) }}" 
                    class="tw-text-blue-500 tw-text-sm hover:tw-text-blue-700" 
                    target="_blank">
                    {{ $detail->file_name }}
                 </a>
            </div> 
            <div class="tw-text-gray-500 tw-font-semibold">Deadline: 
                <span class="tw-text-gray-600">{{ $detail->deadline_date }} {{ $detail->deadline_time }}</span>
            </div> 
        </div>
        @endforeach
    @endif
</div>

@endsection
