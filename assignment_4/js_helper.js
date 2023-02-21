function load_login_page(){
    window.location.href='page/login.html';
    alert('Loading New Account Creation Page.. :)')
    console.log("Page loaded.");
    console.log("Why does this not appear...");
}

// let delima = document.addEventListener('')
var delima = document.querySelector('.nav-right');
console.log(delima)

delima.addEventListener('click', keep_open());

function keep_open() {
    console.log('mouse out')
}

// function keep_open(){
//     var delima = document.getElementById('typing_check');
//     console.log(delima);

//     if (delima = 'INPUT'){
//         // document.querySelector('.dropdown-login').classList.toggle('show');
//         document.getElementById('typing_check').style.display = 'block';
//     }else{
//         document.getElementById('typing_check').style.display = 'none';
//     }
// }

// var inputs = document.querySelectorAll("");

// for (var i = 0; i < inputs.length; i++) {
//     inputs[i].addEventListener("focus", function(event) {
//         event.stopPropagation();
//         console.log('here')
//     });
// }