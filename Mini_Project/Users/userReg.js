function closeAlert(button) {
    const alert = button.closest('.alert');
    if (alert) {
        const section = alert.closest('section');
        alert.style.display = 'none';
        section.style.display = 'none'; // Close the section
    }
  }
  function validateFullName() {
    const fullNameInput = document.getElementById('full_name');
    const fullNameError = document.getElementById('full_name_error');
    const fullName = fullNameInput.value;

    if (fullName.length < 5) {
        fullNameError.textContent = 'Full Name must be at least 5 characters.';
    } else {
        fullNameError.textContent = '';
    }
}

function validateUsername() {
    // Validation logic for Username
    // Display error messages if invalid
    const usernameInput = document.getElementById('user_name');
    const usernameError = document.getElementById('user_name_error');
    const username = usernameInput.value;

    // Check username in the database using AJAX
    if (username.trim() === '') {
        usernameError.textContent = 'Username is required.';
    } else {
        // Make an AJAX request to check if the username exists
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'checkUser.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText === 'exists') {
                    usernameError.textContent = 'Username already exists.';
                } else {
                    usernameError.textContent = '';
                }
            }
        };
        xhr.send('username=' + username);
    }
}

function validateEmail() {
    // Validation logic for Email
    // Display error messages if invalid
    const emailInput = document.getElementById('email');
    const emailError = document.getElementById('email_error');
    const email = emailInput.value;

    // Regular expression pattern for email validation
    const emailPattern = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;

    if (!emailPattern.test(email)) {
        emailError.textContent = 'Invalid email address.';
    } else {
        emailError.textContent = '';
    }
}

function validatePhoneNumber() {
    // Validation logic for Phone Number
    // Display error messages if invalid
    const phoneNumberInput = document.getElementById('ph_no');
    const phoneNumberError = document.getElementById('ph_no_error');
    const phoneNumber = phoneNumberInput.value;

    const phoneNumberPattern = /^[0-9]{10}$/;

    if (!phoneNumberPattern.test(phoneNumber)) {
        phoneNumberError.textContent = 'Invalid Phone Number';
    } else {
        phoneNumberError.textContent = '';
    }

}

function validatePassword() {
    // Validation logic for Password
    // Display error messages if invalid
    const passwordInput = document.getElementById('pass');
    const passwordError = document.getElementById('pass_error');
    const password = passwordInput.value;

    if (password.trim() === '') {
        passwordError.textContent = 'Password is required.';
    } else if (password.length < 8 || password.length > 14) {
        passwordError.textContent = 'Password must be between 8 and 14 characters.';
    } else if (!/[A-Za-z]/.test(password) || !/[0-9]/.test(password) || !/[^A-Za-z0-9]/.test(password)) {
        passwordError.textContent = 'Password must include at least one letter, one number, and one special character.';
    } else {
        passwordError.textContent = '';
    }
}

function validateConfirmPassword() {
    const passwordInput = document.getElementById('pass');
    const confirmPasswordInput = document.getElementById('Rpass');
    const confirmPasswordError = document.getElementById('Rpass_error');

    if (passwordInput.value !== confirmPasswordInput.value) {
        confirmPasswordError.textContent = 'Passwords do not match.';
    } else {
        confirmPasswordError.textContent = '';
    }
}

function validateForm() {
    validateFullName();
    validateUsername();
    validateEmail();
    validatePhoneNumber();
    validatePassword();
    validateConfirmPassword();

    const errorElements = document.querySelectorAll('.error');
    for (const errorElement of errorElements) {
        if (errorElement.textContent) {
            return false; // Prevent form submission if there are errors
        }
    }
}