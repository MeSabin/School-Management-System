<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  @vite('resources/css/app.css')
  @vite('resources/css/adminLayout_profile.css')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>

<body class="bg-gray-100">
  <div class="flex min-h-screen">
    <aside id="sidebar" class="w-64 fixed top-0 left-0 h-full bg-white text-white shadow-lg pr-3 pl-3 transition-all duration-700">     
      <div class="logoDiv pt-8 pl-2 pb-3 flex items-center cursor-pointer">
        {{-- <img src="{{ asset('images/computer.png')}}" alt="Image not found." class="invert w-10 ml-2"> --}}
        <span class="material-symbols-outlined w-10 ml-2 text-gray-600">
          school
          </span>
        <h2 class="text-2xl font-extrabold text-gray-700 ">𝒞𝓁𝒶𝓈𝓈𝐿𝒾𝓃𝓀</h2>
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
            <a href="#" id="teachers" class="flex items-center py-3 px-3 rounded-md hover:bg-gray-200 duration-300 {{Route::is('teachers*', 'assignModuleTeacher*') ? 'activeLink' : ''}}">
              <span class="ml-1 mr-4 material-symbols-outlined text-gray-600 {{ Route::is('teachers*', 'assignModuleTeacher*') ? 'text-purple-600' : '' }}">
                group
              </span>
              <span class="text-gray-500 font-semibold {{ Route::is('teachers*', 'assignModuleTeacher*') ? 'text-purple-600' : '' }}">Teachers</span>
              <span class="dropdown material-symbols-outlined text-gray-600 ml-[4.5rem]">
                keyboard_arrow_down
              </span>
            </a>
            <ul class="sub-ul">
              <li>
                <a href="{{ route('teachers.index') }}" class="flex justify-start py-2 px-3 pl-14 rounded-md hover:bg-gray-200 duration-300">
                  <span class="text-gray-500 text-sm font-semibold {{ Route::is('teachers*') ? 'text-purple-600' : '' }}">Register Teacher</span>
                </a>
              </li>
              <li>
                <a href="{{route('assignModuleTeacher.index')}}" class="flex py-2 mb-2  px-3 pl-14 rounded-md hover:bg-gray-200 duration-300">
                  <span class="text-gray-500 text-sm font-semibold {{ Route::is('assignModuleTeacher*') ? 'text-purple-600' : '' }}">Assign class/subject</span>
                </a>
              </li>
            </ul>
          </li>
          <li>
          <li class="">
            <a href="#" id="students" class="flex py-3 px-3 rounded-md hover:bg-gray-200 duration-300 {{Route::is('students*', 'bulkStudents*') ? 'activeLink' : ''}}">
              <span class="ml-1 mr-4 material-symbols-outlined text-gray-600 {{ Route::is('students*', 'bulkStudents*') ? 'text-purple-600' : '' }}">
                diversity_1
              </span>
              <span class="text-gray-500 font-semibold {{ Route::is('students*', 'bulkStudents*') ? 'text-purple-600' : '' }}">Students</span>
              <span class="dropdown material-symbols-outlined text-gray-600 ml-[4.7rem]">
                keyboard_arrow_down
              </span>
            </a>
            <ul class="sub-ul-students">
              <li>
                <a href="{{ route('students.index') }}" class="flex justify-start py-2 px-3 pl-14 rounded-md hover:bg-gray-200 duration-300">
                  <span class="text-gray-500 text-sm font-semibold {{ Route::is('students*') ? 'text-purple-600' : '' }}">Register Student</span>
                </a>
              </li>
              <li>
                <a href="" class="flex py-2 mb-2 px-3 pl-14 rounded-md hover:bg-gray-200 duration-300">
                  <span class="text-gray-500 text-sm font-semibold {{ Route::is('') ? 'text-purple-600' : '' }}">Assign modules</span>
                </a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#" id="curriculumns" class="flex items-center py-3 px-3 rounded-md hover:bg-gray-200 duration-300 {{Request::is('subjects*', 'admin/curriculumns*') ? 'activeLink' : ''}}">
              <span class="ml-1 mr-4 material-symbols-outlined text-gray-600 {{ Request::is('subjects*', 'admin/curriculumns*') ? 'text-purple-600' : '' }}">
                assignment
              </span>
              <span class="text-gray-500 font-semibold {{ Request::is('subjects*', 'admin/curriculumns*') ? 'text-purple-600' : '' }}">Curriculums</span>
              <span class="dropdown material-symbols-outlined text-gray-600 ml-12">
                keyboard_arrow_down
              </span>
            </a>
            <ul class="sub-ul-curriculum">
              <li>
                <a href="{{ route('subjects.index') }}" class="flex justify-start py-2 px-3 pl-14 rounded-md hover:bg-gray-200 duration-300 ">
                  <span class="text-gray-500 text-sm font-semibold {{ Route::is('subjects*') ? 'text-purple-600' : '' }}">Assign Semester</span>
                </a>
              </li>
              <li>
                <a href="{{route('viewGroups')}}" class="flex py-2 mb-2 px-3 pl-14 rounded-md hover:bg-gray-200 duration-300">
                  <span class="text-gray-500 text-sm font-semibold {{ Request::is('admin/curriculumns*') ? 'text-purple-600' : '' }}">Add Class</span>
                </a>
              </li>
            </ul>
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
            <a href="{{route('logoutAdmin')}}" class="flex py-3 mt-60 mb-2 px-3 rounded-md hover:bg-gray-200 duration-300 ">
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
      <header class=" fixed left-[256px] ml-6 right-[1.5rem] top-3 transition-all duration-700 bg-white shadow-custom py-4 rounded-lg">
        <div class="flex flex-row items-center justify-evenly">
          <span class="material-symbols-outlined cursor-pointer text-gray-600" id="menu">
            menu
          </span>
        <div class="text-gray-600 font-bold text-lg block">
        @yield('pageName')
      </div>
        <div class="bg-gray-100 border-[1px] ml-[520px] border-gray-300 rounded-full px-4 py-2 flex justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" class="invert-custom mt-1 " height="24" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path></svg>
          <input type="text" placeholder="search here..."
          class="bg-gray-100 text-gray-500 ml-2 placeholder-gray-500 focus:outline-none"
          >
        </div>
        <div id="imgDiv" class="flex items-center space-x-4">
          <span class="text-gray-700">Welcome, </span>
          <img src="{{ asset('images/profile.png')}}" alt="" id="profilePic" class="rounded-full w-10 h-10 cursor-pointer">
        </div>
      </div>
        <div class="">
          @yield('studentReg_li')
          {{-- <p>hello</p> --}}
        </div>
      </header>
      
      {{-- Profile popup modal starts here --}}
      <div id ="" class="profilePopup bg-white shadow-custom fixed right-10 top-20 px-3 pt-4 pb-3 rounded-xl transition-transform duration-1000 z-20">
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
      </div>
  </div>
  <script src="{{ asset('js/adminLayout_profile.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#teachers').click(function (){
        $('ul li .sub-ul').toggleClass('showSubLis');
      });
      $('#curriculumns').click(function (){
        $('ul li .sub-ul-curriculum').toggleClass('showSubLis');
      });
      $('#students').click(function (){
        $('ul li .sub-ul-students').toggleClass('showSubLis');
      });
    });
  </script>
</body>
</html>