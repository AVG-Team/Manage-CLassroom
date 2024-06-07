import Datepicker from 'flowbite-datepicker/Datepicker';
import vi from "flowbite-datepicker/locales/vi";

Object.assign(Datepicker.locales, vi);

const birthday = document.getElementById("datepicker");
new Datepicker(birthday, {
    language: "vi",
    format: "dd/mm/yyyy",
    autohide: true,
})

document.addEventListener("DOMContentLoaded", function () {
    const inputOldPassword = document.getElementById("inputOldPassword");
    const eyeOld = document.getElementById("eye_show_old_pwd");
    const eyeOldHidden = document.getElementById("eye_hidden_old_pwd");

    inputOldPassword.addEventListener("focus", function () {
        if(eyeOldHidden.classList.contains("hidden"))
            eyeOld.classList.remove("hidden");
    });

    eyeOld.addEventListener("click", function () {
        eyeOld.classList.add("hidden");
        eyeOldHidden.classList.remove("hidden");
        inputOldPassword.type = "text";
    });

    eyeOldHidden.addEventListener("click", function () {
        eyeOldHidden.classList.add("hidden");
        eyeOld.classList.remove("hidden");
        inputOldPassword.type = "password";
    });

    const inputPassword = document.getElementById("inputPassword");
    const eye = document.getElementById("eye_show_pwd");
    const eyeHidden = document.getElementById("eye_hidden_pwd");

    inputPassword.addEventListener("focus", function () {
        if(eyeHidden.classList.contains("hidden"))
            eye.classList.remove("hidden");
    });

    eye.addEventListener("click", function () {
        eye.classList.add("hidden");
        eyeHidden.classList.remove("hidden");
        inputPassword.type = "text";
    });

    eyeHidden.addEventListener("click", function () {
        eyeHidden.classList.add("hidden");
        eye.classList.remove("hidden");
        inputPassword.type = "password";
    });

    const inputRePassword = document.getElementById("inputRePassword");
    const eyere = document.getElementById("eye_show_re_pwd");
    const eyeReHidden = document.getElementById("eye_hidden_re_pwd");

    inputRePassword.addEventListener("focus", function () {
        if(eyeReHidden.classList.contains("hidden"))
            eyere.classList.remove("hidden");
    });

    eyere.addEventListener("click", function () {
        eyere.classList.add("hidden");
        eyeReHidden.classList.remove("hidden");
        inputRePassword.type = "text";
    });

    eyeReHidden.addEventListener("click", function () {
        eyeReHidden.classList.add("hidden");
        eyere.classList.remove("hidden");
        inputRePassword.type = "password";
    });

    const button = document.getElementById("button_submit");
    button.addEventListener("click", function () {
        if(inputOldPassword.value !== "" && inputPassword.value === inputOldPassword.value){
            alert("Mật khẩu mới không được trùng với mật khẩu cũ");
        } else if(inputPassword.value !== inputRePassword.value){
            alert("Mật khẩu không trùng khớp");
        } else {
            document.querySelector("form").submit();
        }
    });
});
