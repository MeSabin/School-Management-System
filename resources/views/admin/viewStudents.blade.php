@extends('admin.adminLayout')

@section('pageName')
    List of Students
@endsection

@section('content')
    {{-- CDN link for Tippy.js for tooltip --}}
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
     {{-- CDN path for delete modal popup --}}
     <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />

    @if (session('addStudent'))
    <x-alert>
      <div id="error" class="tw-opacity-0 tw-z-50 tw-absolute tw-top-5 tw-right-5 tw-flex tw-items-center tw-justify-center tw-bg-white tw-shadow-md tw-border-2 tw-border-l-4 tw-border-green-500 tw-text-green-500 tw-pr-8 tw-pl-2 tw-py-4 tw-rounded-sm">
        <img src="{{ asset('images/accept.png') }}" alt="" class="tw-w-6 tw-mr-2">
        <h3>{{ session('addStudent') }}</h3>
      </div>
    </x-alert>
    @endif

    @if (session('updateStudent'))
    <x-alert>
      <div id="error" class="tw-opacity-0 tw-z-50 tw-absolute tw-top-5 tw-right-5 tw-flex tw-items-center tw-justify-center tw-bg-white tw-shadow-md tw-border-2 tw-border-l-4 tw-border-green-500 tw-text-green-500 tw-pr-8 tw-pl-2 tw-py-4 tw-rounded-sm">
        <img src="{{ asset('images/accept.png') }}" alt="" class="tw-w-6 tw-mr-2">
        <h3>{{ session('updateStudent') }}</h3>
      </div>
    </x-alert>
    @endif

    @if (session('delStudent'))
    <x-alert>
      <div id="error" class="tw-opacity-0 tw-z-50 tw-absolute tw-top-5 tw-right-5 tw-flex tw-items-center tw-justify-center tw-bg-white tw-shadow-md tw-border-2 tw-border-l-4 tw-border-green-500 tw-text-green-500 tw-pr-8 tw-pl-2 tw-py-4 tw-rounded-sm">
        <img src="{{ asset('images/accept.png') }}" alt="" class="tw-w-6 tw-mr-2">
        <h3>{{ session('delStudent') }}</h3>
      </div>
    </x-alert>
    @endif

    @if (session('bulkSuccess'))
    <x-alert>
      <div id="error" class="tw-opacity-0 tw-z-50 tw-absolute tw-top-5 tw-right-5 tw-flex tw-items-center tw-justify-center tw-bg-white tw-shadow-md tw-border-2 tw-border-l-4 tw-border-green-500 tw-text-green-500 tw-pr-8 tw-pl-2 tw-py-4 tw-rounded-sm">
        <img src="{{ asset('images/accept.png') }}" alt="" class="tw-w-6 tw-mr-2">
        <h3>{{ session('bulkSuccess') }}</h3>
      </div>
    </x-alert>
    @endif

    <div class="tw-mt-44">
        <a href="{{ route('students.create') }}" class="tw-bg-purple-600  hover:tw-bg-purple-700 tw-duration-200 focus-within:tw-ring-2 focus-within:tw-ring-offset-2 focus-within:tw-ring-purple-500 tw-text-white tw-text-md tw-font-medium tw-rounded-md tw-px-8 tw-py-2">+ Register</a>
        <div class="tw-bg-white tw-px-2 tw-pt-4 tw-pb-2 tw-rounded-lg tw-mt-6"> 
          <h2 class="tw-text-xl tw-font-bold tw-text-gray-600 tw-mb-4">All Students Data</h2>
          <div id="tableContainer" class="tw-overflow-x-auto">
          </div>
          <table class="tw-min-w-full tw-bg-white tw-border tw-rounded-lg tw-overflow-hidden">
            <thead class="tw-bg-purple-600 tw-text-white">
                <tr class="tw-border">
                    <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-sm tw-text-start">Roll</th>
                    <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-sm tw-text-start">Name</th>
                    <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-sm tw-text-start">Semester</th>
                    <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-sm tw-text-start">Group</th>
                    <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-sm tw-text-start">Phone</th>
                    <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-sm tw-text-start">Email</th>
                    <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-sm tw-text-start">Date of Birth</th>
                    <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-sm tw-text-start">Action</th>
                </tr> 
            </thead>
            <tbody>
            @foreach ($students as $student)
                <tr class="hover:tw-bg-gray-100 tw-border tw-duration-200">
                  <td class="tw-py-2 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{ $student->roll }}.</td>
                  <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{ $student->name }}</td>
                  <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{ $student->semester }}</td>
                  <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{ $student->group }}</td>
                  <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{ $student->phone }}</td>
                  <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{ $student->email }}</td>
                  <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{ $student->dob }}</td>
                  <td class="tw-py-1 tw-px-4">
                    <div class="tw-flex">
                      <a href="{{ route('students.edit', $student->id) }}" class="edit">
                        <span class="material-symbols-outlined tw-text-gray-500 tw-hover:text-gray-800 tw-duration-500 tw-mr-4">
                          edit_square
                        </span>
                      </a>
                      <button data-modal-target="popup-modal-{{$student->id}}" class="delete" data-modal-toggle="popup-modal-{{$student->id}}">
                        <span class="material-symbols-outlined tw-text-red-400 hover:tw-text-red-700 duration-500">
                          delete
                        </span>
                      </button>
                      @php
                          $id =$student->id;
                      @endphp
                      <x-delete-modal type='students.destroy' :id="$id"/>
                    </div>
                  </td>
                </tr>
            @endforeach
            </tbody>
          </table>
          <div class="tw-flex tw-justify-end tw-mt-4">
            <p class="">{{ $students->links() }}</p>
          </div>
        </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function(){
        tippy('.edit', {
          content: "Edit",
          placement: 'top',
        });
        tippy('.delete', {
          content: "Delete",
          placement: 'top'
        });
      });
    </script>
@endsection
