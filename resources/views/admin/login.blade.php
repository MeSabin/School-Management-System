<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  @vite('resources/css/app.css')
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
  @if (session('A_loginError'))
    <x-alert>
      <div id="error" class="opacity-0 absolute top-5 right-5 flex items-center justify-center bg-white shadow-md border-2 border-l-4 border-red-500 text-red-500 pr-8 pl-2 py-4 rounded-sm">
        <img src="{{ asset('images/error.png') }}" alt="" class="w-6 mr-2">
        <h3>{{ session('A_loginError') }}</h3>
      </div>
    </x-alert>
  @endif
  @if (session('A_logoutMsg'))
    <x-alert>
      <div id="error" class="opacity-0 absolute top-5 right-5 flex items-center justify-center bg-white shadow-md border-2 border-l-4 border-blue-500 text-blue-500 pr-8 pl-2 py-4 rounded-sm">
        <img src="{{ asset('images/information.png') }}" alt="" class="w-6 mr-2">
        <h3>{{ session('A_logoutMsg') }}</h3>
      </div>
    </x-alert>
  @endif
  @if (session('A_successResetPass'))
    <x-alert>
      <div id="error" class="opacity-0 absolute top-5 right-5 flex items-center justify-center bg-white shadow-md border-2 border-l-4 border-green-600 text-green-600 pr-8 pl-2 py-4 rounded-sm">
        <img src="{{ asset('images/accept.png') }}" alt="" class="w-6 mr-2">
        <h3>{{ session('A_successResetPass') }}</h3>
      </div>
    </x-alert>
  @endif
  <img src="{{ asset('images/signup.svg') }}" alt="" class="w-6/12 h-[400px]">
  <div class="bg-white px-5 pb-5 pt-2 rounded-xl shadow-custom ">
    <h2 class="text-xl text-center font-bold mb-3 text-purple-600">Login as Admin</h2>
    <form action="{{ route('checkAdminLogin')}}" method="post">
      @csrf
      <div class="mb-3 " >
        <label class="block text-gray-700 text-sm font-medium">Email</label>
        <input
          type="email"
          name="email"
          class="w-80 px-2 py-3 text-xs mt-1 border-gray-400 border rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-400 @error('email') border-red-500 @enderror"
          placeholder="Your email"
          @if (isset($_COOKIE['email']))  
          value="{{ $_COOKIE['email']}}"
          @endif
        />
        <span class="text-red-700 text-xs mt-1 font-medium">
          @error('email')
              {{$message}}
          @enderror
        </span>
      </div>
      <div class="">
        <label class="block text-gray-700 text-sm font-medium">Password</label>
        <div class="relative">
          <input
            type="password"
            name="password"
            id="password"
            class="w-full px-2 py-3 text-xs mt-1 border-gray-400 border rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-400 @error('password') border-red-500 @enderror"
            placeholder="Your password"
            @if (isset($_COOKIE['password']))  
            value="{{ $_COOKIE['password']}}"
            @endif
          />
          
          <img src="{{ asset('images/close_eye.png') }}" alt="Icon" id="eyeIcon" class="cursor-pointer absolute right-3 top-[40%]  h-4 invert-[60%]">
        </div>
        <span class="text-red-700 text-xs mt-1 font-medium">
          @error('password')
              {{$message}}
          @enderror
        </span>
        <div class="flex items-center justify-between mt-5 mb-5">
          <div class="flex items-center">
            <input name="remember" class="cursor-pointer" type="checkbox" id="rememberMe">
            <label class="ml-1 text-sm text-gray-700 cursor-pointer" for="rememberMe">Remember Me</label>
          </div>
          <div class="flex justify-between ">
            <a href="{{route('adminForgotPass')}}" class="text-sm text-purple-500 hover:underline inline-block" >Forgot password?</a>
          </div>
      </div>
      <button
        type="submit"
        class="w-full py-2 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-500 duration-200"
      >
        Login
      </button>
    </form>
  </div>
  <script src="{{ asset('js/showLoginPassword.js')}}"></script>
</body> 
</html>