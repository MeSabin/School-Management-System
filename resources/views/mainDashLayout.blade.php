<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  @vite('resources/css/app.css')
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
    #sidebar.active:hover h2 {
      display: block;
    }
    #sidebar.active .logoDiv {
      display: flex;
      justify-content: center;
    }

  </style>
</head>
<body class="bg-gray-100">

  <div class="flex min-h-screen">
    <aside id="sidebar" class="w-64 bg-purple-500 text-white pr-3 pl-3 transition-all duration-700 z-10000">     
      <div class="logoDiv pt-3 pb-3 flex items-center cursor-pointer">
        <img src="{{ asset('images/computer.png')}}" alt="Image not found." class="invert w-10 ">
        {{-- <box-icon type='solid' name='school' class="invert "></box-icon> --}}
        <h2 class="text-lg ml-3 font-bold">𝒞𝓁𝒶𝓈𝓈𝐿𝒾𝓃𝓀</h2>
      </div>
      <nav class="mt-4">
        <ul>
          <li>
            <a href="#" class=" flex justify-start py-2 mb-2 px-3 bg-purple-400 active:bg-purple-400 rounded-md hover:bg-purple-400 ">
              <img src="{{asset('images/dashboard.png')}}" alt="" class="w-7 mr-3">
              {{-- <box-icon class="invert" name='home-alt'></box-icon> --}}
              <span class="pt-1">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="/studentList" class=" flex justify-start py-2 mb-2 px-3 active:bg-purple-400 rounded-md hover:bg-purple-400 ">
              <img src="{{asset('images/students.png')}}" alt="" class="w-6 pl-1 mr-4">
              <span class="">Teachers</span>
            </a>
          </li>
          <li>
            <a href="/assignments" class=" flex justify-start py-2 mb-2 px-3 active:bg-purple-400 rounded-md hover:bg-purple-400 ">
              <img src="{{asset('images/assignment.png')}}" alt="" class="w-6 ml-[1px] mr-4">
              <span class="">Curriculums</span>
            </a>
          </li>
          <li>
            <a href="/notifications" class=" flex justify-start py-2 mb-2 px-3 active:bg-purple-400 rounded-md hover:bg-purple-400 ">
              <img src="{{asset('images/notification.png')}}" alt="" class="w-6 mr-4">
              <span class="">Notifications</span>
            </a>
          </li>
          <li>
            <a href="/teacher/logout" class=" flex justify-start py-2 mb-2 px-3 active:bg-purple-400 rounded-md hover:bg-purple-400 ">
              <img src="{{asset('images/logout.png')}}" alt="" class="w-6 ml-1 mr-3">
              <span class="">Logout</span>
            </a>
          </li>
        </ul>
      </nav>
    </aside>
    <div class="flex-1 p-6 pt-3" id="mainContent">
      <header class="relative flex justify-between items-center bg-white shadow-md p-4 rounded-lg">
        <img src="{{asset('images/menu.png')}}" alt="" class=" menuicon w-6 cursor-pointer absolute left-3 invert" id="menu">
        <h2 class="text-xl font-medium text-purple-500 pl-10">Search Here!</h2>
        <div class="flex items-center space-x-4">
          <span class="text-gray-700">User Name</span>
          <img src="https://via.placeholder.com/40" alt="User Avatar" class="rounded-full w-10 h-10">
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

</body>
</html>
