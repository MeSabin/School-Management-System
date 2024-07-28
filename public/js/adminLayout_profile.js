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