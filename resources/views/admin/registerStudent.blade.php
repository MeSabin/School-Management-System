@extends('admin.adminLayout')

@section('pageName')
    Register New Student
@endsection
@section('content')
  <div class="bg-white px-5 pb-5 pt-2 rounded-xl shadow-custom w-[430px] mt-20">
    <h2 class="text-xl text-center font-bold mb-3 text-purple-600">Register Student</h2>
<form action="{{ route('students.store') }}" method="post">
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
      <label class="block text-gray-700 text-sm font-medium">Roll Number</label>
      <input
        type="number"
        name="roll"
        id="roll"
        class="w-full px-2 py-2 text-xs border-gray-400 border rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-400 @error('roll') border-red-500 @enderror" 
        placeholder="Student roll number"
        value="{{old('roll')}}"
      />
      <span class="text-red-700 text-xs mt-1 font-medium">
        @error('roll')
            {{$message}}
        @enderror
      </span>
    </div>
    <div class="mb-2">
      <label class="block text-gray-700 text-sm font-medium">Semester</label>
      <select name="semester" id="semester" name="semester" class=" w-full p-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-purple-300">
        <option value="Semester 1">Semester 1</option>
        <option value="Semester 2">Semester 2</option>
        <option value="Semester 3">Semester 3</option>
        <option value="Semester 4">Semester 4</option>
        <option value="Semester 5">Semester 5</option>
        <option value="Semester 6">Semester 6</option>
        <option value="Semester 7">Semester 7</option>
        <option value="Semester 8">Semester 8</option>
      </select>
    </div>
    <div class="mb-2">
      <div class="mb-4">
        <label for="" class="block text-gray-600 font-bold mb-2">Group Name</label>
        <select name="group_name" id="group" class=" w-full p-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-purple-300">
           @foreach ($groups as $group)
           <option value="{{$group}}"> {{$group}}</option>
           @endforeach
      </select>
    </div>
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
      <label class="block text-gray-700 text-sm font-medium">DOB</label>
      <input
        type="date"
        name="dob"
        id="dob"
        class="w-full px-2 py-2 text-xs border-gray-400 border rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-400 @error('phone') border-red-500 @enderror"
        placeholder="Student date of birth"
        value="{{old('dob')}}"
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
        type="email"
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
        <img src="{{ asset('images/close_eye.png') }}" alt="Icon" id="eyeIcon" class="cursor-pointer absolute right-3 top-[50%] transform -translate-y-1/2 h-4 invert-[60%]">
        </span>
      </div>
      <span class="text-red-700 text-xs font-medium">
        @error('password')
            {{$message}}
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
<script>
    let password =document.querySelector('#password');
    let eyeIcon = document.querySelector('#eyeIcon');

  eyeIcon.onclick =function(){
    if(password.type =='password'){
        password.type ='text';
        eyeIcon.src = '{{asset('images/open_eye.png')}}';
    }
    else{
        password.type ='password';
        eyeIcon.src = '{{asset('images/close_eye.png')}}';
    }
  }
</script>
@endsection
