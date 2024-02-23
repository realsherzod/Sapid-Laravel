<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <title>Sapid Admin Panel</title>
</head>
<style>
  *{
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
  }
</style>
<body>
    <div class="container">
        <div class="wrapper">
          <div id="auth" class="authentication">
            <div class="wrapper">
              <div id="login" class="card">
                <div class="wrapper">
                  <div class="animation form login">
                    <div class="wrapper">
                      <h3 class="title">
                        Sign in
                      </h3>
                      <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group input">
                            <label>Email</label>
                            <input type="email" name="email" id="user-email-login" class="user-email">
                        </div>
                        <div class="form-group input">
                            <label>Password</label>
                            <input type="password" name="password" id="user-password-login" class="user-password">
                        </div>
                        <button style="background-color: rgb(50, 49, 49);" type="submit" class="button color-1 login" id="button-login">
                          Login
                      </button>
                      
                    </form>
                    
                      <a href="#" id="button-register-switch">
                        Create Account
                      </a>
                      <a href={{route('forgotpassword.create')}} id="button-register-switch">
                        Forgot Password
                      </a>
                    </div>
                  </div>
                  <div class="animation note login">
                      <img height="100%" width="100%" src="https://images.unsplash.com/photo-1517434324-1db605ff03c7?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8ZmFzdCUyMGZvb2R8ZW58MHx8MHx8fDA%3D" alt="">
                  </div>
                </div>
              </div>
              <div id="register" class="card">
                <div class="wrapper">
                  <div class="animation form register">
                    <div class="wrapper">
                      <h3 class="title">
                        Create Account
                      </h3>
                      <form method="POST" action="{{route('register')}}">
                        @csrf
                        <div class="form-group input">
                          <label>
                            Name
                          </label>
                          <input placeholder="please enter your name" type="text" name="name" id="user-name-register" class="user-name">
                        </div>
                        <div class="form-group input">
                          <label>
                            Email
                          </label>
                          <input placeholder="please enter your email" type="email" name="email" id="user-email-register" class="user-email">
                        </div>
                        <div class="form-group input">
                          <label>
                            Password
                          </label>
                          <input placeholder="8 symbols , 1 Capital letter , numbers" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" name="password" id="user-password-register" class="user-password">
                        </div>
                        <div class="form-group input">
                          <label>
                            Confirm Password
                          </label>
                          <input placeholder="please confirm passowor" type="password" name="password_confirmation" id="user-password-register-confirm"
                                 class="user-password-confirm">
                        </div>
                        <button style="background-color: rgb(50, 49, 49);"  type="submit" class="button color-1 login" id="button-register">
                          Create
                        </button>
                      </form>
                      <a href="#" id="button-login-switch">
                        Already have an account?
                      </a>
                    </div>
                  </div>
                  <div class="animation note register">
                <img height="100%" width="100%" src="https://wl-brightside.cf.tsp.li/resize/728x/jpg/178/bcf/ccabe255878066ebe4f83cc9a1.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script>
        function debounce(func, wait, immediate) {
  var timeout;
  return function () {
    var context = this,
      args = arguments;
    var later = function () {
      timeout = null;
      if (!immediate) func.apply(context, args);
    };
    var callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func.apply(context, args);
  };
}

window.addEventListener("load", function () {
  const authPage = document.querySelector("#auth");
  if (authPage) {
    const login = document.querySelector("#login");
    const register = document.querySelector("#register");

    login.classList.add("active");

    const buttonSwitchRegister = document.querySelector(
      "#button-register-switch"
    );
    const buttonSwitchLogin = document.querySelector("#button-login-switch");

    buttonSwitchRegister.addEventListener("click",           function () {
      if (login.classList.contains("active")) {
        login.classList.remove("active");
        register.classList.add("active");
      } else {
        login.classList.add("active");
        register.classList.remove("active");
      }
    });

    buttonSwitchLogin.addEventListener("click", function() {
      if (login.classList.contains("active")) {
        login.classList.remove("active");
        register.classList.add("active");
      } else {
        login.classList.add("active");
        register.classList.remove("active");
      }
    });

    // validation
    // login
    const loginButton = document.querySelector("#button-login");
    const loginEmail = document.querySelector("#user-email-login");
    const loginPassword = document.querySelector("#user-password-login");
    loginButton.addEventListener("click", function (e) {
      if (loginEmail.value.length == 0 || loginPassword.value.length == 0) {
        alert("please fill the blank");
      } 
    });

    const registerButton = document.querySelector("#button-register");
    const registerEmail = document.querySelector("#user-email-register");
    const registerPassword = document.querySelector("#user-password-register");
    registerButton.addEventListener("click", function (e) {
      if (
        registerEmail.value.length == 0 ||
        registerPassword.value.length == 0
      ) {
        alert("please fill the blank");
      } else {
        alert("register");
      }
    });

    // email
    const emails = document.querySelectorAll(".user-email");
    let email;
    emails.forEach((email) => {
      var checkEmail = debounce(function (e) {
        var aT = /[@]/g;
        if (email.value.match(aT)) {
          email.classList.remove("invalid");
          email.classList.add("valid");
        } else {
          email.classList.remove("valid");
          email.classList.add("invalid");

          let alert = document.createElement("div");
          alert.classList.add("alert");
          alert.innerHTML = `<p>Please include an '@' in the email address. <span><strong>${email.value}</strong></span> is missing an '@'</p>`;

          email.parentElement.append(alert);
          setTimeout(function () {
            email.parentElement.removeChild(alert);
          }, 1500);
        }
      }, 10);
      email.addEventListener("input", checkEmail);
    });

    // password
    let passwords = document.querySelectorAll(".user-password");
    let password;
    passwords.forEach((password) => {
      var checkPassword = debounce(function (e) {
        if (password.value.length <= 3) {
          password.classList.remove("valid");
          password.classList.add("invalid");

          let alert = document.createElement("div");
          alert.classList.add("alert");
          alert.innerHTML = `<p>Please lengthen this text to 6 characters or more (you are currently using <span>${password.value.length} characters</span>).</p>`;

          password.parentElement.append(alert);
          setTimeout(function () {
            password.parentElement.removeChild(alert);
          }, 1000);
        } else {
          password.classList.remove("invalid");
          password.classList.add("valid");
        }
      }, 10);
      password.addEventListener("input", checkPassword);
    });

    // confirm password
    const passwordsConfirm = document.querySelectorAll(
      ".user-password-confirm"
    );
    passwordsConfirm.forEach((passwordConfirm) => {
      var passwordRegister = document.querySelector("#user-password-register");
      var checkPasswordConfirm = debounce(function (e) {
        if (passwordRegister.value !== passwordConfirm.value) {
          passwordConfirm.classList.remove("valid");
          passwordConfirm.classList.add("invalid");

          let alert = document.createElement("div");
          alert.classList.add("alert");
          alert.innerHTML = `<p>Password does not match</p>`;

          passwordConfirm.parentElement.append(alert);
          setTimeout(function () {
            passwordConfirm.parentElement.removeChild(alert);
          }, 500);
        } else {
          passwordConfirm.classList.remove("invalid");
          passwordConfirm.classList.add("valid");
        }
      }, 10);
      passwordConfirm.addEventListener("input", checkPasswordConfirm);
    });
  }
});

      </script>
</body>
</html>
