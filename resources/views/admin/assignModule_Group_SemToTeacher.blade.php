@extends('admin.adminLayout')

@section('pageName')
    Assign Module and Class
@endsection

@section('content')
<div class="mainContainer tw-flex tw-flex-row tw-justify-evenly tw-mt-44 ">
    <img src="{{ asset('images/signup.svg') }}" alt="" class="tw-w-6/12 tw-h-[390px] tw-mt-10">
 {{-- Module/Subjects registration --}}
<div class="tw-rounded-lg tw-bg-white tw-shadow-custom tw-w-2/6 tw-h-[90%]">
    <div class="tw-container tw-mx-auto tw-p-6 tw-pb-6">
        <h1 class="tw-text-xl tw-text-gray-600 tw-font-bold tw-mb-3 tw-text-center">Assign Modules</h1>
        <form action="{{route('assignModuleTeacher.store')}}" method="POST" class="tw-rounded">
            @csrf
            <div class="tw-mb-4">
                <label for="" class="tw-block tw-text-gray-600 tw-font-bold tw-mb-2">Teacher Name</label>
                <select name="teacher_name" id="teacher" class="tw-w-full tw-p-2 tw-text-sm tw-border tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:outline-none tw-focus:ring tw-focus:border-purple-300">
                     @foreach ($teachers as $teacher)
                     <option value="{{$teacher}}"> {{$teacher}}</option>
                     @endforeach
                </select>
            </div>
            <div class="tw-mb-6">
               <label for="semester" class="tw-block tw-text-gray-600 tw-font-bold tw-mb-2">Choose Semester</label>
               <select name="semester" id="semester" name="semester" class="tw-w-full tw-p-2 tw-text-sm tw-border tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:outline-none tw-focus:ring tw-focus:border-purple-300">
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
                <label for="" class="tw-block tw-text-gray-600 tw-font-bold tw-mb-2">Module Name</label>
                <select name="module_name" id="module" class="tw-w-full tw-p-2 tw-text-sm tw-border tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:outline-none tw-focus:ring tw-focus:border-purple-300">
                  @foreach ($modules as $module)
                  <option value="{{$module}}"> {{$module}}</option>
                  @endforeach
             </select>
            </div>
            <div class="tw-mb-4">
               <label for="" class="tw-block tw-text-gray-600 tw-font-bold tw-mb-2">Group Name</label>
               <select name="group_name" id="group" class="tw-w-full tw-p-2 tw-text-sm tw-border tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:outline-none tw-focus:ring tw-focus:border-purple-300">
                  @foreach ($groups as $group)
                  <option value="{{$group}}"> {{$group}}</option>
                  @endforeach
             </select>
           </div>
            <div class="">
                <button type="submit" class="tw-bg-purple-600 tw-font-medium hover:tw-bg-purple-700 tw-duration-300 focus-within:tw-ring-2 focus-within:tw-ring-offset-2 focus-within:tw-ring-purple-500 tw-text-white tw-px-4 tw-w-full tw-py-2 tw-rounded-md">Register Subject</button>
            </div>
        </form>
    </div>
</div>

</div>
@endsection
