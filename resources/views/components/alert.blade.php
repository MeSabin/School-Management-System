<div>
    <style>
        .animate-in {
           transition: opacity 0.4s ease-in;
           opacity: 1;
        }
        .animate-out {
           transition: opacity 0.4s ease-out;
           opacity: 0;
        }
        .hidden {
           opacity: 0;
        }
       </style>
  
   {{ $slot }}
    <script>
      document.addEventListener('DOMContentLoaded', (event) => {
        var error = document.querySelector('#error');
        setTimeout(() => {
          error.classList.remove('hidden');
          error.classList.add('animate-in');
        }, 100); 
        setTimeout(() => {
          error.classList.remove('animate-in');
          error.classList.add('animate-out');
        }, 3100);
        setTimeout(() => {
          error.remove();
        }, 4100); 
      });
    </script>
  </div>
  