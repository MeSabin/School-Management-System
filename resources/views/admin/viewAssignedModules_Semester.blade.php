@extends('admin.adminLayout')

@section('pageName')
    View assigned module
@endsection

@section('content')
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
<script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
{{-- CDN path for delete modal popup --}}
<link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />

@if (session('subject'))
<x-alert>
  <div id="error" class="tw-opacity-0 tw-absolute tw-top-5 tw-right-5 tw-flex tw-items-center tw-justify-center tw-bg-white tw-shadow-md tw-border-2 tw-border-l-4 tw-border-green-600 tw-text-green-600 tw-pr-8 tw-pl-2 tw-py-4 tw-rounded-sm">
    <img src="{{ asset('images/accept.png') }}" alt="" class="tw-w-6 tw-mr-2">
    <h3>{{ session('subject') }}</h3>
  </div>
</x-alert>
@endif

@if (session('subjectDetails'))
<x-alert>
  <div id="error" class="tw-opacity-0 tw-absolute tw-top-5 tw-right-5 tw-flex tw-items-center tw-justify-center tw-bg-white tw-shadow-md tw-border-2 tw-border-l-4 tw-border-green-600 tw-text-green-600 tw-pr-8 tw-pl-2 tw-py-4 tw-rounded-sm">
    <img src="{{ asset('images/accept.png') }}" alt="" class="tw-w-6 tw-mr-2">
    <h3>{{ session('subjectDetails') }}</h3>
  </div>
</x-alert>
@endif

@if (session('deleteSubject'))
<x-alert>
  <div id="error" class="tw-opacity-0 tw-absolute tw-top-5 tw-right-5 tw-flex tw-items-center tw-justify-center tw-bg-white tw-shadow-md tw-border-2 tw-border-l-4 tw-border-red-500 tw-text-red-500 tw-pr-8 tw-pl-2 tw-py-4 tw-rounded-sm">
    <img src="{{ asset('images/error.png') }}" alt="" class="tw-w-6 tw-mr-2">
    <h3>{{ session('deleteSubject') }}</h3>
  </div>
</x-alert>
@endif

<div class="tw-mt-56">
  <a href="{{ route('subjects.create') }}" class="tw-bg-purple-600 hover:tw-bg-purple-700 duration-300 focus-within:tw-ring-2 focus-within:tw-ring-offset-2 focus-within:tw-ring-purple-500 tw-text-white tw-text-md tw-font-medium tw-rounded-md tw-px-3 tw-py-2 tw-mb-10">+ Assign Subject</a>
  
  <div class="tw-bg-white tw-px-2 tw-mt-10 tw-pb-2 tw-rounded-lg">
    <h2 class="tw-text-xl tw-font-bold tw-text-gray-600 tw-mb-4">All Subjects Data</h2>
    
    <div id="tableContainer" class="tw-overflow-x-auto">
    </div>
    
    <table class="tw-w-full tw-bg-white tw-border">
      <thead class="tw-bg-purple-600 tw-text-white">
        <tr class="tw-border">
          <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">ID</th>
          <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">Module Name</th>
          <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">Module Code</th>
          <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">Semester</th>
          <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">Action</th>
        </tr> 
      </thead>
      <tbody>
        @foreach ($subjects as $subject)
          <tr class="hover:tw-bg-gray-100 tw-border duration-200">
            <td class="tw-py-2 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{$subject->id}}.</td>
            <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{$subject->name}}</td>
            <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{$subject->code}}</td>
            <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{$subject->semester}}</td>
            <td class="tw-py-1 tw-px-4">
              <div class="tw-flex">
                <a href="{{ route('subjects.edit', $subject->id) }}" class="tw-edit" id="edit-{{$subject->id}}">
                  <span class="material-symbols-outlined tw-text-gray-500 hover:tw-text-gray-800 duration-500 tw-mr-4">
                    edit_square
                  </span>
                </a>
                <button data-modal-target="popup-modal-{{$subject->id}}" class="tw-delete" data-modal-toggle="popup-modal-{{$subject->id}}">
                  <span class="material-symbols-outlined tw-text-red-400 hover:tw-text-red-700 duration-500">
                    delete
                  </span>
                </button>
                @php
                    $id =$subject->id;
                @endphp
                <x-delete-modal type='subjects.destroy' :id="$id"/>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    
    <div>
      {{$subjects->links()}}
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
