@extends('teachers.teacherLayout')
  @section('title')
      Teacher Dashboard
  @endsection
@section('content')
  @if (session('T_loginSuccess'))
  <x-alert>
    <div id="error" class="opacity-0 absolute top-5 right-5 flex items-center justify-center bg-white shadow-md border-2 border-l-4 border-green-700 text-green-700 pr-8 pl-2 py-4 rounded-sm">
      <img src="{{ asset('images/accept.png') }}" alt="" class="w-6 mr-2">
      <h3>{{ session('T_loginSuccess') }}</h3>
    </div>
  </x-alert>
  @endif
  <main class="mt-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold">Card 1</h3>
        <p class="mt-2 text-gray-600">Content for card 1.</p>
      </div>
      <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold">Card 2</h3>
        <p class="mt-2 text-gray-600">Content for card 2.</p>
      </div>
      <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold">Card 3</h3>
        <p class="mt-2 text-gray-600">Content for card 3.</p>
      </div>
    </div>
  </main>
</div>
@endsection
  