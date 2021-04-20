var registrationLottie = lottie.loadAnimation({
    container: document.getElementById('lottie'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: 'lottieFiles/user-profile.json'
  });

  var registrationLottie = lottie.loadAnimation({
    container: document.getElementById('lottie1'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: 'lottieFiles/social-media1.json'
  });

  var registrationLottie = lottie.loadAnimation({
    container: document.getElementById('lottie2'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: 'lottieFiles/social-media2.json'
  });



  function toggleAuth(className) {
      /*alert(className);*/
      const signUpForm = document.getElementsByClassName("sign-up-form")[0];
      const signInForm = document.getElementsByClassName("sign-in-form")[0];

      const signUpTab = document.getElementsByClassName("register-tab")[0];
      const signInTab = document.getElementsByClassName("login-tab")[0];

      if(className == "register-tab" || className == "sign-up-bottom") {
        signUpTab.style.backgroundColor = "#dd00b8";
        signUpTab.style.color = "white";

        signInTab.style.backgroundColor = "white";
        signInTab.style.color = "#dd00b8";
        
        signInForm.style.display = "none";
        signUpForm.style.display = "flex";
      } else {
        signInTab.style.backgroundColor = "#dd00b8";
        signInTab.style.color = "white";

        signUpTab.style.backgroundColor = "white";
        signUpTab.style.color = "#dd00b8";

        signUpForm.style.display = "none";
        signInForm.style.display = "flex";
      }
  }

  function toggleForgotPassword() {
      const password = document.getElementById("pass").value;
      const forgotText = document.getElementsByClassName("forgot-label")[0];
      if(password.length == 0) {
            forgotText.style.display = "none"
          } 
        else if(password.length > 0) {
          forgotText.style.display = "flex";
      }
  }