

document.addEventListener("DOMContentLoaded", function () {
    const profilePicNavbar = document.getElementById("profile-pic-navbar");
    const profilePicTable = document.getElementById("profile-pic-table");
    const nameField = document.getElementById("name");
    const courseField = document.getElementById("course");

    
    const profilePicUrl = "profile-pic.jpg"; 
    profilePicNavbar.src = profilePicUrl;
    profilePicTable.src = profilePicUrl;

    
    if (localStorage.getItem("profileName")) {
        nameField.value = localStorage.getItem("profileName");
    }

    if (localStorage.getItem("profileCourse")) {
        courseField.value = localStorage.getItem("profileCourse");
    }

    nameField.addEventListener("input", function () {
        localStorage.setItem("profileName", nameField.value);
    });

    courseField.addEventListener("input", function () {
        localStorage.setItem("profileCourse", courseField.value);
    });
});

function submitForm() {
    const currentPassword = document.getElementById("current-password").value;
    const newPassword = document.getElementById("new-password").value;
    const email = document.getElementById("email").value;

    if (!validatePassword(newPassword)) {
        alert("A senha deve conter pelo menos uma letra maiúscula, 8 dígitos e um caractere especial.");
        return;
    }

    if (!validateEmail(email)) {
        alert("Por favor, insira um e-mail válido.");
        return;
    }

    // Process the form submission (send data to the server, etc.)
    console.log("Form submitted with data:", { currentPassword, newPassword, email });
}

function validatePassword(password) {
    const passwordRegex = /^(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.{8,})/;
    return passwordRegex.test(password);
}

function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}
