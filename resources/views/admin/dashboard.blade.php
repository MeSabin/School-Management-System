@extends('mainDashLayout')
  @section('title')
    Admin Dashboard
  @endsection
        @section('content')
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
 