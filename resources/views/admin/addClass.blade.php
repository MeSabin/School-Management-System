@extends('admin.adminLayout')

@section('pageName')
    Add Classes
@endsection

@section('content')
<div class="tw-mt-48 tw-flex tw-flex-row tw-justify-start">
   <img src="{{ asset('images/signup.svg') }}" alt="" class="tw-w-6/12 tw-h-[370px]">
    <div class="tw-bg-white tw-p-6 tw-pt-4 tw-pb-0 tw-mt-8 tw-rounded-lg tw-shadow-custom tw-w-2/6 tw-h-[100%]">
        <h2 class="tw-text-2xl tw-font-bold tw-text-gray-700 tw-mb-6 tw-text-center">Add Class</h2>
        <form action="{{route('storeClassDetails')}}" method="POST">
            @csrf
            <div class="tw-mb-4">
                <label for="semester" class="tw-block tw-text-gray-600 tw-font-bold tw-mb-2">Choose Semester</label>
                <select name="semester" id="semester" class="tw-block tw-w-full tw-text-sm tw-px-3 tw-py-2 tw-border tw-rounded-md tw-text-gray-600 tw-focus:outline-none tw-focus:ring tw-focus:border-blue-300">
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
                    <span class="tw-text-red-500 tw-text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="tw-mb-6">
                <label for="" class="tw-block tw-text-gray-600 tw-font-bold tw-mb-2">Group Name</label>
                <input type="text" name="group_name" id="group" class="tw-block tw-text-sm tw-w-full tw-px-3 tw-py-2 tw-border tw-rounded-md tw-text-gray-600 tw-focus:outline-none tw-focus:ring tw-focus:border-blue-300 @error('group_name') tw-border-red-500 @enderror" value="{{ old('group_name') }}" placeholder="Group/Section name">
                @error('group_name')
                    <span class="tw-text-red-700 tw-text-xs tw-font-medium">{{ $message }}</span>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="tw-bg-purple-600 tw-w-full tw-font-medium hover:tw-bg-purple-700 tw-duration-300 focus-within:tw-ring-2 focus-within:tw-ring-offset-2 focus-within:tw-ring-purple-500 tw-mb-6 tw-text-white tw-py-2 tw-px-4 tw-rounded-md">
                    Add Class
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
