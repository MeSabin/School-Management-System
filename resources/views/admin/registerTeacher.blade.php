@extends('admin.adminLayout')

@section('content')
@if (session('registerTeacher'))
    <h2>{{session('registerTeacher')}}</h2>
@endif
  <div class="bg-white px-5 pb-5 pt-2 rounded-xl shadow-custom w-[430px] mt-20">
    <h2 class="text-xl text-center font-bold mb-3 text-purple-600">Register Tutor</h2>
<form action="{{ route('teachers.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-2">
      <label class="block text-gray-700 text-sm font-medium">Full Name</label>
      <input
        type="text"
        name="fullName"
        id="name"
        class="w-full px-2 py-2 text-xs border-gray-400 border rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-400 @error('fullName') border-red-500 @enderror" 
        placeholder="Your full name"
        value="{{old('fullName')}}"
      />
      <span class="text-red-700 text-xs mt-1 font-medium">
        @error('fullName')
            {{$message}}
        @enderror
      </span>
    </div>
    <div class="mb-2">
      <label class="block text-gray-700 text-sm font-medium">Phone</label>
      <input
        type="tel"
        name="phone"
        id="phone"
        class="w-full px-2 py-2 text-xs border-gray-400 border rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-400 @error('phone') border-red-500 @enderror"
        placeholder="Your phone number"
        value="{{old('phone')}}"
      />
      <span class="text-red-700 text-xs font-medium">
        @error('phone')
            {{$message}}
        @enderror
      </span>
    </div>
    <div class="mb-2">
      <label class="block text-gray-700 text-sm font-medium">Email</label>
      <input
        type=""
        name="email"
        id="email"
        class="w-full px-2 py-2 text-xs border-gray-400 border rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-400 @error('fullName') border-red-500 @enderror"
        placeholder="Your email"
        value="{{old('email')}}"
      />
      <span class="text-red-700 text-xs font-medium">
        @error('email')
            {{$message}}
        @enderror
      </span>
    </div>
    <div class="mb-2">
      <label class="block text-gray-700 text-sm font-medium">Role</label>
      <select name="role" id="role" class="w-full px-2 py-2 text-xs border-gray-400 border rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-400">
        <option value="Computer Scinece">Computer Science</option>
        <option value="BIBM">BIBM</option>
        <option value="Software Engineering">Software Engineering</option>
      </select>
      <span class="text-red-700 text-xs font-medium">
        @error('role')
            {{$message}}
        @enderror
      </span>
    </div>
    <div class="mb-2">
      <label class="block text-gray-700 text-sm font-medium">Password</label>
      <div class="relative">
        <input
          type="password"
          name="password"
          id="password"
          class="w-full px-2 py-2 text-xs border-gray-400 border rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-400 @error('password') border-red-500 @enderror"
          placeholder="Create a new password"
          value="{{old('password')}}"
        />
        <img src="{{ asset('images/close_eye.png') }}" alt="Icon" class="cursor-pointer absolute right-3 top-[50%] transform -translate-y-1/2 h-4 invert-[60%]">
        </span>
      </div>
      <span class="text-red-700 text-xs font-medium">
        @error('password')
            {{$message}}
        @enderror
      </span>
    </div> 
    <div class="mb-2">
      <label class="block text-gray-700 text-sm font-medium">Profile Picture</label>
      <input
          type="file"
          name="image"
          id="image"
          class="w-full px-2 py-2 text-xs border-gray-400 border rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-400 @error('profile_picture') border-red-500 @enderror"
      />
      <span class="text-red-700 text-xs font-medium">
          @error('profile_picture')
              {{ $message }}
          @enderror
      </span>
  </div>
    <button
      type="submit"
      class="w-full py-1 mt-3 bg-purple-600 text-white rounded-lg hover:bg-purple-500 duration-200"
    >
      Register
    </button>
  </form>
</div>
@endsection