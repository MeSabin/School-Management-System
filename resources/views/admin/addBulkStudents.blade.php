@extends('admin.adminLayout')

@section('pageName')
    Bulk Students
@endsection

@section('content')
<div class="tw-flex tw-items-center tw-justify-center">
  <div class="tw-mt-28 tw-w-2/6 tw-bg-white tw-shadow-custom tw-px-6 tw-pt-4 tw-pb-6 tw-rounded-md">
    <h1 class="tw-text-center tw-mb-2 tw-text-lg tw-font-bold tw-text-gray-600">Add Bulk Students</h1>
    <form action="{{route('storeBulkStudents')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="tw-mb-4">
        <label for="semester" class="tw-block tw-text-md tw-font-bold tw-text-gray-600">Semester:</label>
        <select name="semester" id="semester" class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:outline-none tw-focus:ring-purple-500 tw-focus:border-purple-500 tw-sm:text-sm">
            <option value="Semester 1">Semester 1</option>
            <option value="Semester 2">Semester 2</option>
            <option value="Semester 3">Semester 3</option>
            <option value="Semester 4">Semester 4</option>
            <option value="Semester 5">Semester 5</option>
            <option value="Semester 6">Semester 6</option>
            <option value="Semester 7">Semester 7</option>
            <option value="Semester 8">Semester 8</option>
        </select>
    </div>
    <div class="tw-mb-4">
        <label for="group" class="tw-block tw-text-md tw-font-bold tw-text-gray-600">Group Name:</label>
        <select name="group" id="group" class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:outline-none tw-focus:ring-purple-500 tw-focus:border-purple-500 tw-sm:text-sm">
            @foreach ($groups as $group)
                <option value="{{ $group }}">{{ $group }}</option>
            @endforeach
        </select>
    </div>
    <div class="tw-mb-4">
        <label class="tw-block tw-text-md tw-font-bold tw-text-gray-600">
            Upload File:
        </label>
        <div class="tw-flex tw-items-center tw-space-x-2 tw-mt-1">
          <label class="tw-relative tw-cursor-pointer tw-bg-purple-600 tw-text-white tw-font-medium tw-py-2 tw-px-4 tw-rounded-md tw-hover:bg-purple-700 tw-duration-300 tw-focus-within:ring-2 tw-focus-within:ring-offset-2 tw-focus-within:ring-purple-500">
              <span>Choose file</span>
              <input type="file" id="file" name="file" class="tw-sr-only">
          </label>
          <span class="tw-text-sm tw-text-gray-500" id="file-chosen">No file chosen</span>
      </div>
      <span class="tw-text-red-700 tw-text-xs tw-mt-1 tw-font-medium">
        @error('file')
            {{$message}}
        @enderror
      </span>
      <script>
        document.getElementById('file').addEventListener('change', function() {
            var fileName = this.files[0].name;
            document.getElementById('file-chosen').textContent = fileName;
        });
    </script>
    </div>
    <div class="tw-mt-6">
        <button type="submit" 
        id="button"
        class="tw-w-full tw-flex tw-justify-center tw-items-center tw-font-medium tw-mt-1 tw-bg-purple-600 tw-px-4 tw-py-2 tw-rounded-md tw-text-white hover:tw-bg-purple-700 tw-duration-300 tw-focus-within:ring-2 tw-focus-within:ring-offset-2 focus-within:tw-ring-purple-500"
        >
        <x-button-spinner/>
        Register</button>
    </div>
</form>
</div>
</div>
@endsection
