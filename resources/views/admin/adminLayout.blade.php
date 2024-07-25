<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <style>

    #sidebar.active:hover {
      width: 256px;
    }
    #sidebar.active {
      width: 80px;
    }
    #sidebar.active li a span {
      display: none;
    }
    #sidebar.active:hover li a span {
      display: block;
    }
    #sidebar.active h2 {
      display: none;
    }
    #sidebar.active .material-symbols-outlined {
      display: block;
    }
    #sidebar.active:hover h2 {
      display: block;
    }
    #sidebar.active .logoDiv{
      margin-left: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    #sidebar.active:hover .logoDiv{
      padding-right: 78px;
    }
    #sidebar.active .logoDiv img{
      margin-left: 0;
    }
    body{
      width: calc(100vw-256px) !important;
    }
    /* styles.css */
  .invert-custom {
    filter: invert(50%);
  }

  </style>
</head>
<body class="bg-gray-100">

  <div class="flex min-h-screen">
    <aside id="sidebar" class="w-64 bg-gray-50 text-white pr-3 pl-3 transition-all duration-700 z-10000">     
      <div class="logoDiv pt-3 pl-2 pb-3 flex items-center cursor-pointer">
        {{-- <img src="{{ asset('images/computer.png')}}" alt="Image not found." class="invert w-10 ml-2"> --}}
        <span class="material-symbols-outlined w-10 ml-2 text-gray-600">
          school
          </span>
        <h2 class="text-lg font-bold text-gray-500">𝒞𝓁𝒶𝓈𝓈𝐿𝒾𝓃𝓀</h2>
      </div>
      <nav class="mt-4">
        <ul>
          <li>
            <a href="{{ route('adminDash') }}" class="flex py-2 mb-2 px-3 rounded-md hover:bg-purple-400 duration-300 {{ Route::is('adminDash') ? 'bg-gray-200' : '' }}">
              <span class="material-symbols-outlined ml-1 mr-4 text-purple-400">
                home
              </span>
              <span class="text-blue-400">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="{{ route('teachers.index') }}" class="flex py-2 mb-2 px-3 rounded-md hover:bg-purple-400 duration-300 {{Route::is('teachers*') ? 'bg-purple-400' : ''}}">
              <span class="ml-1 mr-4 material-symbols-outlined text-purple-400">
                group
              </span>
              <span class="text-blue-400">Teachers</span>
            </a>
          </li>
          <li>
            <a href="{{ route('showCurriculumns') }}" class="flex py-2 mb-2 px-3 rounded-md hover:bg-purple-400 duration-300 {{Route::is('showCurriculumns') ? 'bg-purple-400': ''}}">
              <span class="ml-1 mr-4 material-symbols-outlined text-purple-400">
                assignment
              </span>
              <span class="text-blue-400">Curriculums</span>
            </a>
          </li>
          <li>
            <a href="/notifications" class="flex py-2 mb-2 px-3 rounded-md hover:bg-purple-400 duration-300  ">
              <span class="ml-1 mr-4 material-symbols-outlined text-purple-400">
                notifications
              </span>
              <span class="text-blue-400">Notifications</span>
            </a>
          </li>
          <li>
            <a href="/admin/logout" class="flex py-2 mb-2 px-3 rounded-md hover:bg-purple-400 duration-300 ">
              <span class="mr-3 ml-2 material-symbols-outlined text-purple-400">
                logout
              </span>
              <span class="text-blue-400">Logout</span>
            </a>
          </li>
        </ul>
      </nav>
    </aside>
    <div class="flex-1 p-6 pt-3" id="mainContent">
      <header class="relative flex justify-between items-center bg-white shadow-md p-4 rounded-lg">
        {{-- <img src="{{asset('images/menu.png')}}" alt="" class=" menuicon w-6 cursor-pointer absolute left-3 invert" id="menu"> --}}
        <span class="material-symbols-outlined cursor-pointer absolute text-purple-600 left-3 invert-custom" id="menu">
          menu
        </span>
        {{-- <h2 class="text-xl font-medium text-purple-500 pl-10">Search Here!</h2> --}}
        <div class="bg-gray-100 border-[1px] ml-[720px] border-gray-300 rounded-full px-4 py-2 flex justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" class="invert-custom mt-1 " height="24" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path></svg>
          <input type="text" placeholder="search here"
          class="bg-gray-100 text-gray-500 ml-2 placeholder-gray-500 focus:outline-none"
          >
        </div>
        <div class="flex items-center space-x-4">
          <span class="text-gray-700">Welcome, </span>
          <img src="{{ asset('images/profile.png')}}" alt="" class="rounded-full w-10 h-10 cursor-pointer">
        </div>
      </header>
   @yield('content')
   @yield('pageName')
  </div>
  
  <script>
    let menu = document.querySelector('#menu');
    let sidebar = document.querySelector('#sidebar')

    menu.onclick = function() {
      sidebar.classList.toggle('active');
    }
  </script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script>
     $(document).on('click', 'a[data-ajax]', function(e) {
       e.preventDefault();
       let url = $(this).attr('href');
       $.get(url, function(data) {
         $('#contentArea').html(data);
       });
     });
   </script>
</body>
</html>