//Signs Up a User
function signUp() {
    var form = document.getElementsByClassName("sign-up-form")[0];
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
           if(response == "user registered") {
               window.location = "layouts/dashboard.php";
           }
        }
    }
    xhr.open("POST", "backend/auth.php", true);
    xhr.send(formData);
}

//Signs In a User
function signIn() {
    var rememberUser = "N";
    var checkbox = document.getElementById("remember");
    if(checkbox.checked) {
        rememberUser = "Y";
    } 

    var form = document.getElementsByClassName("sign-in-form")[0];
    var formData = new FormData(form);
    formData.append("rememberUser", rememberUser);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            alert(response);
           if(response == "success") {
               window.location = "layouts/dashboard.php";
           } else {
               alert(response);
           }
        }
    }
    xhr.open("POST", "backend/auth.php", true);
    xhr.send(formData);
}

//Validates user first name
function validateFname() {
    var fname = document.getElementById("fname-field").value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            var fnameError = document.getElementsByClassName("fname-error")[0];
            fnameError.innerHTML = response;
        }
    }
    xhr.open("GET", "backend/authCheck.php?fname="+fname, true );
    xhr.send();
}

//Validates user last name
function validateLname() {
    var lname = document.getElementById("lname-field").value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            var fnameError = document.getElementsByClassName("lname-error")[0];
            fnameError.innerHTML = response;
        }
    }
    xhr.open("GET", "backend/authCheck.php?lname="+lname, true );
    xhr.send();
}

//Validates email
function validateEmail() {
    var email = document.getElementById("email-field").value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            var fnameError = document.getElementsByClassName("email-error")[0];
            fnameError.innerHTML = response;
        }
    }
    xhr.open("GET", "backend/authCheck.php?email="+email, true );
    xhr.send();
}

//Validates password1
function validatePassword1() {
    var pass1 = document.getElementById("pass1-field").value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            var fnameError = document.getElementsByClassName("pass1-error")[0];
            fnameError.innerHTML = response;
        }
    }
    xhr.open("GET", "backend/authCheck.php?pass1="+pass1, true );
    xhr.send();
}


//Validates password2
function validatePassword2() {
    var pass2 = document.getElementById("pass2-field").value;
    var pass1 = document.getElementById("pass1-field").value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            var fnameError = document.getElementsByClassName("pass2-error")[0];
            fnameError.innerHTML = response;
        }
    }
    xhr.open("GET", "backend/authCheck.php?pass2="+pass2+"&password1="+pass1, true );
    xhr.send();
}