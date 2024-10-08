<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
   {{-- CDN path for delete modal popup --}}
   <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
  @vite('resources/css/app.css')
  @vite('resources/css/adminLayout_profile.css')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>

<body class="tw-bg-gray-100">
  <div class="tw-flex tw-min-h-screen">
    <aside id="sidebar" class="tw-w-64 tw-fixed tw-top-0 tw-left-0 tw-h-full tw-bg-white tw-text-white tw-shadow-lg tw-pr-3 tw-pl-3 tw-transition-all tw-duration-700">     
      <div class="logoDiv tw-pt-8 tw-pl-2 tw-pb-3 tw-flex tw-items-center tw-cursor-pointer">
        {{-- <img src="{{ asset('images/computer.png')}}" alt="Image not found." class="invert w-10 ml-2"> --}}
        <span class="material-symbols-outlined tw-w-10 tw-ml-2 tw-text-gray-600">
          school
          </span>
        <h2 class="tw-text-2xl tw-font-extrabold tw-text-gray-700 ">𝒞𝓁𝒶𝓈𝓈𝐿𝒾𝓃𝓀</h2>
      </div>
      <nav class="tw-mt-4">
        <ul>
          <li>
            <a href="{{route('studentDashboard')}}" class="tw-flex tw-py-3 tw-mb-1 tw-px-3 tw-rounded-md hover:tw-bg-gray-200 tw-duration-300 {{ Route::is('studentDashboard*') ? 'activeLink' : '' }}">
              <span class="material-symbols-outlined tw-ml-1 tw-mr-4 tw-text-gray-600 {{ Route::is('studentDashboard*') ? 'tw-text-purple-600' : '' }}">
                home
              </span>
              <span class="tw-text-gray-500 tw-font-semibold {{ Route::is('studentDashboard*') ? 'tw-text-purple-600' : '' }}">Dashboard</span>
            </a>
          </li>
          <li>
            <li class="">
              <a href="{{route('viewGroupStudents')}}" id="students" class="tw-flex tw-py-3 tw-px-3 tw-mb-1 tw-rounded-md hover:tw-bg-gray-200 tw-duration-300 {{ Route::is('viewGroupStudents') ? 'activeLink' : '' }}">
                <span class="tw-ml-1 tw-mr-4 material-symbols-outlined tw-text-gray-600 {{ Route::is('viewGroupStudents*') ? 'tw-text-purple-600' : '' }}">
                  diversity_1
                </span>
                <span class="tw-text-gray-500 tw-font-semibold {{ Route::is('viewGroupStudents*') ? 'tw-text-purple-600' : '' }}">Students</span>
              </a>
            </li>            
            <li>
              <a href="{{route('viewAssignment')}}" id="curriculumns" class="tw-flex tw-items-center tw-py-3 tw-px-3 tw-mb-1 tw-rounded-md hover:tw-bg-gray-200 tw-duration-300 {{Route::is('viewAssignment*') ? 'activeLink' : ''}}">
                <span class="tw-ml-1 tw-mr-4 material-symbols-outlined tw-text-gray-600 {{ Route::is('viewAssignment*') ? 'tw-text-purple-600' : '' }}">
                  assignment
                </span>
                <span class="tw-text-gray-500 tw-font-semibold {{ Route::is('viewAssignment*') ? 'tw-text-purple-600' : '' }}">Assignments</span>
                {{-- <span class="dropdown material-symbols-outlined tw-text-gray-600 tw-ml-12">
                  keyboard_arrow_down
                </span> --}}
              </a>
              {{-- <ul class="sub-ul-curriculum">
                  <li>
                    <a href="" class="tw-flex tw-py-2 tw-px-3 tw-pl-14 tw-rounded-md hover:tw-bg-gray-200 tw-duration-300">
                      <span class="tw-text-gray-500 tw-text-sm tw-font-semibold {{ Route::is('') ? 'tw-text-purple-600' : '' }}">Assign Semester</span>
                    </a>
                  </li>
                  <li>
                    <a href="" class="tw-flex tw-justify-start tw-py-2 tw-mb-1 tw-px-3 tw-pl-14 tw-rounded-md hover:tw-bg-gray-200 tw-duration-300">
                      <span class="tw-text-gray-500 tw-text-sm tw-font-semibold {{ Request::is('') ? 'tw-text-purple-600' : '' }}">Add Class</span>
                    </a>
                  </li>
              </ul> --}}
            </li>            
            <li>
              <a href="/notifications" class="tw-flex tw-py-3 tw-px-3 tw-mb-1 tw-rounded-md hover:tw-bg-gray-200 tw-duration-300">
                <span class="tw-ml-1 tw-mr-4 material-symbols-outlined tw-text-gray-600 {{ Route::is('') ? 'tw-text-purple-600' : '' }}">
                  notifications
                </span>
                <span class="tw-text-gray-500 tw-font-semibold {{ Route::is('') ? 'tw-text-purple-600' : '' }}">Notifications</span>
              </a>
            </li>
            <li>
              <a href="/settings" class="tw-flex tw-py-3 tw-mb-1 tw-px-3 tw-rounded-md hover:tw-bg-gray-200 tw-duration-300">
                <span class="tw-ml-1 tw-mr-4 material-symbols-outlined tw-text-gray-600 {{ Route::is('') ? 'tw-text-purple-600' : '' }}">
                  settings
                </span>
                <span class="tw-text-gray-500 tw-font-semibold {{ Route::is('') ? 'tw-text-purple-600' : '' }}">Settings</span>
              </a>
            </li>
            <li>
              <a href="{{route('logoutStudent')}}" class="tw-flex tw-py-3 tw-mt-60 tw-mb-1 tw-px-3 tw-rounded-md hover:tw-bg-gray-200 tw-duration-300">
                <span class="tw-mr-3 tw-ml-2 material-symbols-outlined tw-text-gray-600 {{ Route::is('') ? 'tw-text-purple-600' : '' }}">
                  logout
                </span>
                <span class="tw-text-gray-500 tw-font-semibold {{ Route::is('') ? 'tw-text-purple-600' : '' }}">Logout</span>
              </a>
            </li>            
        </ul>
      </nav>
    </aside>
    <div class="tw-flex-1 tw-p-6 tw-pt-0 tw-transition-all tw-duration-700" id="mainContent">
      <header class="tw-z-20 tw-fixed tw-left-[256px] tw-ml-6 tw-right-[1.5rem] tw-top-3 tw-transition-all tw-duration-700 tw-bg-white tw-shadow-custom tw-py-4 tw-rounded-lg">
        <div class="tw-flex tw-flex-row tw-items-center tw-justify-between">
          <div class="tw-flex tw-items-center tw-gap-6 tw-ml-6">
            <span class="material-symbols-outlined tw-cursor-pointer tw-text-gray-600" id="menu">
              menu
            </span>
            <div class="tw-text-gray-600 tw-font-bold tw-text-lg tw-block">
              @yield('pageName')
            </div>
          </div>
          <div class="tw-flex tw-items-center tw-mr-6">
            <div class="tw-bg-gray-100 tw-border-[1px] tw-border-gray-300 tw-rounded-full tw-px-4 tw-py-2 tw-mr-6 tw-flex tw-justify-center tw-items-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" class="tw-invert-custom tw-mt-1" height="24" viewBox="0 0 24 24" style="transform: ;msFilter:;">
                <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path>
              </svg>
              <input type="text" placeholder="search here..."
                class="searchBox">
                
            </div>
            <div id="imgDiv" class="tw-flex tw-items-center tw-space-x-2">
              <span class="tw-text-gray-600 tw-text-sm tw-font-semibold">{{$name}},</span>
              <img src="{{ asset('images/profile.png') }}" id="profilePic" class="tw-w-10 tw-h-10 tw-cursor-pointer tw-rounded-full tw-border tw-text-start" alt="Image"/>
            </div>
          </div>
        </div>
      </header>
      
      
     {{-- Profile popup modal starts here --}}
<div id="" class="profilePopup tw-bg-white tw-shadow-custom tw-fixed tw-right-10 tw-top-20 tw-px-3 tw-pt-4 tw-pb-3 tw-rounded-xl tw-transition-transform tw-duration-1000 tw-z-20">
  <div class="tw-flex tw-items-center tw-mb-4">
    <img src="{{ asset('images/profile.png') }}" class="tw-w-9 tw-rounded-full tw-border tw-text-start" alt="Image"/>
    <div>
      <h3 class="tw-text-gray-600 tw-text-sm tw-font-semibold">{{$name}}</h3>
      <p class="tw-text-gray-500 tw-text-[0.73rem] tw-font-semibold">{{$email}}</p>
    </div>
  </div>
  <ul>
    <li class="tw-py-1.5 tw-border-b tw-border-gray-300 tw-flex tw-items-center tw-hover:bg-gray-200 tw-pl-1 tw-rounded-lg tw-duration-500">
      <span class="material-symbols-outlined tw-text-gray-600 tw-mr-1">
        account_circle
      </span>
      <a href="/profile" class="tw-text-gray-600 tw-font-semibold tw-text-sm">View Profile</a>
    </li>
    <li class="tw-py-1.5 tw-border-b tw-border-gray-300 tw-flex tw-items-center tw-hover:bg-gray-200 tw-pl-1 tw-rounded-lg tw-duration-500">
      <span class="material-symbols-outlined tw-text-gray-600 tw-mr-1">
        settings
      </span>
      <a href="/settings" class="tw-text-gray-600 tw-font-semibold tw-text-sm">Settings</a>
    </li>
    <li class="tw-py-1.5 tw-border-b tw-border-gray-300 tw-flex tw-items-center tw-hover:bg-gray-200 tw-pl-1 tw-rounded-lg tw-duration-500">
      <span class="material-symbols-outlined tw-text-gray-600 tw-mr-1">
        help
      </span>
      <a href="/settings" class="tw-text-gray-600 tw-font-semibold tw-text-sm">Help Center</a>
    </li>
    <li class="tw-py-1.5 tw-flex tw-items-center tw-hover:bg-gray-200 tw-pl-1 tw-rounded-lg tw-duration-500">
      <span class="material-symbols-outlined tw-text-rose-500 tw-mr-1">
        move_item
      </span>
      <a href="{{route('logoutStudent')}}" class="tw-text-rose-500 tw-font-semibold tw-text-sm">Logout</a>
    </li>
  </ul>
</div>
{{-- Profile popup modal ends here --}}

      <div class="tw-mt-[7.5rem]">
        @yield('content')
      </div>
  </div>

  {{-- js code file for profile popup --}}
  <script src="{{ asset('js/adminLayout_profile.js') }}"></script>

  {{-- js code file for dashboard sub li's contents --}}
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('js/dashboardSub-li.js')}}"></script>

  {{-- js code file for loading button --}}
   <script src="{{ asset('js/buttonSpinner.js')}}"></script>

    {{-- js path for flowbite delete modal popup --}}
   <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>
</html>