@extends('students.studentLayout')
  @section('title')
      Student Dashboard
  @endsection
  @section('pageName')
  Student Dashboard
@endsection
@section('content')
@if (session('S_loginSuccess'))
<x-alert>
  <div id="error" class="tw-opacity-0 tw-z-50 tw-absolute tw-top-5 tw-right-5 tw-flex tw-items-center tw-justify-center tw-bg-white tw-shadow-md tw-border-2 tw-border-l-4 tw-border-green-600 tw-text-green-600 tw-pr-8 tw-pl-2 tw-py-4 tw-rounded-sm">
    <img src="{{ asset('images/accept.png') }}" alt="" class="tw-w-6 tw-mr-2">
    <h3>{{ session('S_loginSuccess') }}</h3>
  </div>
</x-alert>
@endif

<main class="tw-mt-6">
  <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 lg:tw-grid-cols-4 tw-gap-6">
    <div class="tw-bg-green-100 tw-p-6 tw-rounded-lg tw-shadow-md tw-flex tw-justify-between tw-items-center">
      <div>
        <h3 class="tw-text-lg tw-text-gray-500 tw-font-semibold">Teachers</h3>
        <h1 class="tw-mt-2 tw-text-xl tw-font-semibold tw-text-gray-600">10</h1>
      </div>
      <img src="{{asset('images/teacher.png')}}" alt="" class="tw-w-14 tw-h-14">
    </div>
    <div class="tw-bg-blue-100 tw-p-6 tw-rounded-lg tw-shadow-md tw-flex tw-justify-between tw-items-center">
      <div>
        <h3 class="tw-text-lg tw-text-gray-500 tw-font-semibold">Students</h3>
        <p class="tw-mt-2 tw-text-xl tw-font-semibold tw-text-gray-600">18</p>
      </div>
      <img src="{{asset('images/students.png')}}" alt="" class="tw-w-14 tw-h-14">
    </div>
    <div class="tw-bg-purple-100 tw-p-6 tw-rounded-lg tw-shadow-md tw-flex tw-justify-between tw-items-center">
      <div>
        <h3 class="tw-text-lg tw-text-gray-500 tw-font-semibold">Modules</h3>
        <p class="tw-mt-2 tw-text-xl tw-font-semibold tw-text-gray-600">6</p>
    </div>
    <img src="{{asset('images/books.png')}}" alt="" class="tw-w-14 tw-h-14">
  </div>
    <div class="tw-bg-yellow-100 tw-p-6 tw-rounded-lg tw-shadow-md">
      <h3 class="tw-text-lg tw-text-gray-500 tw-font-semibold">Card 4</h3>
      <p class="tw-mt-2 tw-text-gray-600">Content for card 4.</p>
    </div>
  </div>
</main>
@endsection
  