<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Forgot-Password-Admin</title>
   @vite('resources/css/app.css')
</head>
<body class="tw-flex tw-items-center tw-justify-center tw-min-h-screen tw-bg-gray-100">
   @if (session('A_successEmail'))
   <x-alert>
     <div id="error" class="tw-opacity-0 tw-absolute tw-top-5 tw-right-5 tw-flex tw-items-center tw-justify-center tw-bg-white tw-shadow-md tw-border-2 tw-border-l-4 tw-border-green-600 tw-text-green-600 tw-pr-8 tw-pl-2 tw-py-4 tw-rounded-sm">
       <img src="{{ asset('images/accept.png') }}" alt="" class="tw-w-6 tw-mr-2">
       <h3>{{ session('A_successEmail') }}</h3>
     </div>
   </x-alert>
   @endif
   @if (session('A_tokenError'))
   <x-alert>
     <div id="error" class="tw-opacity-0 tw-absolute tw-top-5 tw-right-5 tw-flex tw-items-center tw-justify-center tw-bg-white tw-shadow-md tw-border-2 tw-border-l-4 tw-border-red-500 tw-text-red-500 tw-pr-8 tw-pl-2 tw-py-4 tw-rounded-sm">
       <img src="{{ asset('images/error.png') }}" alt="" class="tw-w-6 tw-mr-2">
       <h3>{{ session('A_tokenError') }}</h3>
     </div>
   </x-alert>
   @endif
   <div class="tw-bg-white tw-rounded-xl tw-px-6 tw-pb-5 tw-pt-2 tw-shadow-custom">
      <h3 class="tw-font-bold tw-text-center tw-text-lg tw-text-gray-500 tw-mb-2">Forgot Password</h3>
      <p class="tw-w-80 tw-text-sm tw-text-center tw-text-gray-500 tw-mb-6">We will send an email link to your account. Click that link to change your password</p>
      <form action="{{ route('processAdminForgotPass') }}" method="POST">
         @csrf
         <div>
         <label for="" class="tw-block tw-text-gray-600">Email</label>
         <input type="text" 
         name="email"
         class="tw-w-80 tw-block tw-px-2 tw-py-3 tw-text-xs tw-mt-1 tw-border-gray-400 tw-border tw-rounded-lg focus:tw-outline-none focus:tw-ring-1 focus:tw-ring-purple-400 @error('email') tw-border-red-500 @enderror" placeholder="Your Registered Email">
         <span class="tw-text-red-700 tw-text-xs tw-mt-1 tw-font-medium">
         @error('email')
             {{$message}}
         @enderror
         </span>
      </div>
         <button 
         type="submit"
         id="button"
         class="tw-w-80 tw-flex tw-items-center tw-justify-center tw-py-2 tw-mt-8 tw-mb-2 tw-bg-purple-600 tw-text-white tw-font-medium tw-rounded-lg hover:tw-bg-purple-700 tw-duration-300 focus-within:tw-ring-2 focus-within:tw-ring-offset-2 focus-within:tw-ring-purple-500">
          <x-button-spinner/>
         Send
         </button>
      </form>
      <p class="tw-text-center"><a href="{{ route('adminLogin') }}" class="tw-text-purple-600 hover:tw-underline tw-text-center tw-text-sm">Login</a></p>
   </div>
</body>
<script>
  let spinner = document.querySelector('#spinner');
  let button = document.querySelector('#button');
  
  button.addEventListener('click', function() {
    spinner.classList.remove('tw-hidden');
  });
</script>
</html>
