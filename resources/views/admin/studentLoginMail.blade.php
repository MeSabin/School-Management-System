<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Login credentials</title>
   @vite('resources/css/app.css')
</head>
<body>
   <h2>Hello, {{$student}}</h2>
   <h3>You are welcome to our digital School Management System:ClassLink. Use the credentials below to login into our system.</h3>
   <p><strong>Email: {{$email}}</strong></p>
   <p><strong>Password: {{$password}}</strong></p>
   <p><a href="{{ route('studentLogin') }}">Click here to login</a></p>
</body>
</html>