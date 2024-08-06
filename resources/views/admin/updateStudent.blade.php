@extends('admin.adminLayout')

@section('pageName')
    Register New Student
@endsection

@section('content')
  <div class="tw-bg-white tw-px-5 tw-pb-5 tw-pt-2 tw-rounded-xl tw-shadow-custom tw-w-full tw-mt-44">
    <h2 class="tw-text-xl tw-text-center tw-font-bold tw-mb-3 tw-text-purple-600">Register Student</h2>
    <form action="{{ route('students.update', $student->id) }}" method="post">
      @csrf
      @method('PUT')
      <div class="tw-flex tw-gap-10">
        <div class="tw-w-full">
          <div class="tw-mb-6">
            <label class="tw-block tw-text-gray-600 tw-text-sm tw-font-medium">Full Name</label>
            <input
              type="text"
              name="fullName"
              id="name"
              class="tw-w-full tw-px-2 tw-py-3 tw-text-xs tw-border-gray-400 tw-border tw-rounded-md focus:tw-outline-none focus:tw-ring-1 focus:tw-ring-purple-400 @error('fullName') tw-border-red-500 @enderror"
              placeholder="Your full name"
              value="{{$student->name}}"
            />
            <span class="tw-text-red-700 tw-text-xs tw-mt-1 tw-font-medium">
              @error('fullName')
                {{$message}}
              @enderror
            </span>
          </div>
          <div class="tw-mb-6">
            <label class="tw-block tw-text-gray-600 tw-text-sm tw-font-medium">Roll Number</label>
            <input
              type="number"
              name="roll"
              id="roll"
              class="tw-w-full tw-px-2 tw-py-3 tw-text-xs tw-border-gray-400 tw-border tw-rounded-md focus:tw-outline-none focus:tw-ring-1 focus:tw-ring-purple-400 @error('roll') tw-border-red-500 @enderror"
              placeholder="Student roll number"
              value="{{$student->roll}}"
            />
            <span class="tw-text-red-700 tw-text-xs tw-mt-1 tw-font-medium">
              @error('roll')
                {{$message}}
              @enderror
            </span>
          </div>
          <div class="tw-mb-6">
            <label class="tw-block tw-text-gray-600 tw-text-sm tw-font-medium">Semester</label>
            <select name="semester" id="semester" class="tw-w-full tw-p-2 tw-py-2.5 tw-text-sm tw-border tw-border-gray-400 tw-rounded-md tw-shadow-sm focus:tw-outline-none focus:tw-ring focus:tw-border-purple-300">
              <option value="Semester 1" {{ $student->semester == 'Semester 1' ? 'selected' : '' }}>Semester 1</option>
              <option value="Semester 2" {{ $student->semester == 'Semester 2' ? 'selected' : '' }}>Semester 2</option>
              <option value="Semester 3" {{ $student->semester == 'Semester 3' ? 'selected' : '' }}>Semester 3</option>
              <option value="Semester 4" {{ $student->semester == 'Semester 4' ? 'selected' : '' }}>Semester 4</option>
              <option value="Semester 5" {{ $student->semester == 'Semester 5' ? 'selected' : '' }}>Semester 5</option>
              <option value="Semester 6" {{ $student->semester == 'Semester 6' ? 'selected' : '' }}>Semester 6</option>
              <option value="Semester 7" {{ $student->semester == 'Semester 7' ? 'selected' : '' }}>Semester 7</option>
              <option value="Semester 8" {{ $student->semester == 'Semester 8' ? 'selected' : '' }}>Semester 8</option>
            </select>
          </div>
          <div class="tw-mb-6">
            <label for="" class="tw-block tw-text-gray-600 tw-text-sm tw-font-medium">Group Name</label>
            <select name="group_name" id="group" class="tw-w-full tw-p-2 tw-py-2.5 tw-text-sm tw-border tw-border-gray-400 tw-rounded-md tw-shadow-sm focus:tw-outline-none focus:tw-ring focus:tw-border-purple-300">
              <option value={{$student->group}}>{{$student->group}}</option>
              @foreach ($group as $group)
                @if ($group == $student->group)
                    @continue
                @endif
                  <option value="{{$group}}">{{$group}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="tw-w-full">
          <div class="tw-mb-6">
            <label class="tw-block tw-text-gray-600 tw-text-sm tw-font-medium">Phone</label>
            <input
              type="tel"
              name="phone"
              id="phone"
              class="tw-w-full tw-px-2 tw-py-3 tw-text-xs tw-border-gray-400 tw-border tw-rounded-md focus:tw-outline-none focus:tw-ring-1 focus:tw-ring-purple-400 @error('phone') tw-border-red-500 @enderror"
              placeholder="Your phone number"
              value="{{$student->phone}}"
            />
            <span class="tw-text-red-700 tw-text-xs tw-font-medium">
              @error('phone')
                {{$message}}
              @enderror
            </span>
          </div>
          <div class="tw-mb-6">
            <label class="tw-block tw-text-gray-600 tw-text-sm tw-font-medium">DOB</label>
            <input
              type="date"
              name="dob"
              id="dob"
              class="tw-w-full tw-px-2 tw-py-2.5 tw-text-xs tw-border-gray-400 tw-border tw-rounded-md focus:tw-outline-none focus:tw-ring-1 focus:tw-ring-purple-400 @error('dob') tw-border-red-500 @enderror"
              placeholder="Student date of birth"
              value="{{$student->dob}}"
            />
            <span class="tw-text-red-700 tw-text-xs tw-font-medium">
              @error('dob')
                {{$message}}
              @enderror
            </span>
          </div>
          <div class="tw-mb-6">
            <label class="tw-block tw-text-gray-600 tw-text-sm tw-font-medium">Email</label>
            <input
              type="email"
              name="email"
              id="email"
              class="tw-w-full tw-px-2 tw-py-3 tw-text-xs tw-border-gray-400 tw-border tw-rounded-md focus:tw-outline-none focus:tw-ring-1 focus:tw-ring-purple-400 @error('email') tw-border-red-500 @enderror"
              placeholder="Your email"
              value="{{$student->email}}"
            />
            <span class="tw-text-red-700 tw-text-xs tw-font-medium">
              @error('email')
                {{$message}}
              @enderror
            </span>
          </div>
        </div>
      </div>
      <button
        type="submit"
        id="button"
        class="tw-py-2 tw-flex tw-justify-center tw-items-center tw-px-10 tw-mt-3 tw-font-medium tw-bg-purple-600 tw-text-white tw-rounded-md hover:tw-bg-purple-500 tw-duration-300 focus-within:tw-ring-2 focus-within:tw-ring-offset-2 focus-within:tw-ring-purple-600"
      >
      <x-button-spinner/>
        Update
      </button>
    </form>
  </div>
  <script>
    let password = document.querySelector('#password');
    let eyeIcon = document.querySelector('#eyeIcon');

    eyeIcon.onclick = function() {
      if (password.type == 'password') {
        password.type = 'text';
        eyeIcon.src = '{{asset('images/open_eye.png')}}';
      } else {
        password.type = 'password';
        eyeIcon.src = '{{asset('images/close_eye.png')}}';
      }
    }
  </script>
@endsection
