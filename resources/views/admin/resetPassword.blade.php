<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Reset-Password-Admin</title>
   @vite('resources/css/app.css')
</head>
<body class="tw-flex tw-items-center tw-justify-center tw-min-h-screen tw-bg-gray-100">
   @if (session('A_resetSuccess'))
   <x-alert>
     <div id="error" class="tw-opacity-0 tw-absolute tw-top-5 tw-right-5 tw-flex tw-items-center tw-justify-center tw-bg-white tw-shadow-md tw-border-2 tw-border-l-4 tw-border-green-600 tw-text-green-600 tw-pr-8 tw-pl-2 tw-py-4 tw-rounded-sm">
       <img src="{{ asset('images/accept.png') }}" alt="" class="tw-w-6 tw-mr-2">
       <h3>{{ session('A_resetSuccess') }}</h3>
     </div>
   </x-alert>
   @endif
   <div class="tw-bg-white tw-rounded-xl tw-px-6 tw-pb-5 tw-pt-2 tw-shadow-custom">
      <h3 class="tw-font-bold tw-text-center tw-text-lg tw-text-gray-500 tw-mb-2">Reset Password</h3>
      <form action="{{ route('processResetPassword') }}" method="POST">
         @csrf
         <input type="hidden" name="token" value="{{$token}}">
         <div class="tw-mt-6">
         <label for="" class="tw-block tw-text-gray-600">New Password</label>
         <input type="password" 
         name="password"
         class="tw-w-80 tw-block tw-px-2 tw-py-3 tw-text-xs tw-mt-1 tw-border-gray-400 tw-border tw-rounded-lg focus:tw-outline-none focus:tw-ring-1 focus:tw-ring-purple-400 @error('password') tw-border-red-500 @enderror" placeholder="Your new password">
         <span class="tw-text-red-700 tw-text-xs tw-mt-1 tw-font-medium">
         @error('password')
             {{$message}}
         @enderror
         </span>
      </div>
         <div class="tw-mt-6">
         <label for="" class="tw-block tw-text-gray-600">Confirm Password</label>
         <input type="password" 
         name="confirm_password"
         class="tw-w-80 tw-block tw-px-2 tw-py-3 tw-text-xs tw-mt-1 tw-border-gray-400 tw-border tw-rounded-lg focus:tw-outline-none focus:tw-ring-1 focus:tw-ring-purple-400 @error('confirm_password') tw-border-red-500 @enderror" placeholder="Re-enter new password">
         <span class="tw-text-red-700 tw-text-xs tw-mt-1 tw-font-medium">
         @error('confirm_password')
             {{$message}}
         @enderror
         </span>
      </div>
         <button 
         type="submit"
         class="tw-w-80 tw-py-2 tw-mt-6 tw-mb-2 tw-font-medium tw-bg-purple-600 tw-text-white tw-rounded-lg hover:tw-bg-purple-700 tw-duration-300 focus-within:tw-ring-2 focus-within:tw-ring-offset-2 focus-within:tw-ring-purple-500">
         Reset Password
         </button>
      </form>
      <p class="tw-text-center"><a href="{{ route('adminLogin') }}" class="tw-text-purple-600 hover:tw-underline tw-text-center tw-text-sm">Click here to login</a></p>
   </div>
</body>
</html>
