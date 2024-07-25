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
    #sidebar.active {
      width: 80px;
    }
    #sidebar.active li a span {
      display: none;
    }
    #sidebar.active h2 {
      display: none;
    }
    #sidebar.active .material-symbols-outlined {
      display: block;
    }
    #sidebar.active .logoDiv{
      margin-left: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    #sidebar.active .logoDiv img{
      margin-left: 0;
    }
    .invert-custom {
      filter: invert(50%);
    }
    .activeLink{
      background-color: rgb(242, 208, 255);
      font-weight: 800;
    }
    #mainContent {
      margin-left: 256px;
    }
    #sidebar.active ~ #mainContent {
      margin-left: 80px;
    }
    header.sidebar-active {
      left: 80px;
    }
    .profilePopup {
    display: none; 
  }
  .hidden {
    display: none; 
  }
  .block{
    display: block;
  }

  </style>
</head>
<body class="bg-gray-100">

  <div class="flex min-h-screen">
    <aside id="sidebar" class="w-64 fixed top-0 left-0 h-full bg-white text-white shadow-lg pr-3 pl-3 transition-all duration-700 z-10000">     
      <div class="logoDiv pt-8 pl-2 pb-3 flex items-center cursor-pointer">
        {{-- <img src="{{ asset('images/computer.png')}}" alt="Image not found." class="invert w-10 ml-2"> --}}
        <span class="material-symbols-outlined w-10 ml-2 text-gray-600">
          school
          </span>
        <h2 class="text-2xl font-bold text-gray-500 ">𝒞𝓁𝒶𝓈𝓈𝐿𝒾𝓃𝓀</h2>
      </div>
      <nav class="mt-4">
        <ul>
          <li>
            <a href="{{ route('adminDash') }}" class="flex py-3 mb-2 px-3 rounded-md hover:bg-gray-200 duration-300 {{ Route::is('adminDash') ? 'activeLink' : '' }}">
              <span class="material-symbols-outlined ml-1 mr-4 text-gray-600 {{ Route::is('adminDash') ? 'text-purple-600' : '' }}">
                home
              </span>
              <span class="text-gray-500 font-semibold {{ Route::is('adminDash') ? 'text-purple-600' : '' }}">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="{{ route('teachers.index') }}" class="flex py-3 mb-2 px-3 rounded-md hover:bg-gray-200 duration-300 {{Route::is('teachers*') ? 'activeLink' : ''}}">
              <span class="ml-1 mr-4 material-symbols-outlined text-gray-600 {{ Route::is('teachers*') ? 'text-purple-600' : '' }}">
                group
              </span>
              <span class="text-gray-500 font-semibold {{ Route::is('teachers*') ? 'text-purple-600' : '' }}">Teachers</span>
            </a>
          </li>
          <li>
            <a href="{{ route('showCurriculumns') }}" class="flex py-3 mb-2 px-3 rounded-md hover:bg-gray-200 duration-300 {{Route::is('showCurriculumns') ? 'activeLink': ''}}">
              <span class="ml-1 mr-4 material-symbols-outlined text-gray-600 {{ Route::is('showCurriculumns') ? 'text-purple-600' : '' }}">
                assignment
              </span>
              <span class="text-gray-500 font-semibold {{ Route::is('showCurriculumns') ? 'text-purple-600' : '' }}">Curriculums</span>
            </a>
          </li>
          <li>
            <a href="/notifications" class="flex py-3 mb-2 px-3 rounded-md hover:bg-gray-200 duration-300  ">
              <span class="ml-1 mr-4 material-symbols-outlined text-gray-600 {{ Route::is('') ? 'text-purple-600' : '' }}">
                notifications
              </span>
              <span class="text-gray-500 font-semibold {{ Route::is('') ? 'text-purple-600' : '' }}">Notifications</span>
            </a>
          </li>
          <li>
            <a href="/settings" class="flex py-3 mb-2 px-3 rounded-md hover:bg-gray-200 duration-300  ">
              <span class="ml-1 mr-4 material-symbols-outlined text-gray-600 {{ Route::is('') ? 'text-purple-600' : '' }}">
                settings
              </span>
              <span class="text-gray-500 font-semibold {{ Route::is('') ? 'text-purple-600' : '' }}">Settings</span>
            </a>
          </li>
          <li>
            <a href="{{route('logoutAdmin')}}" class="flex py-3 mt-72 mb-2 px-3 rounded-md hover:bg-gray-200 duration-300 ">
              <span class="mr-3 ml-2 material-symbols-outlined text-gray-600 {{ Route::is('') ? 'text-purple-600' : '' }}">
                logout
              </span>
              <span class="text-gray-500 font-semibold {{ Route::is('') ? 'text-purple-600' : '' }}">Logout</span>
            </a>
          </li>
        </ul>
      </nav>
    </aside>
    <div class="flex-1 p-6 pt-0 transition-all duration-700" id="mainContent">
      <header class=" fixed left-[256px] ml-6 right-[1.5rem] top-3 flex justify-between items-center transition-all duration-700 bg-white shadow-custom p-4 rounded-lg">
        <span class="material-symbols-outlined cursor-pointer absolute text-purple-600 left-3 invert-custom" id="menu">
          menu
        </span>
        <div class="bg-gray-100 border-[1px] ml-[720px] border-gray-300 rounded-full px-4 py-2 flex justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" class="invert-custom mt-1 " height="24" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path></svg>
          <input type="text" placeholder="search here..."
          class="bg-gray-100 text-gray-500 ml-2 placeholder-gray-500 focus:outline-none"
          >
        </div>
        <div class="flex items-center space-x-4">
          <span class="text-gray-700">Welcome, </span>
          <img src="{{ asset('images/profile.png')}}" alt="" id="profilePic" class="rounded-full w-10 h-10 cursor-pointer">
        </div>
      </header>
      
      {{-- Profile popup modal starts here --}}
      <div id ="" class="profilePopup bg-white shadow-custom fixed right-10 top-20 px-3 pt-4 pb-3 rounded-xl transition-transform duration-1000">
          <div class="flex items-center mb-4">
            <img src="{{ asset('images/profile.png') }}" alt="Profile" class="rounded-full w-10 mr-2">
            <div>
              <h3 class="text-gray-600 font-semibold">Admin</h3>
              <p class="text-gray-500 text-[0.73rem] font-semibold">kaphlesabin789@gmail.com</p>
            </div>
          </div>
          <ul>
            <li class="py-1.5 border-b border-gray-300 flex items-center hover:bg-gray-200 pl-1 rounded-lg duration-500">
              <span class="material-symbols-outlined text-gray-600 mr-1">
                account_circle
                </span>
              <a href="/profile" class="text-gray-600 font-semibold text-sm">View Profile</a>
            </li>
            <li class="py-1.5 border-b border-gray-300 flex items-center hover:bg-gray-200 pl-1 rounded-lg duration-500">
              <span class="material-symbols-outlined text-gray-600 mr-1">
                settings
                </span>
              <a href="/settings" class="text-gray-600 font-semibold text-sm">Settings</a>
            </li>
            <li class="py-1.5 border-b border-gray-300 flex items-center hover:bg-gray-200 pl-1 rounded-lg duration-500">
              <span class="material-symbols-outlined text-gray-600 mr-1">
                help
                </span>
              <a href="/settings" class="text-gray-600 font-semibold text-sm">Help Center</a>
            </li>
            <li class="py-1.5 flex items-center hover:bg-gray-200 pl-1 rounded-lg duration-500">
              <span class="material-symbols-outlined text-rose-500 mr-1 ">
                move_item
                </span>
              <a href="/admin/logout" class="text-rose-500 font-semibold text-sm ">Logout</a>
            </li>
          </ul>
      </div>
      {{-- Profile popup modal ends here --}}
      <div class="mt-[7.5rem]">
   @yield('content')
   @yield('pageName')
  </div>
  </div>
  
  <script>
    let menu = document.querySelector('#menu');
    let sidebar = document.querySelector('#sidebar');
    let header = document.querySelector('header');
    
    menu.onclick = function() {
      sidebar.classList.toggle('active');
      header.classList.toggle('sidebar-active');
    }
  
    let profilePic = document.querySelector('#profilePic');
    let profilePopup = document.querySelector('.profilePopup');
  
    profilePic.onclick = function() {
    if (profilePopup.style.display === 'block') {
        profilePopup.style.display = 'none';
    } else {
        profilePopup.style.display = 'block';
    } 
  }  
  </script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>