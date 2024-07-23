<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Reset-Password-Admin</title>
   @vite('resources/css/app.css')
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
   @if (session('A_resetSuccess'))
   <x-alert>
     <div id="error" class="opacity-0 absolute top-5 right-5 flex items-center justify-center bg-white shadow-md border-2 border-l-4 border-green-600 text-green-600 pr-8 pl-2 py-4 rounded-sm">
       <img src="{{ asset('images/accept.png') }}" alt="" class="w-6 mr-2">
       <h3>{{ session('A_resetSuccess') }}</h3>
     </div>
   </x-alert>
 @endif
   <div class="bg-white rounded-xl px-6 pb-5 pt-2 shadow-custom">
      <h3 class="font-bold text-center text-lg text-gray-500 mb-2">Reset Password</h3>
      <form action="{{ route('processResetPassword') }}" method="POST">
         @csrf
         <input type="hidden" name="token" value="{{$token}}">
         <div class="mt-6">
         <label for="" class="block text-gray-600">New Password</label>
         <input type="password" 
         name="password"
         class="w-80 block px-2 py-3 text-xs mt-1 border-gray-400 border rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-400 @error('password') border-red-500 @enderror" placeholder="Your new password">
         <span class="text-red-700 text-xs mt-1 font-medium">
         @error('password')
             {{$message}}
         @enderror
      </div>
         <div class="mt-6">
         <label for="" class="block text-gray-600">Confirm Password</label>
         <input type="password" 
         name="confirm_password"
         class="w-80 block px-2 py-3 text-xs mt-1 border-gray-400 border rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-400 @error('confirm_password') border-red-500 @enderror" placeholder="Re-enter new password">
         <span class="text-red-700 text-xs mt-1 font-medium">
         @error('confirm_password')
             {{$message}}
         @enderror
      </div>
         <button 
         type="submit"
         class="w-80 py-2 mt-6 mb-2 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-500 duration-200">
         Reset Password
         </button>
      </form>
      <p class="text-center"><a href="{{ route('adminLogin') }}" class="text-purple-600 hover:underline text-center text-sm">Click here to login</a></p>
   </div>
</body>
</html>