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

<div class="mt-40 flex items-center justify-around">
    <div class="rounded-md">
        <label for="semester" class="block text-md font-bold text-gray-600">Semester:</label>
        <select name="semester" id="semester" class="mt-1 block w-[170px] p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
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
    <div class="rounded-md">
        <label for="group" class="block text-md font-bold text-gray-600">Group Name:</label>
        <select name="group" id="group" class="mt-1 block w-[170px] p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
            @foreach ($groups as $group)
                <option value="{{ $group }}">{{ $group }}</option>
            @endforeach
        </select>
    </div>
    <div class="rounded-md">
        <label class="block text-md font-bold text-gray-600">
            Upload File:
        </label>
        <div class="flex items-center space-x-2 mt-1">
          <label class="relative cursor-pointer bg-purple-600 text-white font-medium py-2 px-4 rounded-md hover:bg-purple-700  focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
              <span>Choose file</span>
              <input type="file" name="file" class="sr-only">
          </label>
          <span class="text-sm text-gray-500" id="file-chosen">No file chosen</span>
      </div>
    </div>
    <div class="">
      <label class="block text-gray-600 font-bold text-md">Upload:</label>
        <div class=" mt-1 flex items-center justify-evenly bg-green-600 px-4 py-2 hover:shadow-lg rounded-md text-white duration-200 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500">
            <span class="material-symbols-outlined">
              <span class="material-symbols-outlined">
                how_to_reg
                </span>
            </span>
            <button type="submit" class="ml-2">Register</button>
        </div>
    </div>
</div>
@endsection
