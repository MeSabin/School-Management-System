let password =document.querySelector('#password');
let eyeIcon = document.querySelector('#eyeIcon');

eyeIcon.onclick =function(){
   if(password.type =='password'){
      password.type ='text';
      eyeIcon.src = 'images/open_eye.png';
   }
   else{
      password.type ='password';
      eyeIcon.src ='images/close_eye.png';
      
   }
}