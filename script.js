document.getElementById("showPassword").addEventListener("click", function() {
    var passwordInput = document.getElementById("password");
    var toggleIcon = document.getElementById("toggleIcon");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleIcon.classList.remove("bi-eye-fill");
        toggleIcon.classList.add("bi-eye-slash-fill");
    } else {
        passwordInput.type = "password";
        toggleIcon.classList.remove("bi-eye-slash-fill");
        toggleIcon.classList.add("bi-eye-fill");
    }
});

function showErrorMessage(message) {
    var errorMessageDiv = document.getElementById("error-message");
    errorMessageDiv.textContent = message;
    errorMessageDiv.style.display = "block";
}

function showSuccessMessage(message) {
    var successMessageDiv = document.getElementById("success-message");
    successMessageDiv.textContent = message;
    successMessageDiv.style.display = "block";
}
