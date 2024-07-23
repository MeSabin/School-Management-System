<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Forgot-Password-Admin</title>
   @vite('resources/css/app.css')
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
   @if (session('A_successEmail'))
   <x-alert>
     <div id="error" class="opacity-0 absolute top-5 right-5 flex items-center justify-center bg-white shadow-md border-2 border-l-4 border-green-600 text-green-600 pr-8 pl-2 py-4 rounded-sm">
       <img src="{{ asset('images/accept.png') }}" alt="" class="w-6 mr-2">
       <h3>{{ session('A_successEmail') }}</h3>
     </div>
   </x-alert>
 @endif
   @if (session('A_tokenError'))
   <x-alert>
     <div id="error" class="opacity-0 absolute top-5 right-5 flex items-center justify-center bg-white shadow-md border-2 border-l-4 border-red-500 text-red-500 pr-8 pl-2 py-4 rounded-sm">
       <img src="{{ asset('images/error.png') }}" alt="" class="w-6 mr-2">
       <h3>{{ session('A_tokenError') }}</h3>
     </div>
   </x-alert>
 @endif
   <div class="bg-white rounded-xl px-6 pb-5 pt-2 shadow-custom">
      <h3 class="font-bold text-center text-lg text-gray-500 mb-2">Forgot Password</h3>
      <p class="w-80 text-sm text-center text-gray-500 mb-6">We will send an email link to your account. Click that link to change your password</p>
      <form action="{{ route('processAdminForgotPass') }}" method="POST">
         @csrf
         <div>
         <label for="" class="block text-gray-600">Email</label>
         <input type="text" 
         name="email"
         class="w-80 block px-2 py-3 text-xs mt-1 border-gray-400 border rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-400 @error('email') border-red-500 @enderror" placeholder="Your Registered Email">
         <span class="text-red-700 text-xs mt-1 font-medium">
         @error('email')
             {{$message}}
         @enderror
      </div>
         <button 
         type="submit"
         class="w-80 py-2 mt-8 mb-2 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-500 duration-200">
         Send
         </button>
      </form>
      <p class="text-center"><a href="{{ route('adminLogin') }}" class="text-purple-600 hover:underline text-center text-sm">Login</a></p>
   </div>
</body>
</html>