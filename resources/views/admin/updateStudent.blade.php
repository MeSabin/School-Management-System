@extends('admin.adminLayout')

@section('pageName')
    Update Student
@endsection
@section('content')
  <div class="bg-white px-5 pb-5 pt-2 rounded-xl shadow-custom w-[430px] mt-20">
    <h2 class="text-xl text-center font-bold mb-3 text-purple-600">Update Student</h2>
<form action="{{ route('students.update', $student->id) }}" method="post">
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
        value="{{$student->name}}"
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
        value="{{$student->phone}}"
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
        value="{{$student->dob}}"
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
        value="{{$student->email}}"
      />
      <span class="text-red-700 text-xs font-medium">
        @error('email')
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
