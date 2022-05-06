
let icon = document.getElementById('logout_icon');
let logout = document.getElementById('logout');


logout.onmouseover = function(){
    icon.classList.toggle('fa-door-open')
    icon.classList.toggle('fa-door-closed')
}

logout.onmouseout = function(){
    icon.classList.toggle('fa-door-open')
    icon.classList.toggle('fa-door-closed')
}

console.log('hi')
