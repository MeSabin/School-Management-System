<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  @vite('resources/css/app.css')
  <style>
    .active{
      background-color: red;
    }
  </style>
</head>
<body class="bg-gray-100">

  <div class="flex min-h-screen">
    <aside class="w-64 bg-purple-600 text-white pr-3 pl-3">
      <div class="p-4">
        <h1 class="text-xl bg-purple-400 py-1 rounded-2xl text-center font-bold">Dashboard</h1>
      </div>
      {{-- <nav class="mt-4">
        <a href="/dashboard" class="block py-2.5 px-4 hover:bg-purple-400">Home</a>
        <a href="/profile" class="block py-2.5 px-4 hover:bg-purple-400">Profile</a>
        <a href="/settings" class="block py-2.5 px-4 hover:bg-purple-400">Settings</a>
        <a href="/logout" class="block py-2.5 px-4 hover:bg-purple-400">Logout</a>
      </nav> --}}
      <nav class="mt-4">
        <ul>
          <a href="/dashboard" class="link block py-2.5 px-4 bg-purple-400 active:bg-purple-400 rounded-md hover:bg-purple-400"><li>Home</li></a>
          <a href="/dashboard" class="link block py-2.5 px-4 mt-1 rounded-md active:bg-purple-400 hover:bg-purple-400"><li>Profile</li></a>
          <a href="/settings" class="block py-2.5 px-4 mt-1 rounded-md hover:bg-purple-400"><li>Settings</li></a>
          <a href="/logout" class="block py-2.5 px-4 mt-1 rounded-md hover:bg-purple-400"><li>Logout</li></a>
        </ul>
      </nav>
    </aside>
    <div class="flex-1 p-6 pt-3">
      <header class="flex justify-between items-center bg-white shadow-md p-4 rounded-lg">
        <h2 class="text-xl font-bold">Dashboard</h2>
        <div class="flex items-center space-x-4">
          <span class="text-gray-700">User Name</span>
          <img src="https://via.placeholder.com/40" alt="User Avatar" class="rounded-full w-10 h-10">
        </div>
      </header>
      <main class="mt-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold">Card 1</h3>
            <p class="mt-2 text-gray-600">Content for card 1.</p>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold">Card 2</h3>
            <p class="mt-2 text-gray-600">Content for card 2.</p>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold">Card 3</h3>
            <p class="mt-2 text-gray-600">Content for card 3.</p>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script>
   var links = document.querySelectorAll(".link");
for(let link of links){
  link.addEventListener("click", function(e){
    for(let inlink of links){
      inlink.classList.remove("active");
    }
    e.target.classList.add("active");
  });
}

  </script>

</body>
</html>
