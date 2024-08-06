@extends('admin.adminLayout')

@section('pageName')
    Edit assigned module
@endsection

@section('content')
<div class="tw-mainContainer tw-flex tw-flex-row tw-justify-start tw-mt-56">
    <img src="{{ asset('images/signup.svg') }}" alt="" class="tw-w-6/12 tw-h-[370px]">
    
    {{-- Module/Subjects registration --}}
    <div class="tw-rounded-lg tw-bg-white tw-shadow-custom tw-w-2/6">
        <div class="tw-container tw-mx-auto tw-p-6">
            <h1 class="tw-text-xl tw-text-gray-600 tw-font-bold tw-mb-6 tw-text-center">Update Subjects/Modules</h1>
            <form action="{{ route('subjects.update', $subject->id) }}" method="POST" class="tw-rounded">
                @csrf
                @method('PUT')
                <div class="tw-mb-4">
                    <label for="subject_name" class="tw-block tw-text-gray-600 tw-font-bold tw-mb-2">Subject Name</label>
                    <input type="text" id="subject_name" name="subject_name" value="{{ $subject->name }}" class="tw-w-full tw-p-2 tw-border tw-border-gray-300 tw-rounded focus:tw-outline-none focus:tw-ring focus:tw-border-purple-300 @error('subject_name') tw-border-red-500 @enderror">
                    <span class="tw-text-red-700 tw-text-xs tw-font-medium">
                        @error('subject_name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="tw-mb-4">
                    <label for="subject_code" class="tw-block tw-text-gray-600 tw-font-bold tw-mb-2">Subject Code</label>
                    <input type="text" id="subject_code" name="subject_code" value="{{ $subject->code }}" class="tw-w-full tw-p-2 tw-border tw-border-gray-300 tw-rounded focus:tw-outline-none focus:tw-ring focus:tw-border-purple-300 @error('subject_code') tw-border-red-500 @enderror">
                    <span class="tw-text-red-700 tw-text-xs tw-font-medium">
                        @error('subject_code')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="tw-mb-6">
                    <label for="semester" class="tw-block tw-text-gray-600 tw-font-bold tw-mb-2">Choose Semester</label>
                    <select name="semester" id="semester" class="tw-w-full tw-p-2 tw-border tw-border-gray-300 tw-rounded-md tw-shadow-sm focus:tw-outline-none focus:tw-ring focus:tw-border-purple-300">
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
                    <button type="submit" class="tw-bg-purple-600 tw-font-medium hover:tw-bg-purple-700 tw-duration-300 focus-within:tw-ring-2 focus-within:tw-ring-offset-2 focus-within:tw-ring-purple-500 tw-text-white tw-px-4 tw-py-2 tw-rounded-md tw-w-full">Register Subject</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
