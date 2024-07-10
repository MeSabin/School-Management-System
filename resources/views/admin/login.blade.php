<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  @vite('resources/css/app.css')
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
  <img src="{{ asset('images/signup.svg') }}" alt="" class="w-6/12 h-[400px]">
  <div class="bg-white px-3 pb-3 pt-1 rounded-xl shadow-md w-[330px]">
    <h2 class="text-xl text-center font-medium mb-3 text-purple-600">Login to Tutor</h2>
    @if(Session::has('error'))
      {{Session::get('error')}}
    @endif
    <form action="{{ route('adminLogin')}}" method="post">
      @csrf
      <div class="mb-3 " >
        <label class="block text-gray-700 text-sm font-medium">Email:</label>
        <input
          type="email"
          name="email"
          class="w-full px-2 py-2 text-xs border-gray-400 border rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-400 @error('email') border-red-500 @enderror"
          placeholder="Your email"
          value="{{ old('email') }}"
        />
        <span class="text-red-700 text-xs mt-1 font-medium">
          @error('email')
              {{$message}}
          @enderror
        </span>
      </div>
      <div class="mb-3">
        <label class="block text-gray-700 text-sm font-medium">Password:</label>
        <div class="relative">
          <input
            type="password"
            name="password"
            class="w-full px-2 py-2 text-xs border-gray-400 border rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-400 @error('password') border-red-500 @enderror"
            placeholder="Your password"
            value="{{ old('password') }}"
          />
          
          <img src="{{ asset('images/close_eye.png') }}" alt="Icon" class="cursor-pointer absolute right-3 top-[50%] transform -translate-y-1/2 h-4 invert-[60%]">
        </div>
        <span class="text-red-700 text-xs mt-1 font-medium">
          @error('password')
              {{$message}}
          @enderror
        </span>
      </div>
      <div class="flex items-center">
        <input class="cursor-pointer" type="checkbox" id="rememberMe">
        <label class="ml-1 text-sm text-gray-700 cursor-pointer" for="rememberMe">Remember Me</label>
      </div>
      <div class="flex justify-between mt-4">
        <a href="#" class="text-xs text-purple-500 hover:underline inline-block" >Forgot your password?</a>
      </div>
      <button
        type="submit"
        class="w-full py-1 mt-3 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-500 duration-200"
      >
        Login
      </button>
    </form>
  </div>
</body> 
</html>
