function checkPassword(inputId, toggleId) {
    let input = document.getElementById(inputId);
    let toggle = document.getElementById(toggleId);

    toggle.addEventListener("click", function () {
        const type =
            input.getAttribute("type") === "password" ? "text" : "password";
        input.setAttribute("type", type);
        this.classList.toggle("fa-eye");
        this.classList.toggle("fa-eye-slash");
    });
}

checkPassword("oldPassword", "toggleOldPassword");
checkPassword("changePassword", "toggleChangePassword");
checkPassword("confirmPassword", "toggleConfirmPassword");
