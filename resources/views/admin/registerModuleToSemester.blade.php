@extends('admin.adminLayout')

@section('pageName')
    Assign Module
@endsection

@section('content')

<div class="bg-white rounded-md shadow-custom fixed left-[256px] ml-6 right-[1.5rem] top-28 z-10">
    <ul class="flex">
        <li class="py-4 border-b-4 border-purple-500">
            <a href=""  class="text-gray-600 px-2 rounded-lg cursor-pointer transition duration-300">Computer Science</a>  
        </li>
        <li class="py-4">
            <a href="" class="text-gray-600 px-2 rounded-lg cursor-pointer transition duration-300">Software Engineering</a>
            
        </li>
        <li class="py-4">
            <a href="" class="text-gray-600 px-2 rounded-lg cursor-pointer transition duration-300">BIBM</a>
        </li>
    </ul>
 </div>

<div class="mainContainer flex flex-column justify-start mt-56 ">
    <img src="{{ asset('images/signup.svg') }}" alt="" class="w-6/12 h-[370px]">
 {{-- Module/Subjects registration --}}
<div class="rounded-lg bg-white shadow-custom w-2/6">
    <div class="container mx-auto p-6 pb-6">
        <h1 class="text-xl text-gray-600 font-bold mb-3 text-center">Register Subjects/Modules</h1>
        <form action="{{route('subjects.store')}}" method="POST" class="rounded">
            @csrf
            <div class="mb-4">
                <label for="subject_name" class="block text-gray-600 font-bold mb-2">Subject Name</label>
                <input type="text" id="subject_name" name="subject_name" value="{{old('subject_name')}}" class="w-full text-sm p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-purple-300 @error('subject_name')
                    border-red-500
                @enderror" placeholder="Module name">
                <span class="text-red-700 text-xs font-medium">
                    @error('subject_name')
                        {{$message}}
                    @enderror
                  </span>
            </div>
            <div class="mb-4">
                <label for="subject_code" class="block text-gray-600 font-bold mb-2">Subject Code</label>
                <input type="text" id="subject_code" name="subject_code" value="{{old('subject_code')}}" class="w-full text-sm p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-purple-300 @error('subject_code')
                    border-red-500
                @enderror" placeholder="Module code">
                <span class="text-red-700 text-xs font-medium">
                    @error('subject_code')
                        {{$message}}
                    @enderror
                  </span>
            </div>
            <div class="mb-6">
                <label for="semester" class="block text-gray-600 font-bold mb-2">Choose Semester</label>
                <select name="semester" id="semester" name="semester" class=" w-full p-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-purple-300">
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
            <div class="">
                <button type="submit" class="bg-purple-600 hover:bg-purple-700 duration-300 text-white px-4 w-full py-2 rounded">Register Subject</button>
            </div>
        </form>
    </div>
</div>

</div>
@endsection
