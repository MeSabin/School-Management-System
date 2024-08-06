@extends('admin.adminLayout')

@section('pageName')
    Update Teacher Details
@endsection

@section('content')
  <div class="tw-bg-white tw-px-5 tw-pb-5 tw-pt-2 tw-rounded-xl tw-shadow-custom tw-w-full tw-mt-56">
    <h2 class="tw-text-xl tw-text-center tw-font-bold tw-mb-3 tw-text-purple-600">Register Tutor</h2>
    <div class="tw-flex tw-flex-row tw-gap-10">
      <div class="tw-w-full">
        <form id="teacherUpdate" action="{{ route('teachers.update', $teacher->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="tw-mb-6">
            <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-medium">Full Name</label>
            <input
              type="text"
              name="fullName"
              id="name"
              class="tw-w-full tw-px-2 tw-py-3 tw-text-xs tw-border-gray-400 tw-border tw-rounded-md tw-focus:outline-none tw-focus:ring-1 tw-focus:ring-purple-400 @error('fullName') tw-border-red-500 @enderror" 
              placeholder="Your full name"
              value="{{ $teacher->name }}"
            />
            <span class="tw-text-red-700 tw-text-xs tw-mt-1 tw-font-medium">
              @error('fullName')
                  {{ $message }}
              @enderror
            </span>
          </div>
          <div class="tw-mb-6">
            <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-medium">Phone</label>
            <input
              type="tel"
              name="phone"
              id="phone"
              class="tw-w-full tw-px-2 tw-py-3 tw-text-xs tw-border-gray-400 tw-border tw-rounded-md tw-focus:outline-none tw-focus:ring-1 tw-focus:ring-purple-400 @error('phone') tw-border-red-500 @enderror"
              placeholder="Your phone number"
              value="{{ $teacher->phone }}"
            />
            <span class="tw-text-red-700 tw-text-xs tw-font-medium">
              @error('phone')
                  {{ $message }}
              @enderror
            </span>
          </div>
          <div class="tw-mb-6">
            <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-medium">Email</label>
            <input
              type="email"
              name="email"
              id="email"
              class="tw-w-full tw-px-2 tw-py-3 tw-text-xs tw-border-gray-400 tw-border tw-rounded-md tw-focus:outline-none tw-focus:ring-1 tw-focus:ring-purple-400 @error('email') tw-border-red-500 @enderror"
              placeholder="Your email"
              value="{{ $teacher->email }}"
            />
            <span class="tw-text-red-700 tw-text-xs tw-font-medium">
              @error('email')
                  {{ $message }}
              @enderror
            </span>
          </div>
        </div>
        <div class="tw-w-full">
          <div class="tw-mb-6">
            <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-medium">Role</label>
            <select name="role" id="role" class="tw-w-full tw-px-2 tw-py-3 tw-text-xs tw-border-gray-400 tw-border tw-rounded-md tw-focus:outline-none tw-focus:ring-1 tw-focus:ring-purple-400">
              <option value="Computer Science" {{ $teacher->role == 'Computer Science' ? 'selected' : '' }}>Computer Science</option>
              <option value="BIBM" {{ $teacher->role == 'BIBM' ? 'selected' : '' }}>BIBM</option>
              <option value="Software Engineering" {{ $teacher->role == 'Software Engineering' ? 'selected' : '' }}>Software Engineering</option>
            </select>
            <span class="tw-text-red-700 tw-text-xs tw-font-medium">
              @error('role')
                  {{ $message }}
              @enderror
            </span>
          </div>
          <img src="{{ asset('uploads/'.$teacher->image) }}" alt="" class="tw-w-20 tw-rounded-full tw-border tw-mb-1" id="showImage">
          <div class="tw-mb-6">
            <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-medium">Profile Picture</label>
            <input
              type="file"
              name="image"
              id="image"
              onchange="document.querySelector('#showImage').src=window.URL.createObjectURL(this.files[0])"
              class="tw-w-full tw-px-2 tw-py-2.5 tw-text-xs tw-border-gray-400 tw-border tw-rounded-md tw-focus:outline-none tw-focus:ring-1 tw-focus:ring-purple-400 @error('image') tw-border-red-500 @enderror"
            />
            <span class="tw-text-red-700 tw-text-xs tw-font-medium">
              @error('image')
                  {{ $message }}
              @enderror
            </span>
          </div>
        </div>
      </div>
      <button
        type="submit"
        id="button"
        class="tw-py-2 tw-flex tw-justify-center tw-items-center tw-px-10 tw-mt-3 tw-bg-purple-600 tw-font-medium tw-text-white tw-rounded-md  hover:tw-bg-purple-500 tw-duration-200 focus-within:tw-ring-2 focus-within:tw-ring-offset-2 focus-within:tw-ring-purple-500"
      >
      <x-button-spinner/>
        Update
      </button>
    </form>
  </div>
@endsection
