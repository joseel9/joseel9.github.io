// Declarando variables
var loginBox = document.getElementById("login-box");
var registerBox = document.getElementById("register-box");
var btnIniciarSesion = document.getElementById("btn__iniciar-sesion");
var btnRegistrarse = document.getElementById("btn__registrarse");

// EventListeners para los enlaces de inicio de sesión y registro
btnIniciarSesion.addEventListener("click", function(event) {
    event.preventDefault();
    loginBox.classList.remove("hidden");
    registerBox.classList.add("hidden");
});

btnRegistrarse.addEventListener("click", function(event) {
    event.preventDefault();
    registerBox.classList.remove("hidden");
    loginBox.classList.add("hidden");
});
