@extends('admin.adminLayout')

@section('pageName')
    Edit assigned module
@endsection

@section('content')

<div class="mainContainer flex flex-column justify-start mt-48 ">
    <img src="{{ asset('images/signup.svg') }}" alt="" class="w-6/12 h-[370px]">
 {{-- Module/Subjects registration --}}
<div class="rounded-lg bg-white shadow-custom w-2/6">
    <div class="container mx-auto p-6">
        <h1 class="text-xl text-gray-600 font-bold mb-6 text-center">Register Subjects/Modules</h1>
        <form action="{{route('subjects.update', $subject->id)}}" method="POST" class=" rounded">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="subject_name" class="block text-gray-600 font-bold mb-2">Subject Name</label>
                <input type="text" id="subject_name" name="subject_name" value="{{$subject->name}}" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-purple-300 @error('subject_name')
                    border-red-500
                @enderror">
                <span class="text-red-700 text-xs font-medium">
                    @error('subject_name')
                        {{$message}}
                    @enderror
                  </span>
            </div>
            <div class="mb-4">
                <label for="subject_code" class="block text-gray-600 font-bold mb-2">Subject Code</label>
                <input type="text" id="subject_code" name="subject_code" value="{{$subject->code}}" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-purple-300 @error('subject_code')
                    border-red-500
                @enderror">
                <span class="text-red-700 text-xs font-medium">
                    @error('subject_code')
                        {{$message}}
                    @enderror
                  </span>
            </div>
            <div class="mb-6">
                <label for="semester" class="block text-gray-600 font-bold mb-2">Choose Semester</label>
                <select name="semester" id="semester" name="semester" class=" w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-purple-300">
                  <option value="Semester 1" {{ $subject->semester == 'Semester 1' ? 'selected' : '' }}>Semester 1</option>
                  <option value="Semester 2" {{ $subject->semester == 'Semester 2' ? 'selected' : '' }}>Semester 2</option>
                  <option value="Semester 3" {{ $subject->semester == 'Semester 3' ? 'selected' : '' }}>Semester 3</option>
                  <option value="Semester 4" {{ $subject->semester == 'Semester 4' ? 'selected' : '' }}>Semester 4</option>
                  <option value="Semester 5" {{ $subject->semester == 'Semester 5' ? 'selected' : '' }}>Semester 5</option>
                  <option value="Semester 6" {{ $subject->semester == 'Semester 6' ? 'selected' : '' }}>Semester 6</option>
                  <option value="Semester 7" {{ $subject->semester == 'Semester 7' ? 'selected' : '' }}>Semester 7</option>
                  <option value="Semester 8" {{ $subject->semester == 'Semester 8' ? 'selected' : '' }}>Semester 8</option>
                </select>
              </div>
              
            <div class="">
                <button type="submit" class="bg-purple-600 hover:bg-purple-700 duration-300 text-white px-4 py-2 rounded w-full">Register Subject</button>
            </div>
        </form>
    </div>
</div>

</div>
@endsection
