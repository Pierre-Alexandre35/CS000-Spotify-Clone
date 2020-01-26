const loginForm = document.querySelector("#loginForm");
const registerForm = document.querySelector("#registerForm");

const wantRegister = document.querySelector(".noAccountLink");
const wantLogin = document.querySelector(".alreadyAccountLink");


const registerButton = document.querySelector("#registerButton");

document.addEventListener("DOMContentLoaded", function(){
    wantRegister.addEventListener("click", e =>{
        e.preventDefault();
        loginForm.style.display="none";
        registerForm.style.display="block";
    });

    wantLogin.addEventListener("click", e =>{
        e.preventDefault();
        loginForm.style.display="block";
        registerForm.style.display="none";
    });

    registerButton.addEventListener("click", e =>{


    });
});


const showOne = () => {
    loginForm.style.display="block";
        registerForm.style.display="none";
}

const showTwo = () => {
    loginForm.style.display="none";
        registerForm.style.display="block";
}