const header = document.getElementById("header");
const subtitle = document.getElementById("subtitle");
const slider = document.getElementById("slider");
const loginTab = document.getElementById("loginTab");
const registerTab = document.getElementById("registerTab");
const formWrapper = document.getElementById("formWrapper");
const formContainer = document.getElementById("formContainer");
const loginForm = document.getElementById("loginForm");
const registerForm = document.getElementById("registerForm");
loginTab.addEventListener("click", showLogin);
registerTab.addEventListener("click", showRegister);
let isLogin = true;

function showLogin() {
    isLogin = true;
    formWrapper.style.transform = "translateX(0%)";
    slider.style.transform = "translateX(0%)";
    header.classList.remove("bg-blue-500");
    header.classList.add("bg-green-500");
    subtitle.textContent = "Masuk untuk melanjutkan pendaftaran";
    loginTab.classList.remove("text-white");
    loginTab.classList.add("text-green-700");
    registerTab.classList.remove("text-blue-700");
    registerTab.classList.add("text-white");
    updateFormHeight();
}

function showRegister() {
    isLogin = false;
    formWrapper.style.transform = "translateX(-50%)";
    slider.style.transform = "translateX(100%)";
    header.classList.remove("bg-green-500");
    header.classList.add("bg-blue-500");
    subtitle.textContent = "Buat akun untuk memulai pendaftaran";
    registerTab.classList.remove("text-white");
    registerTab.classList.add("text-blue-700");
    loginTab.classList.remove("text-green-700");
    loginTab.classList.add("text-white");
    updateFormHeight();
}

// function button password
window.togglePassword = function (inputId, button) {
    const input = document.getElementById(inputId);
    if (input.type === "password") {
        input.type = "text";
        button.textContent = "🔒";
    } else {
        input.type = "password";
        button.textContent = "🔓";
    }
};
// update height
function updateFormHeight() {
    const activeForm = isLogin ? loginForm : registerForm;
    formContainer.style.height = activeForm.scrollHeight + "px";
}
updateFormHeight();
