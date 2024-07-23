<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Reset password</title>
   @vite('resources/css/app.css')
</head>
<body>
   <h2>Hello {{$formData['admin']->name}}</h2>
   <h2>You have request to change your password:</h2>
   <p>Please click the link below to proceed:</p>

   <a href="{{ route('adminResetPass', $formData['token']) }}">Click Here</a>
</body>
</html>