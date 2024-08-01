@extends('admin.adminLayout')
@section('pageName')
    Bulk Students
@endsection
@section('content')
@section('studentReg_li')
<ul class="pl-4">
    <div class="flex justify-start">
        <a href="{{ route('students.index') }}">
            <li class="mr-4 border-b-4 {{ Route::is('students*') ? 'border-purple-600' : '' }}">Manual Registration</li>
        </a>
        <a href="{{ route('showBulkAddForm') }}">
            <li class="border-b-4 {{ Route::is('showBulkAddForm*') ? 'border-purple-600' : '' }}">Bulk Registration</li>
        </a>
    </div>
</ul>
@endsection
<div class="flex items-center justify-center">
  <div class="mt-28 w-2/6 bg-white shadow-custom px-6 pt-4 pb-6 rounded-md">
    <h1 class="text-center mb-2 text-lg font-bold text-gray-600">Add Bulk Students</h1>
    <form action="{{route('storeBulkStudents')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="mb-4">
        <label for="semester" class="block text-md font-bold text-gray-600">Semester:</label>
        <select name="semester" id="semester" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
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
    <div class="mb-4">
        <label for="group" class="block text-md font-bold text-gray-600">Group Name:</label>
        <select name="group" id="group" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
            @foreach ($groups as $group)
                <option value="{{ $group }}">{{ $group }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-4">
        <label class="block text-md font-bold text-gray-600">
            Upload File:
        </label>
        <div class="flex items-center space-x-2 mt-1">
          <label class="relative cursor-pointer bg-purple-600 text-white font-medium py-2 px-4 rounded-md hover:bg-purple-700  focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
              <span>Choose file</span>
              <input type="file" id="file" name="file" class="sr-only">
          </label>
          <span class="text-sm text-gray-500" id="file-chosen">No file chosen</span>
      </div>
      <span class="text-red-700 text-xs mt-1 font-medium">
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
    <div class="mt-6">
        <button type="submit" class="w-full mt-1 bg-green-600 px-4 py-2 rounded-md text-white hover:bg-green-700 duration-300">Register</button>
    </div>
</form>
</div>
</div>
@endsection
