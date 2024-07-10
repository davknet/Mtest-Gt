// document.addEventListener('DOMContentLoaded', function() {
//     const tabs = document.querySelectorAll('.tab-links li');
//     const contents = document.querySelectorAll('.tab');
  
//     tabs.forEach(tab => {
//       tab.addEventListener('click', function(e) {
//         e.preventDefault();
  
//         tabs.forEach(item => item.classList.remove('active'));
//         contents.forEach(content => content.classList.remove('active'));
  
//         tab.classList.add('active');
//         const activeTab = tab.querySelector('a').getAttribute('href');
//         document.querySelector(activeTab).classList.add('active');
//       });
//     });
//   });
  


// jQuery(document).ready(function($) {
//     const tabs = $('.tab-links li');
//     const contents = $('.tab');
  
//     tabs.on('click', function(e) {
//       e.preventDefault();
  
//       tabs.removeClass('active');
//       contents.removeClass('active');
  
//       $(this).addClass('active');
//       const activeTab = $(this).find('a').attr('href');
//       $(activeTab).addClass('active');
//     });
//   });