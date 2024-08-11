<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  @vite('resources/css/app.css')
</head>
<body class="tw-flex tw-items-center tw-justify-center tw-min-h-screen tw-bg-gray-100">
  @if (session('S_loginError'))
    <x-alert>
      <div id="error" class="tw-opacity-0 tw-absolute tw-top-5 tw-right-5 tw-flex tw-items-center tw-justify-center tw-bg-white tw-shadow-md tw-border-2 tw-border-l-4 tw-border-red-500 tw-text-red-500 tw-pr-8 tw-pl-2 tw-py-4 tw-rounded-sm">
        <img src="{{ asset('images/error.png') }}" alt="" class="tw-w-6 tw-mr-2">
        <h3>{{ session('S_loginError') }}</h3>
      </div>
    </x-alert>
  @endif
  @if (session('S_logoutMsg'))
    <x-alert>
      <div id="error" class="tw-opacity-0 tw-absolute tw-top-5 tw-right-5 tw-flex tw-items-center tw-justify-center tw-bg-white tw-shadow-md tw-border-2 tw-border-l-4 tw-border-blue-500 tw-text-blue-500 tw-pr-8 tw-pl-2 tw-py-4 tw-rounded-sm">
        <img src="{{ asset('images/information.png') }}" alt="" class="tw-w-6 tw-mr-2">
        <h3>{{ session('S_logoutMsg') }}</h3>
      </div>
    </x-alert>
  @endif
  @if (session('S_successResetPass'))
    <x-alert>
      <div id="error" class="tw-opacity-0 tw-absolute tw-top-5 tw-right-5 tw-flex tw-items-center tw-justify-center tw-bg-white tw-shadow-md tw-border-2 tw-border-l-4 tw-border-green-600 tw-text-green-600 tw-pr-8 tw-pl-2 tw-py-4 tw-rounded-sm">
        <img src="{{ asset('images/accept.png') }}" alt="" class="tw-w-6 tw-mr-2">
        <h3>{{ session('s_successResetPass') }}</h3>
      </div>
    </x-alert>
  @endif
  <img src="{{ asset('images/signup.svg') }}" alt="" class="tw-w-6/12 tw-h-[400px]">
  <div class="tw-bg-white tw-px-5 tw-pb-5 tw-pt-2 tw-rounded-xl tw-shadow-custom ">
    <h2 class="tw-text-xl tw-text-center tw-font-bold tw-mb-3 tw-text-purple-600">Login as Student</h2>
    <form action="{{route('checkStudentLogin')}}" method="post">
      @csrf
      <div class="tw-mb-3">
        <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-medium">Email</label>
        <input
          type="email"
          name="email"
          class="tw-w-80 tw-px-2 tw-py-3 tw-block tw-text-xs tw-mt-1 tw-border-gray-400 tw-border tw-rounded-lg tw-focus:outline-none tw-focus:ring-1 tw-focus:ring-purple-400 @error('email') tw-border-red-500 @enderror"
          placeholder="Your email"
          @if (isset($_COOKIE['email']))  
          value="{{ $_COOKIE['email']}}"
          @endif
        />
        <span class="tw-text-red-700 tw-text-xs tw-mt-1 tw-font-medium">
          @error('email')
              {{$message}}
          @enderror
        </span>
      </div>
      <div class="">
        <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-medium">Password</label>
        <div class="tw-relative">
          <input
            type="password"
            name="password"
            id="password"
            class="tw-w-full tw-px-2 tw-py-3 tw-text-xs tw-mt-1 tw-border-gray-400 tw-border tw-rounded-lg tw-focus:outline-none tw-focus:ring-1 tw-focus:ring-purple-400 @error('password') tw-border-red-500 @enderror"
            placeholder="Your password"
            @if (isset($_COOKIE['password']))  
            value="{{ $_COOKIE['password']}}"
            @endif
          />
          
          <img src="{{ asset('images/close_eye.png') }}" alt="Icon" id="eyeIcon" class="tw-cursor-pointer tw-absolute tw-right-3 tw-top-[40%] tw-h-4 tw-invert-[60%]">
        </div>
        <span class="tw-text-red-700 tw-text-xs tw-mt-1 tw-font-medium">
          @error('password')
              {{$message}}
          @enderror
        </span>
        <div class="tw-flex tw-items-center tw-justify-between tw-mt-5 tw-mb-5">
          <div class="tw-flex tw-items-center">
            <input name="remember" class="tw-cursor-pointer" type="checkbox" id="rememberMe">
            <label class="tw-ml-1 tw-text-sm tw-text-gray-700 tw-cursor-pointer" for="rememberMe">Remember Me</label>
          </div>
          <div class="tw-flex tw-justify-between ">
            <a href="" class="tw-text-sm tw-text-purple-500 tw-hover:underline tw-inline-block" >Forgot password?</a>
          </div>
      </div>
      <button
        type="submit"
        id="button"
        class="tw-w-full tw-flex tw-justify-center tw-items-center tw-py-2 tw-bg-purple-600 tw-text-white tw-font-semibold tw-rounded-lg hover:tw-bg-purple-500 tw-duration-200" 
        >
        <x-button-spinner/>
        Login
      </button>
    </form>
  </div>
  <script src="{{ asset('js/showLoginPassword.js')}}"></script>
  <script src="{{ asset('js/buttonSpinner.js')}}"></script>
</body> 
</html>
