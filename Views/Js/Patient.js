
    function validateForm() {
        var firstName = document.getElementById('firstName').value.trim();
        var lastName = document.getElementById('lastName').value.trim();
        var email = document.getElementById('email').value.trim();
        var password = document.getElementById('password').value.trim();
        var confirmPassword = document.getElementById('confirmpassword').value.trim();
        var contactNo = document.getElementById('contactNo').value.trim();

        // Check for empty fields
        if (firstName === '' || lastName === '' || email === '' || password === '' || confirmPassword === '' || contactNo === '') {
            document.getElementById('error-message').innerText = 'All fields are required';
            return false;
        }

        // Check if password and confirm password match
        if (password !== confirmPassword) {
            document.getElementById('error-message').innerText = 'Passwords do not match';
            return false;
        }

        // If all validations pass, return true
        return true;
    }
