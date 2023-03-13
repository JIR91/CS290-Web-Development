const div = document.querySelector('.nav-right');
const loginClass = document.querySelector('.login')

loginClass.addEventListener('click', function() {
    loginClass.classList.add('active');
})

document.addEventListener('click', function(event){
    if (!div.contains(event.target)){
        loginClass.classList.remove('active');
    }
})

// function load_login_page(){
//     window.location.href='page/login.html';
//     alert('Loading New Account Creation Page.. :)');
//     play()
// }

// function play(){
//     console.log("Page loaded.");
//     console.log("Welcome to the New Acount/Login Page...");
// }

window.matchMedia(`(max-width: 1040px)`).addEventListener("change", function(event){
    if (event.matches) {
        console.log("will be handling sandwich menu here as a click toggle");
    }
})

function dd_toggle(){
    var dd_ele = document.getElementById('toggle-target');
    dd_ele.classList.toggle('dd-hide');
    console.log('button test')
}
