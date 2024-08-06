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