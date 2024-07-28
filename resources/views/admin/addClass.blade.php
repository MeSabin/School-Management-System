@extends('admin.adminLayout')
@section('pageName')
    Add Classes
@endsection
@section('content')
<div class="mt-48 flex flex-column justify-start">
   <img src="{{ asset('images/signup.svg') }}" alt="" class="w-6/12 h-[370px]">
    <div class="bg-white p-6 pt-4 pb-0 mt-8 rounded-lg shadow-custom w-2/6 h-[100%]">
        <h2 class="text-2xl font-bold text-gray-700 mb-6 text-center">Add Class</h2>
        <form action="{{route('storeClassDetails')}}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="semester" class="block text-gray-600 font-bold mb-2">Choose Semester</label>
                <select name="semester" id="semester" class="block w-full text-sm px-3 py-2 border rounded-md text-gray-600 focus:outline-none focus:ring focus:border-blue-300">
                    <option value="Semester 1">Semester 1</option>
                    <option value="Semester 2">Semester 2</option>
                    <option value="Semester 3">Semester 3</option>
                    <option value="Semester 4">Semester 4</option>
                    <option value="Semester 5">Semester 5</option>
                    <option value="Semester 6">Semester 6</option>
                    <option value="Semester 7">Semester 7</option>
                    <option value="Semester 8">Semester 8</option>
                </select>
                @error('semester')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="" class="block text-gray-600 font-bold mb-2">Group Name</label>
                <input type="text" name="group_name" id="group" class="block text-sm w-full px-3 py-2 border rounded-md text-gray-600 focus:outline-none focus:ring focus:border-blue-300 @error('group_name')
                   border-red-500
                @enderror" value="{{ old('group_name') }}" placeholder="Group/Section name">
                @error('group_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="bg-purple-600 w-full hover:bg-purple-700 mb-6 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Add Class
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
