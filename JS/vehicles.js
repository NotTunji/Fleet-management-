'use strict';

const toggleSidebarBtn = document.getElementById('toggle-sidebar');
const sidebar = document.querySelector('.sidebar');

const body = document.querySelector('.body__container');

// body.addEventListener('click', (e) => {
//     if(sidebar.classList.contains('show')){
//         sidebar.classList.toggle('show')  
//     }
// })



toggleSidebarBtn.addEventListener('click', () => {
        sidebar.classList.add('show');   
});
function myFunction() {
        var element = document.body;
        element.classList.toggle("dark-mode");
      }