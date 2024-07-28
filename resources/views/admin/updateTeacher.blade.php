@extends('admin.adminLayout')
@section('pageName')
    Update Teacher Details
@endsection
@section('content')
  <div class="bg-white px-5 pb-5 pt-2 rounded-xl shadow-custom w-[430px]">
    <h2 class="text-xl text-center font-bold mb-3 text-purple-600">Register Tutor</h2>
<form id ="teacherUpdate" action="{{ route('teachers.update', $teacher->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-2">
      <label class="block text-gray-700 text-sm font-medium">Full Name</label>
      <input
        type="text"
        name="fullName"
        id="name"
        class="w-full px-2 py-2 text-xs border-gray-400 border rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-400 @error('fullName') border-red-500 @enderror" 
        placeholder="Your full name"
        value="{{$teacher->name}}"
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
        value="{{$teacher->phone}}"
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
        value="{{$teacher->email}}"
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
        <option value="Computer Science" {{ $teacher->role == 'Computer Science' ? 'selected' : '' }}>Computer Science</option>
        <option value="BIBM" {{ $teacher->role == 'BIBM' ? 'selected' : '' }}>BIBM</option>
        <option value="Software Engineering" {{ $teacher->role == 'Software Engineering' ? 'selected' : '' }}>Software Engineering</option>
    </select>
    
      <span class="text-red-700 text-xs font-medium">
        @error('role')
            {{$message}}
        @enderror
      </span>
    </div>
    <img src="{{asset('uploads/'.$teacher->image)}}" alt="" class="w-20 rounded-full border" id="showImage">
    <div class="mb-2">
      <label class="block text-gray-700 text-sm font-medium">Profile Picture</label>
      <input
          type="file"
          name="image"
          id="image"
          onchange="document.querySelector('#showImage').src=window.URL.createObjectURL(this.files[0])"
          class="w-full px-2 py-2 text-xs border-gray-400 border rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-400 @error('profile_picture') border-red-500 @enderror"
      />
      <span class="text-red-700 text-xs font-medium">
          @error('image')
              {{ $message }}
          @enderror
      </span>
  </div>
    <button
      type="submit"
      class="w-full py-1 mt-3 bg-purple-600 text-white rounded-lg hover:bg-purple-500 duration-200"
    >
      Update
    </button>
  </form>
</div>
@endsection