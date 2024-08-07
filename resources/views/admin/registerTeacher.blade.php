@extends('admin.adminLayout')

@section('pageName')
    Register New Teacher
@endsection

@section('content')
  <div class="tw-bg-white tw-px-5 tw-pb-5 tw-pt-2 tw-rounded-xl tw-shadow-sm tw-w-full tw-mt-56">
    <h2 class="tw-text-xl tw-text-center tw-font-bold tw-mb-6 tw-text-purple-600">Register Tutor</h2>
    <div class="tw-flex tw-flex-row tw-gap-10">
      <div class="tw-w-full">
        <form action="{{ route('teachers.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="tw-mb-6">
            <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-medium">Full Name</label>
            <input
              type="text"
              name="fullName"
              id="name"
              class="tw-w-full tw-px-2 tw-py-3 tw-text-xs tw-border-gray-400 tw-border tw-rounded-md tw-focus:outline-none tw-focus:ring-1 tw-focus:ring-purple-400 @error('fullName') tw-border-red-500 @enderror" 
              placeholder="Your full name"
              value="{{ old('fullName') }}"
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
              value="{{ old('phone') }}"
            />
            <span class="tw-text-red-700 tw-text-xs tw-font-medium">
              @error('phone')
                  {{ $message }}
              @enderror
            </span>
          </div>
          <div class="tw-mb-2">
            <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-medium">Email</label>
            <input
              type="email"
              name="email"
              id="email"
              class="tw-w-full tw-px-2 tw-py-3 tw-text-xs tw-border-gray-400 tw-border tw-rounded-md tw-focus:outline-none tw-focus:ring-1 tw-focus:ring-purple-400 @error('email') tw-border-red-500 @enderror"
              placeholder="Your email"
              value="{{ old('email') }}"
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
              <option value="Computer Science">Computer Science</option>
              <option value="BIBM">BIBM</option>
              <option value="Software Engineering">Software Engineering</option>
            </select>
            <span class="tw-text-red-700 tw-text-xs tw-font-medium">
              @error('role')
                  {{ $message }}
              @enderror
            </span>
          </div>
          <div class="tw-mb-6">
            <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-medium">Password</label>
            <div class="tw-relative">
              <input
                type="password"
                name="password"
                id="password"
                class="tw-w-full tw-px-2 tw-py-3 tw-text-xs tw-border-gray-400 tw-border tw-rounded-md tw-focus:outline-none tw-focus:ring-1 tw-focus:ring-purple-400 @error('password') tw-border-red-500 @enderror"
                placeholder="Create a new password"
                value="{{ old('password') }}"
              />
              <img src="{{ asset('images/close_eye.png') }}" alt="Icon" id="eyeIcon" class="tw-cursor-pointer tw-absolute tw-right-3 tw-top-[50%] tw-transform tw--translate-y-1/2 tw-h-4 tw-invert-[60%]">
            </div>
            <span class="tw-text-red-700 tw-text-xs tw-font-medium">
              @error('password')
                  {{ $message }}
              @enderror
            </span>
          </div> 
          <div class="tw-mb-2">
            <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-medium">Profile Picture</label>
            <input
              type="file"
              name="image"
              id="image"
              value="{{ old('image') }}"
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
        class="tw-py-2 tw-flex tw-justify-center tw-items-center tw-px-10 tw-mt-3 tw-font-medium tw-bg-purple-600 tw-text-white tw-rounded-md hover:tw-bg-purple-700 tw-duration-200 focus-within:tw-ring-2 focus-within:tw-ring-offset-2 focus-within:tw-ring-purple-500"
      >
        <x-button-spinner/>
        Register
      </button>
    </form>
  </div>
  <script>
    let password = document.querySelector('#password');
    let eyeIcon = document.querySelector('#eyeIcon');

    eyeIcon.onclick = function() {
      if (password.type == 'password') {
        password.type = 'text';
        eyeIcon.src = '{{ asset('images/open_eye.png') }}';
      } else {
        password.type = 'password';
        eyeIcon.src = '{{ asset('images/close_eye.png') }}';
      }
    }
  </script>
@endsection
