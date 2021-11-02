const ERROR_EMPTY_FIELDS = "All fields must be filled in";
const ERROR_PWD_NOT_MATCH = "Passwords do not match";

// this js is all about preventing users from submitting empty fields
function validateRegistrationForm() {
    const name = document.forms["registrationForm"]["name"].value;
    const email = document.forms["registrationForm"]["email"].value;
    const pwd = document.forms["registrationForm"]["password"].value;
    const confirmPwd = document.forms["registrationForm"]["confirmPassword"].value;

    if (name == "" || email == "" || pwd == "" || confirmPwd == "") {
        document.getElementById("RegisterErrorMessage").innerHTML = ERROR_EMPTY_FIELDS;
        return false;
    }

    if (pwd != confirmPwd) {
        document.getElementById("RegisterErrorMessage").innerHTML = ERROR_PWD_NOT_MATCH;
        return false;
    }

    return true;
}

function validateLoginForm() {
    const email = document.forms["loginForm"]["email"].value;
    const pwd = document.forms["loginForm"]["password"].value;

    if (email == "" || pwd == "") {
        document.getElementById("LoginErrorMessage").innerHTML = ERROR_EMPTY_FIELDS;
        return false;
    }

    return true;
}

function validateResetPwdForm() {
    const email = document.forms["resetPwdForm"]["email"].value;

    if (email == "") {
        document.getElementById("ResetPwdMessage").innerHTML = ERROR_EMPTY_FIELDS;
        return false;
    }

    return true;
}

function validateBookingForm() {
    const doctorId = document.forms["bookingForm"]["doctorId"].value;
    const timeslot = document.forms["bookingForm"]["timeslot"].value;

    if (doctorId == "" || timeslot == "") {
        alert("Choose an available timeslot with your doctor!");
        return false;
    }

    return true;
}