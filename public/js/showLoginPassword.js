let password =document.querySelector('#password');
let eyeIcon = document.querySelector('#eyeIcon');

eyeIcon.onclick =function(){
   if(password.type =='password'){
      password.type ='text';
   }
   else{
      password.type ='password';
      
   }
}